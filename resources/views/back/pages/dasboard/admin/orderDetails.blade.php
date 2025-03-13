@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")

	<div class="page-wrapper">
		<!-- Page header -->
		<div class="container-xl">
			<div class="page-header d-print-none">
				<h2 class="page-title">
					ORDER DETAILS
				</h2>
				<hr>
				<div>Order status: <span class="{{ $order->status == 1 ? "text-success " : "text-warning " }} h3">
						{{ $order->status == 0 ? "PENDING" : "FINISHED" }}</span></div>
				<div class="">payment ID: <span class="h3 text-success">{{ $order->payment_id }}</span></div>
				<div class="">Profit: <span
						class="text-success h3">{{ $order->finalPrice - $order->shipping - $order->totalCost }}</span> <small>(= final price
						-
						shipping fee - total cost)</small> </div>
				<hr>
				<div class="">Total cost: <span class="text-success">{{ $order->totalCost }}</span> </div>
				<div class="">Shipping: <span class="text-success">{{ $order->shipping }}</span> </div>
				<div class="">Final price: <span class="text-success">{{ $order->finalPrice }}</span> <small>(= total price +
						shipping fee - discount
						amount)</small> </div>
				<div class="">Discount code: <span class="text-success">{{ $order->discountCode }}</span> </div>
				<hr>
			</div>
			<!-- Page body -->
			<div class="page-body">
				<x-form-alert />
				{{-- @dd($order->status==true) --}}
				<div class="row">
					<div class="col-12">
						<h2>Sender and Receiver:</h2>
						<div>
							<strong>Sender:</strong>
							<br>
							Name:<span class="text-success"> {{ $order->orderName }}</span>
							<br>
							Phone:<span class="text-success"> {{ $order->orderPhone }}</span>
							<br>
							Email:<span class="text-success"> {{ $order->orderEmail }}</span>
							<br>
							Address:<span class="text-success"> {{ $order->orderAddress }}</span>
						</div>
						<br>
						<div>
							<strong>Receiver:</strong>
							<br>
							Name:<span class="text-success"> {{ $order->shippingName }}</span>
							<br>
							Phone:<span class="text-success"> {{ $order->shippingPhone }}</span>
							<br>
							Address:<span class="text-success"> {{ $order->shippingAddress }}</span>
						</div>
						<br>
						@if (!$order->status)
							<div class="d-flex align-items-center">
								<input type="checkbox" name="" id="checkSender" style="width: 25px;height: 25px;">
								<label for="checkSender">Sender and Receiver CHECKED !</label>
							</div>
						@endif
					</div>
					<div class="col-12">
						<hr>
						<h2>Note:</h2>
						<div class="">
							<textarea class="w-100" rows="10" name="" id="" style="white-space: pre-wrap" readonly>{{ $order->note }}</textarea>
						</div>
					</div>
					<div class="col-12">
						<hr>
						<h2>Products List:</h2>
						<div class="table-responsive" style="{{ count($order->itemsList) > 5 ? "height: 60vh " : " " }}">
							<table class="table  table-hover table-bordered align-middle bg-azure-lt">
								<thead class="sticky-top z-1">
									<tr class="text-center">
										<th class="text-white bg-secondary" style="width: 10%">No</th>
										<th class="text-white bg-secondary" style="width: 10%">Product ID</th>
										<th class="text-white bg-secondary" style="">Product Name</th>
										<th class="text-white bg-secondary" style="">Image</th>
										<th class="text-white bg-secondary" style="width: 15%">Quantity</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$countNo = 1;
									?>
									@foreach ($productsList as $item)
										<tr>
											<td class="text-center">{{ $countNo }}</td>
											<td class="text-center">{{ $item->id }}</td>
											<td>{{ $item->proName }}</td>
											<td class="text-center"><img src="{{ asset("storage/products/" . $item->proImageURL[0]) }}"
													style="width: 100px;height: 100px;" alt="Product Image" class="img-fluid"></td>
											<td class="text-center">{{ $itemsList[$item->id] }}</td>
										</tr>
										<?php
										$countNo += 1;
										?>
									@endforeach
								</tbody>
							</table>
						</div>
						<br>
						@if (!$order->status)
							<div class="d-flex align-items-center">
								<input type="checkbox" name="" id="checkProducts" style="width: 25px;height: 25px;">
								<label for="checkProducts">Products CHECKED !</label>
							</div>
						@endif
					</div>
					<div class="col-12">
						<hr>
						@if (!$order->status)
							<form action="{{ route("admin.order.updateStatus") }}" method="POST">
								@csrf
								<input type="hidden" name="orderId" value="{{ $order->id }}">
								<button type="submit" id="btnFinish" onclick="return confirm('Confirm finish order !!!')" disabled
									class="btn btn-success btn-pill">Finish order</button>
							</form>
						@else
							<div class="alert alert-success">This order has been finished.</div>
						@endif
						<a href="{{ route('admin.order.manage') }}" class="btn btn-primary btn-pill mt-2">Go back</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			// btnFinish only available when both checkSender and checkProducts are checked
			$("#checkSender").change(function() {
				if ($("#checkSender").is(":checked") && $("#checkProducts").is(":checked")) {
					$("#btnFinish").prop("disabled", false);
				} else {
					$("#btnFinish").prop("disabled", true);
				}
			});
			$("#checkProducts").change(function() {
				if ($("#checkSender").is(":checked") && $("#checkProducts").is(":checked")) {
					$("#btnFinish").prop("disabled", false);
				} else {
					$("#btnFinish").prop("disabled", true);
				}
			});
		});
	</script>

@endsection
