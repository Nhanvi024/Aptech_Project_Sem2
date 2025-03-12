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
					<div class="card-header h4">{{ $user->name }} change password</div>
					<div class="card-body">
						<div class="">
							{{-- <form action="{{ route("admin.products.store") }}" id="handleAddProductModal" method="POST" --}}
							<form action="{{ route("user.user.profileUpdatePasswordPost") }}" method="POST">
								@csrf
								{{-- input old password, new password, confirm new password --}}
								<input type="hidden" name="userId" value="{{ $user->id }}">
								<div class="form-group">
									<label for="oldPassword">Current Password:</label>
									<input type="password" maxlength="100" class="form-control" id="" name="oldPassword">
									<span id="oldPassword" class="text-danger initError"></span>
									@if (Session::has("oldPassword"))
										<span class="text-danger">*** {{ Session::get("oldPassword") }} </span>
									@endif
								</div>
								<div class="form-group">
									<label for="newPassword">New Password:</label>
									<input type="password" maxlength="100" class="form-control" id="newPassword" name="newPassword">
									<div class=""><small id="passwordHelp" class="form-text text-muted">*** Password must be at least 8
											characters
											long and contain at
											least one uppercase letter, one lowercase letter and one number.</small></div>
									<label for="newPassword_confirmation">Confirm New Password:</label>
									<input type="password" maxlength="100" class="form-control" id="confirmNewPassword" name="newPassword_confirmation">
									@error("newPassword")
										<span class="text-danger">*** {{ $message }} </span>
									@enderror
								</div>
								{{-- button show password --}}
								<div class="form-group">
									<label for="showPassword">Show Password</label>
									<input type="checkbox" id="showPassword" name="showPassword">
									<span id="showPassword" class="text-danger initError"></span>
								</div>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" style="width: fit-content">Save</button>
							</form>
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
			$('#phone').on('input', function() {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
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
