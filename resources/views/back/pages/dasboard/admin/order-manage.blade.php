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
					<!-- Page title actions -->
				</div>
			</div>
		</div>
		<!-- Page body -->
		<div class="page-body">
			<div class="container-xl">
				<x-form-alert />

				<div class="table-responsive" style="height: 65vh">
					<table class="table table-striped">
						<thead>
							<tr>
								{{-- <th class="text-white bg-secondary">id</th> --}}
								{{-- <th class="text-white bg-secondary">UserId</th> --}}
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
									{{-- <td class="text-center">{{ $item->id }}</td> --}}
									{{-- <td class="text-center">{{ $item->userId }}</td> --}}
									<td>{{ $item->orderName }}</td>
									<td>{{ $item->orderPhone }}</td>
									<td>{{ $item->shippingAddress }}</td>
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
