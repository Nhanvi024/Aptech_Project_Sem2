@extends("front.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")
	<div class="" style="height: 105px;background: #051922"></div>
	<div class="text-center my-5">
		<a href="." class="navbar-brand navbar-brand-autodark">
			<img src="/assets/img/logo.png" style="scale: 2" width="" height="" alt="Tabler" class="navbar-brand-image">
		</a>
		{{-- @dd($data) --}}
	</div>
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">Register</div>
				<div class="card-body">
					<form method="POST" action={{ route("user.user.registerPost") }} enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<input type="text" class="form-control" id="name" name="name" value={{ $data["name"] }}>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="gender" id="gender" value={{ $data["gender"] }}>
						</div>
						<div class="form-group">
							<input type="date" class="form-control" id="dob" name="dob" value={{ $data["dob"] }}>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="username" name="username" value={{ $data["username"] }}>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="email" name="email" value={{ $data["email"] }}>
						</div>
						<div class="form-group">
							<input id="passwordValue" class="form-control inpPassword" autocomplete="false" type="password" name="password"
								value={{ $data["password"] }}>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="address" name="address" value={{ $data["address"] }}>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="phone" name="phone" value={{ $data["phone"] }}>
						</div>
				</div>
				<button type="submit" class="btn btn-primary">Register</button>
				</form>
				<hr>
				<a href="{{ route("user.user.login") }}">Already have an account? Login</a>
			</div>
		</div>
	</div>
	</div>
@endsection
