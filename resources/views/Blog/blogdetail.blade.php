@extends('layouts.master')

@section('title','DeliveryPortal')

@section('content')
<!-- <section class="page_breadcrumb">
      <div class="container">
          <div class="row">
              <div class="col-sm-6">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="/">Home</a></li>
                          <li class="breadcrumb-item " ><a href="/blog">Blog</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Blog Detail</li>
                          
                      </ol>
                  </nav>
              </div>
              
          </div>
      </div>
  </section> -->

<!-- </div> -->
<!-- ======= Blog Section ======= -->
<section id="blog" class="blog section">
  <div class="container">
    <div class="row">
      @if(session()->has('posts'))
      @php
      $posts = session()->get('posts');
      $categories = session()->get('categories');
      $comments = session()->get('comments');
      @endphp
      @endif
      @php
      session()->put('postid',$posts->id);
      @endphp
      <div class="col-lg-8 entries">

        <article class="entry entry-single">

          <div class="entry-img">
            <img src="{{$posts->feature_image}}" alt="" class="img" style="height: 500px; ">
          </div>

          <h2 class="entry-title">
            <form action="blogdetail" method="post">
              @csrf
              <input type="hidden" name="postid" value="{{$posts->id}}">
              <button type="submit" style="background-color: white;border:none;outline:none;">{{$posts->title}}</button>
            </form>
          </h2>

          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center pl-2"><i class="fa fa-user"></i> <a href="#"><b>{{$posts->user->name}}</b></a></li>
              @php
              $date = strtotime($posts->created_at);
              $postdate = date('M d,Y', $date);
              @endphp
              <li class="d-flex align-items-center"><i class="fa fa-calendar"></i> <a href="#"><time datetime="2020-01-01">{{$postdate}}</time></a></li>
              <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="#">{{ count($comments) }} Comments</a></li>
            </ul>
          </div>

          <div class="entry-content p-2" style="text-align:justify;">
            <p>
              {!! $posts->description !!}
            </p>

            <!-- <blockquote>
              <i class="icofont-quote-left quote-left"></i>
              <p>
                Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
              </p>
              <i class="las la-quote-right quote-right"></i>
              <i class="icofont-quote-right quote-right"></i>
            </blockquote>
            <p>
                Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
              </p> -->

          </div>



        </article><!-- End blog entry -->
        <div class="blog-comments">
          <h4 class="comments-count">{{count($comments)}} Comments</h4>
          @if(count($comments) >0 )
          @foreach($comments as $comment)
          <div id="comment-1" class="comment clearfix">
            <img src="images/vector1.png" class="comment-img  float-left" alt="">
            <h5><a href="">{{$comment->user->name}}</a></h5>
            <time datetime="2020-01-01">{{$comment->created_at->diffForHumans()}}</time>
            <p>
              {{$comment->comment}}
            </p>

          </div><!-- End comment #1 -->
          @endforeach
          @else
          <div class="col-lg-12 comment clearfix" style="text-align: left;">
            <p style="font-size:30px;">No Comment !!!</p>
          </div>
          @endif
          @if(backpack_user())
          <div class="reply-form">
            <h4>Leave a Reply</h4>
            <form action="storecomment" method="post">
              @csrf
              <div class="row">
                <div class="col-md-12 form-group">
                  <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                  <input type="hidden" name="userid" value="{{ backpack_user()->id }}">
                  <input type="hidden" name="postid" value="{{$posts->id}}">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Post Comment</button>

            </form>

          </div>
          @else
          <div class="reply-form">
            <h4>Leave a Reply</h4>
            <div class="col-lg-12 pt-2" style="text-align: center;">
              <p><b>
                  <h4>To submit your comments !!!</h4>
                </b><a href="admin/login"><i>Login Here</i></a> </p>
            </div>
          </div>
          @endif
        </div><!-- End blog comments -->

      </div><!-- End blog entries list -->
      <div class="col-lg-4">

        <div class="sidebar">

          <!-- <h3 class="sidebar-title">Search</h3>
          <div class="sidebar-item search-form">
            <form action="">
              <input type="text">
              <button type="submit"><i class="icofont-search"></i></button>
            </form>

          </div>End sidebar search formn -->

          <!-- <h3 class="sidebar-title">Categories</h3>
          <div class="sidebar-item categories">
            <ul>
              @foreach($categories as $category)
              <li><a href="#">{{$category->name}} <span>{{$category->posts_count}}</span></a></li>
              @endforeach
            </ul>

          </div> -->
          <!-- End sidebar categories-->

          <h3 class="sidebar-title">Recent Posts</h3>
          <div class="sidebar-item recent-posts">
            @if(count($recentposts) >0 )
            @foreach($recentposts as $recentpost)
            <div class="post-item clearfix">
              @php
              $image = json_decode($recentpost->post_images);
              $date = strtotime($recentpost->created_at);
              $created_date = date('M d,Y', $date);
              @endphp
              <div class="row pb-4">
                <div>
                  <img src="{{$image[0]}}" alt="">
                </div>
                <div>
                  <form action="blogdetail" method="post">
                    @csrf
                    <input type="hidden" name="postid" value="{{$recentpost->id}}">
                    <button type="submit" style="background-color: white;border:none;outline:none;"><b>{{$recentpost->title}}</b></button>
                  </form>
                  <p class="pl-3"><i>{{$created_date}}</i></p>
                </div>
              </div>
              @endforeach
              @else
              <p>No Recent Posts!!!</p>
              @endif
            </div><!-- End sidebar recent posts-->
          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
</section><!-- End Blog Section -->


@endsection