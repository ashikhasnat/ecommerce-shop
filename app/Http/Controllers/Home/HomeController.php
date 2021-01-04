<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->get();
        $singleCategories = Category::where('id', 3)
            ->with('products')
            ->first();
        $products = Product::with('category')
            ->with('brand')
            ->latest()
            ->take(4)
            ->get();
        // dd($products);
        return view(
            'home.index',
            compact('categories', 'products', 'singleCategories')
        );
    }
}
