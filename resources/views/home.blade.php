<!DOCTYPE html>
<html lang="en">

<head>

	<!-- SITE TITTLE -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delivery Portal</title>
	<link rel="icon" href="images/bg_images/titelicon.png" type="image/x-icon">

	<!-- FAVICON -->
	<link href="img/favicon.png" rel="shortcut icon">
	<!-- PLUGINS CSS STYLE -->
	<!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
	<!-- Font Awesome -->
	<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- Owl Carousel -->
	<link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
	<link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
	<!-- Fancy Box -->
	<link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
	<link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<!-- CUSTOM CSS -->
	<link href="css/style.css" rel="stylesheet">


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- <style>
		.mystyle {
			color: black;
		}
		.select2-search input{
			width: auto;
		}
		.select2-results__options li{
			list-style-type: none;
			color: black;
			padding-bottom: 10px;
			font-size: 20px;
		}
	</style> -->
</head>

<body class="body-wrapper">
	<div class="main-home bg-1">
		<section class="category_page">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						@include('partial.header')
					</div>
				</div>
			</div>
		</section>

		<section class="hero-area text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="content-block"><br>
							<h1>Delivery Portal</h1>
							<p>Easy way to deliver your products to the public</p>
							<div class="short-popular-category-list text-center">
							</div>
							<div class="advance-search">
								<div class="container">
									<div class="row justify-content-center">
										<div class="col-lg-12 col-md-12 align-content-center">
											<form action="searchlist" method="post">
												@csrf
												<div class="form-row">
													<div class="form-group col-md-4 channel">
														<select class="w-100 form-control text mt-lg-1 mt-md-2 s2" name="category">
															<option value="">Please select channel</option>
															@foreach($channels as $channel)
															<option value="{{$channel->id}}">{{$channel->name}}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group col-md-3">
														<select class="w-100 form-control text mt-lg-1 mt-md-2 s2" name="city">
															<option value="">Please select city</option>
															@foreach($cities as $city)
															<option value="{{$city->id}}">{{$city->name}}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group col-md-3">
														<select class="w-100 form-control text mt-lg-1 mt-md-2 s2" name="township">
															<option value="">Please select township</option>
															@foreach($townships as $township)
															<option value="{{$township->id}}">{{$township->name}}</option>
															@endforeach
														</select>
													</div>
													<div class="form-group col-md-2 align-self-center">
														<button type="submit" class="btn btn-search form-control">Search</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
	</div>

	<!--==========================================
		=            What We Offer          =
		===========================================-->

	<section class="popular-deals section bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2 style="color: black;">What We Offers</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- offer 01 -->
				<div class="col-lg-12">
					<div class="trending-ads-slide">
						@if(count($deliveries) > 0)
						@foreach($deliveries as $delivery)
						<div class="col-sm-12 col-lg-4">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<form action="deliverydetails" method="post">
											@csrf
											<div class="buttons">
												<input type="hidden" name="deliveryid" value="{{$delivery->id}}">
												<button type="submit" style="border: none;outline:none;width:100%;" class="bg-white button"><img class="card-img-top img-fluid" style="height:200px;width:350px;" src="{{$delivery->image}}" alt="Card image cap">
												</button>
											</div>
										</form>
										<!-- <div class="price">$200</div> -->
										<!-- <a href="service-details.html">
											<img class="card-img-top img-fluid" src="{{$delivery->logo}}" alt="Card image cap">
										</a> -->
									</div>
									<div class="card-body">
										<form action="deliverydetails" method="post">
											@csrf
											<div>
												<input type="hidden" name="deliveryid" value="{{$delivery->id}}">
												<button type="submit" style="border: none;outline:none;" class="bg-white font-weight-bold">{{$delivery->name}}
												</button>
											</div>
										</form>
										@if($delivery->description != null)
										@php
										if (strlen(strip_tags($delivery->description)) > 150) {
										$stringCut = substr($delivery->description, 0, 150);
										$endPoint = strrpos($stringCut, ' ');
										$deliverydes = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
										@endphp
										<p class="card-text pt-2" style="height:200px;text-align:justify;">{{ $deliverydes }}</p>
										@php
										}else{
										@endphp
										<p class="card-text pt-2" style="height:200px;text-align:justify;">{{ $delivery->description }}</p>
										@php
										}
										@endphp
										@else
										<p class="card-text pt-2" style="color:#c2c4c3;height:200px;"> No Description !!!</p>
										@endif
										<div class="product-ratings">
											<ul class="list-inline">
												@for ($i = 0; $i < $delivery->rating; $i++)
													<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
													@endfor
													@for($j = 0; $j < 5-$delivery->rating; $j++)
														<li class="list-inline-item"><i class="fa fa-star" style="color: black;"></i></li>
														@endfor
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@else
						<div class="col-12" style="text-align: center;">
							<h3 style="color:black;"> No Deliveries Yet !!!</h3>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--===========================================
		=           Updated News          =
		============================================-->

	<section class="popular-deals section bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2 style="color: black;">Updated News</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- offer 01 -->
				<div class="col-lg-12">
					<div class="row">
						@if(count($posts) > 0)
						@foreach($posts as $post)
						<div class="col-sm-12 col-lg-4">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="thumb-content">
										<!-- <div class="price">$200</div> -->
										@php
										$post_image = json_decode($post->post_images);
										@endphp
										<form action="blogdetail" method="post">
											@csrf
											<input type="hidden" name="postid" value="{{$post->id}}">
											<button type="submit" style="background-color: white;border:none;outline:none;"><img class="card-img-top img-fluid" src="{{$post_image[0]}}" alt="Card image cap" style="height:200px;width:350px;"></button>
										</form>
									</div>
									<div class="card-body">
										<h4 class="card-title">
											<form action="blogdetail" method="post">
												@csrf
												<input type="hidden" name="postid" value="{{$post->id}}">
												<button type="submit" style="background-color: white;border:none;outline:none;">{{$post->title}}</button>
											</form>
										</h4>
										<ul class="list-inline product-meta">
											@foreach($users as $user)
											@if($user->id == $post->user_id)
											<li class="list-inline-item"><b><i class='fa fa-user'></i> {{$user->name}}</b></li>
											@endif
											@endforeach
											@php
											$date = strtotime($post->created_at);
											$postdate = date('M, d-Y', $date);
											@endphp
											<li class="list-inline-item">
												<i class="fa fa-calendar"></i> {{$postdate}}
											</li>
										</ul>
										@php
										$description = strip_tags($post->description);
										if (strlen($description) > 150) {
										$stringCut = substr($description, 0, 150);
										$endPoint = strrpos($stringCut, ' ');
										$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
										@endphp
										<p class="card-text" style="text-align: justify;">{{$string}}</p>
										@php
										}
										else{
										$string = $post->description;
										@endphp
										<p class="card-text" style="padding-bottom: 70px;text-align:justify;">{{strip_tags($string)}}</p>
										@php
										}
										@endphp
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@else
						<div class="col-12" style="text-align: center;">
							<h3 style="color:black;"> No Posts Yet !!!</h3>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--============================
		=            Footer            =
		=============================-->

	@include('partial.footer')

	<!-- JAVASCRIPTS -->
	<script src="plugins/jQuery/jquery.min.js"></script>
	<script src="plugins/bootstrap/js/popper.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
	<!-- tether js -->
	<script src="plugins/tether/js/tether.min.js"></script>
	<script src="plugins/raty/jquery.raty-fa.js"></script>
	<script src="plugins/slick-carousel/slick/slick.min.js"></script>
	<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
	<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
	<!-- google map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
	<script src="plugins/google-map/gmap.js"></script>
	<script src="js/script.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.nice-select').hide();
			$('.channel').addClass("mystyle");
			$('.s2').select2({

			});
		});
	</script>
</body> -->

</html>