@extends('layouts.master', ['id' => 'products'])

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Product: {{ $product->name }}</div>

            <div class="panel-body">

                {{ Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'patch']) }}
                    {{ Form::openGroup('name', 'Name') }}
                        {{ Form::text('name') }}
                    {{ Form::closeGroup() }}
                    {{ Form::openGroup('description', 'Description') }}
                        {{ Form::textarea('description') }}
                    {{ Form::closeGroup() }}
                    {{ Form::openGroup('product_category_id', 'Product Category') }}
                        {{ Form::number('product_category_id') }}
                    {{ Form::closeGroup() }}
                    {{ Form::openGroup('list_price', 'List Price') }}
                        {{ Form::number('list_price') }}
                    {{ Form::closeGroup() }}
                    {{ Form::openGroup('discount', 'Discount') }}
                        {{ Form::number('discount', 0.00) }}
                    {{ Form::closeGroup() }}
                    {{ Form::openGroup('quantity', 'Quantity') }}
                        {{ Form::number('quantity') }}
                    {{ Form::closeGroup() }}
                    {{ Form::openGroup('active') }}
                        <input type="hidden" name="active" value="0">
                        {{ Form::checkbox('active', 1, 'Active') }}
                    {{ Form::closeGroup() }}
                    {{ Form::openGroup('submit') }}
                        {{ Form::button('Save', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-default pull-right">Cancel</a>
                    {{ Form::closeGroup() }}
                {{ Form::close() }}

                {{--  <form class="form-horizontal" method="POST" action="{{ route('products.update', $product->id) }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? $product->name }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>

                        <div class="col-md-6">
                            <input id="description" type="textarea" class="form-control" name="description" value="{{ old('description') ?? $product->description }}" required>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('product_category_id') ? ' has-error' : '' }}">
                        <label for="product_category_id" class="col-md-4 control-label">Category</label>

                        <div class="col-md-6">
                            <input id="product_category_id" type="text" class="form-control" name="product_category_id" value="{{ old('product_category_id') ?? $product->product_category_id }}" required>

                            @if ($errors->has('product_category_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('product_category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('list_price') ? ' has-error' : '' }}">
                        <label for="list_price" class="col-md-4 control-label">List Price</label>

                        <div class="col-md-6">
                            <input id="list_price" type="number" class="form-control" name="list_price" value="{{ old('list_price') ?? $product->list_price }}" required>

                            @if ($errors->has('list_price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('list_price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                        <label for="discount" class="col-md-4 control-label">Discount</label>

                        <div class="col-md-6">
                            <input id="discount" type="number" class="form-control" name="discount" value="{{ old('discount') ?? $product->discount }}" required>

                            @if ($errors->has('discount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('discount') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                        <label for="quantity" class="col-md-4 control-label">Quantity</label>

                        <div class="col-md-6">
                            <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') ?? $product->quantity }}" required>

                            @if ($errors->has('quantity'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="active" value="{{ (old('active') || $product->active) ? 1 : 0 }}"> Active
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </form>  --}}

            </div> <!-- /panel-body -->
        </div>
    </div>
</div>

@endsection
