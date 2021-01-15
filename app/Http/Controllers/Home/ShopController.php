<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $brands = Brand::all('name', 'id');

        if (request()->has('sort')) {
            $products = Product::orderBy('title', request('sort'))
                ->paginate(12, ['id', 'title', 'price', 'thumbnail', 'slug'])
                ->withQueryString();
        } elseif (request()->has('price')) {
            $products = Product::orderBy('price', request('price'))
                ->paginate(12, ['id', 'title', 'price', 'thumbnail', 'slug'])
                ->withQueryString();
        } else {
            $products = Product::latest()
                ->paginate(12, ['id', 'title', 'price', 'thumbnail', 'slug'])
                ->withQueryString();
        }
        return view('home.shop.index', compact('brands', 'products'));
    }
}
