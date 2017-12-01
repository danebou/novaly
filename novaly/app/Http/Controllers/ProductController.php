<?php

namespace App\Http\Controllers;

use App\Entities\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::active()->search(request('search'))->categories(request('categories'))->get();

        return view('products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->loadMissing([
            'productCategory',
            'reviews.user',
            'user',
        ])->append('avg_rating');

        return view('products.show', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'list_price' => 'numeric|min:0|max:99999999999',
            'discount' => 'numeric|min:0|max:100',
            'quantity' => 'integer',
            'description' => 'required',
            'product_category_id' => 'required|integer',
        ]);

        $data = array_merge($validatedData, [
            'user_id' => auth()->user()->id
        ]);

        $product = Product::create($data);

        flash('Your product has been submitted successfully')->success();

        return redirect()->route('products.show', $product->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'list_price' => 'numeric|min:0|max:99999999999',
            'discount' => 'numeric|min:0|max:100',
            'quantity' => 'integer',
            'description' => 'required',
            'product_category_id' => 'required|integer',
            'active' => 'boolean'
        ]);

        $product->update($validatedData);

        flash('Your product has been updated successfully')->success();

        return redirect()->route('products.show', $product->id);
    }
}
