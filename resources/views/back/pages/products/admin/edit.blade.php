@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")

	<div class="page-wrapper">
		<!-- Page header -->
		<div class="page-header d-print-none">
			<div class="container-xl bg-success-subtle">
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
		<div class="page-body bg-primary-subtle">
			<div class="container-xl">
				page body
				<h1>ĐÂY LÀ EDIT PAGE</h1>
				<table class="table table-striped table-bordered">
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
					{{-- @dd($product) --}}
					<tr>
						<form action="">

							<td class="text-center">
								<input class="border-0 text-center bg-transparent" style="width: 30px" type="" name=""
									id="" value="{{ $product->id }}" disabled>
							</td>
							<td>
								<input type="text" name="" id="" value="{{ $product->proName }}">
							</td>
							<td>{{ $product->proPrice }}</td>
							<td class="{{ $product->proStock > 80 ? "" : ($product->proStock > 30 ? "text-warning" : "text-danger") }}">
								{{ $product->proStock }}
							</td>
							<td>{{ $product->proDiscount }}</td>
							<td>{{ $product->category->catName }}</td>
							<td>
								<img src="{{ asset($product->proImageURL) }}" alt="{{ $product->proImageURL }}" width="100px" height="100px">
							</td>
							<td>{{ $product->proDescription }}</td>
							<td>
								@if ($product->proStatus == 1)
									<a class="badge bg-success" href="{{ route("admin.products.changeStatus", $product) }}">Active</a>
								@else
									<a class="badge bg-danger" href="{{ route("admin.products.changeStatus", $product) }}">Inactive</a>
								@endif
							</td>
							<td>
								<a href="#" class="btn btn-warning btn-sm">EDIT</a>
							</td>
						</form>
					</tr>

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
