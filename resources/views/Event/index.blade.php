<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8' />
	<link href='css/lib/main.css' rel='stylesheet' />
	<script src='css/lib/main.js'></script>
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

	<style>
		body {
			margin: 0px 10px;
			padding: 0;
			font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
			font-size: 14px;
			width: 100%;
			margin-left: 0px;

		}

		#calendar {
			max-width: 1100px;
			margin: 0 auto;
		}
	</style>
</head>

<body class="body-wrapper">
	<div class="main-home ">
		<section class="category_page">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						@include('partial.header')
					</div>
				</div>
			</div>
		</section>
		<!-- page title -->
		<!--================================
=            Page Title            =
=================================-->
		<!-- <section class="page_breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="/">Home</a></li>

								<li class="breadcrumb-item active" aria-current="page">Event</li>
							</ol>
						</nav>
					</div>

				</div>
			</div>
		</section> -->
	</div>

	<section style="padding:15px 0 15px 0; margin-bottom: 30px;">
		<div id='calendar'></div>
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
	<script>
		var dates = [];
		var categoryname = '';
		var eventid = '';
		var token = '{{csrf_token()}}';
		document.addEventListener('DOMContentLoaded', function() {

			var calendarEl = document.getElementById('calendar');
			var allEvents = @json($events);
			var allCategory = @json($categories);

			allEvents.forEach(function(event) {

				eventid = event.id;
				// //console.log(eventid);
				// allCategory.forEach(function(category) {
				// 	if (category.id == event.category_id) {
				// 		categoryname = category.name;
				// 	}
				// })
				dates.push({
					title: event.title,
					start: event.from_date,
					end: event.to_date,
					type:'POST',
					url:'eventdetail/'+eventid
				});
			});

			var calendar = new FullCalendar.Calendar(calendarEl, {
				headerToolbar: {
					left: 'prevYear,prev,next,nextYear today',
					center: 'title',
					right: 'dayGridMonth,dayGridWeek,dayGridDay'
				},
				initialDate: '2020-11-12',
				navLinks: true, // can click day/week names to navigate views
				editable: true,
				dayMaxEvents: true, // allow "more" link when too many events
				events: dates,
				
			});

			calendar.render();
		});
	</script>

</body>

</html>