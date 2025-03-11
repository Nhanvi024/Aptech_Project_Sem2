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
				<div class="col-12">
					<div class="card">
						<div class="card-body border-bottom py-3">
							<form method="GET" action="{{ route("admin.user.manage") }}">
								<div class="row">
									<div class=" col-3">
										<label class="form-label">Search</label>
										<input type="text" class="form-control form-control" name="search" value="{{ request("search") }}"
											placeholder="Enter name or code">
									</div>
									<div class="col-3">
										<label class="form-label">Order by</label>
										<select name="orderBy" class="form-select">
											<option value="1" {{ request("orderBy") == "1" ? "selected" : "" }}>Id ASC</option>
											<option value="2" {{ request("orderBy") == "2" ? "selected" : "" }}>Id DESC</option>
											<option value="3" {{ request("orderBy") == "3" ? "selected" : "" }}>Active first</option>
											<option value="4" {{ request("orderBy") == "4" ? "selected" : "" }}>Blocked first</option>
										</select>
									</div>
									<div class="col-3">
										<label class="form-label">Status</label>
										<select name="status" class="form-select">
											<option value="">All status</option>
											<option value='1' {{ request("status") == "1" ? "selected" : "" }}>
												Blocked
											</option>
											<option value='0' {{ request("status") == "0" ? "selected" : "" }}>
												Active
											</option>
										</select>
									</div>
									<div class="col-md-3 d-flex">
										<button type="submit" class="btn btn-primary mt-auto me-2">Apply</button>
										<a href="{{ route("admin.user.manage") }} " class="btn btn-warning mt-auto">Reset</a>
									</div>
							</form>
						</div>
					</div>
				</div>
				<div class="table-responsive" style="height: 65vh">
					<table class="table table-striped tablehover">
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
				<!-- Pagination -->
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="mt-2">
							Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
						</div>
						<div class="pagination-wrap">
							<ul>
								@if ($users->currentPage() > 1)
									<li>
										<a href="{{ $users->appends(request()->except("page"))->previousPageUrl() }}"><i
												class="fas fa-angle-left"></i></a>
									</li>
								@endif
								@if ($users->currentPage() > 3)
									<li>
										<a href="{{ $users->appends(request()->except("page"))->url(1) }}">1</a>
									</li>
									<li> ... </li>
								@endif
								@for ($i = $users->currentPage() - 2; $i <= $users->currentPage() + 2; $i++)
									@if ($i > 0 && $i <= $users->lastPage())
										@if ($users->currentPage() == $i)
											<li>
												<a class="active">{{ $i }}</a>
											</li>
										@else
											<li>
												<a href="{{ $users->appends(request()->except("page"))->url($i) }}">{{ $i }}</a>
											</li>
										@endif
									@endif
								@endfor
								@if ($users->currentPage() < $users->lastPage() - 2)
									<li> ... </li>
									<li>
										<a
											href="{{ $users->appends(request()->except("page"))->url($users->lastPage()) }}">{{ $users->lastPage() }}</a>
									</li>
								@endif
								@if ($users->currentPage() < $users->lastPage())
									<li>
										<a href="{{ $users->appends(request()->except("page"))->nextPageUrl() }}"><i
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
