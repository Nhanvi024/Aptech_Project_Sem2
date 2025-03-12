@extends("front.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")
	<div class="" style="height: 105px;background: #051922"></div>
	<div class="text-center my-5">
		<a href="." class="navbar-brand navbar-brand-autodark">
			<img src="/assets/img/logo.png" style="scale: 2" width="" height="" alt="Tabler" class="navbar-brand-image">
		</a>
	</div>

	<x-form-alert />

	<div class="row justify-content-center w-75 mx-auto">
		<div class="col-md-6">
			<div class="card mb-100">
				<div class="card-header text-center h2">Join Fruitkha</div>
				<div class="card-body">
					<form method="POST" action={{ route("user.user.registerPost") }} enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name"><span class="text-danger">*</span>Full name:</label>
							<input type="text" maxlength="255" class="form-control" id="name" name="name"
								value={{ old("name") }}>
							@error("name")
								<span class="text-danger">*** {{ $message }} </span>
							@enderror
						</div>

						<div class="form-group">
							<label for="gender">Gender:</label>
							<select class="form-control" id="gender" name="gender">
								<option value=2>-- Select gender --</option>
								<option value=0 {{ old("gender", 2) == 0 ? "selected" : "" }}>Male</option>
								<option value=1 {{ old("gender") == 1 ? "selected" : "" }}>Female</option>
								<option value=2 {{ old("gender") == 2 ? "selected" : "" }}>Prefer not to say (default)</option>
							</select>
						</div>
						<div class="form-group">
							<label for=""><span class="text-danger">*</span>Date of Birth:</label>
							<input type="date" class="form-control" id="dob" name="dob" value={{ old("dob") }}>
							{{-- <span id="dob" class="text-danger initError"></span> --}}
							@error("dob")
								<span class="text-danger">*** {{ $message }} </span>
							@enderror
						</div>
						<div class="form-group">
							<label for="username"><span class="text-danger">*</span>Username:</label>
							<input type="text" maxlength="255" class="form-control" id="username" autocomplete="on" name="username"
								value={{ old("username") }}>
							@error("username")
								<span class="text-danger">*** {{ $message }} </span>
							@enderror
						</div>
						<div class="form-group">
							<label for="email"><span class="text-danger">*</span>Email:</label>
							<input type="email" class="form-control" id="email" maxlength="255" name="email" autocomplete="on"
								value={{ old("email") }}>
							@error("email")
								<span class="text-danger">*** {{ $message }} </span>
							@enderror
						</div>
						<div class="form-group">
							<label for="passwordValue"><span class="text-danger">*</span>Password: </label>
							<input id="passwordValue" class="form-control inpPassword" autocomplete="off" type="password" name="password"
								placeholder="Enter password">
							<label for="passwordConfirm"><span class="text-danger">*</span>Confirm Password: </label>
							<input id="passwordConfirm" class="form-control" autocomplete="off" type="password" name="password_confirmation"
								placeholder="Confirm Password">
							{{-- <span id="password" class="text-danger initError"></span> --}}
							@error("password")
								<span class="text-danger">*** {{ $message }} </span>
							@enderror
							<small id="passwordHelp" class="form-text text-muted">Password must be at least 8 characters long and contain at
								least one uppercase letter, one lowercase letter, and one number.</small>
							<div id="passwordMeter" class="progress w-75">
								<div id="passwordProgressBar" class="progress-bar progress-bar-animated" role="progressbar" style="width: 0%"
									aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							{{-- show password --}}
							<div id="" class="form-check">
								<input type="checkbox" style="width: 15px;height: 15px;" class="form-check-input" id="showPassword">
								<label class="form-check-label" for="showPassword">Show or hide password</label>
							</div>
						</div>
						<div id="termAgreement" class="form-check">
							<input type="checkbox" style="width: 15px;height: 15px;" class="form-check-input" name="termAgreement"
								id="inpTermAgreement" {{ old("termAgreement") ? "checked" : "" }}>
							<label class="form-check-label" for="inpTermAgreement"><span class="text-danger">* </span>I agree to the terms
								and
								conditions</label>
							<div class="">
								@error("termAgreement")
									<span class="text-danger">*** {{ $message }} </span>
								@enderror
							</div>
						</div>
						<div class="form-group">
							<label for="address">Address:</label>
							<input type="text" maxlength="255" class="form-control" id="address" name="address"
								value={{ old("address", "") }}>
							@error("address")
								<span class="text-danger">*** {{ $message }} </span>
							@enderror
						</div>
						<div class="form-group">
							<label for="phone"><span class="text-danger">*</span>Phone:</label>
							<input type="text" maxlength="16" class="form-control" id="phone" name="phone"
								value={{ old("phone") }}>
							@error("phone")
								<span class="text-danger">*** {{ $message }} </span>
							@enderror
						</div>
						@if (Cookie::has("cart") !== false)
							@if (count(unserialize(Cookie::get("cart"))) == 0)
								{{-- <div class="">Cart RONG^~</div> --}}
							@else
								{{-- <div class="">Cart co {{ count(unserialize(Cookie::get("cart"))) }} San pham</div> --}}
								{{-- print_r(unserialize(Cookie::get("cart"))); --}}
								{{-- {{ print_r(unserialize(Cookie::get("cart"))) }}; --}}
								{{-- checkbox save cart --}}
								<div class="">We noticed you have a cart on your device.</div>
								<div id="saveCart" class="form-check">
									<input type="checkbox" style="width: 15px;height: 15px;" class="15orm-check-input" name="saveCart"
										id="inpSaveCart" {{ old("saveCart") ? "checked" : "" }}>
									<label class="form-check-label" for="inpSaveCart"><span class="text-danger"></span> Save cart to my new
										account.</label>
								</div>
							@endif
						@endif
						<hr>
						<button type="submit" class="btn btn-primary">Register</button>
					</form>
					<hr>
					<a href="{{ route("user.user.login") }}">Already have an account? Login</a>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#showPassword").on('click', function() {
				var type = $('#passwordValue').attr("type");
				$('#passwordValue').attr("type", type === "password" ? "text" : "password");
				$('#passwordConfirm').attr("type", type === "password" ? "text" : "password");
			});
			// password progress bar
			$('.inpPassword').on('input', function() {
				var password = $(this).val();
				password = password.replace(/\s/g, '');
				$('#passwordValue').val(password);
				var strength = 0;
				if (password.length >= 8) {
					strength = password.length * 4;
				}
				if (password.match(/[a-z]/)) {
					strength += 5;
				}
				if (password.match(/[A-Z]/)) {
					strength += 5;
				}
				if (password.match(/[0-9]/)) {
					strength += 5;
				}
				if (password.length < 8) {
					strength = 0;
				}
				$('#passwordProgressBar').css('width', strength + '%');
				switch (true) {
					case (strength >= 70):
						$('#passwordProgressBar').removeClass().addClass(
							'progress-bar progress-bar-animated bg-success');
						break;
					case (strength >= 50):
						$('#passwordProgressBar').removeClass().addClass(
							'progress-bar progress-bar-animated bg-primary');
						break;
					case (strength >= 30):
						$('#passwordProgressBar').removeClass().addClass(
							'progress-bar progress-bar-animated bg-warning');
						break;
					default:
						$('#passwordProgressBar').removeClass().addClass(
							'progress-bar progress-bar-animated bg-danger');
				}
			});
			// remove character from phone number
			$('#phone').on('input', function() {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
			$('#passwordConfirm').on('input', function() {
				var password = $('#passwordValue').val();
				var confirmPassword = $(this).val();
				if (password == confirmPassword) {
					$('#passwordValue').addClass('bg-success');
					$('#passwordConfirm').addClass('bg-success');
				} else {
					$('#passwordValue').removeClass('bg-success');
					$('#passwordConfirm').removeClass('bg-success');
				}
			});
            $('#passwordValue').on('input', function() {
				var confirmPassword = $('#passwordConfirm').val();
				var password = $(this).val();
				if (password == confirmPassword) {
					$('#passwordValue').addClass('bg-success');
					$('#passwordConfirm').addClass('bg-success');
				} else {
					$('#passwordValue').removeClass('bg-success');
					$('#passwordConfirm').removeClass('bg-success');
				}
			});
			$('#username').on('input', function() {
				$(this).val($(this).val().replace(/[^a-zA-Z0-9 ]/g, ''));
			});
			$('#name').on('input', function() {
				$(this).val($(this).val().replace(/[^a-z ]/gi, ''));
			});
			$('#address').on('input', function() {
				$(this).val($(this).val().replace(/[^a-z0-9#'.,-/ ]/gi, ''));
			});
		});
	</script>
@endsection
