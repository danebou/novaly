<div id="products">
	<a class="clickable-tile" href="{{ route('products.show', $product->id) }}">
		<div class="row">
			<div class="col-sm-4">
				<img class="show-case" alt="Product Image" src="http://lorempixel.com/100/100/" />
			</div>
			<div class="col-sm-8">
				<span class="list-title">{{ $product->name }}</span>

				<table class="sub-info">
					<tbody>
					<tr>
						<td class="rating">
							<input type="number" class="rating" name="rating" value="{{ round($product->avg_rating)  }}" data-inline data-readonly>
						</td>
						<td>
							<span>

								@if ($product->hasReviews())
									Average {{ $product->avg_rating }} of 5
								@else
									No reviews yet
								@endif

							</span>
						</td>

						@if (request('categories') === null)

						<td>
							<a href="{{ route('products') . '?categories=' . $product->productCategory->id }}">
								<span class="list-category">Found in {{ $product->productCategory->name }}</span>
							</a>
						</td>

						@endif
					</tr>
					<tr>
						<td colspan="3" class="sold-by">
							<span>Sold By {{ $product->user->given_name }}</span>
						</td>
					</tr>
					</tbody>
				</table>

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
		</div>
	</a>

	<hr>
</div>
