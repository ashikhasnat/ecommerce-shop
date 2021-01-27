<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function show(SubCategory $subCategory)
    {
        $brands = Brand::all('name', 'id');
        if (request()->has('sort')) {
            $products = Product::where('category_id', $subCategory->id)
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
            $products = Product::where('category_id', $subCategory->id)
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
            $products = Product::where('category_id', $subCategory->id)
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
        return view(
            'home.subcategory.show',
            compact('subCategory', 'brands', 'products')
        );
    }
}
