<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $categories = $category
            ->with('products')
            ->latest()
            ->paginate();
        return view('dashboard.category.index', compact('categories'));
    }
    public function apiIndex()
    {
        $categories = Category::latest()->get();
        return $categories;
    }
    public function apiShow($id)
    {
        $subcategory = SubCategory::where('category_id', $id)->get();
        return $subcategory;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $categories = $category->all();
        return view('dashboard.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $newCategory = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'slug' => ['nullable'],
        ]);
        $category->create([
            'name' => $newCategory['name'],
            'slug' => Str::slug($newCategory['name']),
        ]);
        return redirect(route('category.index'))->with(
            'msg',
            'Successfully Created'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect(route('category.index'))->with(
            'msg',
            'Successfully Updated'
        );
    }
}
