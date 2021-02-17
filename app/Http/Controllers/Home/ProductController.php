<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $catId = $product->category->id;
        $relatedProducts = Product::where('category_id', $catId)
            ->with('reviews')
            ->get()
            ->random(1);
        // dd($relatedProducts);
        return view(
            'home.products.show',
            compact('product', 'relatedProducts')
        );
    }
}
