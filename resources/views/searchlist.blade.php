@extends('layouts.master')

@section('title','DeliverPortal')

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
                                        <div class="form-group col-md-4">
                                            <select class="w-100 form-control text mt-lg-1 mt-md-2 s2" name="category">
                                                <option value="">Choose Category</option>
                                                @foreach($allChannels as $channel)
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
                                        <div class="form-group col-md-2 align-self-center mr-0">
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
<!-- <section class=" page_breadcrumb ">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Delivery Lists</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
</section> -->
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(count($channels) > 1)
                <div class="search-result">
                    <h2>Results For All Channels</h2>
                    <p>{{ $deliveries->total() }} Results found</p>
                </div>
                @else
                @foreach($channels as $channel)
                <div class="search-result">
                    <h2>Results For "{{$channel->name}}"</h2>
                    <p>{{ $deliveries->total() }} Results found</p>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="category-sidebar">
                    <div class="widget category-list">
                        <h4 class="widget-header">All Category</h4>
                        <ul class="category-list">
                            @foreach($allChannels as $channel)
                            <li><a href="#">{{$channel->name}} <span>{{$channel->deliveries_count}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget filter">
                        <h4 class="widget-header">Show Delivery By</h4>
                        <select>
                            <option>Popularity</option>
                            <option value="1">Top rated</option>
                            <option value="2">Lowest Price</option>
                            <option value="4">Highest Price</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="category-search-filter">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Short</strong>
                            <select>
                                <option>Most Recent</option>
                                <option value="1">Most Popular</option>
                                <option value="2">Lowest Price</option>
                                <option value="4">Highest Price</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="view">
                                <strong>Views</strong>
                                <ul class="list-inline view-switcher">
                                    <li class="list-inline-item">
                                        <form action="" method="post">
                                            @csrf
                                            <input type="hidden" name="category" value="{{$categoryid}}">
                                            <input type="hidden" name="city" value="{{$cityid}}">
                                            <input type="hidden" name="township" value="{{$townshipid}}">
                                            <button type="submit" id="list1" style="border: none;outline:none;background-color:white;"><i class="fa fa-th-large"></i></button>
                                        </form>
                                    </li>
                                    <li class="list-inline-item">
                                        <form action="" method="post">
                                            @csrf
                                            <input type="hidden" name="category" value="{{$categoryid}}">
                                            <input type="hidden" name="city" value="{{$cityid}}">
                                            <input type="hidden" name="township" value="{{$townshipid}}">
                                            <button type="submit" id="list2" name="list2" style="border: none;outline:none;background-color:white;"><i class="fa fa-reorder"></i></button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ad listing list  -->
                @if(count($deliveries) > 0)
                @foreach($deliveries as $delivery)
                @php $date=strtotime($delivery->created_at);
                $created_date = date('M, d-Y', $date);
                foreach ($channels as $channel) {
                $channelid = $channel->id;
                }
                @endphp
                <div class="ad-listing-list mt-20">
                    <div class="row p-lg-3 p-sm-5 p-4">
                        <form action="deliverydetails" method="post">
                            @csrf
                            <div class="col-lg-4 align-self-center">
                                <input type="hidden" name="deliveryid" value="{{$delivery->id}}">
                                <input type="hidden" name="channelid" value="{{$channelid}}">
                                <button type="submit" style="border: none; width:200px;outline:none;" class="bg-white"><img src="{{$delivery->image}}" class="img-fluid" alt="">
                                </button>
                            </div>
                        </form>
                        <!-- <div class="col-lg-4 align-self-center">
                            <div>
                                <a href="deliverydetails/{{$delivery->id}}">
                                    <img src="{{$delivery->image}}" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div> -->
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-8 col-md-10">
                                    <div class="ad-listing-content">
                                        <form action="deliverydetails" method="post">
                                            @csrf
                                            <div>
                                                <input type="hidden" name="deliveryid" value="{{$delivery->id}}">
                                                <input type="hidden" name="channelid" value="{{$channelid}}">
                                                <button type="submit" style="border: none;outline:none;" class="bg-white font-weight-bold">{{$delivery->name}}
                                                </button>
                                            </div>
                                        </form>
                                        <ul class="list-inline mt-2 mb-3">
                                            <li class="list-inline-item"><a href=""><i class="fa fa-calendar"></i> {{$created_date}}</a></li>
                                        </ul>
                                        @if($delivery->description !=null )
                                        <p class="pr-5" style="text-align:justify;">{{$delivery->description}}</p>
                                        @else
                                        <p class="card-text" style="height:200px;color:#b2b7c2;">No Description!!!</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-4 align-self-center">
                                    <div class="product-ratings float-lg-right pb-3">
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
                </div>

                @endforeach
                <div class="product-grid-list row pl-3 pr-3">
                    <div class="row mt-30 col-md-12">

                        @foreach($deliveries as $delivery)
                        @php $date=strtotime($delivery->created_at);
                        $created_date = date('M, d-Y', $date);
                        foreach ($channels as $channel) {
                        $channelid = $channel->id;
                        }
                        @endphp
                        <div class="col-sm-12 col-lg-4 col-md-6">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <form action="deliverydetails" method="post">
                                            @csrf
                                            <div class="buttons">
                                                <input type="hidden" name="deliveryid" value="{{$delivery->id}}">
                                                <input type="hidden" name="channelid" value="{{$channelid}}">
                                                <button type="submit" style="border: none;outline:none;" class="bg-white button"><img class="card-img-top img-fluid" style="height:200px;width:230px;" src="{{$delivery->image}}" alt="Card image cap">
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body pt-3">
                                        <form action="deliverydetails" method="post">
                                            @csrf
                                            <div>
                                                <input type="hidden" name="deliveryid" value="{{$delivery->id}}">
                                                <input type="hidden" name="channelid" value="{{$channelid}}">
                                                <button type="submit" style="border: none;outline:none;" class="bg-white font-weight-bold">{{$delivery->name}}
                                                </button>
                                            </div>
                                        </form>
                                        <ul class="list-inline product-meta">
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-calendar"></i>{{$created_date}}</a>
                                            </li>
                                        </ul>
                                        @if($delivery->description != null)
                                        @php
                                        if (strlen(strip_tags($delivery->description)) > 150) {
                                        $stringCut = substr($delivery->description, 0, 150);
                                        $endPoint = strrpos($stringCut, ' ');
                                        $deliverydes = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        @endphp
                                        <div style="height:200px;text-align:justify;">
                                            <p>{{ $deliverydes }}</p>
                                        </div>
                                        <!-- <p class="card-text pt-2" >{{ $deliverydes }}</p> -->
                                        @php
                                        }else{
                                        @endphp
                                        <div style="height:200px;text-align:justify;">
                                            <p>{{ $delivery->description }}</p>
                                        </div>

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

                    </div>
                </div>
                @else
                <div class="col-lg-12 pt-5" style="text-align: center;">
                    <h4>No Delivery Data !!!</h4>
                </div>
                @endif
                @if(count($deliveries) > 0)
                <div class="pagination justify-content-center p1">
                    {{ $deliveries->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $('.ad-listing-list').show();
        $('.product-grid-list').hide();
        $(document).on('click', '#list1', function(event) {
            event.preventDefault();
            $('.ad-listing-list').hide();
            $('.product-grid-list').show();

        });
        $(document).on('click', '#list2', function(event) {
            event.preventDefault();
            $('.ad-listing-list').show();
            $('.product-grid-list').hide();
        });
    });
</script>
@endsection