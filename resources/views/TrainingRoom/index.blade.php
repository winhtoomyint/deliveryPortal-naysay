@extends('layouts.master')

@section('title', 'Delivery Protal')

@section('content')
<!-- <section class="page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Training Room</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
</section> -->
<!-- ======= Blog Section ======= -->
<section id="blog" class="blog section">
    <div class="container">
        @if(count($videos) >0)
        <div class="row">
            <div class="col-lg-7 entries" style="margin-top: 19px;">
                <div class="entry-img youtube" style="margin-bottom: 20px;">
                    <iframe width="560" height="315" src="{{$videos[0]->video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <h2 class="entry-title" style="margin-bottom: 20px;">
                    <a href="blogdetail">{!! $videos[0]->description !!}</a>
                </h2>

            </div><!-- End blog entries list -->
            <div class="col-lg-5">
                <div class="sidebar">
                    @if($playlistname !=null)
                    <h3 class="sidebar-title">Playlist <b>{{$playlistname}}</b></h3>
                    @else
                    <h3 class="sidebar-title">Playlist</h3>
                    @endif

                    @if(count($videos) > 0)

                    <hr>

                    <div class="sidebar-item recent-youtube">

                        @foreach($videos as $video)
                        <div class="post-item clearfix row" style="margin-bottom: 10px;">
                            <div class="col-md-5">
                                <form action="videoshow" method="post">
                                    @csrf
                                    <input type="hidden" name="videoid" value="{{$video->id}}">
                                    <button type="submit" style="border: 0;outline:none;" class="bg-white">
                                        <video width="120" height="70" controls>
                                            <source src="{{$video->video}}">
                                        </video>
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-7 pt-3">
                                <form action="videoshow" method="post">
                                    @csrf
                                    <input type="hidden" name="videoid" value="{{$video->id}}">
                                    <button type="submit" style="border: none;outline:none;" class="bg-white">{{$video->title}}
                                    </button>
                                </form>
                            </div>
                            <!-- <time datetime="2020-01-01">Jan 1, 2020</time> -->
                        </div>
                        @endforeach
                    </div><!-- End sidebar recent posts-->
                    @else
                    <h2>No videos</h2>
                    @endif
                </div><!-- End sidebar -->
            </div><!-- End blog sidebar -->
        </div>
        @else
        <div class="col-lg-12 pt-5" style="text-align: center;">
                <p style="font-size:30px;">No Videos Yet !!!</p>
            </div>
        @endif
    </div>
</section><!-- End Blog Section -->
</div>
@endsection