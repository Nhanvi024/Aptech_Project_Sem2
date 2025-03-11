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
			// @dd($discounts);
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
													<button class="btn btn-link border" type="button" data-toggle="collapse" data-target="#collapseOne"
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
														<p><input class="form-control" name="orderName" type="text" placeholder="*** Sender Name"
																id="inputOrderName" value="{{ old("orderName", $user?->name) }}" {{ $user?->name ? "readonly" : "" }}>
															@error("orderName")
																<span class="text-danger">*** {{ $message }} </span>
															@enderror
														</p>
														<p><input class="form-control" name="orderEmail" type="email" placeholder="Sender email"
																id="inputOrderEmail" value="{{ old("orderEmail", $user?->email) }}"
																{{ $user?->email ? "readonly" : "" }}>
														</p>
														<p><input class="form-control" name="orderPhone" type="tel" placeholder="*** Sender Phone"
																id="inputOrderPhone" value="{{ old("orderPhone", $user?->phone) }}"
																{{ $user?->phone ? "readonly" : "" }}>
															@error("orderPhone")
																<span class="text-danger">*** {{ $message }} </span>
															@enderror
														</p>
														<p><input class="form-control" name="orderAddress" type="text" placeholder="*** Sender Address"
																id="inputOrderAddress" value="{{ old("orderAddress", $user?->address) }}"
																{{ $user?->address ? "readonly" : "" }}>
															@error("orderAddress")
																<span class="text-danger">*** {{ $message }} </span>
															@enderror
														</p>

														@if (Session::has("user"))
															<div class="form-check mt-2">
																<input type="checkbox" name="" id="checkDeliveryYourself">
																<label for="checkDeliveryYourself"><strong>Delivery to yourself</strong></label>
															</div>
														@endif
														<p><input class="form-control" type="text" name="shippingName" id="InputShippingName"
																placeholder="*** Receiver Name"value="{{ old("shippingName") }}">
															@error("shippingName")
																<span class="text-danger">*** {{ $message }} </span>
															@enderror
														</p>
														<p><input class="form-control" type="text" name="shippingPhone" id="inputShippingPhone"
																placeholder="*** Receiver Phone"value="{{ old("shippingPhone") }}">
															@if (!Session::has("user"))
																<p class=""><small>phone must be 10-16 number</small></p>
															@endif
															@error("shippingPhone")
																<span class="text-danger">*** {{ $message }} </span>
															@enderror
														</p>

														<p><input class="form-control" type="text" name="shippingAddress" id="inputShippingAddress"
																placeholder="*** Receiver address"value="{{ old("shippingAddress") }}">
															@error("shippingAddress")
																<span class="text-danger">*** {{ $message }} </span>
															@enderror
														</p>
														<p>
															<textarea class="form-control" name="note" id="note" cols="30" rows="10" placeholder="Order note"
															 maxlength="10000"></textarea>
														</p>
														@error("note")
															<span class="text-danger">*** {{ $message }} </span>
														@enderror
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card single-accordion">
										<div class="card-header" id="headingTwo">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed border" type="button" data-toggle="collapse"
													data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
													Products Details
												</button>
											</h5>
										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
											<div class="card-body">
												<div class="card-details">
													<table class="cart-table text-center table-striped table-bordered">
														<thead class="cart-table-head">
															<tr class="table-head-row">
																<th class="">Name</th>
																<th class="">Product Image</th>
																<th class="">Price</th>
																<th class="">Quantity</th>
																<th class="">Total</th>
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
									<table class="order-details w-75 table-bordered">
										<thead>
											<tr class="table-head-row">
												{{-- <th><strong>Products</strong></th> --}}
												<th><strong></strong></th>
												<th><strong>Price</strong></th>
											</tr>
										</thead>
										<tbody class="checkout-details table-striped table-bordered">
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
												<td>$<span
														id="finalPriceShow">{{ number_format($subtotal + $shipping - $discountAmount, 2, ".", "") }}</span></td>
											</tr>
										</tbody>
									</table>
									<?php
									$finalPriceDiscount = $subtotal + $shipping - $discountAmount;
									?>
									{{-- @dd(array_key_exists(1,$discounts[0]->used_by)) --}}
									<table class="order-details w-75 mt-3">
										<thead>
											<tr>
												<th><strong>Apply coupon</strong></th>
											</tr>
										</thead>
										<tbody class="order-details-body">
											<tr>
												<td>
													@if (Session::has("user"))
														<select class="" name="" id="selectCoupon">
															<option class="" value="0" code="">Select Coupon</option>
															@foreach ($discounts as $item)
																@if ($subtotal > $item->condition)
																	@if (array_key_exists($user->id, $item->used_by) && $item->used_by[$user->id] < $item->max_uses)
																		{{-- @if ($item->used_by[$user->id] < $item->max_uses) --}}
																		<option
																			value=@if ($item->type == "percent") @if (($subtotal * $item->discount_value) / 100 < $item->max_discount_value)
                                                                {{ number_format(($subtotal * $item->discount_value) / 100, 2) }}
                                                            @else
                                                                {{ $item->max_discount_value }} @endif
																		@else {{ $item->discount_value }} @endif code={{ $item->code }}>
																			{{ $item->code }} - value:
																		</option>
																		{{-- @endif --}}
																	@else
																		@if (!array_key_exists($user->id, $item->used_by))
																			<option
																				value=@if ($item->type == "percent") @if (($subtotal * $item->discount_value) / 100 < $item->max_discount_value)
                                                                    {{ number_format(($subtotal * $item->discount_value) / 100, 2) }}
                                                                @else
                                                                    {{ $item->max_discount_value }} @endif
																			@else {{ $item->discount_value }} @endif code={{ $item->code }}>
																				{{ $item->code }} - value:
																			</option>
																		@endif
																	@endif
																@endif
															@endforeach
														</select>
													@else
														Become a member to enjoy the benefits
													@endif
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
												value="{{ number_format($subtotal + $shipping - $discountAmount, 2, ".", "") }}">
										</div>
										<input class="form-control" type="text" id="order_id" name="order_id" placeholder="order_id">
									</div>
								</div>
							</div>
						</div>
					</form>
					<div class="">
						<input type="hidden" name="oldUsername" id="oldUsername" value="{{ $user?->name }}">
						<input type="hidden" name="oldEmail" id="oldEmail" value="{{ $user?->email }}">
						<input type="hidden" name="oldPhone" id="oldPhone" value="{{ $user?->phone }}">
						<input type="hidden" name="oldAddress" id="oldAddress" value="{{ $user?->address }}">
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

			$('#changeSender').on('change', function() {
				if ($('#changeSender').is(':checked')) {
					$('#inputOrderName').prop('readonly', false);
					$('#inputOrderEmail').prop('readonly', false);
					$('#inputOrderAddress').prop('readonly', false);
					$('#inputOrderPhone').prop('readonly', false);
					$('#inputOrderName').val('');
					$('#inputOrderEmail').val('');
					$('#inputOrderAddress').val('');
					$('#inputOrderPhone').val('');

				} else {
					$('#inputOrderName').val($('#oldUsername').val());
					$('#inputOrderName').prop('readonly', true);
					$('#inputOrderEmail').val($('#oldEmail').val());
					$('#inputOrderEmail').prop('readonly', true);
					$('#inputOrderAddress').val($('#oldAddress').val());
					$('#inputOrderAddress').prop('readonly', true);
					$('#inputOrderPhone').val($('#oldPhone').val());
					$('#inputOrderPhone').prop('readonly', true);
				}
			});


			$('#checkDeliveryYourself').on('change', function(e) {
				if ($('#checkDeliveryYourself').is(':checked')) {
					$('#InputShippingName').val($('#oldUsername').val());
					$('#inputShippingAddress').val($('#oldAddress').val());
					$('#inputShippingPhone').val($('#oldPhone').val());
					$('#InputShippingName').prop('readonly', true);
					$('#inputShippingAddress').prop('readonly', true);
					$('#inputShippingPhone').prop('readonly', true);
				} else {
					$('#InputShippingName').val('');
					$('#inputShippingAddress').val('');
					$('#inputShippingPhone').val('');
					$('#InputShippingName').prop('readonly', false);
					$('#inputShippingAddress').prop('readonly', false);
					$('#inputShippingPhone').prop('readonly', false);
				}
			});
			// apply coupon on select change event
			$('#selectCoupon').on('change', function(e) {
				// var coupon = $(this).val();
				var val = $('#selectCoupon').find(":selected").val();
				var code = $('#selectCoupon').find(":selected").attr("Code");
				var shipping = $('#shipping').val();
				// set text and val to input field
				$('#discountAmount').val(val);
				$('#discountShow').html(val);
				// update total value
				var subtotal = $('#subtotal').val();
				var discountAmount = $('#discountAmount').val();
				var finalPrice = (1 * subtotal + 1 * shipping - 1 * discountAmount).toFixed(2);
				$('#finalPrice').val(finalPrice);
				$('#finalPriceShow').html(finalPrice);
				$('#discountCode').val(code);
			});
			$('#inputPhone').on('input', function() {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
		});
	</script>
@endsection
