@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h3>
            Order #{{ $purchaseOrder->id }}
        </h3>

        <div class="panel panel-default">
            <div class="panel-heading">Order details:</div>

            <div class="panel-body">
                <span>Product: {{ $purchaseOrder->purchaseItem->product->name }}

                <table class="pricing">
					<tbody>
					<tr>
						<td class="details">Price:</td>
						<td><span class="">{{ '$' . $purchaseOrder->purchaseItem->unit_cost }}</span></td
					</tr>
					<tr>
						<td class="details">Quantity:</td>
						<td><span class="">{{ '$' . $purchaseOrder->purchaseItem->quantity }}</span></td
					</tr>
					<tr>
						<td class="details">Subtotal:</td>
						<td><span class="">{{ '$' . ($purchaseOrder->purchaseItem->unit_cost * $purchaseOrder->purchaseItem->quantity) }}</span></td
					</tr>
                    </toby>

				</table>

            </div>
        </div>
    </div>
</div>

@endsection
