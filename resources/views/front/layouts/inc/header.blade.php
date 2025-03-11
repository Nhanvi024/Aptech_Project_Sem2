<header>
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{ route("user.shop") }}">
								<img src="../assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="/">Home</a></li>
								<li><a href="/about_us">About Us</a></li>
								<li><a href="/cart">Cart</a></li>
								<li><a href="/">News</a></li>
								<li><a href="/contact">Contact</a></li>
								<li class="">
									<div class="header-icons">
										@if (isset($user))
											<span class="dropdown">
												<a class="dropdown-toggle btn btn-pill text-white my-0 py-0" aria-expanded="false" href="#"
													role="button" data-bs-toggle="dropdown">
													{{ $user?->username }}
												</a>
												<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end bg-secondary">
													<a href={{ route("user.user.profile") }} class="dropdown-item">Profile</a>
													<div class="dropdown-divider"></div>
													<a href={{ route("user.user.logout") }} class="dropdown-item">Logout</a>
												</div>
											</span>
										@else
											<a class="btn btn-pill text-white my-0 py-2" href="{{ route("user.user.login") }}">Login</a>
										@endif
										<span class="dropdown show">
											<a class="dropdown-toggle" href="#" aria-expanded="false" role="button" data-bs-toggle="dropdown">
												<i class="fas fa-shopping-cart"></i>
												@if (isset($cartItems))
													<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
														{{ count($cartItems) }}
													</span>
												@endif
											</a>
											{{-- @dd($cartItems) --}}
											<?php
											$totalValue = 0;
											?>
											<div class="dropdown-menu bg-light" style="width: 500px;">
												<div class="mx-auto" style="width: fit-content">
													<table class="table table-striped table-bordered border-3 mb-0" style="background: #f3dfce;">
														<thead>
															<tr class="" style="background: #f28123">
																<th></th>
																<th>Name</th>
																<th>Image</th>
																<th>Quantity</th>
																<th>Cost</th>
															</tr>
														</thead>
														<tbody>
															@if (isset($cartItems))
																@foreach ($cartItems as $item)
																	<tr>
																		<td class="text-center align-content-center"><a href="/removeFromCart/{{ $item->id }}">
																				<div class="strong text-dark border border-5 p-0 m-auto" style="width: 30px"> X </div>
																			</a></td>
																		<td class="text-center align-content-center">{{ $item->proName }}</td>
																		<td class="text-center align-content-center"><img
																				src={{ asset("storage/products/" . $item->proImageURL[0]) }} alt=""
																				style="aspect-ratio: 1/1;" width="50px"></td>
																		<td class="text-center align-content-center">{{ $cart[$item->id] }}</td>

																		<td class="text-center align-content-center">
																			{{ (($item->proPrice * (100 - $item->proDiscount)) / 100) * (float) $cart[$item->id] }}</td>
																	</tr>
																	<?php
																	$totalValue += (($item->proPrice * (100 - $item->proDiscount)) / 100) * (float) $cart[$item->id];
																	?>
																@endforeach
															@endif
															{{-- @if ($cartItems?->isEmpty()) --}}
															@if ($cartItems != null)
																@if (count($cartItems) == 0)
																	<tr>
																		<td colspan="5">
																			<h3>Your cart is empty</h3>
																		</td>
																	</tr>
																@endif
															@endif
														</tbody>
													</table>
													{{-- cart total value --}}
													<div class=" text-center mt-3 mb-2 mx-auto">
														<h4 class="text-primary">Total: ${{ $totalValue }}</h4>
													</div>
													<div class="d-flex justify-content-center mt-2">
														<a class="btn btn-pill btn-primary" href="{{ route("user.user.cart.index") }}">View Cart</a>
													</div>
												</div>
											</div>
										</span>
										{{-- <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a> --}}
									</div>
								</li>
							</ul>
						</nav>
						{{-- <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a> --}}
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- search area -->
	{{-- <div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- end search arewa -->
	<!-- end header -->
	<script>
		$(document).ready(function() {
			$('.buttonAddToCart').on('click', function(e) {
				e.preventDefault(); // Prevent form submission
				var product_id = $(this).val();
				$.ajax({
					url: '/addCart/' + product_id,
					type: 'get',
					success: function(response) {
						// window.location.reload();
					},
					error: function(error) {
						console.log(error);
						alert('An error occurred while adding product to cart.');
					}
				});
			});
			$('.buttonCartMinus').on('click', function(e) {
				e.preventDefault(); // Prevent form submission
				var product_id = $(this).val();
				console.log('Product ID:' + product_id);
				$.ajax({
					url: '/decreaseCart/' + product_id,
					type: 'get',
					success: function(response) {
						// window.location.reload();
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
				if (value > 0 && value <= 5000) {
					$.ajax({
						url: '/updateCart/' + proId + '/' + value,
						type: 'get',
						success: function(response) {
							window.location.reload();
						},
						error: function(error) {
							console.log(error);
							alert('An error occurred while updating product quantity.');
						}
					})
				} else {
					alert('quantity in [1-5000]')
					window.location.reload();
				}
			});
		});
	</script>
</header>
