@extends("front.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")
	<div class="" style="height: 105px;background: #051922"></div>
	<div class="text-center my-5">
		<a href="." class="navbar-brand navbar-brand-autodark">
			<img src="/assets/img/logo.png" style="scale: 2" width="" height="" alt="Tabler" class="navbar-brand-image">
		</a>
	</div>

	{{-- <div class="row justify-content-center w-75 mx-auto"> --}}
	{{-- @dd($user) --}}
	<div class="product-section mt-100 mb-100">
		<div class="container">
			<div class="col-md-6 mx-auto">
				<x-form-alert />
				<div class="card">
					<div class="card-header">{{ $user->name }}'s profile</div>
					<div class="card-body">
						<form method="POST" action={{ route("user.user.profileUpdate") }}>
							@csrf
							@method("put")
							<div class="form-group">
								<label for="name"><span class="text-danger">*</span>Name</label>
								<input type="text" maxlength="255" class="form-control" id="name" name="name"
									value="{{ old("name", (string) $user->name) }}" disabled>
								@error("name")
									<span class="text-danger">*** {{ $message }} </span>
								@enderror
							</div>
							<div class="form-group">
								<label for="">Gender</label>
								<select class="form-control" id="gender" name="gender" disabled>
									<option value=2>-- Select gender --</option>
									<option value=0 {{ old("gender", $user->gender) == 0 ? "selected" : "" }}>Male</option>
									<option value=1 {{ old("gender", $user->gender) == 1 ? "selected" : "" }}>Female</option>
									<option value=2 {{ old("gender", $user->gender) == 2 ? "selected" : "" }}>Prefer not to say (default)</option>
								</select>
							</div>
							<div class="form-group">
								<label for="dob"><span class="text-danger">*</span>Date of Birth</label>
								<input type="date" class="form-control" id="dob" name="dob" value="{{ old("dob", $user->dob) }}"
									disabled>
								@error("dob")
									<span class="text-danger">*** {{ $message }} </span>
								@enderror
							</div>
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" maxlength="255" class="form-control" id="address" disabled name="address"
									value="{{ old("address", $user->address) }}">
								@error("address")
									<span class="text-danger">*** {{ $message }} </span>
								@enderror
							</div>
							<div class="form-group">
								<label for="phone"></span>Phone</label>
								<input type="text" class="form-control" maxlength="16" id="phone" disabled name="phone"
									value="{{ old("phone", $user->phone) }}">
								@error("phone")
									<span class="text-danger">*** {{ $message }} </span>
								@enderror
							</div>
							<button type="submit" class="btn btn-success form-btn d-none">Save</button>
							<a href={{ route("user.user.profile") }} class="btn btn-warning form-btn d-none">Cancel</a>
						</form>
						<hr>
						<button id="buttonEditProfile" class="btn btn-primary">Edit profile</button>
						<a href="{{ route("user.user.profileUpdatePassword") }}" type="submit" class="btn btn-warning">Change
							password</a>
						<hr>
						<div class="form-group">
							<label for="email"></span>Email</label>
							<div class="form-control bg-light text-muted">{{ $user->email }}</div>
						</div>
						<div class="form-group">
							<label for="username"></span>Username</label>
							<div class="form-control bg-light text-muted">{{ $user->username }}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- </div> --}}
	<script>
		$(document).ready(function() {
			// remove character from phone number
			$('#name').on('input', function() {
				$(this).val($(this).val().replace(/[^a-z ]/gi, ''));
			});
			$('#phone').on('input', function() {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
			$('#address').on('input', function() {
				$(this).val($(this).val().replace(/[^a-z0-9#'.,-/ ]/gi, ''));
			});
			$('#buttonEditProfile').on('click', function() {
				$('.form-btn').removeClass('d-none');
				$('.form-control').removeAttr('disabled');
				$('#buttonEditProfile').addClass('d-none');
			})
			$('#showPassword').change(function() {
				if ($(this).is(':checked')) {
					$('#newPassword').attr('type', 'text');
					$('#confirmNewPassword').attr('type', 'text');
				} else {
					$('#newPassword').attr('type', 'password');
					$('#confirmNewPassword').attr('type', 'password');
				}
			});

		});
	</script>
@endsection
