@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")

	<div class="page-wrapper">
		<!-- Page header -->
		<div class="page-header d-print-none sticky-top bg-success-subtle" style="top: 55px">
			<div class="container-xl">
				<div class="row g-2 align-items-center">
					<div class="col">
						<h2 class="page-title">
							Products
						</h2>
					</div>
					<!-- Page title actions -->
					<div class="col-auto ms-auto d-print-none">
						<div class="d-flex">
							<input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search …">
							<a href="#" class="btn btn-primary">
								<!-- Download SVG icon from http://tabler-icons.io/i/plus -->
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
									stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M12 5l0 14"></path>
									<path d="M5 12l14 0"></path>
								</svg>
								Add product
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Page body -->
		<div class="page-body">
			<div class="container-xl table-responsive-xl">
				page body
				<h1>ĐÂY LÀ PRODUCTS PAGE</h1>
				{{-- <div class="row row-cards">
					@foreach ($admins as $admin)
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body p-4 text-center">
                                    <span class="avatar avatar-xl mb-3 rounded"
                                        style="background-image: url({{ $admin->getAvatar() }})"></span>
                                    <h3 class="m-0 mb-1"><a href="#">{{ $admin->username }}</a></h3>
                                    <div class="text-secondary">{{ $admin->position }}</div>
                                    <div class="mt-3">
                                        <span class="badge bg-purple-lt">{{ $admin->type }}</span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a href="#"
                                        class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                        Edit</a>
                                    <a href="#"
                                        class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                                        Delete</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
				</div> --}}
				<div class="row mt-4">
					{{ $products->links() }}
				</div>
				<table class="table table-striped table-bordered align-middle">
					<tr class="text-center">
						<th>ID</th>
						<th>Name</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Discount</th>
						<th>Category</th>
						<th>Image</th>
						<th>Description</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					@foreach ($products as $item)
						<tr>
							{{-- @dd($item->category) --}}
							<td>{{ $item->id }}</td>
							<td>{{ $item->proName }}</td>
							<td>{{ $item->proPrice }}</td>
							<td class="{{ $item->proStock > 80 ? "" : ($item->proStock > 30 ? "text-warning" : "text-danger") }}">
								{{ $item->proStock }}
							</td>
							<td>{{ $item->proDiscount }}</td>
							<td>{{ $item->category->catName }}</td>
							<td>
								<img src="{{ asset("storage/products/" . $item->proImageURL) }}" alt="{{ $item->proImageURL }}" width="100px"
									height="100px">
							</td>
							<td>{{ $item->proDescription }}</td>
							<td>
								@if ($item->proStatus == 1)
									<span class="badge bg-success text-light">Active</span>
									{{-- <a class="badge bg-success" href="{{ route("admin.products.changeStatus", $item) }}">Active</a> --}}
								@else
									<span class="badge bg-danger text-light">Inactive</span>
									{{-- <a class="badge bg-danger" href="{{ route("admin.products.changeStatus", $item) }}">Inactive</a> --}}
								@endif
							</td>
							<td>
								<a href="{{ route("admin.products.edit", $item) }}" class="btn btn-warning btn-sm">EDIT</a>
							</td>
						</tr>
					@endforeach
					<!-- Pagination -->
				</table>

			</div>
		</div>
		<footer class="footer footer-transparent d-print-none bg-secondary-subtle">
			<div class="container-xl">
				<div class="row text-center align-items-center flex-row-reverse">
					<div class="col-lg-auto ms-lg-auto">
						<ul class="list-inline list-inline-dots mb-0">
							<li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary"
									rel="noopener">Documentation</a></li>
							<li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
							<li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary"
									rel="noopener">Source code</a></li>
							<li class="list-inline-item">
								<a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
									<!-- Download SVG icon from http://tabler-icons.io/i/heart -->
									<svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24"
										height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
										stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
										</path>
									</svg>
									Sponsor
								</a>
							</li>
						</ul>
					</div>
					<div class="col-12 col-lg-auto mt-3 mt-lg-0">
						<ul class="list-inline list-inline-dots mb-0">
							<li class="list-inline-item">
								Copyright © 2023
								<a href="." class="link-secondary">Tabler</a>.
								All rights reserved.
							</li>
							<li class="list-inline-item">
								<a href="./changelog.html" class="link-secondary" rel="noopener">
									v1.0.0-beta20
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</div>

@endsection
