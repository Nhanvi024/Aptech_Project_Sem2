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
