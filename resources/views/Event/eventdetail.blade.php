<!DOCTYPE html>
<html>

<head>
    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delivery Portal</title>
    <link rel="icon" href="{{asset('/images/bg_images/titelicon.png')}}" type="image/x-icon">

    <!-- FAVICON -->
    <link href="{{asset('/img/favicon.png')}}" rel="shortcut icon">
    <!-- PLUGINS CSS STYLE -->
    <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/bootstrap/css/bootstrap-slider.css')}}">
    <!-- Font Awesome -->
    <link href="{{asset('/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{asset('/plugins/slick-carousel/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('/plugins/slick-carousel/slick/slick-theme.css')}}" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="{{asset('/plugins/fancybox/jquery.fancybox.pack.css')}}" rel="stylesheet">
    <link href="{{asset('/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link href="{{asset('/css/event-detail/event-detail.css')}}" rel="stylesheet">
</head>

<body>
    <div class="main-home">
        <section class="category_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @include('partial.header')
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="page_breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="event.html">Event</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Event Detail</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </section> -->

        <section class="hero-area text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-block"><br>
                            <section id="intro">
                                <div class="intro-container aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                                    @if($event != null)
                                    <h1 class="mb-4 pb-0">The Annual<br><span>{{$event->title}}</span> CONFERENCE</h1>
                                    @php
                                    $fdate = date('M, d', strtotime($event->from_date));
                                    $tdate = date('M, d', strtotime($event->to_date));
                                    @endphp
                                    <p class="mb-4 pb-0">{{$fdate}} - {{$tdate}}, {{$event->venue->name}},{{$event->venue->city}}</p>
                                    
                                    @else
                                    <h1 class="mb-4 pb-0">No Event Yet !!!</h1>
                                    @endif
                                </div>
                            </section>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <main id="main">
        <!-- ======= About Section ======= -->

        <section id="about">
            @if($event != null)
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-4">
                        <h2>About The Event</h2>
                        @if($event->description != null)
                        <p style="text-align: justify;color:black;">{{$event->description}}</p>
                        @else
                        <h5 class="pl-3" style="color:#c2c4c3;">No Description !!!</h5>
                        @endif
                    </div>
                    <div class="col-lg-2 pt-3">
                        <h3>Categories</h3>
                        <p class="pt-3" style="color:black;">{{$event->category->name}}</p>
                    </div>
                    <div class="col-lg-3 pt-3">
                        <h3>Where</h3>
                        @if($event->venue->name != null)
                        <p class="pt-3" style="color:black;">{{$event->venue->name}},{{$event->venue->city}}</p>
                        @endif
                    </div>
                   
                    <div class="col-lg-3 pt-3">
                        <h3>When</h3>
                        <p class="pt-3" style="color:black;">{{$fdate}} - {{$tdate}}</p>
                    </div>
                </div>
            </div>
            @endif

        </section><!-- End About Section -->

        <!-- ======= Speakers Section ======= -->
        <section id="speakers">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="section-header">
                    <h2>Event Speakers</h2>
                    <p>Here are some of our speakers</p>
                </div>

                <div class="row">
                    @if($event != null)
                    @foreach($event->speakers as $speaker)
                    <div class="col-lg-4 col-md-6">
                        <div class="speaker aos-init" data-aos="fade-up" data-aos-delay="100">
                            <img src="/{{$speaker->image}}" alt="Speaker 1" class="img-fluid" style="height:230px;width: 100%;">
                            <div class="details">
                                <h3><a href="/speakerdetail/{{$speaker->id}}">{{$speaker->name}}</a></h3>
                                <p>{{$speaker->position}}</p>
                                <div class="social">
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12" style="text-align: center;">
                        <h3>No Speakers Yet !!!</h3>
                    </div>
                    @endif
                </div>
            </div>

        </section><!-- End Speakers Section -->


        <!-- ======= Venue Section ======= -->
        <section id="venue">
            <div class="container aos-init" data-aos="fade-up">
                <div class="section-header">
                    <h2>Event Venue</h2>
                    <p>Event venue location info and gallery</p>
                </div>
                @if($event != null)
                <div class="row no-gutters">
                    <div class="col-lg-6 venue-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30551.45050196821!2d96.17655714298235!3d16.829763286256245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19327dcefc6cf%3A0xd5fd1950ca5e2174!2sPaya%20Lan%20(Thingangyun)!5e0!3m2!1sen!2smm!4v1602578281882!5m2!1sen!2smm" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                    </div>
                    <div class="col-lg-6 venue-info">
                        <div class="row justify-content-center">
                            <div class="col-11 col-lg-8" style="text-align: justify;">

                                <h3>{{$event->venue->name}}, {{$event->venue->city}}</h3>
                                <p>{{$event->venue->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container venue-gallery-container aos-init" data-aos="fade-up" data-aos-delay="100">
                <div class="row no-gutters">
                    @if(count($event->venue->images) > 0)
                    @foreach($event->venue->images as $image)
                    <div class="col-lg-3 col-md-4">
                        <div class="venue-gallery">
                            <a href="/{{$image}}" class="venobox vbox-item" data-gall="venue-gallery">
                                <img src="/{{$image}}" alt="" class="img-fluid" style="height:200px;width:100%;">
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            @else
            <div class="col-12" style="text-align: center;">
                <h3>No Venue Yet !!!</h3>
            </div>
            @endif
        </section><!-- End Venue Section -->
    </main>

    @include('partial.footer')

    <script src="{{asset('/plugins/jQuery/jquery.min.js')}}"></script>
    <script src="{{asset('/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/plugins/bootstrap/js/bootstrap-slider.js')}}"></script>
    <!-- tether js -->
    <script src="{{asset('/plugins/tether/js/tether.min.js')}}"></script>
    <script src="{{asset('/plugins/raty/jquery.raty-fa.js')}}"></script>
    <script src="{{asset('/plugins/slick-carousel/slick/slick.min.js')}}"></script>
    <script src="{{asset('/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('/plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
    <script src="{{asset('/plugins/smoothscroll/SmoothScroll.min.js')}}"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="{{asset('/plugins/google-map/gmap.js')}}"></script>
    <script src="{{asset('/js/script.js')}}"></script>
    <script type="text/javascript">
        function toggle() {

        }
    </script>
</body>

</html>