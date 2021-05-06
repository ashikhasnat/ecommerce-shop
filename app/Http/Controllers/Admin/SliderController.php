<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('dashboard.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Brand $brand, Category $category)
    {
        $categories = $category->all();
        $brands = $brand->all('id', 'name');
        return view('dashboard.slider.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newSlider = $request->validate([
            'custom_product_link' => ['required', 'string', 'max:255', 'min:5'],
            'title' => ['required', 'string', 'max:255', 'min:3'],
            'thumbnail' => ['nullable'],
            'brand_id' => ['nullable', 'required'],
            'category_id' => ['required'],
        ]);
        if (request()->hasFile('thumbnail')) {
            $thumbnail_path =
                'app/public/slider-thumbnail/' . $newSlider['thumbnail']->hashName();
            Image::make($newSlider['thumbnail'])
                ->fit(960, 560)
                ->save(storage_path($thumbnail_path));
            $replacePath = str_replace(
                'app/public',
                '/storage',
                $thumbnail_path
            );
        }
        Slider::create(
            array_merge($newSlider, [
                'thumbnail' => $replacePath,
            ])
        );
        return redirect(route('slider.index'))->with(
            'msg',
            'Successfully Created'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider, Brand $brand)
    {
        $brands = $brand->all('id', 'name');
        $categories = Category::latest()->get(['id', 'name']);
        return view(
            'dashboard.slider.edit',
            compact('brands', 'categories', 'slider')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        // $product = Product::findOrFail($id);
        if (request()->hasFile('thumbnail')) {
            $thumbnail_path =
                'app/public/slider-thumbnail/' . $request->thumbnail->hashName();
            Image::make($request->thumbnail)
                ->fit(960, 560)
                ->save(storage_path($thumbnail_path));
            $replacePath = str_replace(
                'app/public',
                '/storage',
                $thumbnail_path
            );
        }
        $slider->update(array_merge($request->all(), [
            'thumbnail' => $replacePath ?? $slider->thumbnail,
        ]));
        return redirect(route('slider.index'))->with('msg', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect(route('slider.index'))->with(
            'delete',
            'successfully Deleted'
        );
    }
}
