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
			<?php
			$subtotal = 0;
			$shipping = 10;
			$discountAmount = 0;
			$finalPrice = 0;
			// $totalValue = 0;
			$discountCode = "";
			?>
			<div class="checkout-section mt-150 mb-150">
				<div class="container">
					<form action="{{ route("user.checkoutPost") }}" method="POST" id="checkoutForm">
						<div class="row">
							<div class="col-lg-8">
								<div class="checkout-accordion-wrap">
									<div class="accordion" id="accordionExample">
										<div class="card single-accordion">
											<div class="card-header" id="headingOne">
												<h5 class="mb-0">
													<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
														aria-expanded="true" aria-controls="collapseOne">
														Billing Address
													</button>
												</h5>
											</div>
											<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
												<div class="card-body">
													<div class="billing-address-form">
														@csrf
														@if (Session::has("user"))
															<div class="form-check mt-2">
																<input type="checkbox" name="" id="changeSender">
																<label for="changeSender"><strong>Change sender</strong></label>
															</div>
														@endif
														<p><input class="form-control" name="orderName" type="text" placeholder="*** Name" id="inputOrderName"
																value="{{ old("orderName", $user?->name) }}" {{ $user?->name ? "readonly" : "" }}></p>
														@error("orderName")
															<span class="text-danger">*** {{ $message }} </span>
														@enderror
														<p><input class="form-control" name="orderEmail" type="email" placeholder="Email" id="inputOrderEmail"
																value="{{ old("orderEmail", $user?->email) }}" {{ $user?->email ? "readonly" : "" }}></p>
														<p><input class="form-control" name="orderPhone" type="tel" placeholder="*** Phone"
																id="inputOrderPhone" value="{{ old("orderPhone", $user?->phone) }}"
																{{ $user?->phone ? "readonly" : "" }}></p>
														@error("orderPhone")
															<span class="text-danger">*** {{ $message }} </span>
														@enderror
														<p><input class="form-control" name="orderAddress" type="text" placeholder="*** Address"
																id="inputOrderAddress" value="{{ old("orderAddress", $user?->address) }}"
																{{ $user?->address ? "readonly" : "" }}></p>
														@error("orderAddress")
															<span class="text-danger">*** {{ $message }} </span>
														@enderror

														@if (Session::has("user"))
															<div class="form-check mt-2">
																<input type="checkbox" name="" id="confirmInfo">
																<label for="confirmInfo"><strong>Delivery to yourself</strong></label>
															</div>
														@endif
														<p><input class="form-control" type="text" name="shippingName" id="InputShippingName"
																placeholder="*** Shipping Name"value="{{ old("shippingName") }}"></p>
														@error("shippingName")
															<span class="text-danger">*** {{ $message }} </span>
														@enderror
														<p><input class="form-control" type="text" name="shippingPhone" id="inputShippingPhone"
																placeholder="*** Shipping Phone"value="{{ old("shippingPhone") }}"></p>
														@error("shippingPhone")
															<span class="text-danger">*** {{ $message }} </span>
														@enderror

														@if (!Session::has("user"))
															<p><small>phone must be 10-16 number</small></p>
														@endif
														<p><input class="form-control" type="text" name="shippingAddress" id="inputShippingAddress"
																placeholder="*** Shipping address"value="{{ old("shippingAddress") }}"></p>
														@error("shippingAddress")
															<span class="text-danger">*** {{ $message }} </span>
														@enderror
														<p>
															<textarea class="form-control" name="note" id="note" cols="30" rows="10" placeholder="Say Something"></textarea>
														</p>

													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card single-accordion">
										<div class="card-header" id="headingTwo">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo"
													aria-expanded="false" aria-controls="collapseTwo">
													Products Details
												</button>
											</h5>
										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
											<div class="card-body">
												<div class="card-details">
													<table class="cart-table text-center">
														<thead class="cart-table-head">
															<tr class="table-head-row">
																<th class="product-name">Name</th>
																<th class="product-image">Product Image</th>
																<th class="product-price">Price</th>
																<th class="product-quantity">Quantity</th>
																<th class="product-total">Total</th>
															</tr>
														</thead>
														<tbody>
															@foreach ($cartItems as $item)
																<tr class="table-body-row">
																	<td class="product-name">{{ $item->proName }}</td>
																	<td class="product-image"><img src="{{ asset("storage/products/" . $item->proImageURL[0]) }}"
																			alt="{{ $item->proImageURL[0] }}" width="50px" height="50px"></td>
																	<td class="product-price">${{ ($item->proPrice * (100 - $item->proDiscount)) / 100 }}</td>
																	<td class="product-quantity">{{ $cart[$item->id] }}</td>
																	<td class="product-total">
																		{{ (($item->proPrice * (100 - $item->proDiscount)) / 100) * (float) $cart[$item->id] }}</td>
																</tr>
																@php
																	$subtotal += (($item->proPrice * (100 - $item->proDiscount)) / 100) * (float) $cart[$item->id];
																@endphp
															@endforeach
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="order-details-wrap">
									<table class="order-details w-75">
										<thead>
											<tr>
												{{-- <th><strong>Products</strong></th> --}}
												<th><strong></strong></th>
												<th><strong>Price</strong></th>
											</tr>
										</thead>
										{{-- <tbody class="order-details-body">
											<?php
											?>
											@foreach ($cartItems as $item)
												<tr>
													<td>{{ $item->proName }}</td>
													<td>{{ (($item->proPrice * (100 - $item->proDiscount)) / 100) * (float) $cart[$item->id] }}</td>
												</tr>
												@php
													$subtotal += (($item->proPrice * (100 - $item->proDiscount)) / 100) * (float) $cart[$item->id];
												@endphp
											@endforeach
											<tr>
												<td></td>
												<td></td>
											</tr>
										</tbody> --}}
										<tbody class="checkout-details">
											<tr>
												<td>Subtotal</td>
												<td>${{ $subtotal }}</td>
											</tr>
											<tr>
												<td>Shipping</td>
												<td>${{ $shipping }}</td>
											</tr>
											<tr>
												<td>Discount amount</td>
												<td>$<span id="discountShow">{{ $discountAmount }}</span></td>
											</tr>
											<tr>
												<td>Total</td>
												<td>$<span id="finalPriceShow">{{ $subtotal + $shipping - $discountAmount }}</span></td>
											</tr>
										</tbody>
									</table>
									<div class=""></div>
									<table class="order-details w-75 mt-3">
										<thead>
											<tr>
												<th><strong>Apply coupon</strong></th>
											</tr>
										</thead>
										<tbody class="order-details-body">
											<tr>
												<td>
													{{-- <select class="" name="" id="testSelect">
														<option class="" value="0" code="0">Select Coupon</option>
														<option class="" value="10" code="code a">99lalala</option>
														<option class="" value="20" code="code B">$20 off</option>
														<option class="" value="30" code="code CC">$30 off</option>
													</select> --}}
													<select class="" name="" id="testSelect">
														<option class="" value="0" code="0">Select Coupon</option>
														<option class="" value="10" code="code a">99lalala</option>
														<option class="" value="20" code="code B">$20 off</option>
														<option class="" value="30" code="code CC">$30 off</option>
													</select>
												</td>
											</tr>
										</tbody>
									</table>
									{{-- place order button --}}
									<div class="text-center w-75">
										@if ($subtotal + $shipping - $discountAmount > 0)
											<a id="buttonSubmit" class="boxed-btn my-2">Place Order</a>
										@else
											<a id="" class="boxed-btn">Place Order</a>
										@endif
									</div>
									<div class="
                                    d-none">
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
											<input class="form-control" type="text" id="discountAmount" name="discountAmount" value=0>
										</div>
										<div class="">
											<label for="">Dicount code</label>
											<input class="form-control" type="text" id="discountCode" name="discountCode" value="0">
										</div>
										<div class="">
											<label for="">Final Price</label>
											<input class="form-control" type="text" id="finalPrice" name="finalPrice"
												value="{{ $subtotal + $shipping - $discountAmount }}">
										</div>
										{{-- <div class="">
										<label for="">test Code</label>
										<input class="form-control" type="text" id="testCode" name="testCode" value="">
									</div>
									<input class="form-control" type="text" name="finalPrice"
										value={{ $subtotal + $shipping - $discountAmount }}> --}}
										{{-- <input class="form-control" type="text" name="discountCode" id="discountCode"> --}}
										<input class="form-control" type="text" id="order_id" name="order_id" placeholder="order_id">
									</div>

								</div>
							</div>
						</div>
					</form>
					<div class="row mt-5">
						<div class="col-12">
							<div class="row mt-3 " id="paypal-success">
								<div class="col-12 col-lg-6 offset-lg-3">
									<div class="alert alert-success" role="alert">
										You have successfully sent me money! Thank you!
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-12 col-lg-6 offset-lg-3">
									<div class="input-group">
										<span class="input-group-text">$</span>
										<input type="text" class="form-control" id="paypal-amount"
											value="{{ $subtotal + $shipping - $discountAmount }}" aria-label="Amount (to the nearest pound)">
										<span class="input-group-text">.00</span>
									</div>
								</div>
							</div>
							<div class="row mt-3" id="buttonPaypal">
								<div class="col-12 col-lg-6 offset-lg-3" id="payment_options"></div>
							</div>

							<form action="{{ route("user.paypal") }}" method="post">
								@csrf
								<input type="text" name="price" value="20">
								<button type="submit">Paypal 2</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#buttonSubmit").click(function() {
				// alert("Submitting form");
				// trigger paypal button after alert is triggered
				$("#checkoutForm").submit();
			});
			$("#showPassword").click(function() {
				var passwordInput = $("#password");
				if (passwordInput.attr("type") === "password") {
					passwordInput.attr("type", "text");
				} else {
					passwordInput.attr("type", "password");
				}
			});
			// remove class d-none from buttonPaypal if both inputPhone and inputShippingAddress are set
			// $("#inputPhone").on('input', function() {
			// 	if ($("#inputPhone").val() && $("#inputShippingAddress").val() && length($("#inputPhone")
			// 			.val() >= 10)) {
			// 		$("#buttonPaypal").removeClass("d-none");
			// 	} else {
			// 		$("#buttonPaypal").addClass("d-none");
			// 	}
			// });
			// $("#inputShippingAddress").on('input', function() {
			// 	if ($("#inputPhone").val() && $("#inputShippingAddress").val()) {
			// 		$("#buttonPaypal").removeClass("d-none");
			// 	} else {
			// 		$("#buttonPaypal").addClass("d-none");
			// 	}
			// });

			// remove class d-none from buttonPaypal if confirmInfo is checked
			$('#confirmInfo').on('change', function(e) {
				if ($('#confirmInfo').is(':checked')) {
					$('#InputShippingName').val($('#inputOrderName').val());
					$('#inputShippingAddress').val($('#inputOrderAddress').val());
					$('#inputShippingPhone').val($('#inputOrderPhone').val());
					$('#InputShippingName').prop('readonly', true);
					$('#inputShippingAddress').prop('readonly', true);
					$('#inputShippingPhone').prop('readonly', true);
				} else {
					// $('#buttonPaypal').addClass('d-none');
					$('#InputShippingName').val('');
					$('#inputShippingAddress').val('');
					$('#inputShippingPhone').val('');
					$('#InputShippingName').prop('readonly', false);
					$('#inputShippingAddress').prop('readonly', false);
					$('#inputShippingPhone').prop('readonly', false);
				}
			});
			$('#changeSender').on('change', function() {
				if ($('#changeSender').is(':checked')) {
					$('#inputOrderName').prop('readonly', false);
					$('#inputOrderEmail').prop('readonly', false);
					$('#inputOrderAddress').prop('readonly', false);
					$('#inputOrderPhone').prop('readonly', false);
				} else {
					$('#inputOrderName').prop('readonly', true);
					$('#inputOrderEmail').prop('readonly', true);
					$('#inputOrderAddress').prop('readonly', true);
					$('#inputOrderPhone').prop('readonly', true);
				}
			});


			// apply coupon on select change event
			$('#testSelect').on('change', function(e) {
				// var coupon = $(this).val();
				var val = $('#testSelect').find(":selected").val();
				var text = $('#testSelect').find(":selected").text();
				var testCode = $('#testSelect').find(":selected").attr("Code");
				console.log('Value: ' + val);
				console.log('Text: ' + text);
				// set text and val to input field
				$('#discountAmount').val(val);
				$('#discountShow').html(val);
				// update total value
				var totalValue = $('#subtotal').val();
				var discountAmount = $('#discountAmount').val();
				var newTotalValue = 1 * totalValue + 10 - 1 * discountAmount;
				$('#finalPrice').val(newTotalValue);
				$('#finalPriceShow').html(newTotalValue);
				$('#paypal-amount').val(newTotalValue);
				$('#discountCode').val(testCode);
				$('#testCode').val(testCode);

			});
			$('#inputPhone').on('input', function() {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
		});
		paypal.Buttons({
			// alert('are you sure you want to');
			createOrder: function() {
				// return fetch("/create/" + document.getElementById("paypal-amount").value)
				return fetch("./create/" + $("#paypal-amount").val())
					.then((response) => response.text())
					.then((id) => {
						return id;
					});
			},
			onApprove: function() {
				// return fetch("/complete", {
				// 		method: "post",
				// 		headers: {
				// 			"X-CSRF-Token": '{{ csrf_token() }}'
				// 		}
				// 	})
				// 	.then((response) => response.json())
				// 	.then((order_details) => {
				// 		console.log(order_details);
				// 		document.getElementById("paypal-success").style.display = 'block';
				// 		//paypal_buttons.close();
				// 	})
				// 	.catch((error) => {
				// 		console.log(error);
				// 	});

				//get order_id from session order_id
				let orderId = '{{ session("order_id") }}';
				$('#order_id').val(orderId);
				console.log(orderId);
				$("#paypal-success").removeClass('d-none');

				// $("#checkoutForm").submit();

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
