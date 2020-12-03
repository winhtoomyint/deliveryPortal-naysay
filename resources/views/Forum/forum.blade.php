@extends('layouts.master')

@section('title', 'Delivery Protal')

@section('content')

<body data-scroll-animation="true" class="forum">
    <!-- <section class="page_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                             <li class="breadcrumb-item"><a href="forum.html">Forum</a></li> 
                            <li class="breadcrumb-item active" aria-current="page">Forum</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </section> -->

    <section class="doc_blog_grid_area sec_pad forum-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if(count($forumCategories) > 0)
                    <div class="answer-action">
                        <div class="action-content">
                            <div class="image-wrap">
                                <img src="images/forum/2.jpg" alt="answer action">
                            </div>

                            <div class="content">
                                <h2 class="ans-title">Can’t find an answer?</h2>
                                <p>
                                    Make use of a qualified tutor to get the answer
                                </p>
                            </div>
                        </div>
                        <!-- /.action-content -->

                        <div class="action-button-container" id="question">
                            <a href="#" class="action_btn btn-ans" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Ask a Question</a>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Your Question?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="forumquestion" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Title:</label>
                                                <input type="text" class="form-control" id="title" name="title">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Question:</label>
                                                <textarea class="form-control" id="question" name="question"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1" class="col-form-label">Category select</label><br>
                                                <select class="form-control clo-md-12" id="categoryid" name="categoryid">
                                                    <option value="">Please select category</option>
                                                    @if(count($forumCategories) > 0)
                                                    @foreach($forumCategories as $category)
                                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        <input type="hidden" name="userid" value="{{$userid}}">
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="action_btn btn-ans">Ask question</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.action-button-container -->
                    </div>
                    @endif
                    <!-- /.answer-action -->

                    <div class="post-header forums-header myforum">
                        <div class="col-md-6 col-sm-6 support-info">
                            <span> Forum </span>
                        </div>
                        <!-- /.support-info -->
                        <div class="col-md-6 col-sm-6 support-category-menus">
                            <ul class="forum-titles">
                                <li class="forum-topic-count">Topics</li>
                                <li class="forum-freshness">Created Date</li>
                            </ul>
                        </div>
                        <!-- /.support-category-menus -->
                    </div>
                    <!-- /.post-header -->

                    <div class="community-posts-wrapper bb-radius">
                        @if(count($forumCategories) > 0)
                        @foreach($forumCategories as $forum)
                        <!-- Forum Item -->
                        <div class="community-post style-two forum-item bug">
                            <div class="col-md-6 post-content">
                                <div class="author-avatar forum-icon">
                                    <img src="images/forum/3.png" alt="community post">
                                </div>
                                <div class="entry-content">
                                    <h3 class="post-title">
                                        <form action="forumtopic" method="post">
                                            @csrf
                                            <input type="hidden" name="categoryid" value="{{$forum->id}}">
                                            <button type="submit" style="border: none; outline:none;" class="bg-white pt-2">{{$forum->title}}
                                            </button>
                                        </form>

                                    </h3>
                                </div>
                            </div>
                            <div class="col-md-6 post-meta-wrapper">
                                <ul class="forum-titles">
                                    <li class="forum-topic-count">{{$forum->topics_count}}</li>
                                    <li class="forum-freshness">
                                        <div class="freshness-box">
                                            <div class="freshness-top">
                                                <div class="freshness-link">
                                                    <a href="#" title="Reply To: Main Forum Rules &amp; Policies">{{$forum->created_at->diffForHumans()}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="community-post style-two forum-item bug">
                            <h4 class="col-12" style="text-align: center;">No Forum Yet !!!</h4>
                        </div>
                        @endif
                    </div>
                    <!-- /.community-posts-wrapper -->

                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="forum_sidebar">
                        <div class="widget status_widget">
                            <h4 class="c_head">Information</h4>
                            <p class="status">Support is <span class="offline">Offline</span></p>
                            <div class="open-hours">
                                <h4 class="title-sm">Our office hours</h4>
                                <p>Monday - Friday / 10am - 6pm (UTC +4) NewYork</p>
                                <ul class="current-time list-unstyled">
                                    <li>
                                        <h4 class="title-sm">Your time</h4>
                                        <p>10:30:15 PM</p>
                                    </li>
                                    <li>
                                        <h4 class="title-sm">Your time</h4>
                                        <p>10:30:15 PM</p>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
        </div>
    </section>


    @endsection