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
        $products = Product::with('category')
            ->with('brand')
            ->latest()
            ->take(3)
            ->get();
        // dd($products);
        return view('home.index', compact('categories', 'products'));
    }
}
