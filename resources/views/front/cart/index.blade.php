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

			<!-- cart -->
			<div class="cart-section mt-100 mb-100">
				<div class="container">
					<x-form-alert />
					<div class="row">
						<div class="col-lg-8 col-md-12">
							<div class="cart-table-wrap">
								<table class="cart-table">
									<thead class="cart-table-head">
										<tr class="table-head-row">
											<th class="product-remove"></th>
											<th class="product-image">Product Image</th>
											<th class="product-name">Name</th>
											<th class="product-price">Price</th>
											<th class="product-quantity">
												<li style="list-style-type: none">Quantity</li>
												<li style="list-style-type: none"><small>max: 11000</small></li>
											</th>
											<th class="product-stock">Stock</th>
											<th class="product-total">Total</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$totalValue = 0;
										?>
										@foreach ($cartItems as $item)
											<tr class="table-body-row">
												{{-- <i class="far fa-window-close"></i> --}}
												<td class="product-remove"><a href="/removeFromCart/{{ $item->id }}"><span class="btn btn-danger"><i
																class="fas fa-solid fa-trash"></i>
														</span></a></td>
												<td class="product-image"><img src="{{ asset("storage/products/" . $item->proImageURL[0]) }}"
														alt="{{ $item->proImageURL[0] }}" width="50px" height="50px"></td>
												<td class="product-name">{{ $item->proName }}</td>
												{{-- <td class="product-price">${{ $item->proPrice }}</td> --}}
												<td class="product-price">
													<del class="text-secondary">{{ $item->proDiscount > 0 ? "$" . $item->proPrice : "" }}</del>
													${{ ($item->proPrice * (100 - $item->proDiscount)) / 100 }}
												</td>
												<td class="product-quantity">
													<div class="btn-group cart-btn border-0" style="width: 70%">
														<button
															class="btn cart-btn border-0 col-3 text-center {{ $cart[$item->id] > 1 ? "buttonCartMinus" : "" }} {{ $cart[$item->id] == 1 ? "bg-secondary" : "" }} "
															value={{ $item->id }}>
															<i class="fas fa-solid fa-minus m-auto"></i>
														</button>
														<input class="text-center inputCartItemQuantity" style="width: 75px;background: #f2802363;border: none"
															inputmode="numeric" type="text" placeholder="" value={{ $cart[$item->id] }}
															data-productId={{ $item->id }} min="1" max="99999">
														{{-- <span class="mx-auto d-flex justify-content-center align-items-center my-0 py-0 col"
													style="background: #f2802363">
													{{ $cart[$item->id] }} </span> --}}
														<button
															class="btn cart-btn border-0 col-3 {{ $cart[$item->id] < $item->proStock ? "buttonAddToCart" : "" }} {{ $cart[$item->id] == $item->proStock ? "bg-secondary" : "" }} "
															value={{ $item->id }}>
															<i class="fas fa-solid fa-plus m-auto"></i>
														</button>
													</div>
												</td>
												<td>
													{{ number_format($item->proStock, 0) }}
												</td>
												<td class="product-total">
													{{ (($item->proPrice * (100 - $item->proDiscount)) / 100) * (float) $cart[$item->id] }}</td>
											</tr>
											{{-- plus price to totalValue --}}
											<?php $totalValue += (($item->proPrice * (100 - $item->proDiscount)) / 100) * (float) $cart[$item->id];
											?>
										@endforeach
									</tbody>
								</table>
								{{-- back to shop if cart empty --}}
								@if ($cartItems->isEmpty())
									<hr>
									<h3>Your cart is empty</h3>
									<hr>
									<a href="{{ route("user.shop") }}"><span class="btn btn-primary"><i class="fas fa-solid fa-arrow-left"></i>
											Back
											to shop</span></a>
								@endif
							</div>
						</div>
						<div class="col-lg-4">
							<div class="total-section">
								<table class="total-table">
									<thead class="total-table-head">
										<tr class="table-total-row">
											<th>Total</th>
											<th>Price</th>
										</tr>
									</thead>
									<tbody>
										<tr class="total-data">
											<td><strong>Total: </strong></td>
											<td>${{ $totalValue }}</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="cart-buttons">
								<a href="/checkout" class="boxed-btn black">Check Out</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end cart -->
	<script>
		$(document).ready(function() {
			$('.buttonAddToCart').on('click', function(e) {
				e.preventDefault(); // Prevent form submission
				var product_id = $(this).val();
				// alert('Product ID:' + product_id);
				console.log('Product ID:' + product_id);
				// Add product to the cart using AJAX
				$.ajax({
					url: '/addCart/' + product_id,
					type: 'get',
					success: function(response) {
						// console.log(response);
						// alert('Product added to cart successfully.');
						window.location.reload();
						// alert(response['message']);
					},
					error: function(error) {
						console.log(error);
						alert('An error occurred while adding product to cart.');
					}
				});
			});

			// set selectCounpon value to discountAmout
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
				// $('#discountAmount').text(val);
				// update total value
				var totalValue = $('#subtotal').val();
				var discountAmount = $('#discountAmount').val();
				var newTotalValue = 1 * totalValue + 10 - 1 * discountAmount;
				$('#finalPrice').val(newTotalValue);
				$('#finalPriceShow').html(newTotalValue);
				$('#discountCode').val(text);
				$('#testCode').val(testCode);
				// update total value
			});
			// set selectCounpon value to discountAmout
			// Remove product from the cart using AJAX
			$('.buttonCartMinus').on('click', function(e) {
				// e.preventDefault(); // Prevent form submission
				var product_id = $(this).val();
				// alert('Product ID:' + product_id);
				console.log('Product ID:' + product_id);
				// Decrease product quantity in the cart using AJAX
				$.ajax({
					url: '/decreaseCart/' + product_id,
					type: 'get',
					success: function(response) {
						// console.log(response);
						// alert('Product quantity decreased successfully.');
						window.location.reload();
						// alert(response['message']);
					},
					error: function(error) {
						console.log(error);
						alert('An error occurred while decreasing product quantity.');
					}
				});
			});
			$('.inputCartItemQuantity').on('change', function(e) {
				var value = parseInt($(this).val());
				var proId = $(this).attr('data-productId');
				console.log($(this));
				console.log(proId);
				// Update product quantity in the cart using AJAX
				if (value > 0 && value <= 99999) {
					$.ajax({
						url: '/updateCart/' + proId + '/' + value,
						type: 'get',
						success: function(response) {
							// console.log(response);
							// alert('Product quantity updated successfully.');
							window.location.reload();
							// alert(response['message']);
						},
						error: function(error) {
							console.log(error);
							alert('An error occurred while updating product quantity.');
						}
					})
				} else {
					alert('quantity in [1-99999]')
					window.location.reload();
				}
			});
		});
	</script>
@endsection
