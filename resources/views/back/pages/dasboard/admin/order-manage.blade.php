@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")

	<div class="page-wrapper">
		<!-- Page header -->
		<div class="page-header d-print-none">
			<div class="container-xl">
				<div class="row g-2 align-items-center">
					<div class="col">
						<h2 class="page-title">
							ORDERS MANAGEMENT
						</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- Page body -->
		<div class="page-body">
			<div class="container-xl">
				<div class="col-12">
					<div class="card mb-3">
						<div class="card-body border-bottom">
							<form method="GET" action="{{ route("admin.order.manage") }}">
								<div class="row">
									<div class="col-3">
										<label class="form-label">Status</label>
										<select name="status" class="form-select">
											<option value="">All status</option>
											<option value= '0' {{ request("status") == "0" ? "selected" : "" }}>
												Pending
											</option>
											<option value= '1' {{ request("status") == "1" ? "selected" : "" }}>
												Finished
											</option>
										</select>
									</div>
									<div class="col-3">
										<label class="form-label">Time</label>
										<select name="time" class="form-select">
											<option value= '' {{ request("time") == "" ? "selected" : "" }}>
												All time
											</option>
											<option value= 'today' {{ request("time") == "today" ? "selected" : "" }}>
												Today
											</option>
											<option value= 'yesterday' {{ request("time") == "yesterday" ? "selected" : "" }}>
												Yesterday
											</option>
											<option value= 'week' {{ request("time") == "week" ? "selected" : "" }}>
												This week
											</option>
											<option value= 'month' {{ request("time") == "month" ? "selected" : "" }}>
												This month
											</option>
											<option value= 'year' {{ request("time") == "year" ? "selected" : "" }}>
												This year
											</option>
											{{-- options today, yesterday, week, month, year --}}

										</select>
									</div>
									<div class="col-md-3 d-flex">
										<button type="submit" class="btn btn-primary mt-auto me-2">Apply</button>
										<a href="{{ route("admin.order.manage") }} " class="btn btn-warning mt-auto">Reset</a>
									</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-12">
					<x-form-alert />
				</div>

				<div class="table-responsive" style="height: 65vh">
					<table class="table table-striped table-hover text-nowrap">
						<thead class="sticky-top z-1">
							<tr>
								<th class="text-white bg-secondary text-center">id</th>
								<th class="text-white bg-secondary text-center">User</th>
								<th class="text-white bg-secondary">Order Name</th>
								<th class="text-white bg-secondary">Order Phone</th>
								<th class="text-white bg-secondary">Shipping Address</th>
								<th class="text-white bg-secondary">Final Price</th>
								<th class="text-white bg-secondary">Status</th>
								<th class="text-white bg-secondary">Order Date</th>
								<th class="text-white bg-secondary">Deliver Date</th>
								<th class="text-white bg-secondary">Payment Id</th>
								<th class="text-white bg-secondary">Details</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($orders as $item)
								<tr class="">
									<td class="text-center">{{ $item->id }}</td>
									<td class="text-center">{{ $item->userId ?: "Guess" }}</td>
									<td>{{ $item->orderName }}</td>
									<td>{{ $item->orderPhone }}</td>
									<td>{{ Str::limit($item->shippingAddress, 15, " ...") }}</td>
									<td>{{ $item->finalPrice }}</td>
									<td
										class="h5 {{ -now()->addHours(7)->diffInHours($item->orderDate) > 2 && $item->status == 0 ? "text-danger " : " " }} {{ $item->status == 1 ? "text-success " : " " }}">
										{{ $item->status == 0 ? "Pending" : "Finished" }}</td>
									<td
										class="{{ -now()->addHours(7)->diffInHours($item->orderDate) > 2 && $item->status == 0 ? "text-danger " : "" }}">
										{{ $item->orderDate }}</td>
									<td>{{ $item->deliveryDate }}</td>
									<td>{{ $item->payment_id }}</td>
									<td>
										{{-- <a href={{ route("", $item) }}> --}}
										<a href="/admin/orderDetails/{{ $item->id }}">
											<span class="badge bg-success-lt">Details</span>
										</a>
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
							Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} results
						</div>
						<div class="pagination-wrap">
							<ul>
								@if ($orders->currentPage() > 1)
									<li>
										<a href="{{ $orders->appends(request()->except("page"))->previousPageUrl() }}"><i
												class="fas fa-angle-left"></i></a>
									</li>
								@endif
								@if ($orders->currentPage() > 3)
									<li>
										<a href="{{ $orders->appends(request()->except("page"))->url(1) }}">1</a>
									</li>
									<li> ... </li>
								@endif
								@for ($i = $orders->currentPage() - 2; $i <= $orders->currentPage() + 2; $i++)
									@if ($i > 0 && $i <= $orders->lastPage())
										@if ($orders->currentPage() == $i)
											<li>
												<a class="active">{{ $i }}</a>
											</li>
										@else
											<li>
												<a href="{{ $orders->appends(request()->except("page"))->url($i) }}">{{ $i }}</a>
											</li>
										@endif
									@endif
								@endfor
								@if ($orders->currentPage() < $orders->lastPage() - 2)
									<li> ... </li>
									<li>
										<a
											href="{{ $orders->appends(request()->except("page"))->url($orders->lastPage()) }}">{{ $orders->lastPage() }}</a>
									</li>
								@endif
								@if ($orders->currentPage() < $orders->lastPage())
									<li>
										<a href="{{ $orders->appends(request()->except("page"))->nextPageUrl() }}"><i
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
@endsection
