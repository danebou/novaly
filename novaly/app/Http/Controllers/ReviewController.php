<?php

namespace App\Http\Controllers;

use App\Entities\Product;
use App\Entities\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('reviews.create', ['product' => $product, 'rating' => request('rating')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:0|max:5',
            'title' => 'required|max:80',
            'text' => 'nullable',
        ]);

        $review = Review::create(array_merge($validatedData, [
            'product_id' => $product->id,
            'user_id' => auth()->user()->id,
        ]));

        flash('Your review has been submitted successfuly')->success();

        return redirect()->route('products.show', $product->id);
    }
}
