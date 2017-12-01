@extends('layouts.master', ['id' => 'purchase_orders'])

@section('content')

@include('products.product')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Purchase Item</div>

            <div class="panel-body">

                {{ Form::open(['route' => ['paypal.checkout']]) }}
                    {{ Form::input('hidden', 'product_id', $product->id, ['readonly']) }}
                    {{ Form::input('hidden', 'unit_price', $product->unit_price, ['readonly']) }}
                    {{ Form::openGroup('quantity', 'Quantity') }}
                        {{ Form::number('quantity', 1, ['min' => 0, 'max' => $product->quantity]) }}
                    {{ Form::closeGroup() }}
                    {{ Form::openGroup('shipping_address', 'Shipping Address') }}
                        {{ Form::text('shipping_address') }}
                    {{ Form::closeGroup() }}
                    {{ Form::openGroup('submit') }}
                        {{ Form::submit('Submit') }}
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-default pull-right">Cancel</a>
                    {{ Form::closeGroup() }}
                {{ Form::close() }}

            </div> <!-- /panel-body -->
        </div>
    </div>
</div>

@endsection
