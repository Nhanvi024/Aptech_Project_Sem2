@extends("front.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")

	<div class="page page-center">
		<div class="" style="height: 105px;background: #051922"></div>
		<div class="container container-tight py-4">
			<div class="text-center my-5">
				<a href="." class="navbar-brand navbar-brand-autodark">
					<img src="/assets/img/logo.png" style="scale: 2" width="" height="" alt="Tabler"
						class="navbar-brand-image">
				</a>
			</div>


			<div class="card card-md w-50 mx-auto">
				<x-form-alert />
				<div class="card-body">
					<h2 class="h2 text-center mb-4">Login to your account</h2>
					<form action="{{ route("user.user.login-handle") }}" method="POST" autocomplete="on">
						@csrf
						<div class="form-group">
							<label class="form-label">Email or User name: </label>
							<input type="text" class="form-control" placeholder="Email or User name" autocomplete="off" name='login_id'
								value="{{ old("login_id") }}">
							@error("login_id")
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="form-group">
							<label class="form-label">
								Password /
								<span class="form-label-description">
									<a href="{{ route("user.user.forgotPassword") }}">I forgot password</a>
								</span>
							</label>
							<div class="input-group input-group-flat">
								<input type="password" id="inputPassword" class="form-control" placeholder="Your password" autocomplete="off"
									name="password" value="{{ old("password") }}">
								{{-- show password --}}

								{{-- <span class="input-group-text">
									<span id="buttonShowPassword" class="link-secondary" title="Show password"
										data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
											stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
											<path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
										</svg>
									</span>
								</span> --}}
								@error("password")
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
							<div id="" class="form-check">
								<input type="checkbox" class="form-check-input" id="buttonShowPassword">
								<small class="form-check-label text-muted">Show or hide password</small>
							</div>
						</div>
						<div class="form-group">
							<label class="form-check">
								<input type="checkbox" class="form-check-input" name="rememberMe" />
								<label class="form-check-label">Remember me on this device</label>
							</label>
						</div>
						<div class="form-footer">
							<button type="submit" class="btn btn-primary w-100">Sign in</button>
						</div>
						<hr>
						<div class="">
							<a href="{{ route("user.user.register") }}">Don't have an account? Sign up now!</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#buttonShowPassword").on('click', function() {
				var type = $('#inputPassword').attr("type");
				$('#inputPassword').attr("type", type === "text" ? "password" : "text");
			});
		});
	</script>
@endsection
