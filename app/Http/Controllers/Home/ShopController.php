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
            $products = Product::whereNotBetween('id', [7, 9])
                ->orderBy('title', request('sort'))
                ->paginate(12, $list)
                ->withQueryString();
        } elseif (request()->has('price')) {
            $products = Product::whereNotBetween('id', [7, 9])
                ->orderBy('price', request('price'))
                ->paginate(12, $list)
                ->withQueryString();
        } else {
            $products = Product::whereNotBetween('id', [7, 9])
                ->orderByDesc('created_at')
                ->paginate(12, $list)
                ->withQueryString();
            // dd($products);
        }
        return view('home.shop.index', compact('brands', 'products'));
    }
}
