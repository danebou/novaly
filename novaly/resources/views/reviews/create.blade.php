@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Submit a Review for '{{ $product->name }}'</div>

            <div class="panel-body">

            {{ Form::open(['route' => ['reviews.store', $product->id]]) }}
                {{ Form::openGroup('rating', 'Rating') }}
                    <input type="number" class="rating" name="rating" value="{{ old('rating', $rating) }}">
                {{ Form::closeGroup() }}
                {{ Form::openGroup('title', 'Review Title') }}
                    {{ Form::text('title') }}
                {{ Form::closeGroup() }}
                {{ Form::openGroup('text', 'Review') }}
                    {{ Form::textarea('text') }}
                {{ Form::closeGroup() }}
                {{ Form::openGroup('submit') }}
                    {{ Form::button('Submit', ['class' => 'btn btn-primary', 'type' => 'submit']) }}
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-default pull-right">Cancel</a>
                {{ Form::closeGroup() }}
            {{ Form::close() }}

            </div> <!-- /panel-body -->
        </div>
    </div>
</div>

@endsection
