<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        $newReview = request()->validate([
            'name' => ['required', 'string', 'max:255', 'min:10'],
            'review_text' => ['required', 'string', 'max:100', 'min:10'],
            'email' => ['email', 'required', 'unique:reviews'],
            'ratings' => ['required', 'max:5', 'min:1'],
        ]);
        $product->reviews()->create($newReview);
        // Review::create($review);
        return redirect()
            ->back()
            ->with('msg', 'Review Submitted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
