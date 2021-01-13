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
        // $categories = Category::with('subcategories')->get();
        $saleCategories = Category::where('for_sale', 1)
            ->with('products')
            ->with('subcategories')
            ->get(['id', 'name', 'slug'])
            ->random(2);
        $weeklyProducts = Product::where('weekly_deal', 1)
            ->with('reviews')
            ->get(['id', 'title', 'price', 'slug', 'thumbnail'])
            ->random(4);
        $bestSeller = Product::where('best_seller', 1)
            ->with('reviews')
            ->get(['id', 'title', 'price', 'slug', 'thumbnail'])
            ->random(4);
        $topProducts = Product::where('top_rated', 1)
            ->with('reviews')
            ->get() //['id', 'title', 'price', 'slug', 'thumbnail', 'category_id']
            ->random(6);
        $latestProducts = Product::latest()
            ->with('reviews')
            ->take(6)
            ->get(['id', 'title', 'price', 'slug', 'thumbnail']);
        // dd($products);
        return view(
            'home.index',
            compact(
                'weeklyProducts',
                'saleCategories',
                'topProducts',
                'bestSeller',
                'latestProducts'
            )
        );
    }
}
