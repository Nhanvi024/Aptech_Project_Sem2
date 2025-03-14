@extends("front.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")
	<div class="" style="height: 105px;background: #051922"></div>
	<div class="text-center my-5">
		<a href="." class="navbar-brand navbar-brand-autodark">
			<img src="/assets/img/logo.png" style="scale: 2" width="" height="" alt="Tabler" class="navbar-brand-image">
		</a>
	</div>
	<div class="row justify-content-center w-75 mx-auto">
	</div>

	<!-- single product -->
	<div class="single-product mt-100 mb-100">
		<div class="container">
			<div class="row">
				<div class="col col-md-5">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
						style="width: 100%; aspect-ratio: 1/1;">

						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="{{ asset("/storage/products/" . $product?->proImageURL[0]) }}"
									style="aspect-ratio: 1/1;" alt="">
							</div>
							<?php
							for ($i = 1; $i < count($product?->proImageURL); $i++) {
							    echo "<div class='carousel-item'><img class='d-block w-100' src='/storage/products/{$product->proImageURL[$i]}' style='aspect-ratio: 1/1;' alt='Slide'></div>";
							}
							?>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
						<ol class="carousel-indicators" style="position: static">
							<?php
							echo "<li class='active' data-target='#carouselExampleIndicators' style='background: url(/storage/products/{$product->proImageURL[0]});width: 75px;height:75px;background-position: center;background-repeat: no-repeat;background-size: contain;aspect-ratio :1/1;' data-slide-to='0'></li>";
							?>

							<?php
							for ($i = 1; $i < count($product?->proImageURL); $i++) {
							    echo "<li data-target='#carouselExampleIndicators' style='background: url(/storage/products/{$product->proImageURL[$i]});width: 75px;height:75px;background-position: center;background-repeat: no-repeat;background-size: contain;aspect-ratio :1/1;' data-slide-to='$i'></li>";
							}
							?>
						</ol>
					</div>
				</div>
				<div class="col-12 col-md-5 mx-auto px-5">
					<div class="single-product-content">
						<h3><strong>{{ $product->proName }}</strong> </h3>
						<p class="single-product-pricing">
							<span class="text-danger">
								<del class="h6 text-secondary text-sm">{{ $product->proDiscount > 0 ? "$" . $product->proPrice : " " }}</del>
								$<strong
									class="h2 text-danger">{{ number_format(($product->proPrice * (100 - $product->proDiscount)) / 100, 2) }}</strong><small
									class="text-dark d-none"> Per Kg</small></span>
							{{-- <span class="mt-0"><small>Per Kg</small></span> --}}
						</p>
						<p>Instock: {{ number_format($product->proStock, 0) }}</p>
						<p><strong>Categories: </strong>{{ $product->category->catName }}</p>
						<div class="" style="width: 300px">
							@if ($cart && array_key_exists($product->id, $cart))
								<div class="btn-group cart-btn border-0" style="width: 60%">
									<button class="btn cart-btn border-0 col-3 text-center buttonCartMinus" value={{ $product->id }}>
										<i class="fas fa-solid fa-minus m-auto"></i>
									</button>
									{{-- <span class="mx-auto d-flex justify-content-center align-items-center my-0 py-0 col"
										style="background: #f2802363">
										{{ $cart[$product->id] }} </span> --}}
									<input class="text-center inputCartItemQuantity" style="width: 75px;background: #f2802363;border: none"
										inputmode="numeric" type="text" placeholder="" value={{ $cart[$product->id] }}
										data-productId={{ $product->id }} min="1" max="99999">
									<button class="btn cart-btn border-0 col-3 buttonAddToCart" value={{ $product->id }}>
										<i class="fas fa-solid fa-plus m-auto"></i>
									</button>
								</div>
								<a href="/removeFromCart/{{ $product->id }}"><span class="btn btn-pill btn-danger"><i
											class="fas fa-solid fa-trash"></i>
									</span></a>
							@else
								<button class="cart-btn border-0 buttonAddToCart" style="width: 70%" value={{ $product->id }}>
									<i class="fas fa-shopping-cart"></i>Add to Cart
								</button>
							@endif
						</div>
						<a class="btn cart-btn border-0 mt-3 bg-success" href="{{ route("user.user.cart.index") }}">View Cart</a>
						<a class="btn cart-btn border-0 mt-3 bg-primary" href="{{ route("user.shop") }}">Back to shop</a>
					</div>
				</div>
				<div class="col-8">
					<h3 class="mt-5 mb-0">Product description:</h3>
					<hr class="mb-0">
					<span class="mt-0 text-start" style="white-space: pre-wrap">
						{{ Str::start($product->proDescription, "\n") }}
					</span>
					<hr>
				</div>
				<hr>
			</div>
		</div>
	</div>
	<!-- end single product -->
	<script>
		$(document).ready(function() {
			$('.buttonAddToCart').on('click', function(e) {
				// e.preventDefault(); // Prevent form submission
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
