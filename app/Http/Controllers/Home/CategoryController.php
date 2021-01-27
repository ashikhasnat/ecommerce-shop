<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $brands = Brand::all('name', 'id');
        if (request()->has('sort')) {
            $products = Product::where('category_id', $category->id)
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
            $products = Product::where('category_id', $category->id)
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
            $products = Product::where('category_id', $category->id)
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
            'home.category.show',
            compact('category', 'brands', 'products')
        );
    }
}
