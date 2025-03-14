@extends("back.layouts.auth-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")

	<div class="page page-center">
		<div class="container container-tight py-4">
			<div class="text-center mb-4">
				<a href="." class="navbar-brand navbar-brand-autodark">
					<img src="/assets/img/logo.png" style="scale: 2" width="" height="" alt="Fruitkha" class="navbar-brand-image">
					{{-- <img src="/assets/img/logo.png" width="110" height="32" alt="lalala" class="navbar-brand-image"> --}}
				</a>
			</div>

			<x-form-alert />

			<div class="card card-md">
				<div class="card-body">
					<h2 class="h2 text-center mb-4">Login to your account</h2>
					<form action="{{ route("admin.admin.login-handle") }}" method="POST" autocomplete="on">
						@csrf
						<div class="mb-3">
							<label class="form-label">Email or User name: </label>
							<input type="text" class="form-control" placeholder="Email or User name" autocomplete="off" name='login_id'
								value="{{ old("login_id") }}">
							@error("login_id")
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						<div class="mb-2">
							<label class="form-label">
								Password:
							</label>
							<div class="input-group form-group input-group-flat">
								<input type="password" class="form-control" id="password" placeholder="Your password" autocomplete="off"
									name="password" value="{{ old("password") }}">
								<div class="input-group-text text-center" style="width: 50px">
									<a href="#" class="link-secondary mx-auto" title="Show password" id="btnShowPassword"
										data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
											stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
											<path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
										</svg>
									</a>
								</div>
							</div>
							<div>
								@error("password")
									<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
						<div class="form-footer">
							<button type="submit" class="btn btn-primary w-100">Sign in</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#btnShowPassword").click(function() {
				var input = $("#password");
				if (input.attr("type") == "password") {
					input.attr("type", "text");
				} else {
					input.attr("type", "password");
				}
			});
		});
	</script>
@endsection
