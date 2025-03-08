@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")

	<div class="page-wrapper" style="">
		<!-- Page header -->
		<div class="page-header navbar mt-0">
			<div class="container-xl">
				<div class="row g-2 align-items-center">
					<div class="col">
						<h1 class="">
							PRODUCTS MANAGEMENT
						</h1>
					</div>
					<!-- Page title actions -->
					<div class="col-auto ms-auto d-print-none">
						<div class="d-flex">
							<!-- Button trigger modal -->
							{{-- <div class="">
								<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addProductModal" id="textAJAX">Test
									AJAX</button>
							</div> --}}
							<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal" id="textAJAX">
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
					<div class="px-0 my-0">
						<form class="col-12 row mx-0 px-0" method="get">
							<div class="col-3 my-1 input-icon" style="height: fit-content">
								<span class="input-icon-addon ms-1">
									<!-- Download SVG icon from http://tabler-icons.io/i/search -->
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
								<a class="btn btn-primary" style="width: fit-content;" href="{{ route("admin.products.resetFilter") }}">Reset
									Filter</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Page body -->
		<div class="page-body">

			<div class="container-xl">
                <x-form-alert />


				<!-- Modal -->
				<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addroductModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="addroductModalLabel">ADD NEW PRODUCT</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								{{-- <form action="{{ route("admin.products.store") }}" id="handleAddProductModal" method="POST" --}}
								<form action="" id="handleAddProductModal" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="">
										<label for="">Name: </label>
										<input class="form-control" type="text" name="proName" id="" placeholder="Enter name"
											value="{{ old("proName") }}">
										<span id="proName" class="text-danger initError"></span>
									</div>
									<div class="">
										<label for="">Cost: </label>
										<input class="form-control" type="text" name="proCost" id="" placeholder="Enter cost"
											value="{{ old("proCost") }}">
										<span id="proCost" class="text-danger initError"></span>
									</div>
									<div class="">
										<label for="">Price: </label>
										<input class="form-control" type="text" name="proPrice" id="" placeholder="Enter price"
											value="{{ old("proPrice") }}">
										<span id="proPrice" class="text-danger initError"></span>
									</div>
									<div class="">
										<label for="">Season: </label>
										<select class="form-select" name="proSeason" id="">
											<option value="">-- Select season --</option>
											<option value="spring" {{ old("proSeason") == "spring" ? "selected" : "" }}>Spring</option>
											<option value="summer" {{ old("proSeason") == "summer" ? "selected" : "" }}>Summer</option>
											<option value="autumn" {{ old("proSeason") == "autumn" ? "selected" : "" }}>Autumn</option>
											<option value="winter" {{ old("proSeason") == "winter" ? "selected" : "" }}>Winter</option>
										</select>
										<span id="proSeason" class="text-danger initError"></span>
									</div>
									<div class="">
										<label for="">Origin: </label>
										<input class="form-control" type="text" name="proOrigin" id="" placeholder="Enter origin">
										<span id="proOrigin" class="text-danger initError"></span>
									</div>
									<div class="">
										<label for="">Stock: </label>
										<input class="form-control" type="number" name="proStock" id="" placeholder="Enter stock">
										<span id="proStock" class="text-danger initError"></span>
									</div>
									<div class="">
										<label for="">Discount: </label>
										<input class="form-control" type="number" name="proDiscount" id="" placeholder="Enter discount">
										<span id="proDiscount" class="text-danger initError"></span>
									</div>
									<div class="">
										<label for="">Category: </label>
										<select class="form-select" name="category_id" id="">
											<option value="">-- Select Category --</option>
											@foreach ($categories as $item)
												<option value="{{ $item->id }}">{{ $item->catName }}</option>
											@endforeach
										</select>
										<span id="category_id" class="text-danger initError"></span>
									</div>
									<div class="">
										<label for="">Image: </label>
										<input class="form-control" multiple type="file" name="image[]" id="">
									</div>
									<div class="">
										<label for="">Description: </label>
										<textarea class="form-control" name="proDescription" id="" rows="4" placeholder="Enter description"></textarea>
										<p id="proDescription" class="text-danger"></p>
									</div>
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary" style="width: fit-content">Save</button>
								</form>
							</div>
						</div>
					</div>
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
					{{-- @dd($products[21]->proImageURL[0]) --}}
					<div class="table-responsive" style="height: 65vh">
						<table class="table  table-hover table-bordered align-middle bg-azure-lt">
							<thead class="sticky-top z-1">
								<tr class="text-center">
									<th class="text-white bg-secondary"><input type="checkbox" id="selectAllBox"></th>
									<th class="text-white bg-secondary">ID</th>
									<th class="text-white bg-secondary">Name</th>
									<th class="text-white bg-secondary">Cost</th>
									<th class="text-white bg-secondary">Price</th>
									<th class="text-white bg-secondary">Season</th>
									<th class="text-white bg-secondary">Origin</th>
									<th class="text-white bg-secondary">Stock</th>
									<th class="text-white bg-secondary">Discount</th>
									<th class="text-white bg-secondary">Sale Status</th>
									<th class="text-white bg-secondary">Category</th>
									<th class="text-white bg-secondary">Image</th>
									{{-- <th class="text-white bg-secondary">Description</th> --}}
									<th class="text-white bg-secondary">Status</th>
									<th class="text-white bg-secondary">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($products as $item)
									<tr class="{{ $item->proActive == 0 ? "bg-secondary-lt" : "" }}">
										<td><input type="checkbox" style="width: 25px;height: 25px;" name="selected_id[]" class="selectBox" value="{{ $item->id }}"
												id=""></td>
										<td>{{ $item->id }}</td>
										<td>{{ $item->proName }}</td>
										<td>{{ $item->proCost }}</td>
										<td>{{ $item->proPrice }}</td>
										<td>{{ $item->proSeason }}</td>
										<td>{{ $item->proOrigin }}</td>
										<td
											class="{{ $item->proStock > 80 ? "" : ($item->proStock > 30 ? "text-warning" : "fw-bold text-danger") }}">
											{{ $item->proStock }}
										</td>
										<td>{{ $item->proDiscount }}</td>
										<td>{{ $item->proSaleStatus }}</td>
										<td>{{ $item->category->catName }}</td>
										<td style="width: 100px" class="">
											<img src="{{ asset("storage/products/" . $item->proImageURL[0]) }}" alt="{{ $item->proImageURL[0] }}"
												width="50px" height="50px">
											{{-- {{dd($item)}} --}}
										</td>
										<td class="">
											<div style="width: 150px;height: 50px;" class="overflow-auto">
												{{ $item->proDescription }}
											</div>
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
											{{-- <button type="button" value={{ $item->id }} class="buttonEditProduct">Edit</button> --}}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</form>
			</div>
		</div>

		<!-- Page foot -->
		@include("back.layouts.inc.footer")
		<!-- End Page foot -->

	</div>

	<script>
		$(document).ready(function() {
			$('#handleAddProductModal').on('submit', function(e) {
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url: "{{ route("admin.products.store") }}",
					type: 'POST',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success: function(response) {
						console.log(response);
						alert('Product added successfully');
						window.location.href = "{{ route("admin.products.index") }}";
					},
					error: function(error) {
						let resp = error.responseJSON.errors;
						console.log(resp);
						$('.initError').html('');
						for (index in resp) {
							console.log(resp[index]);
							$("#" + index).html(resp[index]);
						}
					}
				});
			});
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
