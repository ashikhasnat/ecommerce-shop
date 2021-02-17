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
            ->get([
                'id',
                'title',
                'price',
                'old_price',
                'discount',
                'slug',
                'thumbnail',
            ])
            ->random(4);
        $bestSeller = Product::where('best_seller', 1)
            ->get([
                'id',
                'title',
                'price',
                'old_price',
                'discount',
                'slug',
                'thumbnail',
            ])
            ->random(4);
        $mainSlider = Product::where('main_slider', 1)
            ->with('brand')
            ->with('category')
            ->latest()
            ->take(4)
            ->get();
        $topProducts = Product::where('top_rated', 1)
            ->get([
                'id',
                'title',
                'price',
                'old_price',
                'discount',
                'slug',
                'thumbnail',
            ]) //['id', 'title', 'price', 'slug', 'thumbnail', 'category_id']
            ->random(6);
        $latestProducts = Product::whereNotBetween('id', [7, 9])
            ->orderByDesc('created_at')
            ->take(6)
            ->get([
                'id',
                'title',
                'price',
                'old_price',
                'discount',
                'slug',
                'thumbnail',
            ]);
        return view(
            'home.index',
            compact(
                'weeklyProducts',
                'saleCategories',
                'topProducts',
                'bestSeller',
                'latestProducts',
                'mainSlider'
            )
        );
    }
    public function apiCategories()
    {
        $categories = Category::with('subcategories')
            ->latest()
            ->get(['name', 'slug', 'id']);
        return $categories;
    }
}
