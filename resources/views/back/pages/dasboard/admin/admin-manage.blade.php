@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")
	<div class="page-wrapper">
		<x-form-alert />

		<!-- Page header -->
		<div class="page-header d-print-none">
			<div class="container-xl">
				<div class="row g-2 align-items-center">
					<div class="col">
						<h2 class="page-title">
							Admins
						</h2>
					</div>
					<!-- Page title actions -->
					<div class="col-auto ms-auto d-print-none">
						<div class="d-flex">
							<input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search …">
							@if (Auth::user()->role == "superAdmin")
								<btn class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal" id="textAJAX">
									<!-- Download SVG icon from http://tabler-icons.io/i/plus -->
									<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
										stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path d="M12 5l0 14"></path>
										<path d="M5 12l14 0"></path>
									</svg>
									New Admin
								</btn>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- End Page header --}}

		{{-- Add admin Modal --}}
		<div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="addAdminModalLabel">ADD NEW ADMIN</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="" id="handleAddAdminModal" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="">
								<label for="">Username: </label>
								<input class="form-control" type="text" name="username" placeholder="Enter username"
									value="{{ old("username") }}">
								<span id="username" class="text-danger initError"></span>
							</div>
							<div class="">
								<label for="">Email: </label>
								<input class="form-control" type="text" name="email" placeholder="Enter email" value="{{ old("email") }}">
								<span id="email" class="text-danger initError"></span>
							</div>
							<div class="">
								<label for="">Role: </label>
								<select class="form-select" name="role">
									<option value="">-- Select Role --</option>
									<option value="admin">Admin</option>
									<option value="superAdmin">SuperAdmin</option>
								</select>
								<span id="role" class="text-danger initError"></span>
							</div>

							<div class="">
								<label for="">Password: </label>
								<input class="form-control inpPassword" autocomplete="false" type="password" name="password"
									placeholder="Enter password">
								<label for="">Confirm Password: </label>
								<input class="form-control inpPassword" autocomplete="false" type="password" name="password_confirmation"
									placeholder="Confirm Password">
								<span id="password" class="text-danger initError"></span>
							</div>
							<div class="">
							</div>
							<br>
							<div class="form-check">
								<label for="">Show password</label>
								<input type="checkbox" name="" id="showPassword">
							</div>
							<hr>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" style="width: fit-content">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End Add admin Modal -->
		<!-- Page body -->
		<div class="page-body">
			<div class="container-xl">
				<div class="row row-cards">
					@foreach ($admins as $admin)
						{{-- @dd(Auth::user()->role) --}}
						<div class="col-md-6 col-lg-3 mb-2">
							<div class="card">
								<div class="card-body p-4 text-center">
									<span class="avatar avatar-xl mb-3 rounded" style="background-image: url({{ $admin->getAvatar() }})"></span>
									<h3 class="m-0 mb-1"><a href="#">{{ $admin->username }}</a></h3>
									<div class="text-secondary">{{ $admin->email }}</div>
									<div class="mt-3">
										<span class="badge bg-purple-lt">{{ $admin->role }}</span>
									</div>
									<div class="">
										@if (Auth::user()->role == "superAdmin")
											<button value="{{ $admin->id }}"
												class="inpBlock btn {{ $admin->blocked ? "btn-danger" : "btn-primary" }}">{{ $admin->blocked ? "Blocked" : "Active" }}</button>
										@else
											<button
												class="btn {{ $admin->blocked ? "btn-danger" : "btn-primary" }}">{{ $admin->blocked ? "Blocked" : "Active" }}</button>
										@endif
									</div>
								</div>
								<div class="text-center mb-2">
									@if (Auth::user()->role == "superAdmin")
										<a class="btn btn-primary" href={{ route("admin.admin.changePassword", $admin->id) }}>Change Password</a>
									@endif
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- End Page body -->

		<!-- Page foot -->
		@include("back.layouts.inc.footer")
		<!-- End Page foot -->
	</div>

	<script>
		$(document).ready(function() {
			// Add admin form validation

			$('#handleAddAdminModal').on('submit', function(e) {
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url: "{{ route("admin.admin.store") }}",
					type: 'POST',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success: function(response) {
						console.log(response);
						alert('New Admin added successfully');
						window.location.href = "{{ route("admin.admin.manage") }}";
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
			//change admin password
			$('#handleChangeAdminPasswordModal').on('submit', function(e) {
				e.preventDefault();
			});
			// Show/hide password
			$("#showPassword").click(function() {
				if ($(this).is(":checked")) {
					$(".inpPassword").attr("type", "text");
				} else {
					$(".inpPassword").attr("type", "password");
				}
			});
			// Toggle admin status
			$('.inpBlock').on('click', function(e) {
				e.preventDefault();
				let adminId = $(this).val();
				$.ajax({
					url: 'changeblocked/' + adminId,
					type: 'GET',
					success: function(response) {
						// alert('Admin status updated successfully');
						// alert(response);
						location.reload();
					},
					error: function(error) {
						console.log(error);
						alert('Failed to update admin status');
					}
				});
			})
		});
	</script>
@endsection
