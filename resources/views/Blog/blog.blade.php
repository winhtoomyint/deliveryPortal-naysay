@extends('layouts.master')

@section('title', 'Delivery Protal')

@section('content')
<!--==================================
=            Blog Section            =
===================================-->

<section id="blog" class="blog section">

    <div class="container">

        <div class="row">
            @if(count($posts) > 0)
            @foreach($posts as $post)
            @if($post->publish == 1)
            <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                <article class="entry col-12">
                    <div class="entry-img">
                        <img src="{{$post->post_images[0]}}" alt="" class="img">
                    </div>

                    <div class="entry-title">
                        <h4>
                            <form action="blogdetail" method="post">
                                @csrf
                                <input type="hidden" name="postid" value="{{$post->id}}">
                                <button class="pl-2" type="submit" style="background-color: white;border:none;outline:none;">{{$post->title}}</button>
                            </form>
                        </h4>
                    </div>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center pl-2"><i class="fa fa-user"></i> <a href="#"><b> {{ $post->user->name}}</b></a></li>
                            @php
                            $date = strtotime($post->created_at);
                            $created_date = date('M,d-Y', $date);
                            @endphp
                            <li class="d-flex align-items-center"><i class="fa fa-calendar"></i> <a href="#"><time datetime="2020-01-01">{{$created_date}}</time></a></li>
                        </ul>
                    </div>

                    <div class="entry-content p-2" style="text-align: justify;">
                        @php
                        if (strlen(strip_tags($post->description)) > 150) {
                        $stringCut = substr($post->description, 0, 150);
                        $endPoint = strrpos($stringCut, ' ');
                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                        @endphp
                        <div style="height: 150px;">
                            <p>{!! $string !!}</p>
                        </div>
                        @php
                        }
                        else{
                        $string = $post->description;
                        @endphp
                        <div style="height: 150px;">
                            <p>{!! $string !!}</p>
                        </div>
                        @php
                        }
                        @endphp
                    </div>
                    <div class="read-more float-right p-2">
                        <form action="blogdetail" method="post">
                            @csrf
                            <input type="hidden" name="postid" value="{{$post->id}}">
                            <button type="submit" style="border: none; background-color:#a10a28;color:white;" class="p-2">Read More</button>
                        </form>
                    </div>
                </article><!-- End blog entry -->
            </div>
            @endif
            @endforeach
            @else
            <div class="col-lg-12 pt-5" style="text-align: center;">
                <p style="font-size:30px;">No Posts Yet !!!</p>
            </div>
            @endif
        </div>
        <div class="pagination justify-content-center">
            {{ $posts->links() }}
        </div>

    </div>
</section><!-- End Blog Section -->
@endsection