@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")
	<div class="page-wrapper">
		<div class="page-header d-print-none">
			<div class="container-xl">
				<div class="row g-2 align-items-center">
					<div class="col">
						<h2 class="page-title">
							DISCOUNTS MANAGEMENT
						</h2>
					</div>
					<!-- Page title actions -->
					<div class="col-auto ms-auto d-print-none">
						<div class="btn-list">
							<div class="ms-auto text-secondary">
								<a href="{{ route("admin.discount.create") }}" class="btn btn-6 btn-outline-primary w-100">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
										stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M12 5l0 14"></path>
										<path d="M5 12l14 0"></path>
									</svg>
									Add new Discount
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Page body -->
		<div class="page-body">
			<div class="container-xl">
				<div class="col-12">
					<div class="card">
						<div class="card-body border-bottom py-3">
							<form method="GET" action="{{ route("admin.discount.index") }}">
								<div class="row">
									<div class=" col-3">
										<label class="form-label">Search</label>
										<input type="text" class="form-control form-control" name="search" value="{{ request("search") }}"
											placeholder="Enter name or code">
									</div>
									<div class="col-3">
										<label class="form-label">Type</label>
										<select name="type" class="form-select">
											<option value="">Choose type</option>
											<option value= 'fixed' {{ request("type") == "fixed" ? "selected" : "" }}>
												Fixed Price</option>
											<option value= 'percent' {{ request("type") == "percent" ? "selected" : "" }}>
												Percents</option>
										</select>
									</div>
									<div class="col-3">
										<label class="form-label">Status</label>
										<select name="status" class="form-select">
											<option value="">Choose status</option>
											<option value= '1' {{ request("status") == "1" ? "selected" : "" }}>
												Active
											</option>
											<option value= '0' {{ request("status") == "0" ? "selected" : "" }}>
												Disabled
											</option>
										</select>
									</div>
									<div class="col-md-3 d-flex">
										<button type="submit" class="btn btn-primary mt-auto me-2">Apply</button>
										<a href="{{ route("admin.discount.index") }} " class="btn btn-warning mt-auto">Reset</a>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table card-table table-striped table-hover table-vcenter text-nowrap datatable">
					<thead>
						<th>ID </th>
						<th>code</th>
						<th>Name</th>
						<th>Type</th>
						<th>Value</th>
						<th>Max Value</th>
						<th>Quantity</th>
						<th>Condition</th>
						<th>Uses/user</th>
						<th>Start date</th>
						<th>End date</th>
						<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($discounts as $discount)
							<tr>
								<td>
									{{ $discount->id }}
								</td>
								<td>
									{{ $discount->code }}
								</td>
								<td>
									{{ $discount->name }}
								</td>
								<td>
									{{ $discount->type }}
								</td>
								<td>
									{{ $discount->discount_value }}
								</td>
								<td>
									{{ $discount->max_discount_value }}
								</td>
								<td>
									{{ $discount->quantity }}
								</td>
								<td>
									{{ $discount->condition }}
								</td>
								<td>
									{{ $discount->max_uses }}
								</td>
								<td>
									{{ $discount->starts_at }}
								</td>
								<td>
									{{ $discount->expires_at }}
								</td>
								<td>
									@if ($discount->status)
										<a href="{{ route("admin.discount.update", $discount->id) }}"><button
												class="btn btn-sm btn-success">Active</button></a>
									@else
										<a href="{{ route("admin.discount.update", $discount->id) }}"><button
												class="btn btn-sm btn-danger">Disabled</button></a>
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<!-- Pagination -->
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="mt-2">
						Showing {{ $discounts->firstItem() }} to {{ $discounts->lastItem() }} of {{ $discounts->total() }} results
					</div>
					<div class="pagination-wrap">
						<ul>
							@if ($discounts->currentPage() > 1)
								<li>
									<a href="{{ $discounts->appends(request()->except("page"))->previousPageUrl() }}"><i
											class="fas fa-angle-left"></i></a>
								</li>
							@endif
							@if ($discounts->currentPage() > 3)
								<li>
									<a href="{{ $discounts->appends(request()->except("page"))->url(1) }}">1</a>
								</li>
								<li> ... </li>
							@endif
							@for ($i = $discounts->currentPage() - 2; $i <= $discounts->currentPage() + 2; $i++)
								@if ($i > 0 && $i <= $discounts->lastPage())
									@if ($discounts->currentPage() == $i)
										<li>
											<a class="active">{{ $i }}</a>
										</li>
									@else
										<li>
											<a href="{{ $discounts->appends(request()->except("page"))->url($i) }}">{{ $i }}</a>
										</li>
									@endif
								@endif
							@endfor
							@if ($discounts->currentPage() < $discounts->lastPage() - 2)
								<li> ... </li>
								<li>
									<a
										href="{{ $discounts->appends(request()->except("page"))->url($discounts->lastPage()) }}">{{ $discounts->lastPage() }}</a>
								</li>
							@endif
							@if ($discounts->currentPage() < $discounts->lastPage())
								<li>
									<a href="{{ $discounts->appends(request()->except("page"))->nextPageUrl() }}"><i
											class="fas fa-angle-right"></i></a>
								</li>
							@endif
						</ul>
					</div>

				</div>
			</div>
			<!-- End Pagination -->

			{{-- Pagination contact --}}
			{{-- {{ $discounts->links('pagination.pagination') }} --}}
		</div>

	@endsection
