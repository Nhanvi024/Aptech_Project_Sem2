@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")



	<div class="page-wrapper">
		<!-- Page header -->
		<div class="page-header d-print-none">
			<div class="container">
				<div class="row align-items-center">
					<div class="col">
						<h2 class="page-title">
							BLOGS MANAGEMENT
						</h2>
					</div>
					<!-- Page title actions -->
					<div class="col-auto ms-auto d-print-none">
						<div class="d-flex">

							<a href="{{ route("admin.add.post") }}" class="btn btn-primary">
								<!-- Download SVG icon from http://tabler-icons.io/i/plus -->
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
									stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M12 5l0 14"></path>
									<path d="M5 12l14 0"></path>
								</svg>
								New Blog
							</a>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- Page body -->
		<div class="page-body">

			<div class="container">
				<div class="col-12">
					<div class="card mb-3">
						<div class="card-body border-bottom">
							<div class="mb-3">
								<label for="category">Search by Category:</label>
							</div>
							<form method="GET" action="{{ route("admin.posts") }}" class="d-flex gap-2 mb-3">
								<div class="form-group">
									<select name="category" id="category" class="form-control">
										<option value="">-- Select Category --</option>
										@foreach ($categories as $category)
											<option value="{{ $category->id }}" {{ request("category") == $category->id ? "selected" : "" }}>
												{{ $category->catName }}
											</option>
										@endforeach
									</select>
								</div>
								<div>
									<button type="submit" class="btn btn-primary">Search</button>

								</div>
							</form>

							<div class="d-flex gap-2">

								@foreach ($sortOptions as $field => $option)
									<a href="{{ route("admin.posts", ["order_by" => $field, "order" => $option["next_order"]]) }}">
										<button class="btn {{ $orderBy === $field ? "btn-secondary" : "btn-primary" }}">
											@if ($field === "visibility")
												{{ $option["next_order"] === "desc" ? "Public First" : "Private First" }}
											@else
												{{ $option["next_order"] === "desc" ? "Newest" : "Oldest" }}
												({{ $option["label"] }})
											@endif
										</button>
									</a>
								@endforeach

								<button id="change-visibility" class="btn btn-success">Change Visibility</button>

								<form action="{{ route("admin.posts") }}" method="GET">
									<input type="text" name="search" class="form-control d-inline-block w-9 me-3"
										placeholder="Search by title …" value="{{ request("search") }}">
									{{-- <button type="submit" class="btn btn-primary">Search</button> --}}
								</form>

								<a href="{{ route("admin.posts") }}">
									<button class="btn btn-warning">Reset</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				@if (Session::has("message"))
					<div class="alert alert-info w-100">
						<strong>Info!</strong> {{ Session::get("message") }}
					</div>
				@endif
				{{-- Table --}}
				<div class="col-12">
					<div class="card">
						<div class="card-body border-bottom">
							<div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
								<table class="table table-striped table-hover card-table table-vcenter table-fixed w-full datatable">
									<thead>
										<tr>
											<th><input type="checkbox" id="select-all"></th>
											<th>ID</th>
											<th>Title</th>
											<th>Content</th>
											<th>Author</th>
											<th>Category</th>
											<th>Featured Image</th>
											<th>Tags</th>
											<th>Created At</th>
											<th>Update At</th>
											<th>Visibility</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($posts as $index => $post)
											<tr>
												<td><input type="checkbox" class="post-checkbox" value="{{ $post->id }}"></td>
												<td>{{ $post->id }}</td>
												<td>{{ $post->title }}</td>
												<td>
													@php
														$textContent = "";
														if (is_array($post->content) ? $post->content : []) {
														    foreach ($post->content as $index => $value) {
														        if (isset($value[$index])) {
														            $textContent .= $value . " ";
														        }
														    }
														}
													@endphp

													{{-- @elseif($block['type'] =='image')
                                        // <img src="{{asset('storage/'.$block['value'])}}" alt="{{$post->title}}" width="100px"> --}}
													<p class="excerpt">
														{{ Str::limit(strip_tags($textContent), 30, " ...") }}
													</p>
												</td>
												<td>
													<p>{{ $post->author }}</p>
												</td>
												<td>{{ $post->category->catName ?? "No Category" }}</td>
												<td>
													<img src="{{ asset("storage/posts/" . $post->post_featured_image) }}" alt="{{ $post->title }}"
														width="100px">
												</td>
												<td>{{ $post->tags }}</td>
												<td>{{ $post->created_at->format("d/m/Y H:i") }}</td>
												<td>{{ $post->updated_at->diffForHumans() }}</td>
												<td>
													@if ($post->visibility)
														<a href="{{ route("admin.status.post", $post->id) }}"><button class="btn btn-success">Public</button></a>
													@else
														<a href="{{ route("admin.status.post", $post->id) }}"><button class="btn btn-danger">Private</button></a>
													@endif
												</td>
												<td>
													<a href="{{ route("admin.edit.post", $post->id) }}"
														class="btn btn-primary"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
														Edit</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>
			</div>


			<!-- Pagination -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="mt-2">
						Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} results
					</div>
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
	<script>
		document.getElementById('select-all').addEventListener('change', function() {
			let checkboxes = document.querySelectorAll('.post-checkbox');
			checkboxes.forEach(checkbox => checkbox.checked = this.checked);
		});

		document.getElementById('change-visibility').addEventListener('click', function() {
			let selectedPosts = [];
			document.querySelectorAll('.post-checkbox:checked').forEach(checkbox => {
				selectedPosts.push(checkbox.value);
			});

			if (selectedPosts.length === 0) {
				alert('Please select at least one post!');
				return;
			}

			fetch("{{ route("admin.change.visibility") }}", {
					method: "POST",
					headers: {
						"Content-Type": "application/json",
						"X-CSRF-TOKEN": "{{ csrf_token() }}"
					},
					body: JSON.stringify({
						id: selectedPosts
					})
				})
				.then(response => response.json())
				.then(data => {
					if (data.success) {
						// alert('Visibility updated successfully!');
						location.reload(); // Reload trang để cập nhật trạng thái
					} else {
						alert('Failed to update visibility');
					}
				})
				.catch(error => console.error("Error:", error));
		});

		function removeContentField(button) {
			button.closest('.content-item').remove();
		}

		setTimeout(function() {
			document.querySelector('.alert').style.display = 'none';
		}, 3000); // 3 giây
	</script>
	<style>
		thead {
			position: sticky;
			top: 0;
			background-color: white;
			z-index: 100;
		}

		/* thead tr th {
																																																																			font-size: 16px;
																																																																			font-weight: bold;
																																																															} */
	</style>

@endsection
