@extends('layouts.master', ['id' => 'products'])

@section('content')

<div class="row">
	<div class="col-sm-4">
		<img class="show-case" alt="Product Image" src="http://lorempixel.com/500/500/"/>
	</div>
	<div class="col-sm-8">
		<span class="details-title">{{ $product->name }}</span>

		<table class="sub-info">
			<tbody>
			<tr>
				<td class="rating">
					{{ Form::open(['route' => ['reviews.create', $product->id], 'method' => 'get', 'id' => 'new-rating']) }}
						<span onClick="document.getElementById('new-rating').submit();">
							<input type="number" class="rating" name="rating" value="{{ round($product->avg_rating)  }}" data-inline>
						</span>
					{{ Form::close() }}
				</td>
				<td>
					<span>

						@if ($product->hasReviews())
							Average {{ $product->avg_rating }} of 5
						@else
							Be the first to review!
						@endif

					</span>
				</td>
				<td>
					<a href="{{ route('products') . '?categories=' . $product->productCategory->id }}">
						<span class="list-category">Found in {{ $product->productCategory->name }}</span>
					</a>
				</td>
			</tr>
			<tr>
				<td colspan="3" class="sold-by">
					<span>Sold By {{ $product->user->given_name }}</span>
				</td>
			</tr>
			</tbody>
		</table>

		<hr>

		<div class="row">
			<div class="col-sm-6">

				<table class="pricing">
					<tbody>
					<tr>
						<td class="details">List Price:</td>
						<td><span class="{{ $product->hasDiscount() ? 'strike-through' : '' }}">{{ '$' . $product->list_price }}</span></td
					</tr>

					@if ($product->hasDiscount())

					<tr>
						<td class="details">Deal Price:</td>
						<td class="savings"><span>{{ '$' . $product->unit_price }}</span></td
					</tr>
					<tr>
						<td class="details">You Save:</td>
						<td class="savings"><span>{{ '$' . $product->savings . ' (' . $product->discount . '%)' }}</span></td
					</tr>

					@endif
					</tbody>
				</table>

			</div>

			<div class="col-sm-6">
				<div class="row">
					<a class="btn btn-primary pull-right" href="{{ route('purchase_orders.create', $product->id) }}">Buy Now</a>
					@if (auth()->user() != null)
					@if (auth()->user()->isAdmin() || (auth()->user()->isVendor() && auth()->user()->id > 1))

						<a class="btn btn-success pull-left" href="{{ route('products.edit', $product->id) }}">Edit</a>

					@endif
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-12">
		<p>
			{{ $product->description ?: 'This product has no description' }}
		</p>
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-12">
		<h4>Reviews</h4>
		<hr>

		@each('reviews.review', $product->reviews, 'review', 'reviews.not-reviewed')
	</div>
</div>

@endsection
