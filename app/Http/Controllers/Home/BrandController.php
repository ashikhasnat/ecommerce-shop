<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get(['brand_logo', 'id', 'slug', 'name']);
        return view('home.brand.index', compact('brands'));
    }
    public function show(Brand $brand)
    {
        $brands = Brand::all('name', 'id');

        if (request()->has('sort')) {
            $products = Product::where('brand_id', $brand->id)
                ->orderBy('title', request('sort'))
                ->paginate(12, [
                    'id',
                    'title',
                    'price',
                    'old_price',
                    'discount',
                    'slug',
                    'thumbnail',
                ])
                ->withQueryString();
        } elseif (request()->has('price')) {
            $products = Product::where('brand_id', $brand->id)
                ->orderBy('price', request('price'))
                ->paginate(12, [
                    'id',
                    'title',
                    'price',
                    'old_price',
                    'discount',
                    'slug',
                    'thumbnail',
                ])
                ->withQueryString();
        } else {
            $products = Product::where('brand_id', $brand->id)
                ->paginate(12, [
                    'id',
                    'title',
                    'price',
                    'old_price',
                    'discount',
                    'slug',
                    'thumbnail',
                ])
                ->withQueryString();
        }
        return view('home.brand.show', compact('products', 'brands', 'brand'));
    }
}
