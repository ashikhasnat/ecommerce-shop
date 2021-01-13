<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function apiIndex()
    {
        if (request()->has('query')) {
            $validated = request()->validate([
                'query' => ['string', 'max:15', 'min:3'],
            ]);
            $query = implode(' ', $validated);
            # code...
            $products = Product::where('title', 'LIKE', "%{$query}%")
                ->limit(6)
                ->get(['title', 'slug', 'id', 'thumbnail', 'price']);
        } else {
            $products = null;
        }
        return $products;
    }
}
