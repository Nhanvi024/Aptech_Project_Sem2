@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")

	<div class="page-wrapper" style="">
		<div class="page-header navbar py-3 mt-0">
			<div class="container-xl">
				<div class="row g-2 align-items-center">
					<div class="col">
						<h2 class="">
							PRODUCTS MANAGEMENT
						</h2>
					</div>
					<!-- Page title actions -->
					<div class="col-auto ms-auto d-print-none">
						<div class="d-flex">
							<a href="{{ route("admin.products.create") }}" class="btn btn-primary" data-bs-toggle="" data-bs-target="#"
								id="textAJAX">
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
					<div class="px-0 my-0">
						<form class="col-12 row mx-0 px-0" method="get">
							<div class="col-3 my-1 input-icon" style="height: fit-content">
								<span class="input-icon-addon ms-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
										stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
										<path d="M21 21l-6 -6"></path>
									</svg>
								</span>
								<input type="text" name="nameFil" id="" class="form-control" placeholder="Enter name to search"
									value="{{ request()->nameFil }}">
							</div>
							<div class="col-3 col-lg-2 my-1">
								<select class="form-select" name="categoryFil" id="">
									<option value="0">-- Category --</option>
									@foreach ($categories as $item)
										<option value="{{ $item->id }}" {{ request()->categoryFil == $item->id ? "selected" : "" }}>
											{{ $item->catName }}
										</option>
									@endforeach
								</select>
							</div>
							<div class="col-3 col-lg-2 my-1">
								<select class="form-select" name="seasonFil" id="">
									<option value="">-- Season --</option>
									<option value='spring' {{ request()->seasonFil == "spring" ? "selected" : "" }}>Spring
									</option>
									<option value='summer' {{ request()->seasonFil == "summer" ? "selected" : "" }}>Summer
									</option>
									<option value='autumn' {{ request()->seasonFil == "autumn" ? "selected" : "" }}>Autumn
									</option>
									<option value='winter' {{ request()->seasonFil == "winter" ? "selected" : "" }}>Winter
									</option>
								</select>
							</div>
							<div class="col-3 col-lg-2 my-1">
								<select class="form-select" name="orderByFil" id="">
									<option value="">-- Order by --</option>
									<option value='1' {{ request()->orderByFil == "1" ? "selected" : "" }}>
										Stock Asc</option>
									<option value='2' {{ request()->orderByFil == "2" ? "selected" : "" }}>
										Stock Desc</option>
									<option value='3' {{ request()->orderByFil == "3" ? "selected" : "" }}>
										Status Active</option>
									<option value='4' {{ request()->orderByFil == "4" ? "selected" : "" }}>
										Status Deactive</option>
								</select>
							</div>

							<div class="col text-end my-1">
								<button type="submit" class=" btn btn-primary" style="width: fit-content">Apply</button>
								<a class="btn btn-warning" style="width: fit-content;"
									href="{{ route("admin.products.resetFilter") }}">Reset</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Page body -->
		<div class="page-body">
			<div class="container-xl">
				<div class="col-12">
					<x-form-alert />
				</div>
				<form action="{{ route("admin.products.proTableActions") }}" method="POST">
					@csrf
					<div>
						<button class="btn btn-sm btn-warning" type="submit" name="action" value="deactive"
							onclick="return confirm('CONFIRM ARE YOU SURE?')">DEACTIVE
							SELECTED</button>
						<button class="btn btn-sm btn-success" type="submit" name="action" value="active">ACTIVE SELECTED</button>
						<span class="btn-group" role="group">
							<button class="btn btn-sm btn-primary border-0" type="submit" name="action" value="reStock">RESTOCK
								SELECTED BY</button>
							<span class="btn btn-sm btn-primary border-0"><input type="text" name="restockValue" id=""
									style="width: 75px; height: 23px;"></span>
						</span>
					</div>
					<div class="table-responsive" style="height: 65vh">
						<table class="table table-hover table-bordered align-middle bg-azure-lt">
							<thead class="sticky-top z-1">
								<tr class="text-center">
									<th class="text-white bg-secondary"><input type="checkbox" style="width: 15px;height: 15px;"
											id="selectAllBox"></th>
									<th class="text-white bg-secondary">ID</th>
									<th class="text-white bg-secondary">Name</th>
									<th class="text-white bg-secondary">Cost</th>
									<th class="text-white bg-secondary">Price</th>
									<th class="text-white bg-secondary">Stock</th>
									<th class="text-white bg-secondary">Discount</th>
									<th class="text-white bg-secondary">Category</th>
									<th class="text-white bg-secondary">Image</th>
									<th class="text-white bg-secondary">Status</th>
									<th class="text-white bg-secondary">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($products as $item)
									<tr class="{{ $item->proActive == 0 ? "bg-secondary-lt" : "" }}">
										<td class="text-center"><input type="checkbox" style="width: 25px;height: 25px;" name="selected_id[]"
												class="selectBox" value="{{ $item->id }}" id=""></td>
										<td>{{ $item->id }}</td>
										<td>{{ $item->proName }}</td>
										<td>{{ $item->proCost }}</td>
										<td>{{ $item->proPrice }}</td>
										<td
											class="{{ $item->proStock > 80 ? "" : ($item->proStock > 30 ? "text-warning" : "fw-bold text-danger") }}">
											{{ $item->proStock }}
										</td>
										<td>{{ $item->proDiscount }}</td>
										<td>{{ $item->category->catName }}</td>
										<td style="width: 100px" class="">
											<img src="{{ asset("storage/products/" . $item->proImageURL[0]) }}" alt="{{ $item->proImageURL[0] }}"
												width="50px" height="50px">
										</td>
										<td>
											@if ($item->proActive == 1)
												<span class="btn btn-sm bg-success text-light">Active</span>
											@else
												<span class="btn btn-sm bg-danger text-light">Inactive</span>
											@endif
										</td>
										<td>
											<a class=" btn btn-sm btn-warning" href="{{ route("admin.products.edit", $item) }}">
												<i class="fa-regular fa-pen-to-square"></i></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</form>

				<!-- Pagination -->
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="mt-2">
							Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results
						</div>
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

	<script>
		$(document).ready(function() {

			$('#selectAllBox').click(function() {
				if ($(this).is(':checked')) {
					$('.selectBox').each(function() {
						$(this).prop('checked', true);
					});
				} else {
					$('.selectBox').each(function() {
						$(this).prop('checked', false);
					});
				}
			});
		});
	</script>

@endsection
