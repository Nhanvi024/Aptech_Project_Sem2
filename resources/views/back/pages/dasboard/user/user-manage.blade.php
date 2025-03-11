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
							USERS MANAGEMENT
						</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- Page body -->
		<div class="page-body">
			<div class="container-xl">
				{{-- <div class="px-0 my-0">
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
							<select class="form-select" name="orderByFil" id="">
								<option value="">-- Order by --</option>
								<option value='1' {{ request()->orderByFil == "1" ? "selected" : "" }}>
									level Asc</option>
								<option value='2' {{ request()->orderByFil == "2" ? "selected" : "" }}>
									level Desc</option>
								<option value='3' {{ request()->orderByFil == "3" ? "selected" : "" }}>
									Status Active</option>
								<option value='4' {{ request()->orderByFil == "4" ? "selected" : "" }}>
									Status Blocked</option>
							</select>
						</div>
						<div class="col text-end my-1">
							<button type="submit" class=" btn btn-primary" style="width: fit-content">Apply</button>
							<a class="btn btn-primary" style="width: fit-content;" href="{{ route("admin.products.resetFilter") }}">Reset
								Filter</a>
						</div>
					</form>
				</div> --}}
				<div class="table-responsive" style="height: 65vh">
					<table class="table table-striped">
						<thead>
							<tr class="bg-danger">
								<th class="text-white bg-secondary">id</th>
								<th class="text-white bg-secondary">Username</th>
								<th class="text-white bg-secondary">Email</th>
								<th class="text-white bg-secondary">Gender</th>
								<th class="text-white bg-secondary">Phone</th>
								<th class="text-white bg-secondary">Address</th>
								<th class="text-white bg-secondary">Created_at</th>
								<th class="text-white bg-secondary">Blocked</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $item)
								<tr class="{{ $item->blocked == 1 ? "bg-secondary-lt" : "" }}">
									<td>{{ $item->id }}</td>
									<td>{{ $item->username }}</td>
									<td>{{ $item->email }}</td>
									<td>
										{{ $item->gender == 0 ? "Female" : ($item->gender == 1 ? "Male" : "Prefer not to say") }}
									</td>
									<td>{{ $item->phone }}</td>
									<td>{{ $item->address }}</td>
									<td>{{ $item->created_at }}</td>
									<td>
										<a href={{ route("admin.users.changeBlocked", $item) }}>

											@if ($item->blocked == 1)
												<span class="badge bg-danger-lt">Blocked</span>
											@else
												<span class="badge bg-success-lt">-</span>
											@endif
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>


	</div>
@endsection
