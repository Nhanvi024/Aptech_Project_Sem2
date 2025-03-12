@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")

	<div class="page-wrapper">
		<!-- Page header -->
		<div class="page-header d-print-none mb-0 sticky-top" style="top: 55px">
			<div class="container-xl">
				<div class="row g-2 align-items-center">
					<div class="col">
						<h1 class="">
							ADD NEW PRODUCT
						</h1>
					</div>
				</div>
			</div>
		</div>
		<!-- Page body -->
		<div class="page-body mt-0">
			<div class="container-xl">
				<x-form-alert />

				<form action="{{ route("admin.products.store") }}" method="POST" enctype="multipart/form-data">
					{{-- <form action="" id="handleAddProductModal" method="POST" enctype="multipart/form-data"> --}}
					@csrf
					<div class="">
						<label for="">Name: </label>
						<input class="form-control" type="text" name="proName" id="" placeholder="Enter name"
							value="{{ old("proName") }}">
						@error("proName")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Cost: </label>
						<input class="form-control" type="number" min="0.01" max="999999" step="0.01" name="proCost"
							id="" placeholder="Enter cost" value="{{ old("proCost") }}">
						@error("proCost")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Price: </label>
						<input class="form-control" type="number"min="0.01" max="999999" step="0.01" name="proPrice" id=""
							placeholder="Enter price" value="{{ old("proPrice") }}">
						@error("proPrice")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
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
						@error("proSeason")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Origin: </label>
						<input class="form-control" type="text" name="proOrigin" id="" placeholder="Enter origin"
							value="{{ old("proOrigin") }}">
						@error("proOrigin")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Stock: </label>
						<input class="form-control" type="number" name="proStock" id="" placeholder="Enter stock"
							value="{{ old("proStock") }}">
						@error("proStock")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Discount: </label>
						<input class="form-control" type="number" name="proDiscount" id="" placeholder="Enter discount"
							value="{{ old("proDiscount") }}">
						@error("proDiscount")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Category: </label>
						<select class="form-select" name="category_id" id="">
							<option value="">-- Select Category --</option>
							@foreach ($categories as $item)
								<option value="{{ $item->id }}" {{ old("category_id") == $item->id ? "selected " : " " }}>
									{{ $item->catName }}
								</option>
							@endforeach
						</select>
						@error("category_id")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Image: </label>
						<input class="form-control" multiple type="file" name="image[]" id="">
						@error("image")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="">
						<label for="">Description: </label>
						<textarea class="form-control" name="proDescription" id="" rows="4" placeholder="Enter description">{{ old("proDescription") }}</textarea>
						<p id="proDescription" class="text-danger"></p>
						@error("proDescription")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<hr>
					<a href="/admin/products" class="btn btn-secondary">Back</a>
					<button type="submit" class="btn btn-primary" style="width: fit-content">Save</button>
				</form>
			</div>
		</div>

	</div>

@endsection
