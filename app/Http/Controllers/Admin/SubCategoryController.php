<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubCategory $subCategory)
    {
        $subcategories = $subCategory
            ->with('products')
            ->with('category')
            ->latest()
            ->paginate();
        return view('dashboard.subCategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $categories = $category->all();
        return view('dashboard.subCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SubCategory $subCategory)
    {
        $newSubCategory = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'slug' => ['nullable'],
            'category_id' => ['required'],
        ]);
        $subCategory->create([
            'name' => $newSubCategory['name'],
            'category_id' => $newSubCategory['category_id'],
            'slug' => Str::slug($newSubCategory['name']),
        ]);
        return redirect(route('subcategory.index'))->with(
            'msg',
            'Successfully Created'
        );
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory, Category $category)
    {
        $categories = $category->all();
        return view(
            'dashboard.subCategory.edit',
            compact('subcategory', 'categories')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update(request()->all());
        return redirect(route('subcategory.index'))->with(
            'msg',
            'Successfully Updated'
        );
    }
}
