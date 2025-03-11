@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")

	<div class="page-wrapper">
		<!-- Page header -->
		<div class="page-header my-3">
			<div class="container-xl">
				<div class="row g-2">
					<div class="col">
						<h2 class="">
							CATEGORIES MANAGEMENT
						</h2>
					</div>
					<!-- Page title actions -->
					<div class="col-auto">
						<div class="d-flex">
							<a href="{{ route("admin.products.create") }}" class="btn btn-primary">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
									stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M12 5l0 14"></path>
									<path d="M5 12l14 0"></path>
								</svg>
								Add Category
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Page body -->
		<div class="page-body mt-0">
			<div class="container-xl">
				<div class="table-responsive">
					<table class="table table-striped table-hover table-bordered align-middle bg-azure-lt">
						<thead>
							<tr>
								<th class="text-white bg-secondary">ID</th>
								<th class="text-white bg-secondary">Name</th>
								<th class="text-white bg-secondary">Status</th>
								<th class="text-white bg-secondary">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($categories as $item)
								<tr>
									<td>{{ $item->id }}</td>
									<td>{{ $item->catName }}</td>
									<td>
										@if ($item->catStatus == 1)
											<span class="badge bg-success text-white">Active</span>
										@else
											<span class="badge bg-danger text-white">Inactive</span>
										@endif
									</td>
									<td class="text-end">
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- End Page body -->


	</div>
@endsection
