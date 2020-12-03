@extends('layouts.master')

@section('title','Delivery Portal')

@section('content')
</div>
<!-- <section class="page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/forum">Forum</a></li>
                        <li class="breadcrumb-item"><a href="/forumtopic">Forum Topics</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Question</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
</section> -->
@if(session()->has('topics'))
@php
$topics = session()->get('topics');
$discussions = session()->get('discussions');
$userid = session()->get('userid');
$categories = session()->get('categories');
@endphp
@endif

<section class="doc_blog_grid_area sec_pad forum-single-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Forum post top area -->
                <div class="row">
                    <div class="col-lg-9">
                        <div class="forum-post-top">
                            <a class="author-avatar" href="#">
                                <img src="images/forum/sq2.jpg" alt="" style="border-radius: 50%;">
                            </a>
                            @php
                            session()->put('topicid',$topics->id);
                            @endphp
                            <div class="forum-post-author">
                                <a class="author-name" href="#"> {{$topics->user->name}} </a>
                                <div class="forum-author-meta">
                                    <div class="author-badge">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="15px">
                                            <path fill-rule="evenodd" fill="rgb(131, 135, 147)" d="M11.729,12.136 L11.582,12.167 C11.362,12.415 11.125,12.645 10.869,12.857 L14.999,12.857 C15.134,12.857 15.255,12.944 15.307,13.077 C15.359,13.211 15.331,13.365 15.235,13.467 L14.488,14.268 C14.053,14.733 13.452,15.000 12.838,15.000 L2.495,15.000 C1.872,15.000 1.286,14.740 0.845,14.268 L0.098,13.467 C0.002,13.365 -0.026,13.211 0.026,13.077 C0.077,12.944 0.199,12.857 0.334,12.857 L4.463,12.857 C2.928,11.585 2.000,9.630 2.000,7.499 L2.000,6.785 C2.000,6.194 2.449,5.713 3.000,5.713 L12.333,5.713 C12.885,5.713 13.333,6.194 13.333,6.785 L13.333,7.343 C13.869,7.160 14.736,6.973 15.355,7.400 C15.783,7.696 16.000,8.209 16.000,8.928 C16.000,11.239 11.903,12.100 11.729,12.136 ZM14.994,8.002 C14.557,7.698 13.715,7.941 13.294,8.113 C13.197,9.261 12.837,10.339 12.255,11.269 C13.480,10.911 15.333,10.116 15.333,8.928 C15.333,8.462 15.223,8.158 14.994,8.002 ZM10.261,4.419 C10.376,4.573 10.353,4.798 10.209,4.921 C10.148,4.974 10.074,4.999 10.001,4.999 C9.903,4.999 9.807,4.954 9.740,4.865 C9.198,4.139 9.198,3.002 9.741,2.277 C10.086,1.816 10.086,1.040 9.742,0.580 C9.627,0.426 9.650,0.201 9.794,0.078 C9.937,-0.044 10.146,-0.020 10.263,0.134 C10.805,0.860 10.805,1.996 10.263,2.722 C9.917,3.183 9.917,3.959 10.261,4.419 ZM8.259,4.419 C8.373,4.573 8.350,4.798 8.207,4.921 C8.145,4.974 8.071,4.999 7.999,4.999 C7.901,4.999 7.804,4.954 7.738,4.865 C7.195,4.139 7.195,3.002 7.738,2.277 C8.082,1.816 8.082,1.040 7.739,0.580 C7.624,0.426 7.647,0.201 7.791,0.078 C7.935,-0.045 8.145,-0.020 8.259,0.134 C8.802,0.860 8.802,1.996 8.259,2.722 C7.915,3.183 7.915,3.959 8.259,4.419 ZM6.261,4.418 C6.376,4.572 6.353,4.797 6.210,4.920 C6.148,4.973 6.074,4.999 6.001,4.999 C5.903,4.999 5.807,4.953 5.741,4.865 C5.198,4.139 5.198,3.002 5.741,2.276 C6.085,1.815 6.085,1.039 5.742,0.580 C5.627,0.426 5.650,0.201 5.794,0.078 C5.937,-0.046 6.147,-0.020 6.262,0.133 C6.804,0.859 6.804,1.996 6.262,2.721 C5.918,3.182 5.918,3.959 6.261,4.418 Z"></path>
                                        </svg>
                                        <span>Conversation Starter</span>
                                    </div>
                                    <div class="author-badge">
                                        <i class="fa fa-calendar"></i>
                                        @php
                                        $datetime = strtotime($topics->created_at);
                                        $date = date('M d, Y', $datetime);
                                        @endphp
                                        <a href="">{{$date}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="action-button-container" id="question">
                            <a href="#" class="action_btn btn-ans ask-btn" data-toggle="modal" data-target="#exampleModal">Ask Question</a>
                        </div>
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
                                                @if(count($categories) > 0)
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <input type="hidden" name="userid" value="{{$userid}}">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="action_btn btn-ans ask-btn" style="padding:8px;">Ask question</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Forum post content -->
                <div class="q-title">
                    <div class="row">
                        <span class="question-icon" title="Question">Q:</span>
                        <h1>{{$topics->name}}</h1>
                        <a href="#" class="badge">Features</a>
                    </div>
                </div>
                <div class="forum-post-content">
                    <div class="content" style="text-align: justify;">
                        <p>{!! $topics->description !!}</p>
                    </div>
                    <div class="forum-post-btm">
                        <div class="taxonomy forum-post-tags">
                            {{--<i class="fa fa-tag"></i>&nbsp; &nbsp;<a href="#">Bug</a>, <a href="#">Feature</a>, <a href="#">Error</a>--}}
                        </div>
                        <div class="taxonomy forum-post-cat">
                            <img src="images/forum/dc.jpg" alt=""><a href="#">Docly Support</a>
                        </div>
                    </div>
                    @if(backpack_user())
                    <div class="action-button-container action-btns">
                        <a href="#" class="action_btn btn-ans ask-btn reply-btn" id="cmt">Reply</a>
                        <!-- <a href="#" class="action_btn btn-ans ask-btn too-btn">I have this question too (20)</a> -->
                    </div>
                    @endif
                </div>

                <!-- Best answer -->
                <!-- <div class="best-answer">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="forum-post-top">
                                <a class="author-avatar" href="#">
                                    <img src="images/forum/sq2.jpg" alt="">
                                </a>
                                <div class="forum-post-author">
                                    <a class="author-name" href="#"> Eh Jewel </a>
                                    <div class="forum-author-meta">
                                        <div class="author-badge">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="15px">
                                                <path fill-rule="evenodd" fill="rgb(131, 135, 147)" d="M11.729,12.136 L11.582,12.167 C11.362,12.415 11.125,12.645 10.869,12.857 L14.999,12.857 C15.134,12.857 15.255,12.944 15.307,13.077 C15.359,13.211 15.331,13.365 15.235,13.467 L14.488,14.268 C14.053,14.733 13.452,15.000 12.838,15.000 L2.495,15.000 C1.872,15.000 1.286,14.740 0.845,14.268 L0.098,13.467 C0.002,13.365 -0.026,13.211 0.026,13.077 C0.077,12.944 0.199,12.857 0.334,12.857 L4.463,12.857 C2.928,11.585 2.000,9.630 2.000,7.499 L2.000,6.785 C2.000,6.194 2.449,5.713 3.000,5.713 L12.333,5.713 C12.885,5.713 13.333,6.194 13.333,6.785 L13.333,7.343 C13.869,7.160 14.736,6.973 15.355,7.400 C15.783,7.696 16.000,8.209 16.000,8.928 C16.000,11.239 11.903,12.100 11.729,12.136 ZM14.994,8.002 C14.557,7.698 13.715,7.941 13.294,8.113 C13.197,9.261 12.837,10.339 12.255,11.269 C13.480,10.911 15.333,10.116 15.333,8.928 C15.333,8.462 15.223,8.158 14.994,8.002 ZM10.261,4.419 C10.376,4.573 10.353,4.798 10.209,4.921 C10.148,4.974 10.074,4.999 10.001,4.999 C9.903,4.999 9.807,4.954 9.740,4.865 C9.198,4.139 9.198,3.002 9.741,2.277 C10.086,1.816 10.086,1.040 9.742,0.580 C9.627,0.426 9.650,0.201 9.794,0.078 C9.937,-0.044 10.146,-0.020 10.263,0.134 C10.805,0.860 10.805,1.996 10.263,2.722 C9.917,3.183 9.917,3.959 10.261,4.419 ZM8.259,4.419 C8.373,4.573 8.350,4.798 8.207,4.921 C8.145,4.974 8.071,4.999 7.999,4.999 C7.901,4.999 7.804,4.954 7.738,4.865 C7.195,4.139 7.195,3.002 7.738,2.277 C8.082,1.816 8.082,1.040 7.739,0.580 C7.624,0.426 7.647,0.201 7.791,0.078 C7.935,-0.045 8.145,-0.020 8.259,0.134 C8.802,0.860 8.802,1.996 8.259,2.722 C7.915,3.183 7.915,3.959 8.259,4.419 ZM6.261,4.418 C6.376,4.572 6.353,4.797 6.210,4.920 C6.148,4.973 6.074,4.999 6.001,4.999 C5.903,4.999 5.807,4.953 5.741,4.865 C5.198,4.139 5.198,3.002 5.741,2.276 C6.085,1.815 6.085,1.039 5.742,0.580 C5.627,0.426 5.650,0.201 5.794,0.078 C5.937,-0.046 6.147,-0.020 6.262,0.133 C6.804,0.859 6.804,1.996 6.262,2.721 C5.918,3.182 5.918,3.959 6.261,4.418 Z"></path>
                                            </svg>
                                            <span>Conversation Starter</span>
                                        </div>
                                        <div class="author-badge">
                                            <i class="fa fa-calendar"></i> &nbsp;
                                            <a href="">January 16 at 10:32 PM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <p class="accepted-ans-mark">
                                <i class="fa fa-check text-success"></i> <span>Accepted Solution</span>
                            </p>
                        </div>
                    </div>
                    <div class="best-ans-content d-flex">
                        <span class="question-icon" title="The Best Answer">A:</span>
                        <p>
                            Hi,
                            You can edit the service pages with Elementor. To enable Elementor on Service post type, follow the bellow steps<br>
                            Step 1 - Navigate to your website's WordPress Dashbord&gt;Elementor&gt;Settings<br>
                            Step 2 - Tick the post you went to edit with Elementor in the post typs section and click the save<br>
                            changes button<br>
                            Step 3 - Now you can click edit with Elementor button and start working<br><br>
                            Thanks!
                        </p>
                    </div>
                </div> -->

                <!-- All answer -->
                <div class="all-answers">
                    <h3 class="title">All Replies</h3>
                    <div class="filter-bar d-flex">
                        <div class="sort">
                            <select class="custom-select" id="sortBy" style="display: none;">
                                <option selected="">Sort By</option>
                                <option value="1">ASC</option>
                                <option value="2">Desc</option>
                                <option value="3">Vote</option>
                            </select>
                            <div class="nice-select custom-select" tabindex="0"><span class="current">Sort By</span>
                                <ul class="list">
                                    <li data-value="Sort By" class="option selected">Sort By</li>
                                    <li data-value="1" class="option">ASC</li>
                                    <li data-value="2" class="option">Desc</li>
                                    <li data-value="3" class="option">Vote</li>
                                </ul>
                            </div>
                        </div>
                        <p>Page 1 of 4</p>
                    </div>
                    @if(count($discussions) > 0)
                    @foreach($discussions as $discussion)
                    <div class="forum-comment">
                        <div class="forum-post-top">
                            <a class="author-avatar" href="#">
                                <img src="images/forum/sq2.jpg" alt="author avatar" style="border-radius: 50%;">
                            </a>
                            <div class="forum-post-author">
                                <a class="author-name" href="#">{{$discussion->user->name}}</a>
                                <div class="forum-author-meta">
                                    <div class="author-badge">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="15px">
                                            <path fill-rule="evenodd" fill="rgb(131, 135, 147)" d="M11.729,12.136 L11.582,12.167 C11.362,12.415 11.125,12.645 10.869,12.857 L14.999,12.857 C15.134,12.857 15.255,12.944 15.307,13.077 C15.359,13.211 15.331,13.365 15.235,13.467 L14.488,14.268 C14.053,14.733 13.452,15.000 12.838,15.000 L2.495,15.000 C1.872,15.000 1.286,14.740 0.845,14.268 L0.098,13.467 C0.002,13.365 -0.026,13.211 0.026,13.077 C0.077,12.944 0.199,12.857 0.334,12.857 L4.463,12.857 C2.928,11.585 2.000,9.630 2.000,7.499 L2.000,6.785 C2.000,6.194 2.449,5.713 3.000,5.713 L12.333,5.713 C12.885,5.713 13.333,6.194 13.333,6.785 L13.333,7.343 C13.869,7.160 14.736,6.973 15.355,7.400 C15.783,7.696 16.000,8.209 16.000,8.928 C16.000,11.239 11.903,12.100 11.729,12.136 ZM14.994,8.002 C14.557,7.698 13.715,7.941 13.294,8.113 C13.197,9.261 12.837,10.339 12.255,11.269 C13.480,10.911 15.333,10.116 15.333,8.928 C15.333,8.462 15.223,8.158 14.994,8.002 ZM10.261,4.419 C10.376,4.573 10.353,4.798 10.209,4.921 C10.148,4.974 10.074,4.999 10.001,4.999 C9.903,4.999 9.807,4.954 9.740,4.865 C9.198,4.139 9.198,3.002 9.741,2.277 C10.086,1.816 10.086,1.040 9.742,0.580 C9.627,0.426 9.650,0.201 9.794,0.078 C9.937,-0.044 10.146,-0.020 10.263,0.134 C10.805,0.860 10.805,1.996 10.263,2.722 C9.917,3.183 9.917,3.959 10.261,4.419 ZM8.259,4.419 C8.373,4.573 8.350,4.798 8.207,4.921 C8.145,4.974 8.071,4.999 7.999,4.999 C7.901,4.999 7.804,4.954 7.738,4.865 C7.195,4.139 7.195,3.002 7.738,2.277 C8.082,1.816 8.082,1.040 7.739,0.580 C7.624,0.426 7.647,0.201 7.791,0.078 C7.935,-0.045 8.145,-0.020 8.259,0.134 C8.802,0.860 8.802,1.996 8.259,2.722 C7.915,3.183 7.915,3.959 8.259,4.419 ZM6.261,4.418 C6.376,4.572 6.353,4.797 6.210,4.920 C6.148,4.973 6.074,4.999 6.001,4.999 C5.903,4.999 5.807,4.953 5.741,4.865 C5.198,4.139 5.198,3.002 5.741,2.276 C6.085,1.815 6.085,1.039 5.742,0.580 C5.627,0.426 5.650,0.201 5.794,0.078 C5.937,-0.046 6.147,-0.020 6.262,0.133 C6.804,0.859 6.804,1.996 6.262,2.721 C5.918,3.182 5.918,3.959 6.261,4.418 Z"></path>
                                        </svg>
                                        <span>Conversation Starter</span>
                                    </div>
                                    <div class="author-badge">
                                        <i class="icon_calendar"></i>
                                        <a href="">{{$discussion->created_at->diffForHumans()}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-content">
                            <p class="pl-4">{{$discussion->discussion}}</p>
                            {{--<div class="action-button-container action-btns">
                                <a href="#" class="action_btn btn-ans ask-btn reply-btn">Reply</a>
                                <a href="#" class="action_btn btn-ans ask-btn too-btn">Helpful</a>
                            </div>--}}
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="forum-comment">

                        <div class="comment-content">
                            <h4 style="text-align:center;" class="pt-2">No Comments Yet!!!</h4>
                        </div>
                    </div>
                    @endif
                    <!-- pagination-wrapper justify content center -->

                    <!-- <div class="pagination justify-content-right" style="margin-left: 380px;">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> -->

                    <!-- <div class="pagination-wrapper">
                                <div class="view-post-of">
                                    <p>Viewing 4 Comments - 1 through 10 (of 96 total)</p>
                                </div>
                                <ul class="post-pagination">
                                    <li class="prev-post pegi-disable"><a href="#"><i class="arrow_carrot-left"></i></a>
                                    </li>
                                    <li><a href="#" class="active">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">15</a></li>
                                    <li class="next-post"><a href="#"><i class="arrow_carrot-right"></i></a></li>
                                </ul>
                            </div> -->

                </div>
                <div id="reply" class="pt-5">
                    <form action="storeforumcomment" method="post">
                        @csrf
                        {{--<div class="col-lg-12">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                        </div><br>
                        <div class="col-lg-12">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div><br>--}}
                        <div class="col-12">
                            <textarea name="comment" id="review" rows="10" class="form-control" placeholder="Leave your Message" style="height: 150px;"></textarea>
                        </div>
                        <div class="col-12 pt-2">
                            <button type="submit" class="btn btn-main" style="background-color: #910118; color: white;">Sumbit</button>
                        </div>
                        <input type="hidden" name="topicid" value="{{$topics->id}}">
                        <input type="hidden" name="userid" value="{{$userid}}">
                    </form>
                </div>
            </div>
            <!-- /.col-lg-8 -->

            <div class="col-lg-4">
                <div class="forum_sidebar">
                    <div class="widget status_widget">
                        <h4 class="c_head">Information</h4>
                        <p class="status">Support is <span class="offline">Offline</span></p>
                        <div class="open-hours">
                            <h4 class="title-sm">Our office hours</h4>
                            <p>
                                Monday - Friday / 10am - 6pm (UTC +4) NewYork
                            </p>
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
                        <!-- /.open-hours -->
                    </div>

                    <div class="widget usefull_links_widget">
                        <h4 class="c_head">Usefull Links</h4>

                        <ul class="list-unstyled usefull-links">
                            <li><i class="fa fa-info"></i>&nbsp;<a href="#">FAQs</a></li>
                            <li><i class="fa fa-info"></i>&nbsp;<a href="#">Popular</a></li>
                            <li><i class="fa fa-user"></i>&nbsp;<a href="#">Recent</a></li>
                            <li><i class="fa fa-user"></i>&nbsp;<a href="#">Unanswered</a></li>
                        </ul>
                    </div>
                    <!-- <div class="widget ticket_widget">
                                <h4 class="c_head">Ticket Categories</h4>

                                <ul class="list-unstyled ticket_categories">
                                    <li><img src="img/home_support/cmm5.png" alt="category"><a href="#">Docs WordPress
                                            Theme</a> <span class="count">10</span></li>
                                    <li><img src="img/home_support/cmm4.png" alt="category"><a href="#">Product Landing
                                            Page</a><span class="count count-fill">13</span><span class="count">54</span></li>
                                    <li><img src="img/home_support/cmm2.png" alt="category"><a href="#">Knowledge base
                                            Template</a><span class="count">142</span></li>
                                    <li><img src="img/home_support/cmm8.png" alt="category"><a href="#">Startup and App
                                            WP Theme</a> <span class="count">13</span></li>
                                    <li><img src="img/home_support/cmm9.png" alt="category"><a href="#">Clean Email
                                            Template</a> <span class="count">123</span></li>
                                    <li><img src="img/home_support/cmm10.png" alt="category"><a href="#">Apps WordPress
                                            Theme</a> <span class="count">18</span></li>
                                </ul>
                            </div> -->

                    <!-- <div class="widget tag_widget">
                                <h4 class="c_head">Tags</h4>
                                <ul class="list-unstyled w_tag_list style-light">
                                    <li><a href="#">Swagger</a></li>
                                    <li><a href="#">Docly</a></li>
                                    <li><a href="#">weCare</a></li>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Download</a></li>
                                    <li><a href="#">Doc</a></li>
                                    <li><a href="#">WordPress</a></li>
                                    <li><a href="#">Design</a></li>
                                    <li><a href="#">ui/ux</a></li>
                                    <li><a href="#">Doc Design</a></li>
                                    <li><a href="#">DocAll</a></li>
                                    <li><a href="#">Productboard</a></li>
                                    <li><a href="#">Magento</a></li>
                                </ul>
                            </div> -->

                </div>
            </div>
            <!-- /.col-lg-4 -->
        </div>
    </div>
</section>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $('#reply').hide();
        $(document).on('click', '#cmt', function(event) {
            event.preventDefault();
            $('#reply').show();
        });
    });
</script>
@endsection