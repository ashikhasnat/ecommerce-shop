<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $products = $product
            ->with(['category', 'brand'])
            ->latest()
            ->paginate();
        // dd($products);
        return view('dashboard.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Brand $brand)
    {
        $brands = $brand->all('id', 'name');
        // dd($brands);
        return view('dashboard.product.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $newProduct = $request->validate([
            'sku' => ['nullable'],
            'slug' => ['nullable'],
            'title' => ['required', 'string', 'max:255', 'min:3'],
            'price' => ['numeric', 'required'],
            'thumbnail' => ['nullable'],
            'brand_id' => ['nullable', 'required'],
            'category_id' => ['required'],
            'sub_category_id' => ['nullable'],
            'stock_status' => ['required'],
            'short_details' => ['required', 'max:2000', 'min:100'],
            'long_details' => ['required', 'max:2000', 'min:100'],
        ]);
        if (request()->hasFile('thumbnail')) {
            $thumbnail = request()
                ->file('thumbnail')
                ->getClientOriginalName();
            $newProduct['thumbnail'] = request()
                ->file('thumbnail')
                ->storeAs('thumbnails', $thumbnail, 'public');
            $product->update($newProduct);
        }
        $product->create(
            array_merge($newProduct, [
                'sku' => Str::upper(Str::random(3)) . '-' . rand(0, 4000),
                'slug' => Str::slug($newProduct['title']),
            ])
        );
        return redirect(route('product.index'))->with(
            'msg',
            'Successfully Created'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with(
            'delete',
            'successfully Deleted'
        );
    }
}
