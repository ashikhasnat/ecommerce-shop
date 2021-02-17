<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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
    public function store(Request $request)
    {
        $newBrand = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'brand_logo' => ['required', 'image'],
            'slug' => ['nullable'],
        ]);
        if (request()->file('brand_logo')) {
            // dd(request('brand_logo'));
            $brand_path =
                'app/public/brand/' . $newBrand['brand_logo']->hashName();
            Image::make($newBrand['brand_logo'])
                ->fit(200, 160)
                ->save(storage_path($brand_path));
            $replacePath = str_replace('app/public', '/storage', $brand_path);
        }
        // dd($replacePath);
        Brand::create([
            'name' => $newBrand['name'],
            'slug' => Str::slug($newBrand['name']),
            'brand_logo' => $replacePath,
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
