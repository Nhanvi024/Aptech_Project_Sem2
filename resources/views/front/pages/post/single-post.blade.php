@extends("front.layouts.pages-layout")
@section("pageTitle")
	Fruitkha
@endsection
@section("content")
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Read the Details</p>
						<h1>{{ $currentPost->title }}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single article section -->
	<div class="mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10">
					<div class="single-article-section">
						<div class="single-article-text">
							<div>
								<a href="{{ route("user.single.news", $currentPost->id) }}">
									<img src="{{ asset("storage/posts/" . $currentPost->post_featured_image) }}" style="min-height: 300px;"
										alt="" class="d-block mx-auto">
								</a>
							</div>
							<br>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i>
									{{ $currentPost->author->name ?? "Admin" }}</span>
								<span class="date"><i class="fas fa-calendar"></i>
									{{ $currentPost->created_at->format("d F, Y") }}</span>
							</p>
							<h1 class="w-100">
								{{ $currentPost->title }}
							</h1>
							<hr style="background-color: gray">
							<br>
							<div>
								@php
									$texts = $currentPost->content;
									$images = $currentPost->content_image;
									$mergedContent = [];
									$maxCount = max(count($texts), count($images));
									for ($i = 0; $i < $maxCount; $i++) {
									    if (isset($texts[$i])) {
									        $mergedContent[] = $texts[$i];
									    }
									    if (isset($images[$i])) {
									        $mergedContent[] = $images[$i];
									    }
									}
								@endphp

								@if (!empty($mergedContent))
									<div class="content-wrapper">
										@foreach ($mergedContent as $item)
											@php
												$item = is_array($item) ? implode(" ", $item) : $item;
											@endphp
											@if (Str::endsWith($item, [".jpg", ".jpeg", ".png", ".gif", ".webp"]))
												<div class="image-item items-center">
													<img src="{{ asset("storage/posts/" . $item) }}" alt="Image" class="img mx-auto d-block" height=""
														width="500px" style="aspect-ratio: ;">
												</div>
												<br>
											@else
												<div class="content-item my-0" style="white-space: pre-wrap; height: fit-content;">
													<p>{{ $item }}</p>
												</div>
												<br>
											@endif
										@endforeach
									</div>
								@endif
							</div>
						</div>
					</div>
					<hr class="d-lg-none" style="background-color: gray">

				</div>
				<div class="d-none d-lg-block col-12 col-lg-2">
					<h4>New products</h4>
					<div class="row product-lists text-center">
						@foreach ($products as $item)
							<div class="col-4 col-lg-12 mx-auto text-center px-2 {{ str_replace(" ", "", $item->category->catName) }}">
								<div class="single-product-item" style="height: ">
									<div class="ribbon right {{ $item->proDiscount > 0 ? "" : "d-none" }}" style="--c: #CC333F;--f: 5px;">
										{{ $item->proDiscount > 40 ? "HOT SALE" : "SALE" }} {{ $item->proDiscount }}%
									</div>
									<div class="product-image">
										<a href="/productDetail/{{ $item->id }}">
											<img src={{ asset("storage/products/" . $item->proImageURL[0]) }} alt="" style="aspect-ratio: 1/1;">
										</a>
									</div>
									<h3 style="width: 80%; margin: auto;height: ;">
										{{Str::limit($item->proName,15,' ...')  }}</h3>
									<span class="product-price text-danger" style="position: absolute;bottom: 25px;left: 50%;transform: translate(-50%,-50%)">
										<del class="h6 text-secondary text-sm">{{ $item->proDiscount > 0 ? "$" . $item->proPrice : " " }}</del>
										$<strong
											class="h4 text-danger">{{ number_format(($item->proPrice * (100 - $item->proDiscount)) / 100, 2) }}</strong></span>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="d-block d-lg-none col-12 col-lg-2">
					<h4>New products</h4>
					<div class="row product-lists text-center">
						@foreach ($products as $item)
							<div class="col-4 col-lg-12 mx-auto text-center px-2 {{ str_replace(" ", "", $item->category->catName) }}">
								<div class="single-product-item" style="height: 350px" >
									<div class="ribbon right {{ $item->proDiscount > 0 ? "" : "d-none" }}" style="--c: #CC333F;--f: 5px;">
										{{ $item->proDiscount > 40 ? "HOT SALE" : "SALE" }} {{ $item->proDiscount }}%
									</div>
									<div class="product-image">
										<a href="/productDetail/{{ $item->id }}">
											<img src={{ asset("storage/products/" . $item->proImageURL[0]) }} alt="" style="aspect-ratio: 1/1;">
										</a>
									</div>
									<h3 style="width: 80%; margin: auto;height: ;">
										{{ $item->proName }}</h3>
									<span class="product-price text-danger mx-auto" style="position: absolute;bottom: 50px;left: 50%;transform: translate(-50%,-30%)">
										<del class="h6 text-secondary text-sm">{{ $item->proDiscount > 0 ? "$" . $item->proPrice : " " }}</del>
										$<strong
											class="h4 text-danger">{{ number_format(($item->proPrice * (100 - $item->proDiscount)) / 100, 2) }}</strong></span>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<hr style="background-color: gray">
			<h4 style="text-align: center">Recent NEWS</h4>
			<br>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 100%; ">

				<div class="carousel-inner">
					@if ($recentPosts->isNotEmpty())
						@foreach ($recentPosts as $index => $post)
							@php
								$contents = $post->content;
								$textContent = "";
								if ($contents) {
								    foreach ($contents as $value) {
								        $textContent .= $value . ". ";
								    }
								}
							@endphp
							<div class="carousel-item {{ $index === 0 ? "active" : "" }}">
								<a href="\news/{{ $post->id }}">
									<div class="latest-news-bg"
										style="background-image: url('{{ asset("storage/posts/" . $post->post_featured_image) }}')">
									</div>
								</a>
								<div class="carousel-caption d-md-block mx-auto" style="background-color: rgba(0,0,0,0.3);">
									<h1 class="" style="color:  rgba(255,255,255,0.7)">{{ $post->title }}</h1>
									{{-- <p>{{ Str::limit($textContent, 100, " ...") }}</p> --}}
								</div>
							</div>
						@endforeach
					@else
						<p>No post</p>
					@endif
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<button type="button" class="btn btn-primary btn-lg" id="btn-back-to-top"
		style="position: fixed;left: 100px;bottom: 200px;display: none; width: 50px; height: 50px;border-radius: 5px">
		<i class="fas fa-arrow-up"></i>
	</button>
	<!-- end single article section -->

	{{-- Scroll to top button --}}
	<script>
		let mybutton = document.getElementById("btn-back-to-top");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {
			scrollFunction();
		};

		function scrollFunction() {
			if (
				document.body.scrollTop > 200 ||
				document.documentElement.scrollTop > 200
			) {
				mybutton.style.display = "block";
			} else {
				mybutton.style.display = "none";
			}
		}
		// When the user clicks on the button, scroll to the top of the document
		mybutton.addEventListener("click", backToTop);

		function backToTop() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>

	{{-- <!-- jquery -->
	<script src="/assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="/assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="/assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="/assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="/assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="/assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="/assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="/assets/js/main.js"></script> --}}
@endsection

</body>

</html>
