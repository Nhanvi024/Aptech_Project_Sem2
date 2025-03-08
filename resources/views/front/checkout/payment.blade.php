@extends("front.layouts.pages-layout")
@section("pageTitle")
	Fruitkha lalala
@endsection
@section("content")
	<div class="page page-center">
		<div class="" style="height: 105px;background: #051922"></div>
		<div class="container container-tight py-4">
			<div class="text-center my-5">
				<a href="." class="navbar-brand navbar-brand-autodark">
					<img src="/assets/img/logo.png" style="scale: 2" width="" height="" alt="Tabler"
						class="navbar-brand-image">
				</a>
			</div>
			<x-form-alert />
			{{-- @dd($data) --}}
			<div class="checkout-section mt-150 mb-150">
				<div class="container">
					<form class="d-none" action="{{ route("user.paymentPost") }}" method="POST" id="checkoutForm">
						<div class="row">
							<div class="col-lg-12">
								<div class="order-details-wrap">
									<div class="">
										<label for="">userId</label>
										<input class="form-control" type="text" id="userId" name="userId" value="{{ $userId }}">
									</div>
									<div class="">
										<label for="">orderName</label>
										<input class="form-control" type="text" id="orderName" name="orderName" value="{{ $orderName }}">
									</div>
									<div class="">
										<label for="">orderEmail</label>
										<input class="form-control" type="text" id="orderEmail" name="orderEmail" value="{{ $orderEmail }}">
									</div>
									<div class="">
										<label for="">orderPhone</label>
										<input class="form-control" type="text" id="orderPhone" name="orderPhone" value="{{ $orderPhone }}">
									</div>
									<div class="">
										<label for="">orderAddress</label>
										<input class="form-control" type="text" id="orderAddress" name="orderAddress" value="{{ $orderAddress }}">
									</div>
									<div class="">
										<label for="">shippingName</label>
										<input class="form-control" type="text" id="shippingName" name="shippingName" value="{{ $shippingName }}">
									</div>
									<div class="">
										<label for="">shippingPhone</label>
										<input class="form-control" type="text" id="shippingPhone" name="shippingPhone"
											value="{{ $shippingPhone }}">
									</div>
									<div class="">
										<label for="">shippingAddress</label>
										<input class="form-control" type="text" id="shippingAddress" name="shippingAddress"
											value="{{ $shippingAddress }}">
									</div>
									<div class="">
										<label for="">note</label>
										<input class="form-control" type="text" id="note" name="note" value="{{ $note }}">
									</div>
									<div class="">
										<label for="">Base subtotal</label>
										<input class="form-control" type="text" name="subtotal" id="subtotal" value={{ $subtotal }}>
									</div>
									<div class="">
										<label for="">shipping</label>
										<input class="form-control" type="text" id="shipping" name="shipping" value={{ $shipping }}>
									</div>
									<div class="">
										<label for="">discount Amount</label>
										<input class="form-control" type="text" id="discountAmount" name="discountAmount"
											value={{ $discountAmount }}>
									</div>
									<div class="">
										<label for="">Dicount code</label>
										<input class="form-control" type="text" id="discountCode" name="discountCode"
											value={{ $discountCode }}>
									</div>
									<div class="">
										<label for="">Final Price</label>
										<input class="form-control" type="text" id="finalPrice" name="finalPrice" value="{{ $finalPrice }}">
									</div>
									<div class="">
										<label for="">order_id</label>
										<input class="form-control" type="text" id="order_id" name="order_id" placeholder="order_id">
									</div>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
		<div class="container container-tight py-4 border">
			<div class="row">
				<div class="col-12">
					<div class="invoice-title">
						<h2>Your order</h2>
						{{-- <h3 class="pull-right">Order # 12345</h3> --}}
					</div>
					<hr>
					<div class="row ">
						<div class="col-6">
							<address>
								<strong>Billed To:</strong>
								<br>
								Name: {{ $orderName }}
								<br>
								Phone: {{ $orderPhone }}
								<br>
								Address: {{ $orderAddress }}
							</address>
						</div>
						<div class="col-6 col-auto text-right">
							<address>
								<strong>Shipped To:</strong>
								<br>
								Name: {{ $shippingName }}
								<br>
								Phone: {{ $shippingPhone }}
								<br>
								Address: {{ $shippingAddress }}
							</address>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><strong>Order summary</strong></h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-condensed">
									<thead>
										<tr>
											<td><strong>Item</strong></td>
											<td class="text-center"><strong>Price</strong></td>
											<td class="text-center"><strong>Quantity</strong></td>
											<td class="text-right"><strong>Totals</strong></td>
										</tr>
									</thead>
									<tbody>
										<!-- foreach ($order->lineItems as $line) or some such thing here -->
										@foreach ($cartItems as $item)
											<tr>
												<td>{{ $item->proName }}</td>
												<td class="text-center">{{ ($item->proPrice * (100 - $item->proDiscount)) / 100 }}</td>
												<td class="text-center"> {{ $cart[$item->id] }}</td>
												<td class="text-right">{{ (($item->proPrice * (100 - $item->proDiscount)) / 100) * $cart[$item->id] }}</td>
											</tr>
										@endforeach
									</tbody>
									<tbody class="table-borderless">

										<tr>
											<td class="thick-line"></td>
											<td class="thick-line"></td>
											<td class="thick-line text-center"><strong>Subtotal</strong></td>
											<td class="thick-line text-right">${{ $subtotal }}</td>
										</tr>
										<tr>
											<td class="no-line"></td>
											<td class="no-line"></td>
											<td class="no-line text-center"><strong>Shipping</strong></td>
											<td class="no-line text-right">${{ $shipping }}</td>
										</tr>
										<tr>
											<td class="no-line"></td>
											<td class="no-line"></td>
											<td class="no-line text-center"><strong>Discount</strong></td>
											<td class="no-line text-right">${{ $discountAmount }}</td>
										</tr>
										<tr>
											<td class="no-line"></td>
											<td class="no-line"></td>
											<td class="no-line text-center"><strong>Total</strong></td>
											<td class="no-line text-right">${{ $finalPrice }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container container-tight py-4 border">
			<div class="row mt-5">
				<div class="col-12">
					<form action="{{ route("user.paypal") }}" method="post">
						@csrf
						<div class="row">
							<div class="col-lg-12">
								<div class="order-details-wrap">
									<div class="">
										<label for="">userId</label>
										<input class="form-control" type="text" id="userId" name="userId" value="{{ $userId }}">
									</div>
									<div class="">
										<label for="">orderName</label>
										<input class="form-control" type="text" id="orderName" name="orderName" value="{{ $orderName }}">
									</div>
									<div class="">
										<label for="">orderEmail</label>
										<input class="form-control" type="text" id="orderEmail" name="orderEmail" value="{{ $orderEmail }}">
									</div>
									<div class="">
										<label for="">orderPhone</label>
										<input class="form-control" type="text" id="orderPhone" name="orderPhone" value="{{ $orderPhone }}">
									</div>
									<div class="">
										<label for="">orderAddress</label>
										<input class="form-control" type="text" id="orderAddress" name="orderAddress"
											value="{{ $orderAddress }}">
									</div>
									<div class="">
										<label for="">shippingName</label>
										<input class="form-control" type="text" id="shippingName" name="shippingName"
											value="{{ $shippingName }}">
									</div>
									<div class="">
										<label for="">shippingPhone</label>
										<input class="form-control" type="text" id="shippingPhone" name="shippingPhone"
											value="{{ $shippingPhone }}">
									</div>
									<div class="">
										<label for="">shippingAddress</label>
										<input class="form-control" type="text" id="shippingAddress" name="shippingAddress"
											value="{{ $shippingAddress }}">
									</div>
									<div class="">
										<label for="">note</label>
										<input class="form-control" type="text" id="note" name="note" value="{{ $note }}">
									</div>
									<div class="">
										<label for="">Base subtotal</label>
										<input class="form-control" type="text" name="subtotal" id="subtotal" value={{ $subtotal }}>
									</div>
									<div class="">
										<label for="">shipping</label>
										<input class="form-control" type="text" id="shipping" name="shipping" value={{ $shipping }}>
									</div>
									<div class="">
										<label for="">discount Amount</label>
										<input class="form-control" type="text" id="discountAmount" name="discountAmount"
											value={{ $discountAmount }}>
									</div>
									<div class="">
										<label for="">Dicount code</label>
										<input class="form-control" type="text" id="discountCode" name="discountCode"
											value={{ $discountCode }}>
									</div>
									<div class="">
										<label for="">Final Price</label>
										<input class="form-control" type="text" id="finalPrice" name="finalPrice" value="{{ $finalPrice }}">
									</div>
									<div class="">
										<label for="">order_id</label>
										<input class="form-control" type="text" id="order_id" name="order_id" placeholder="order_id">
									</div>
								</div>
							</div>
						</div>
						<button type="submit">Paypal 2</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		// $(document).ready(function() {
		// 	$("#buttonSubmit").click(function() {
		// 		// alert("Submitting form");
		// 		// trigger paypal button after alert is triggered
		// 		$("#checkoutForm").submit();
		// 	});

		// 	$('#confirmInfo').on('change', function(e) {
		// 		if ($('#confirmInfo').is(':checked')) {
		// 			$('#buttonPaypal').removeClass('d-none');
		// 		} else {
		// 			$('#buttonPaypal').addClass('d-none');
		// 		}
		// 	});
		// });
		// paypal.Buttons({
		// 	alert('are you sure you want to');
		// 	createOrder: function() {
		// 		return fetch("/create/" + document.getElementById("paypal-amount").value)
		// 			.then((response) => response.text())
		// 			.then((id) => {
		// 				return id;
		// 			});
		// 	},

		// 	onApprove: function() {
		// 		//get order_id from session order_id
		// 		let orderId = '{{ session("order_id") }}';
		// 		$('#order_id').val(orderId);
		// 		console.log(orderId);
		// 		$("#checkoutForm").submit();
		// 	},

		// 	onCancel: function(data) {
		// 		//todo
		// 	},

		// 	onError: function(err) {
		// 		//todo
		// 		console.log(err);
		// 	}
		// }).render('#payment_options');
		paypal.Buttons({
			createOrder: function() {
				return fetch("/create/" + document.getElementById("paypal-amount").value)
					.then((response) => response.text())
					.then((id) => {
						return id;
					});
			},

			onApprove: function() {
				return fetch("/complete", {
						method: "post",
						headers: {
							"X-CSRF-Token": '{{ csrf_token() }}'
						}
					})
					.then((response) => response.json())
					.then((order_details) => {
						console.log(order_details);
						document.getElementById("paypal-success").style.display = 'block';
						//paypal_buttons.close();
					})
					.catch((error) => {
						console.log(error);
					});
			},

			onCancel: function(data) {
				//todo
			},

			onError: function(err) {
				//todo
				console.log(err);
			}
		}).render('#payment_options');
	</script>
@endsection
