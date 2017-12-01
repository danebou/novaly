<div id="products">
	<a class="clickable-tile" href="{{ route('purchase_orders.show', $purchaseOrder->id) }}">
		<div class="row">
			<div class="col-sm-12">
				<span class="list-title">Order #{{ $purchaseOrder->id }}</span>
			</div>
		</div>
	</a>

	<hr>
</div>
