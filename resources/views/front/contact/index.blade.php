@extends("front.layouts.pages-layout")
@section("pageTitle")
	Fruitkha lalala
@endsection
@section("content")
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Get 24/7 Support</p>
						<h1>Contact us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Have you any question?</h2>
						<p>We believe that progress can always be made by continuously driving growth for our
							customers and employees, shaping decisions and experiences through media, content and
							technology.</p>
					</div>
					<div id="form_status">
						@if (Session::has("notice"))
							<p class="alert alert-success">{{ Session::get("notice") }}</p>
						@endif
					</div>
                    <br>
					<form method="POST" action="{{ route("user.contact.store") }}" enctype="multipart/form-data">
						@csrf
						<div class="contact-form">
							<div class="grid">
								<div class="row ">
									<div class="col-6">
										<p>
											<input type="text" class="form-control" placeholder="Name" name="name" id="name"
												value="{{ old("name") }}">
										</p>
									</div>
									<div class="col-6">
										<p>
											<input type="email" class="form-control" placeholder="Email" name="email" id="email"
												value="{{ old("email") }}">
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										@error("name")
											<p style="color: red; font-size:12px">{{ $message }}</p>
										@enderror
									</div>
									<div class="col-6">
										@error("email")
											<p style="color: red; font-size:12px">{{ $message }}</p>
										@enderror
									</div>
								</div>
								<br>
								<div class="row ">
									<div class="col-6">
										<p>
											<input type="text" class="form-control" placeholder="Phone" name="phone" id="phone"
												value="{{ old("phone") }}">
										</p>
									</div>
									<div class="col-6">
										<p>
											<select id="subject" name="subject" class="form-control">
												<option value="">Choose subject</option>
												@foreach ($subject as $key => $value)
													<option value="{{ $value }}" {{$value==old('subject')?"selected ":""}}>{{ $value }}</option>
												@endforeach
											</select>
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										@error("phone")
											<p style="color: red; font-size:12px">{{ $message }}</p>
										@enderror
									</div>
									<div class="col-6">
										@error("subject")
											<p style="color: red; font-size:12px">{{ $message }}</p>
										@enderror
									</div>
								</div>
							</div>
							<br>
							<p>
								<textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message">{{ old("message") }}</textarea>
								@error("message")
								<p style="color: red; font-size:12px">{{ $message }}</p>
							@enderror
							</p>
							<p><input type="submit" value="Submit"></p>
						</div>
					</form>
				</div>

				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Shop Address</h4>
							<p>FPT Aptech, 391A Nam Ky Khoi Nghia, <br> Ward Vo Thi Sau, District 3, Ho Chi Minh, <br> Viet Nam
							</p>
						</div>
						<div class="contact-form-box">
							<h4><i class="far fa-clock"></i> Shop Hours</h4>
							<p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> Contact</h4>
							<p>Phone: +84 111 222 333 <br> Email: fruitkha97@gmail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->

	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->

	<!-- google map section -->
	<div class="embed-responsive embed-responsive-21by9">
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2680563775734!2d106.67926307451738!3d10.790769858930034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f6a752ab57b%3A0x2200ce7d4f57d1f5!2sFPT%20APTECH!5e0!3m2!1svi!2s!4v1740621454267!5m2!1svi!2s"
			width="600" height="450" style="border:0;" allowfullscreen="" language="en" frameborder="0" loading="lazy"
			referrerpolicy="no-referrer-when-downgrade" class="embed-responsive-item"></iframe>
	</div>
	<!-- end google map section -->

	<script>
		$(document).ready(function() {
			$('#phone').on('input', function() {
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
			$('#name').on('input', function() {
				$(this).val($(this).val().replace(/[^a-zA-Z ]/g, ''));
			});
		});
	</script>
@endsection
