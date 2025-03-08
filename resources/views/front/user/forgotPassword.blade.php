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
				{{-- @dd($data) --}}
			</div>

			<form class="card card-md w-50 mx-auto" action={{ route("user.user.forgotPasswordPost") }} method="POST"
				autocomplete="off">
				<x-form-alert />
				@csrf
				<div class="card-body">
					<h2 class="card-title text-center mb-4">Forgot password</h2>
					<p class="text-secondary mb-4">Enter your email address to reset your password.</p>
					<div class="mb-3">
						<label class="form-label">Email address</label>
						<input type="email" class="form-control" name="email" placeholder="Enter email">
						@error("email")
							<span class="text-danger">*** {{ $message }} </span>
						@enderror
					</div>
					<div class="form-footer">
						<button type="submit" class="btn btn-primary w-100">
							<!-- Download SVG icon from http://tabler-icons.io/i/mail -->
							<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
								stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none" />
								<path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
								<path d="M3 7l9 6l9 -6" />
							</svg>
							Send me new password
						</button>
					</div>
				</div>
			</form>
			<div class="text-center text-secondary mt-3">
				Forget it, <a href="{{ route("user.user.login") }}">send me back</a> to the sign in screen.
			</div>
		</div>
	</div>

@endsection
