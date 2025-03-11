@extends("front.layouts.pages-layout")

@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")
	<div class="page page-center">

		<div class="" style="height: 105px;background: #051922"></div>
		<div class="container container-tight py-4">
			<div class="text-center my-5">
				<a href="." class="navbar-brand navbar-brand-autodark">
					<img src="/assets/img/logo.png" style="scale: 2" width="" height="" alt="Fruitkha"
						class="navbar-brand-image">
				</a>
			</div>
			<x-form-alert />

			<form class="card card-md w-50 mx-auto" action={{ route("user.user.resetPasswordPost") }} method="POST"
				autocomplete="off">
				@csrf
				<div class="card-body">
					<input type="hidden" name="token_login" id="" value={{ $token_login }}>
					<input type="hidden" name="token_password" id="" value={{ $token_password }}>
					<input type="hidden" name="email" id="" value={{ $email }}>
					<h2 class="card-title text-center mb-4">Reset password</h2>
					<div class="form-group">
						<label for="password"><span class="text-danger">*</span>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Enter New password">
					</div>
					<div class="form-group">
						{{-- confirm password --}}
						<label for="password_confirmation"><span class="text-danger">*</span>Confirm Password</label>
						<input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
						@error("password")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="form-footer">
						<button type="submit" class="btn btn-primary w-100">
							Reset password
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
