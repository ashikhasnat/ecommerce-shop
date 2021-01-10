<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $brands = Brand::all('name', 'id');
        $products = $category
            ->products()
            ->with('reviews')
            ->paginate(12);
        // dd($products);
        return view(
            'home.category.show',
            compact('category', 'brands', 'products')
        );
    }
}
