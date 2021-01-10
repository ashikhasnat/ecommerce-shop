<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function show(SubCategory $subCategory)
    {
        $brands = Brand::all('name', 'id');
        $products = $subCategory
            ->products()
            ->with('reviews')
            ->paginate();
        // dd($products);
        return view(
            'home.subcategory.show',
            compact('subCategory', 'brands', 'products')
        );
    }
}
