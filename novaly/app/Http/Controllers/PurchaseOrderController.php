<?php

namespace App\Http\Controllers;

use App\Entities\Product;
use App\Entities\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Entities\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('purchase_orders.create', compact('product'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::active()->search(request('search'))->categories(request('categories'))->get();
        $purchaseOrders = PurchaseOrder::buyers()->get();

        return view('purchase_orders.index', compact('purchaseOrders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\PurchasOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->loadMissing(['purchaseItem.product', 'user']);

        return view('purchase_orders.show', compact('purchaseOrder'));
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
            'shipping_address' => 'required',
        ]);

        $data = array_merge($validatedData, [
            'user_id' => auth()->user()->id,
        ]);

        $purchaseOrder = PurchaseOrder::create($validatedData);

        PurchaseItem::create([
            'cost_price' => $request('unit_price'),
            'product_id' => $request('product_id'),
            'quantity' => $request('quantity'),
        ]);

        return redirect()->route('purchase_orders.show', $purchaseOrder->id);
    }
}
