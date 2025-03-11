@extends("front.layouts.pages-layout")

@section("pageTitle")
	Fruitkha
@endsection
@section("content")
	<!--PreLoader-->
	{{-- <div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div> --}}
	<!--PreLoader Ends-->
	<!-- Body -->
	<!-- breadcrumb-section -->

	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>About Us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- featured section -->
	<div class="feature-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="featured-text">
						<h2 class="pb-3">Why <span class="orange-text">Fruitkha</span></h2>
						<div class="row">
							<div class="col-lg-6 col-md-6 mb-4 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-shipping-fast"></i>
									</div>
									<div class="content">
										<h3>Home Delivery</h3>
										<p> With our reliable home delivery service, you can enjoy farm-fresh produce without the hassle of visiting
											the store. </p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-money-bill-alt"></i>
									</div>
									<div class="content">
										<h3>Best Price</h3>
										<p>Whether you're shopping for daily essentials or special treats, our competitive pricing guarantees freshness
											without compromise.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 mb-5 mb-md-5">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-briefcase"></i>
									</div>
									<div class="content">
										<h3>Custom Box</h3>
										<p>At our fruit shop, we understand that everyone has unique tastes and preferences. That’s why we offer a
											Custom Fruit Box—allowing you to handpick your favorite fruits and build a box that suits your needs!</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="list-box d-flex">
									<div class="list-icon">
										<i class="fas fa-sync-alt"></i>
									</div>
									<div class="content">
										<h3>Quick Refund</h3>
										<p>At our fruit shop, we prioritize your satisfaction and stand by the quality of our products. Whether it's an
											issue with freshness, quality, or a wrong order, we are here to make it right—no questions asked!</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end featured section -->

	<!-- shop banner -->
	{{-- <section class="shop-banner">
    	<div class="container">
        	<h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
            <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
        </div>
    </section> --}}
	<!-- end shop banner -->

	<!-- team section -->
	<div class="mt-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3>Our <span class="orange-text">Team</span></h3>
						<p>Our mission is to provide healthy, delicious, and affordable fruits to our community, ensuring every bite is
							packed with natural goodness.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="single-team-item">
						<div class="team-bg"><img src={{ asset("storage/aboutus/Hoang.jpg") }} height="100%" width="auto"
								alt=""></div>
						<h4>Đỗ Nguyễn Thiện Hoàng <span>Member</span></h4>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="single-team-item">
						<div class="team-bg"><img src={{ asset("storage/aboutus/Nhan.jpg") }} height="100%" width="auto" alt="">
						</div>
						<h4>Vi Quốc Nhẫn <span>Member</span></h4>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ">
					<div class="single-team-item">
						<div class="team-bg"><img src={{ asset("storage/aboutus/Phu.jpg") }} height="100%" width="auto" alt="">
						</div>
						<h4>Nguyễn Minh Phú <span>Member</span></h4>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 ">
					<div class="single-team-item">
						<div class="team-bg"><img src={{ asset("storage/aboutus/Ngoc.jpg") }} height="100%" width="auto" alt="">
						</div>
						<h4>Hà Mỹ Ngọc <span>Member</span></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
