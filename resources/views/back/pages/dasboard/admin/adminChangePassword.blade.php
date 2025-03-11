@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")
	<div class="page-wrapper">
		<div class="row justify-content-center w-50 mx-auto my-5">
			{{-- @dd($admin) --}}
			<form action="{{ route("admin.admin.changePasswordPost") }}" id="handleAddAdminModal" method="POST"
				enctype="multipart/form-data">
				@csrf
				<div class="">
					<input class="form-control" type="hidden" name="id" placeholder="Enter id" value="{{ $admin->id }}">
					<span id="id" class="text-danger initError"></span>
				</div>
				<div class="">
					<label for="">Password: </label>
					<input class="form-control inpPassword" autocomplete="false" type="password" name="password"
						placeholder="Enter password">
					<label for="">Confirm Password: </label>
					<input class="form-control inpPassword" autocomplete="false" type="password" name="password_confirmation"
						placeholder="Confirm Password">
					<span id="password" class="text-danger initError"></span>
					@error("password")
						<span class="text-danger">*** {{ $message }} </span>
					@enderror
				</div>
				<div class="">
				</div>
				<br>
				<div class="form-check">
					<label for="">Show password</label>
					<input type="checkbox" name="" id="showPassword">
				</div>
				<hr>
				<button type="submit" class="btn btn-primary" style="width: fit-content">Save</button>
			</form>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#showPassword").click(function() {
				if ($(this).is(":checked")) {
					$(".inpPassword").attr("type", "text");
				} else {
					$(".inpPassword").attr("type", "password");
				}
			});
		});
	</script>
@endsection
