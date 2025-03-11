@extends("front.layouts.pages-layout")

@section("pageTitle")
	Fruitkha
@endsection
@section("content")
	<!--PreLoader-->
	{{-- <div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div> --}}
	<!--PreLoader Ends-->
	<!-- Body -->
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Fruitkha</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="product-section mt-150 mb-150">
		<div class="container">
			<x-form-alert />
			<div class="row">
				<div class="d-xl-inline col-xl-3">
					<h4 class="strong">Products Filter</h4>
					<button class="cart-btn border-0 mb-3 buttonHomeApplyFilter">Apply Filter</button>
					<button class="cart-btn border-0 mb-3 buttonHomeResetFilter">Reset Filter</button>
					<form action="" method="GET" id="formFilter">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Search by name..." aria-label="Search" name="nameFil"
								aria-describedby="basic-addon2" value="{{ request()->nameFil ?: "" }}">
							{{-- <div class="input-group-append">
								<button class="btn btn-outline-secondary" type="button">Search</button>
							</div> --}}
						</div>
						<div class="filter-price">
							<label class="h4 strong" for="priceRange">Price range:</label>
							<div class=" d-flex align-items-baseline">
								<label class="" for="priceFrom">From </label>
								<input class="form-control" style="50px" type="number" id="priceFrom" name="priceFrom" min="0"
									max="10000" value={{ request()->priceFrom ?: 0 }}>
								<label class="" for="priceTo">To</label>
								<input class="form-control" style="50px" type="number" id="priceTo" name="priceTo" min="0"
									max="10000" value={{ request()->priceTo ?: 10000 }}>
							</div>
						</div>
						<div class="filter-category">
							<label class="h4 strong" for="category">Category:</label>
							<div class="form-check">
								<input type="checkbox" class="btnAllCate" id="cate0" name="categoryFil[]" value="0" />
								<label for="cate0">All categories</label>
							</div>
							{{-- @dd([request()->categoryFil]) --}}
							@foreach ($categories as $item)
								<div class="form-check">
									<input type="checkbox" class="cateCheck" name="categoryFil[]" value="{{ $item->id }}"
										id="{{ str_replace(" ", "", $item->catName) }}"
										{{ in_array($item->id, [request()->categoryFil][0] ?: []) ? "checked" : "" }}>
									<label for="{{ str_replace(" ", "", $item->catName) }}">
										{{ $item->catName }}
									</label>
								</div>
							@endforeach
						</div>
					</form>
				</div>
				<div class="col">
					<div class="row product-lists">
						@foreach ($products as $item)
							{{-- @dd(Auth::user()); --}}
							<div class="col-6 col-md-4 col-lg-4 text-center px-2 {{ str_replace(" ", "", $item->category->catName) }}">
								<div class="single-product-item">
									<div class="ribbon right {{ $item->proDiscount > 0 ? "" : "d-none" }}" style="--c: #CC333F;--f: 10px;">
										{{ $item->proDiscount > 40 ? "HOT SALE" : "SALE" }} {{ $item->proDiscount }}%
									</div>
									<div class="product-image">
										<a href="/productDetail/{{ $item->id }}">
											<img src={{ asset("storage/products/" . $item->proImageURL[0]) }} alt="" style="aspect-ratio: 1/1;">
										</a>
									</div>
									{{-- <h3 style="width: 80%; margin: auto;height: 50px;text-overflow:ellipsis; overflow: hidden;white-space: nowrap;"> --}}
									<h3 style="width: 80%; margin: auto;height: 100px;">
										{{ $item->proName }}</h3>
									<span class="product-price text-danger">
										<del class="h6 text-secondary text-sm">{{ $item->proDiscount > 0 ? "$" . $item->proPrice : " " }}</del>
										$<strong
											class="h4 text-danger">{{ number_format(($item->proPrice * (100 - $item->proDiscount)) / 100, 2) }}</strong><small
											class="text-dark d-none"> Per Kg</small></span>

									<p class="product-stock">
										Stock: {{ number_format($item->proStock, 0) }}
									</p>
									@if ($cart && array_key_exists($item->id, $cart))
										<div class="btn-group cart-btn border-0" style="width: 70%">
											<button class="btn cart-btn border-0 col-3 text-center buttonCartMinus" value={{ $item->id }}>
												<i class="fas fa-solid fa-minus m-auto"></i>
											</button>
											<span class="mx-auto d-flex justify-content-center align-items-center my-0 py-0 col"
												style="background: #f2802363">
												{{ $cart[$item->id] }}
											</span>
											<button class="btn cart-btn border-0 col-3 buttonAddToCart" value={{ $item->id }}>
												<i class="fas fa-solid fa-plus m-auto"></i>
											</button>
										</div>
									@else
										<button class="cart-btn border-0 buttonAddToCart" style="width: 70%" value={{ $item->id }}>
											<i class="fas fa-shopping-cart"></i>Add to Cart
										</button>
									@endif
								</div>
							</div>
						@endforeach
					</div>

					<!-- Pagination -->
					<div class="row">
						<div class="col-lg-12 text-center">

							<div class="pagination-wrap">
								<ul>
									@if ($products->currentPage() > 1)
										<li>
											<a href="{{ $products->appends(request()->except("page"))->previousPageUrl() }}"><i
													class="fas fa-angle-left"></i></a>
										</li>
									@endif
									@if ($products->currentPage() > 3)
										<li>
											<a href="{{ $products->appends(request()->except("page"))->url(1) }}">1</a>
										</li>
										<li> ... </li>
									@endif
									@for ($i = $products->currentPage() - 2; $i <= $products->currentPage() + 2; $i++)
										@if ($i > 0 && $i <= $products->lastPage())
											@if ($products->currentPage() == $i)
												<li>
													<a class="active">{{ $i }}</a>
												</li>
											@else
												<li>
													<a href="{{ $products->appends(request()->except("page"))->url($i) }}">{{ $i }}</a>
												</li>
											@endif
										@endif
									@endfor
									@if ($products->currentPage() < $products->lastPage() - 2)
										<li> ... </li>
										<li>
											<a
												href="{{ $products->appends(request()->except("page"))->url($products->lastPage()) }}">{{ $products->lastPage() }}</a>
										</li>
									@endif
									@if ($products->currentPage() < $products->lastPage())
										<li>
											<a href="{{ $products->appends(request()->except("page"))->nextPageUrl() }}"><i
													class="fas fa-angle-right"></i></a>
										</li>
									@endif
								</ul>
							</div>
						</div>
					</div>
					<!-- End Pagination -->

				</div>
			</div>

		</div>
	</div>
	<!-- end products -->
	<!-- End Body -->

	{{-- Script --}}
	<script>
		$(document).ready(function() {

			// function fecthData() {
			// 	$.ajax({
			// 		url: '/',
			// 		type: 'GET',
			// 		dataType: 'json',
			// 		success: function(response) {
			// 			console.log('chay function fetchData');
			// 			console.log(response);
			// 		}
			// 	})
			// 	console.log('chay function fetchData');
			// }

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
						window.location.reload();
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
						window.location.reload();
					},
					error: function(error) {
						console.log(error);
						alert('An error occurred while decreasing product quantity.');
					}
				});
			});
			$('.btnAllPriceRange').on('click', (function() {
				if ($(this).is(':checked')) {
					$('.priceRange').prop('checked', true);
				} else {
					$('.priceRange').prop('checked', false);
				}
			}));
			$('.btnAllCate').on('click', (function() {
				if ($(this).is(':checked')) {
					$('.cateCheck').prop('checked', true);
				} else {
					$('.cateCheck').prop('checked', false);
				}
			}));
			$('.cateCheck').on('click', (function() {
				// var test = $(this).val();
				// alert(test);
			}));
			$('#priceTo').on('input', (function() {
				$('#priceTo').attr('min', $('#priceFrom').val());
			}));
			$('#priceFrom').on('input', (function() {
				$('#priceFrom').attr('max', $('#priceTo').val());
			}));
			$('.buttonHomeResetFilter').on('click', (function(e) {
				e.preventDefault(); // Prevent form submission
				confirm('Reset Filter ?');
				window.location = '/';
			}));
			$('.buttonHomeApplyFilter').on('click', (function() {
				$('#formFilter').submit();
			}));
		});
	</script>
	{{-- End Script --}}
@endsection
