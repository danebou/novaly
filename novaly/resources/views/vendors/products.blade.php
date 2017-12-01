@extends('layouts.master', ['id' => 'vendors'])

@section('content')

@each('products.product', $products, 'product', 'vendors.no-products')

@endsection
