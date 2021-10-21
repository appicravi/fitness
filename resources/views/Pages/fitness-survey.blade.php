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
	<section class="fitness-survey">
		<!-- fitness survey bg img -->
		<div class="fitness-survey-bgimg">
			<img src="{{asset('/assets/images/fitness-survey-sideimg.jpg')}}" alt="">
		</div>

		<!-- Header -->
		<div class="fitness-header">
			<div class="container">
				<div class="d-flex justify-content-between">
					<a href="index.html" class="logo"><img src="{{asset('/assets/images/logo.svg')}}" alt=""></a>

					<a href="membership" class="f-18 fr white">Skip</a>
				</div>
			</div>
		</div>

		<!-- Fitness Survey Block -->
		<div class="fitness-survey-block">
			<div class="box-inner">
				<div class="head">
					<h2 class="f-36 fb secondary mb-0">Fitness Survey</h2>
				</div>

				<div class="fitness-content d-sm-flex">
					<div class="col-left">
						<ul class="steps">
							<li class="is-active d-flex">
								<span class="icon fii-tick-round"></span>
								<div>
									<h2 class="title fm ttu mb-0">Step 1</h2>
									<p class="para fm ttu mb-0">Fill your body details</p>
								</div>
							</li>
							<li class="d-flex">
								<span class="icon fii-tick-round"></span>
								<div>
									<h2 class="title fm ttu mb-0">Step 2</h2>
									<p class="para fm ttu mb-0">Fill your body details</p>
								</div>
							</li>
							<li class="d-flex">
								<span class="icon fii-tick-round"></span>
								<div>
									<h2 class="title fm ttu mb-0">Step 3</h2>
									<p class="para fm ttu mb-0">Fill your body details</p>
								</div>
							</li>
						</ul>
					</div>

					<div class="col-right">
						<form action="{{url('/fitness-survey_two')}}">
							<div class="panel">
								<label class="fm black">Your gender</label>

								<div class="d-flex justify-content-between">
									<div class="custom-control custom-radio custom-radio-red">
										<input type="radio" class="custom-control-input" id="customRadio1" name="gender" value="">
										<label class="custom-control-label" for="customRadio1">Male</label>
									</div>

									<div class="custom-control custom-radio custom-radio-red">
										<input type="radio" class="custom-control-input" id="customRadio2" name="gender" value="">
										<label class="custom-control-label" for="customRadio2">Female</label>
									</div>

									<div class="custom-control custom-radio custom-radio-red">
										<input type="radio" class="custom-control-input" id="customRadio3" name="gender" value="">
										<label class="custom-control-label" for="customRadio3">Unisex</label>
									</div>
								</div>
							</div>

							<div class="panel">
								<label class="fm black">Your body weight</label>

								<div class="form-group form-group-gray">
									<div class="input-group d-flex justify-content-between">
										<div class="w-60">
											<div id="Lbtab" class="paneltab1 h-100">
												<input type="text" class="form-control" placeholder="0.00 LB">
											</div>
											<div id="Kgtab" class="paneltab1 h-100">
												<input type="text" class="form-control" placeholder="0.00 KG">
											</div>
										</div>

										<ul id="bodyweight" class="measurementtabs d-flex aic">
											<li><a href="#Lbtab">Lb</a></li>
											<li><a href="#Kgtab">Kg</a></li>
										</ul>

									</div>
								</div>
							</div>

							<div class="panel">
								<label class="fm black">Your height</label>

								<div class="form-group form-group-gray">
									<div class="input-group d-flex justify-content-between">
										<div class="w-60">
											<div id="Cmtab" class="paneltab2 h-100">
												<input type="text" class="form-control" placeholder="0.00 CM">
											</div>
											<div id="Intab" class="paneltab2 h-100">
												<div class="d-flex h-100">
													<input type="text" class="form-control" placeholder="0 FT">
													<input type="text" class="form-control" placeholder="0 IN">
												</div>
											</div>
										</div>

										<ul id="heighttab" class="measurementtabs d-flex aic">
											<li><a href="#Cmtab">Cm</a></li>
											<li><a href="#Intab">In</a></li>
										</ul>

									</div>
								</div>
							</div>

							<div class="btn-group d-flex aic justify-content-end">
								<button href="{{url('/fitness-survey_two')}}" type="submit" class="fm primary" >Next <span class="arrow-ic fii-angle-arrow-right ml-1"></span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>



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