<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Fitness Point </title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Custom -->
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Header -->
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg p-0 w-100">
				<div class="d-lg-none d-block">
					<a href="#" class="logo"><img src="{{asset('/assets/images/logo.svg')}}" alt=""></a>
				</div>
				<div class="search-icon ml-auto d-lg-none d-block">
					<span class="fii-search search-toggle-btn"></span>
				</div>
				<button class="navbar-toggler p-0 collapsed ml-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button> 
				<div class="collapse navbar-collapse top-header row" id="navbarSupportedContent">
					<div class="col-lg-5">
						<ul class="d-lg-flex aic justify-content-lg-end header-menus">
							<li><a href="index.html">Home</a></li>
							<li><a href="aboutus.html">About Us</a></li>
							<li><a href="trainers.html">Trainers</a></li>
						</ul>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<ul class="d-lg-flex aic justify-content-start header-menus">
							<li><a href="fit-plans.html">Fit Plans</a></li>
							<li class="active"><a href="membership.html">Membership</a></li>
							<li><a href="contactus.html">Contact Us</a></li>
						</ul>
					</div>
				</div>

				
			</nav>
			

			<!-- <div class="search-block search-block-toggle">
				<div class="d-flex aic">
					<span class="fii-search"></span>
					<input type="text" placeholder="Search Trainers & Trainings...">
					<button type="submit" class="fii-arrow-right"></button>
				</div>
			</div> -->
			<div class="bottom-header row">
				<div class="col-lg-5 col-md-4 col-12 align-self-end">
					<div class="search-block">
						<div class="d-flex aic">
							<span class="fii-search"></span>
							<input type="text" placeholder="Search Trainers & Trainings...">
							<button type="submit" class="fii-arrow-right"></button>
						</div>
					</div>
				</div>

				<div class="col-lg-2 d-lg-block d-none text-center">
					<a href="index.html" class="logo"><img src="{{asset('/assets/images/logo.svg')}}" alt=""></a>
				</div>

				<div class="col-lg-5 col-md-8 col-12 align-self-end">
					<div class="d-flex aic justify-content-md-end justify-content-center">
						<a href="signin.html" class="btn btn-xs btn-primary">Sign In</a>
						<a href="signup.html" class="btn btn-xs btn-primary-border ml-2">Sign Up</a>

						<div class='toggletabs d-flex ml-2'>
							<input type='radio' id='r1' name='t'>
							<label for='r1'>Arabic</label>
							<input type='radio' id='r2' name='t' checked>
							<label for='r2'>English</label>
							<div id='slider'></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>


	<!-- main -->
	<main>
		<!-- Membership Banner sec -->
		<section class="membership-bnr-sec d-flex">
			<div class="container d-flex aic jcc position-relative">
				<h1 class="f-60 fblack secondary">Membership</h1>

				<img class="curve-img" src="{{asset('/assets/images/membership-bnr-curve.svg')}}" alt="">
			</div>
		</section>

		<!-- Membership detail Plan -->
		<section class="membership-detail-plan">
			<div class="container">
				<div class="row">
					<div class="col-xl-7 col-lg-7 col-md-8 col-sm-7 mx-auto text-center">
						<p class="f-20 flight white mb-5">Aliquam condimentum vulputate. Nulla facilisi. Sed tempor dolor egestas mi placerat fringilla Sed cursus pharetra eros.</p>
						<h2 class="f-36 fb white mb-0">Membership Plan</h2>
					</div>
				</div>

				<div class="row membership-plan-columns">
					<div class="col-lg-3 col-md-6">
						<div class="column">
							<h3 class="title f-36 fblack secondary text-center ttu">Monthly</h3>
							<h2 class="subtitle f-45 fb primary text-center mb-0">$ 100</h2>
							<ul class="plan-list">
								<li class="d-flex">
									<span class="tick-icon fii-tick"></span>
									<p class="f-16 fr secondary mb-0">You Get 3 day Free Trial </p>
								</li>
								<li class="d-flex">
									<span class="tick-icon fii-tick"></span>
									<p class="f-16 fr secondary mb-0">Quisque aliquam condimentum vulputate. Nulla facilisi.</p>
								</li>
								<li class="d-flex">
									<span class="tick-icon fii-tick"></span>
									<p class="f-16 fr secondary mb-0">Quisque aliquam condimentum vulputate. Nulla facilisi.</p>
								</li>
							</ul>

							<a href="payment-membership.html" class="selectplantext f-22 fb primary ttu">Select plan <span class="arrowicon fii-arrow-right"></span></a>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="column">
							<h3 class="title f-36 fblack secondary text-center ttu">3 Month</h3>
							<h2 class="subtitle f-45 fb primary text-center mb-0">$ 150</h2>
							<ul class="plan-list">
								<li class="d-flex">
									<span class="tick-icon fii-tick"></span>
									<p class="f-16 fr secondary mb-0">You Get 3 day Free Trial </p>
								</li>
								<li class="d-flex">
									<span class="tick-icon fii-tick"></span>
									<p class="f-16 fr secondary mb-0">Quisque aliquam condimentum vulputate. Nulla facilisi.</p>
								</li>
								<li class="d-flex">
									<span class="tick-icon fii-tick"></span>
									<p class="f-16 fr secondary mb-0">Quisque aliquam condimentum vulputate. Nulla facilisi.</p>
								</li>
							</ul>

							<a href="payment-membership.html" class="selectplantext f-22 fb primary ttu">Select plan <span class="arrowicon fii-arrow-right"></span></a>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="column">
							<h3 class="title f-36 fblack secondary text-center ttu">6 Month</h3>
							<h2 class="subtitle f-45 fb primary text-center mb-0">$ 280</h2>
							<ul class="plan-list">
								<li class="d-flex">
									<span class="tick-icon fii-tick"></span>
									<p class="f-16 fr secondary mb-0">You Get 3 day Free Trial </p>
								</li>
								<li class="d-flex">
									<span class="tick-icon fii-tick"></span>
									<p class="f-16 fr secondary mb-0">Quisque aliquam condimentum vulputate. Nulla facilisi.</p>
								</li>
								<li class="d-flex">
									<span class="tick-icon fii-tick"></span>
									<p class="f-16 fr secondary mb-0">Quisque aliquam condimentum vulputate. Nulla facilisi.</p>
								</li>
							</ul>

							<a href="payment-membership.html" class="selectplantext f-22 fb primary ttu">Select plan <span class="arrowicon fii-arrow-right"></span></a>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="column">
							<h3 class="title f-36 fblack secondary text-center ttu">Annual</h3>
							<h2 class="subtitle f-45 fb primary text-center mb-0">$ 560</h2>
							<ul class="plan-list">
								<li class="d-flex">
									<span class="tick-icon fii-tick"></span>
									<p class="f-16 fr secondary mb-0">You Get 3 day Free Trial </p>
								</li>
								<li class="d-flex">
									<span class="tick-icon fii-tick"></span>
									<p class="f-16 fr secondary mb-0">Quisque aliquam condimentum vulputate. Nulla facilisi.</p>
								</li>
								<li class="d-flex">
									<span class="tick-icon fii-tick"></span>
									<p class="f-16 fr secondary mb-0">Quisque aliquam condimentum vulputate. Nulla facilisi.</p>
								</li>
							</ul>

							<a href="payment-membership.html" class="selectplantext f-22 fb primary ttu">Select plan <span class="arrowicon fii-arrow-right"></span></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Membership Benifits Sec -->
		<section class="membership-benefit-sec">
			<div class="container">
				<h2 class="pagetitle f-36 fb secondary text-center">Membership Benefits</h2>
				
				<div class="membership-benefits-panels d-flex flex-wrap mx-auto">
					<div class="membershipbenefit-col">
						<span class="number f-26 fb white d-flex aic jcc">01</span>
						<span class="icon fii-dumbell-ic d-flex aic jcc mx-auto"></span>
						<h6 class="title f-20 fb black-100 ttu text-truncate">All Training Type</h6>
						<p class="para f-16 fr black-100 mb-0">
							Condimentum vulputate. Nulla facilisi. Sed tempor dolor egestas mi placerat fringilla Sed cursus pharetra eros.
						</p>
					</div>
					<div class="membershipbenefit-col">
						<span class="number f-26 fb white d-flex aic jcc">02</span>
						<span class="icon fii-chat-ic d-flex aic jcc mx-auto"></span>
						<h6 class="title f-20 fb black-100 ttu text-truncate">chat with trainers</h6>
						<p class="para f-16 fr black-100 mb-0">
							Condimentum vulputate. Nulla facilisi. Sed tempor dolor egestas mi placerat fringilla Sed cursus pharetra eros.
						</p>
					</div>
					<div class="membershipbenefit-col">
						<span class="number f-26 fb white d-flex aic jcc">03</span>
						<span class="icon fii-live-camera d-flex aic jcc mx-auto"></span>
						<h6 class="title f-20 fb black-100 ttu text-truncate">live video call</h6>
						<p class="para f-16 fr black-100 mb-0">
							Condimentum vulputate. Nulla facilisi. Sed tempor dolor egestas mi placerat fringilla Sed cursus pharetra eros.
						</p>
					</div>
					<div class="membershipbenefit-col">
						<span class="number f-26 fb white d-flex aic jcc">04</span>
						<span class="icon fii-rating-likes d-flex aic jcc mx-auto"></span>
						<h6 class="title f-20 fb black-100 ttu text-truncate">5 star trainers</h6>
						<p class="para f-16 fr black-100 mb-0">
							Condimentum vulputate. Nulla facilisi. Sed tempor dolor egestas mi placerat fringilla Sed cursus pharetra eros.
						</p>
					</div>
				</div>
			</div>
		</section>

		<!-- Top workout session sec -->
		<section class="topworkout-session-sec">
			<div class="container">
				<h2 class="pagetitle f-36 fb secondary">Top Workouts Sessions</h2>
			</div>

			<!-- Slider -->
			<div class="top-workoutsession-slider owl-carousel">
				<div class="item">
					<img src="images/topworkoutsession-img01.png" alt="">
					<h6 class="title f-22 fb white mb-0 ttu"><a href="#">Weight Lifting</a></h6>
					<a href="fit-plans.html" class="arrow-box d-flex aic jcc"><span class="fii-arrow-right"></span></a>
				</div>
				<div class="item">
					<img src="{{asset('/assets/images/topworkoutsession-img02.png')}}" alt="">
					<h6 class="title f-22 fb white mb-0 ttu"><a href="#">Body Weight</a></h6>
					<a href="fit-plans.html" class="arrow-box d-flex aic jcc"><span class="fii-arrow-right"></span></a>
				</div>
				<div class="item">
					<img src="{{asset('/assets/images/topworkoutsession-img03.png')}}" alt="">
					<h6 class="title f-22 fb white mb-0 ttu"><a href="#">Sports Training</a></h6>
					<a href="fit-plans.html" class="arrow-box d-flex aic jcc"><span class="fii-arrow-right"></span></a>
				</div>
				<div class="item">
					<img src="{{asset('/assets/images/topworkoutsession-img04.png')}}" alt="">
					<h6 class="title f-22 fb white mb-0 ttu"><a href="#">Hiit Training</a></h6>
					<a href="fit-plans.html" class="arrow-box d-flex aic jcc"><span class="fii-arrow-right"></span></a>
				</div>
				<div class="item">
					<img src="{{asset('/assets/images/topworkoutsession-img05.png')}}" alt="">
					<h6 class="title f-22 fb white mb-0 ttu"><a href="#">Weight Lifting</a></h6>
					<a href="fit-plans.html" class="arrow-box d-flex aic jcc"><span class="fii-arrow-right"></span></a>
				</div>
			</div>
		</section>
	</main>


	<!-- Footer -->
	<footer>
		<!-- Footer First -->
		<div class="footer-first">
			<div class="container">
				<div class="row">
					<div class="col-md-4 mb-md-0 mb-5">
						<h4 class="footer-title f-22 fm white ttu">Contact Us</h4>
						<p class="f-16 fm white mb-3">Call Us 24/7</p>
						<a href="tel:1800 97 97 69" class="f-28 fb primary mb-4 d-block">1800 97 97 69</a>
						<p class="f-16 fr white mb-0">502 New Design Str, Merco Building opposite <br/>
							Melbourne, Australia
						</p>
					</div>

					<div class="col-md-5 mb-md-0 mb-5">
						<div class="row">
							<div class="col-6">
								<h4 class="footer-title f-22 fm white ttu">Important Link</h4>

								<ul class="footer-menus">
									<li><a href="Be-a-Trainer.html">Be a Trainer</a></li>
									<li><a href="#">Offers</a></li>
									<li><a href="terms-conditions.html">Terms & Condition</a></li>
									<li><a href="#">Cancellation</a></li>
								</ul>
							</div>

							<div class="col-6">
								<h4 class="footer-title f-22 fm white ttu">About Us</h4>

								<ul class="footer-menus">
									<li><a href="aboutus.html">About Us</a></li>
									<li><a href="contactus.html">Contact Us</a></li>
									<li><a href="be-a-trainer-landing.html">Trainers Information</a></li>
									<li><a href="faq.html">FAQs</a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<h4 class="footer-title f-22 fm white ttu">Quick links</h4>

						<ul class="quick-links-list d-flex flex-wrap">
							<li><a href="fit-plans.html">Yoga</a></li>
							<li><a href="fit-plans.html">Body weight</a></li>
							<li><a href="fit-plans.html">Hands-free</a></li>
							<li><a href="fit-plans.html">HIIT training</a></li>
							<li><a href="fit-plans.html">Strength training </a></li>
							<li><a href="fit-plans.html">Dynamic training</a></li>
							<li><a href="fit-plans.html">Follow along </a></li>
							<li><a href="fit-plans.html">Yoga</a></li>
							<li><a href="fit-plans.html">Body weight </a></li>
							<li><a href="fit-plans.html">Hands-free</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer Second -->
		<div class="footer-second">
			<div class="container">
				<div class="row aic">
					<div class="col-md-4 text-md-left text-center mb-md-0 mb-4">
						<p class="f-16 flight white mb-0">© 2021 Fitness.com. All Rights Reserved</p>
					</div>
					<div class="col-md-4 col-sm-6 col-12 mb-sm-0 mb-4">
						<ul class="card-btns d-flex aic jcc">
							<li><a href="#"><img class="paypal-logo" src="images/paypal-logo.png" alt=""></a></li>
							<li><a href="#"><img class="visa-logo" src="images/visa-logo.png" alt=""></a></li>
							<li><a href="#"><img class="mastercard-logo" src="images/master-card-logo.png" alt=""></a></li>
						</ul>
					</div>
					<div class="col-md-4 col-sm-6 col-12">
						<ul class="footer-social-icons d-flex aic justify-content-sm-end justify-content-center">
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>




    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="{{ asset('assets/js/customvalidation.js') }}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> -->

	<!-- Bootstrap -->
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

	<!-- Owl Carousel -->
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

	<!-- Select 2 Js -->
	<script src="{{asset('assets/js/select2.min.js')}}"></script>

	<!-- Slick slider -->
	<script src="{{asset('assets/js/slick.js')}}"></script>

	<!-- Custom Js -->
	<script src="{{asset('assets/js/custom.js')}}"></script>

</body>

</html>