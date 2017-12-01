<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('vendor');
    }

    public function products()
    {
        $products = auth()->user()->products;

        return view('vendors.products', compact('products'));
    }
}
