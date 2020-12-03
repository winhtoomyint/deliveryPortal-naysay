@extends('layouts.master')

@section('title','Delivery Portal')
@section('css')
<style>
    html,
    body,
    #map-canvas {
        width: 100%;
        height: 70%;
        margin: 0;
        padding: 0;
    }

    #map_canvas {
        position: relative;
    }

    .stars {
        position: relative;
        margin-top: 30px;
        display: flex;
        transform: translate(-50%, -50%) rotateY(180deg);

    }

    .stars input {
        display: none;

    }

    .stars label {
        display: block;
        cursor: pointer;
        width: 50px;
        padding-left: 10px;
    }

    .stars label::before {
        content: '\f005';
        font-family: FontAwesome;
        font-weight: 900;
        position: relative;
        display: block;
        font-size: 20px;
        color: #1d1c1c;
    }

    .stars label::after {
        content: '\f005';
        font-family: FontAwesome;
        font-weight: 900;
        font-size: 20px;
        position: absolute;
        top: 0;
        opacity: 0;
        display: block;
        color: yellow;
        transition: 0.5s;
        text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
    }

    .stars label:hover::after,
    .stars label:hover~label::after,
    .stars input:checked~label::after {
        opacity: 1;
    }
</style>
@endsection

@section('content')
<section class="page-search text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Advance Search -->
                <div class="advance-search">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 align-content-center">
                                <form action="searchlist" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <select class="w-100 form-control text mt-lg-1 mt-md-2" name="category">
                                                <option value="">Choose Category</option>
                                                @foreach($channels as $channel)
                                                @php
                                                session()->put('channelid',$channel->id);
                                                @endphp
                                                <option value="{{$channel->id}}">{{$channel->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select class="w-100 form-control text mt-lg-1 mt-md-2" name="city">
                                                <option value="">Please select city</option>
                                                @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select class="w-100 form-control text mt-lg-1 mt-md-2" name="township">
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
</section>
<!-- <section class="page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Delivery Lists</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Delivery Detail</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
</section> -->
</div>
<!--===================================
    =            Store Section            =
    ====================================-->
<section class="section">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 style="color: black; margin-left: 12px;">Myanmar Delivery</h1>
            </div>
        </div>
        <hr style="margin-left: 12px;">

        @if(session()->has('deliveries'))
        @php
        $deliveries = session()->get('deliveries');
        $myprices = session()->get('myprices');
        $cities = session()->get('cities');
        $townships = session()->get('townships');
        $channels = session()->get('channels');
        $userid = session()->get('userid');
        $categoryid = session()->get('categoryid');
        $reviews = session()->get('reviews');
        @endphp
        @endif
        @foreach($deliveries as $delivery)
        @php
        session()->put('deliveryid',$delivery->id);
        @endphp
        <div class="row">
            <!-- Left sidebar -->
            <div class="col-md-6">
                <div class="product-details">
                    <img class="img-fluid w-100 img-thumbnail" src="{{$delivery->logo}}" alt="product-img">
                </div>
            </div>
            <div class="col-md-6" style="padding-top:35px;">
                <!-- Map Widget -->

                <div class="responsive" id="map-canvas">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30551.45050196821!2d96.17655714298235!3d16.829763286256245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19327dcefc6cf%3A0xd5fd1950ca5e2174!2sPaya%20Lan%20(Thingangyun)!5e0!3m2!1sen!2smm!4v1602578281882!5m2!1sen!2smm" frameborder="0" style="border:0; max-height: 500px;" allowfullscreen="" aria-hidden="false" tabindex="0" class="ifram-map"></iframe>
                </div>

                <!-- Rate Widget -->
                <div class="widget rate" style="margin-top: 35px;">
                    <!-- Heading -->
                    <h5 class="widget-header text-center">What would you rate
                        <br>
                        this product</h5>
                    <!-- Rate -->
                    <div class="starrr"></div>
                </div>
            </div>
            <!-- map own location -->
        </div>

        <!-- Products Details -->
        <div class="row">
            <div class="col-md-12">
                <div class="product-details">
                    <div class="content mt-5 pt-5">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Delivery Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Delivery Pricing -->
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <h3 class="tab-title" style="color: black">Pricing</h3>
                                <section>
                                    <div class="container">
                                        <div class="row">
                                            <div class="text-center col-md-12">
                                                <!-- <img src="images/deliveryprice/1.jpg" alt="" width="300" height="200" class="img-responsive"> -->
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">From City</th>
                                                            <th scope="col">To City</th>
                                                            <th scope="col">From Township</th>
                                                            <th scope="col">To Township</th>
                                                            <th scope="col">Price</th>
                                                        </tr>
                                                    </thead>
                                                    @if(count($myprices) != 0)
                                                    @for($i=0; $i < count($myprices); $i++) <tbody>
                                                        <tr>
                                                            @foreach($cities as $city)
                                                            @if($city->id == $myprices[$i]->from_city_id)
                                                            <td>{{$city->name}}</td>
                                                            @endif
                                                            @if($city->id == $myprices[$i]->to_city_id)
                                                            <td>{{$city->name}}</td>
                                                            @endif
                                                            @endforeach
                                                            @foreach($townships as $township)
                                                            @if($township->id == $myprices[$i]->from_township_id)
                                                            <td>{{$township->name}}</td>
                                                            @endif
                                                            @if($township->id == $myprices[$i]->to_township_id)
                                                            <td>{{$township->name}}</td>
                                                            @endif
                                                            @endforeach
                                                            <td>{{$myprices[$i]->amount }}</td>
                                                        </tr>
                                                        </tbody>

                                                        @endfor
                                                        @else
                                                        <tr>
                                                            <td colspan="5">No Prices Data</td>
                                                        </tr>
                                                        @endif
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                            </div>
                            <!-- Delivery Details -->
                            <div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <h3 class="tab-title" style="color: black;">Delivery Details</h3>
                                <section>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="ml-3">
                                                                <img src="{{$delivery->image}}" alt="" width="200" height="200" class="img-center">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div>
                                                    <div class="container cont">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                Name
                                                            </div>
                                                            <div class="col-md-9">
                                                                {{$delivery->name}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="container cont">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                Address
                                                            </div>
                                                            <div class="col-md-9">
                                                                {{$delivery->address}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="container cont">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                Phone
                                                            </div>
                                                            <div class="col-md-9">
                                                                {{$delivery->phone}}, {{$delivery->other_phone}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="container cont">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                Time
                                                            </div>
                                                            @php
                                                            $stime = $delivery->start_time;
                                                            $starttime = date('h:i:s a', strtotime($stime));
                                                            $etime = $delivery->end_time;
                                                            $endtime = date('h:i:s a', strtotime($etime));
                                                            @endphp
                                                            <div class="col-md-9">
                                                                {{$starttime}}-{{$endtime}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="container cont">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                Email
                                                            </div>
                                                            <div class="col-md-9">
                                                                {{$delivery->email}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="container cont">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                Website
                                                            </div>
                                                            <div class="col-md-9">
                                                                <a href="">{{$delivery->website}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <h4>Facebook Page</h4>
                                                <hr>
                                                <div class="responsive" style="height: 100%; width: 100%;">
                                                    <iframe src="{{$delivery->facebook}}" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <!-- Delivey Review -->
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <h3 class="tab-title text-dark">Product Review</h3>
                                <div class="product-review">
                                    @if(count($reviews) != 0)
                                    @foreach($reviews as $review)
                                    <div class="media">
                                        <img src="images/user/user-thumb.jpg" alt="avater">
                                        <div class="media-body">
                                            Ratings
                                            <div class="col-lg-4 align-self-center">
                                                <div class="row">
                                                    <div class="ratings product-ratings">
                                                        <ul class="list-inline">
                                                            @for($i = 0; $i < $review->rating_star; $i++)
                                                                <li class="list-inline-item selected"><i class="fa fa-star"></i></li>
                                                                @endfor
                                                                @for($j = 0; $j < 5-$review->rating_star; $j++)
                                                                    <li class="list-inline-item"><i class="fa fa-star" style="color: black;"></i></li>
                                                                    @endfor
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="name">
                                                <h5 class="text-dark"><b>{{$review->user->name}}</b></h5>
                                            </div>

                                            <?php
                                            $date = strtotime($review->created_at);
                                            $reviewdate = date('M-d-Y', $date);
                                            ?>
                                            <div class="date">
                                                <p>{{$reviewdate}}</p>
                                            </div>
                                            <div class="review-comment">
                                                <p>
                                                    {{$review->review_text}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="col-lg-12 pt-3" style="text-align: center;">
                                        <h4> No Review Data !!!</h4>
                                    </div>
                                    @endif
                                    <div class="review-submission">
                                        <h4 class="tab-title text-success">Submit your review</h4>

                                        <div class="review-submit">
                                            @if($userid != null)
                                            <form action="storereview" class="row" method="post">
                                                @csrf

                                                <div class="stars col-lg-6">
                                                    <input class="star star-1" id="star-1" type="radio" name="star" value="5" />
                                                    <label class="star star-1" for="star-1"></label>
                                                    <input class="star star-2" id="star-2" type="radio" name="star" value="4" />
                                                    <label class="star star-2" for="star-2"></label>
                                                    <input class="star star-3" id="star-3" type="radio" name="star" value="3" />
                                                    <label class="star star-3" for="star-3"></label>
                                                    <input class="star star-4" id="star-4" type="radio" name="star" value="2" />
                                                    <label class="star star-4" for="star-4"></label>
                                                    <input class="star star-5" id="star-5" type="radio" name="star" value="1" />
                                                    <label class="star star-5" for="star-5"></label>
                                                </div>
                                                <br>
                                                <div class="col-lg-8">
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="col-lg-8">
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                                </div>
                                                <div class="col-8">
                                                    <textarea name="review" id="review" rows="10" class="form-control" placeholder="Leave your Message" style="height: 150px;"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-main" style="background-color: #910118; color: white;">Sumbit</button>
                                                </div>
                                                <input type="hidden" name="userid" value="{{$userid}}">
                                                <input type="hidden" name="deliveryid" value="{{$delivery->id}}">
                                                <input type="hidden" name="channelid" value="{{$categoryid}}">
                                            </form>
                                            @else
                                            <div class="col-lg-12 pt-2" style="text-align: center;">
                                                <p><b>
                                                        <h4>To submit your reviews!!!</h4>
                                                    </b><a href="admin/login"><i>Login Here</i></a> </p>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Container End -->
</section>
@endsection