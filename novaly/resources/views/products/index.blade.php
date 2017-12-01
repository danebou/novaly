@extends('layouts.master', ['id' => 'products'])

@section('content')

<div class="row">

    @include('categories.sidebar')

    @include('vendors.sidebar')

    <div class="col-sm-9">
        @each('products.product', $products, 'product', 'products.empty')
    </div>

</div>

@endsection
