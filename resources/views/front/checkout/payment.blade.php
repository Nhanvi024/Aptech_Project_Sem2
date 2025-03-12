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
								Phone: {{ number_format($orderPhone, 0, ".", " ") }}
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
								Phone: {{ number_format($shippingPhone, 0, ".", " ") }}
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
												<td class="text-center">{{ number_format(($item->proPrice * (100 - $item->proDiscount)) / 100, 2) }}</td>
												<td class="text-center"> {{ $cart[$item->id] }}</td>
												<td class="text-right">
													{{ number_format((($item->proPrice * (100 - $item->proDiscount)) / 100) * $cart[$item->id], 2) }}</td>
											</tr>
										@endforeach
									</tbody>
									<tbody class="table-borderless">

										<tr>
											<td class="thick-line"></td>
											<td class="thick-line"></td>
											<td class="thick-line text-center"><strong>Subtotal</strong></td>
											<td class="thick-line text-right">${{ number_format($subtotal, 2) }}</td>
										</tr>
										<tr>
											<td class="no-line"></td>
											<td class="no-line"></td>
											<td class="no-line text-center"><strong>Shipping</strong></td>
											<td class="no-line text-right">${{ number_format($shipping, 2) }}</td>
										</tr>
										<tr>
											<td class="no-line"></td>
											<td class="no-line"></td>
											<td class="no-line text-center"><strong>Discount</strong></td>
											<td class="no-line text-right">${{ number_format($discountAmount, 2) }}</td>
										</tr>
										<tr>
											<td class="no-line"></td>
											<td class="no-line"></td>
											<td class="no-line text-center"><strong>Total</strong></td>
											<td class="no-line text-right">${{ number_format($finalPrice, 2) }}</td>
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
						<div class="row d-none">
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
										<textarea name="note" id="note">{{ $note }}</textarea>
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
						<div class="text-center">
							<button type="submit" class="paypal-button">
								<span class="paypal-button-title">
									Buy now with
								</span>
								<span class="paypal-logo">
									<i>Pay</i><i>Pal</i>
								</span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script></script>
@endsection
