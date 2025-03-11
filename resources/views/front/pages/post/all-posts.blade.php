@extends("front.layouts.pages-layout")
@section("pageTitle")
	Fruitkha lalala
@endsection
@section("content")
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Organic Information</p>
						<h1>News Article</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">
				@foreach ($posts as $index => $post)
					<div class="col-lg-4 col-md-6" style="height: 550px">
						<div class="single-latest-news" style="height: 90%">
							<a href="news/{{ $post->id }}">
								<div class="latest-news-bg"
									style="background-image: url('{{ asset("storage/posts/" . $post->post_featured_image) }}')">
								</div>
							</a>
							<div class="news-text-box">
								<h3>
									<a href="{{ route("user.news", $post->id) }}">{{ $post->title }}</a>
								</h3>
								<p class="blog-meta">
									<span class="author"><i class="fas fa-user"></i>
										{{ $post->author ?? "Admin" }}</span>
									<span class="date"><i class="fas fa-calendar"></i>
										{{ $post->created_at->format("d F, Y") }}</span>
								</p>
								<div>
									@php
										$contents = $post->content;
										$textContent = "";
										if ($contents) {
										    foreach ($contents as $value) {
										        $textContent .= $value . ". ";
										    }
										}
									@endphp
									<p class="">
										{{ Str::limit($textContent, 150, " ...") }}
									</p>
								</div>
								<a href="{{ route("user.single.news", $post->id) }}" class="read-more-btn">
									Read more <i class="fas fa-angle-right"></i>
								</a>
							</div>

						</div>
					</div>
				@endforeach

			</div>

			<!-- Pagination -->
			<div class="row">
				<div class="col-lg-12 text-center">

					<div class="pagination-wrap">
						<ul>
							@if ($posts->currentPage() > 1)
								<li>
									<a href="{{ $posts->appends(request()->except("page"))->previousPageUrl() }}"><i
											class="fas fa-angle-left"></i></a>
								</li>
							@endif
							@if ($posts->currentPage() > 3)
								<li>
									<a href="{{ $posts->appends(request()->except("page"))->url(1) }}">1</a>
								</li>
								<li> ... </li>
							@endif
							@for ($i = $posts->currentPage() - 2; $i <= $posts->currentPage() + 2; $i++)
								@if ($i > 0 && $i <= $posts->lastPage())
									@if ($posts->currentPage() == $i)
										<li>
											<a class="active">{{ $i }}</a>
										</li>
									@else
										<li>
											<a href="{{ $posts->appends(request()->except("page"))->url($i) }}">{{ $i }}</a>
										</li>
									@endif
								@endif
							@endfor
							@if ($posts->currentPage() < $posts->lastPage() - 2)
								<li> ... </li>
								<li>
									<a
										href="{{ $posts->appends(request()->except("page"))->url($posts->lastPage()) }}">{{ $posts->lastPage() }}</a>
								</li>
							@endif
							@if ($posts->currentPage() < $posts->lastPage())
								<li>
									<a href="{{ $posts->appends(request()->except("page"))->nextPageUrl() }}"><i
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
	<!-- end latest news -->
@endsection
