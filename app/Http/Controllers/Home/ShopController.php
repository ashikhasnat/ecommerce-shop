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
        $products = Product::latest()->paginate(12);
        return view('home.shop.index', compact('brands', 'products'));
    }
}
