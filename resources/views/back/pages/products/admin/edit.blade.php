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
							EDIT AND UPDATE PRODUCT
						</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- Page body -->
		<div class="page-body">

			<div class="container-xl">
				<x-form-alert />

				<form action="{{ route("admin.products.update", $product) }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method("PUT")
					<div class="">
						<label for="">Name: </label>
						<input class="form-control" type="text" name="proName" id="" placeholder="Enter name"
							value="{{ old(" proName", $product->proName) }}">
						@error("proName")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Cost: </label>
						<input class="form-control" type="text" name="proCost" id="" placeholder="Enter cost"
							value="{{ old(" proCost", $product->proCost) }}">
						@error("proCost")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Price: </label>
						<input class="form-control" type="text" name="proPrice" id="" placeholder="Enter price"
							value="{{ old(" proPrice", $product->proPrice) }}">
						@error("proPrice")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Season: </label>
						<select class="form-select" name="proSeason" id="">
							<option value="">-- Select season --</option>
							<option value="spring" {{ old("proSeason", $product->proSeason) == "spring" ? "selected" : "" }}>Spring
							</option>
							<option value="summer" {{ old("proSeason", $product->proSeason) == "summer" ? "selected" : "" }}>Summer
							</option>
							<option value="autumn" {{ old("proSeason", $product->proSeason) == "autumn" ? "selected" : "" }}>Autumn
							</option>
							<option value="winter" {{ old("proSeason", $product->proSeason) == "winter" ? "selected" : "" }}>Winter
							</option>
						</select>
						@error("proSeason")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Origin: </label>
						<input class="form-control" type="text" name="proOrigin" id="" placeholder="Enter origin"
							value={{ old("proOrigin", $product->proOrigin) }}>
						@error("proOrigin")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Stock: </label>
						<input class="form-control" type="number" name="proStock" id="" placeholder="Enter stock"
							value={{ old("proStock", $product->proStock) }}>
						@error("proStock")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Discount: </label>
						<input class="form-control" type="number" name="proDiscount" id="" placeholder="Enter discount"
							value={{ old("proDiscount", $product->proDiscount) }}>
						@error("proDiscount")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Category: </label>
						<select class="form-select" name="category_id" id="">
							<option value="">-- Select Category --</option>
							@foreach ($categories as $item)
								<option value="{{ $item->id }}"
									{{ old("category_id", $product->category_id) == $item->id ? "selected" : "" }}>
									{{ $item->catName }}</option>
							@endforeach
						</select>
						@error("category_id")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="my-3">
						<label for="">Old image:</label>
						<div class="row">
							@foreach ($product->proImageURL as $image)
								<div class="col-2 text-center d-flex flex-column border mx-auto">
									<img class="mx-auto" src="{{ asset("storage/products/" . $image) }}" alt="{{ $image }}" width="150px"
										height="150px">
									<button proId={{ $product->id }} value={{ $image }}
										class="btn rounded bg-secondary-lt text-black mt-1 mx-auto
                                btnImageRemove">Remove</button>

									<button proId={{ $product->id }} value={{ $image }}
										class="btn rounded bg-primary-subtle mt-1 mx-auto btnImageSetMain">Set
										main</button>
								</div>
							@endforeach
						</div>
					</div>
					@if (count($product->proImageURL) < 5)
						<div class="my-3">
							<label for="">Add new images: </label>
							<input class="form-control" multiple type="file" name="image[]" id="">
						</div>
					@endif
					<div class="">
						<label for="">Description: </label>
						<textarea class="form-control" name="proDescription" id="" rows="4" placeholder="Enter description">{{ old("proDescription", $product->proDescription) }}</textarea>
						@error("proDescription")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					{{-- <div class="">
                    <label for="">Status: </label>
                    <select class="form-select" name="active" id="">
                        <option value="">-- Status --</option>
                        <option value='1'>Active</option>
                        <option value='0'>Inactive</option>
                    </select>
                </div> --}}
					<hr>
					<button type="submit" class="btn btn-primary" style="width: fit-content">Save</button>
					<a href="/admin/products" class="btn btn-warning">Cancel</a>
				</form>
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
										height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
										stroke-linecap="round" stroke-linejoin="round">
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
	<script>
		$(document).ready(function() {
			// Delete image
			$(".btnImageRemove").click(function(e) {
				e.preventDefault();
				// alert("btnImageRemove clicked");
				console.log("btnImageRemove clicked");
				var image = $(this).val();
				var proId = $(this).attr("proId");
				console.log(image + ", " + proId);
				$.ajax({
					url: '/admin/products/removeImage/' + proId + '/' + image,
					success: function(response) {
						console.log(response.message);
						location.reload();
					},
					error: function(error) {
						console.log(error);
					}
					// $.ajax({
				})
			});
			// Set main image
			$(".btnImageSetMain").click(function(e) {
				e.preventDefault();
				// alert("btnImageSetMain clicked");
				console.log("btnImageSetMain clicked");
				var image = $(this).val();
				var proId = $(this).attr("proId");
				console.log(image + ", " + proId);
				$.ajax({
					url: '/admin/products/setMainImage/' + proId + '/' + image,
					success: function(response) {
						console.log(response.message);
						location.reload();
					},
					error: function(error) {
						console.log(error);
					}
					// $.ajax({
				})
			});
		});
	</script>

@endsection
