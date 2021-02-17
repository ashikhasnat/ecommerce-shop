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
        $list = [
            'id',
            'title',
            'price',
            'old_price',
            'discount',
            'slug',
            'thumbnail',
        ];
        if (request()->has('sort')) {
            $products = Product::where('category_id', $category->id)
                ->whereNotBetween('id', [7, 9])
                ->orderBy('title', request('sort'))
                ->paginate(12, $list)
                ->withQueryString();
        } elseif (request()->has('price')) {
            $products = Product::where('category_id', $category->id)
                ->whereNotBetween('id', [7, 9])
                ->orderBy('price', request('price'))
                ->paginate(12, $list)
                ->withQueryString();
        } else {
            $products = Product::where('category_id', $category->id)
                ->whereNotBetween('id', [7, 9])
                ->paginate(12, $list)
                ->withQueryString();
        }
        return view(
            'home.category.show',
            compact('category', 'brands', 'products')
        );
    }
}
