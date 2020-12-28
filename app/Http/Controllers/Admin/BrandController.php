<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index(Brand $brand)
    {
        $brands = $brand
            ->with('products')
            ->latest()
            ->paginate();

        return view('dashboard.brand.index', compact('brands'));
    }
    public function create(Brand $brand)
    {
        $brands = $brand->all();
        return view('dashboard.brand.create', compact('brands'));
    }
    public function store(Request $request, Brand $brand)
    {
        $newBrand = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'brand_logo' => ['nullable'],
            'slug' => ['nullable'],
        ]);
        $brand->create([
            'name' => $newBrand['name'],
            'slug' => Str::slug($newBrand['name']),
            'brand_logo' => 'Logo',
        ]);
        return redirect(route('brand.index'))->with(
            'msg',
            'Successfully Created'
        );
    }
    public function edit(Brand $brand)
    {
        return view('dashboard.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->all());
        return redirect(route('brand.index'))->with(
            'msg',
            'Successfully Updated'
        );
    }
}
