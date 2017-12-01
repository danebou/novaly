@extends('layouts.master')

@section('content')

<div class="col-sm-12">
    @each('purchase_orders.order', $purchaseOrders, 'purchaseOrder', 'purchase_orders.empty')
</div>

@endsection