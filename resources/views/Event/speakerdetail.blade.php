@extends('layouts.master')

@section('title','Delivey Portal')

@section('content')
<!-- ======= Blog Section ======= -->
<section id="blog" class="blog section">
    <div class="container">

        <div class="row">
            
            <div class="col-lg-10 entries" style="margin: auto;">

                <article class="entry entry-single">

                    <div class="entry-img">
                        <img src="/{{$speaker->image}}" alt="" class="img" style="height: 500px; ">
                    </div>

                    <h2 class="entry-title">
                        <a href="/speakerdetail/{{$speaker->id}}">{{$speaker->name}}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            @if($speaker->position != null)
                            <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-detail.html">{{$speaker->position}}</a></li>
                            @endif
                        </ul>
                    </div>

                    <div class="entry-content">
                        <blockquote>
                            <i class="icofont-quote-left quote-left"></i>
                            @if($speaker->description != null)
                            <p>
                                {{$speaker->description}}
                            </p>
                            @else
                            <p> No Description </p>
                            @endif
                            <i class="las la-quote-right quote-right"></i>
                            <i class="icofont-quote-right quote-right"></i>
                        </blockquote>
                    </div>



                </article><!-- End blog entry -->

            </div><!-- End blog entries list -->

           

        </div>

    </div>
</section><!-- End Blog Section -->

@endsection