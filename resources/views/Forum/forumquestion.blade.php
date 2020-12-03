@extends('layouts.master')

@section('title','DeliveryPortal')

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

                        <li class="breadcrumb-item active" aria-current="page">Forum Topics</li>
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
                <div class="communities-boxes">
                    <div class="docly-com-box">
                        <div class="icon-container">
                            <img src="images/forum/9.png" alt="communinity-box">
                        </div>

                        <div class="docly-com-box-content">
                            <h3 class="title"><a href="#"> Getting Started</a></h3>
                            <p class="total-post">453 Posts</p>
                        </div>
                        <!-- /.docly-com-box-content -->
                    </div>
                    <!-- /.docly-com-box -->

                    <div class="docly-com-box">
                        <div class="icon-container">
                            <img src="images/forum/8.png" alt="communinity-box">
                        </div>

                        <div class="docly-com-box-content">
                            <h3 class="title"><a href="#"> Integrations</a></h3>
                            <p class="total-post">624 Posts</p>
                        </div>
                        <!-- /.docly-com-box-content -->
                    </div>
                    <!-- /.docly-com-box -->

                    <div class="docly-com-box">
                        <div class="icon-container">
                            <img src="images/forum/9.png" alt="communinity-box">
                        </div>

                        <div class="docly-com-box-content">
                            <h3 class="title"><a href="#"> Solar System</a></h3>
                            <p class="total-post">120 Posts</p>
                        </div>
                        <!-- /.docly-com-box-content -->
                    </div>
                    <!-- /.docly-com-box -->

                    <div class="docly-com-box">
                        <div class="icon-container">
                            <img src="images/forum/10.png" alt="communinity-box">
                        </div>

                        <div class="docly-com-box-content">
                            <h3 class="title"><a href="#"> Cloud Server</a></h3>
                            <p class="total-post">235 Posts</p>
                        </div>
                        <!-- /.docly-com-box-content -->
                    </div>
                    <!-- /.docly-com-box -->

                </div>
                <!-- /.communities-boxes -->

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

                    <div class="action-button-container">
                        <a href="#" class="action_btn btn-ans">Ask a Question</a>
                    </div>
                    <!-- /.action-button-container -->
                </div>
                <!-- /.answer-action -->

                <div class="post-header">
                    <div class="support-info">
                        <ul class="support-total-info">
                            <li class="open-ticket"><i class="fa fa-info-circle"></i> 576 Open</li>
                            <li class="close-ticket"><i class="fa fa-times-circle"></i><a href="#"> 2,974 Closed</a></li>
                        </ul>
                    </div>
                    <!-- /.support-info -->

                    <div class="row support-category-menus">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuAuthor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Author
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuAuthor" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -426px, 0px);">
                                <h3 class="title">Filter by author</h3>

                                <form action="#" class="cate-search-form">
                                    <input type="text" placeholder="Filter users">
                                </form>

                                <div class="all-users">
                                    <a class="dropdown-item" href="#0">
                                        <img src="images/forum/us.png" alt="user">
                                        Richard Tea
                                    </a>
                                    <a class="dropdown-item" href="#0">
                                        <img src="images/forum/us.png" alt="user">
                                        Druid Wensleydale
                                    </a>
                                    <a class="dropdown-item" href="#0">
                                        <img src="images/forum/us.png" alt="user">
                                        Weir Doee
                                    </a>
                                    <a class="dropdown-item" href="#0">
                                        <img src="images/forum/us.png" alt="user">
                                        Giles Posture
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Label
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLabel">
                                <h3 class="title">Filter by label</h3>

                                <form action="#" class="cate-search-form">
                                    <input type="text" placeholder="Filter users">
                                </form>

                                <div class="all-users">
                                    <a class="dropdown-item" data-rel="docly" href="#0">
                                        <span class="color-purple"></span>
                                        Docly
                                    </a>
                                    <a class="dropdown-item" data-rel="improvement" href="#0">
                                        <span class="color-yellow">
                                        </span>
                                        Improvement !
                                    </a>
                                    <a class="dropdown-item" data-rel="css" href="#0">
                                        <span class="color-ass"></span>
                                        CSS
                                    </a>
                                    <a class="dropdown-item" href="#0" data-rel="feature">
                                        <span class="color-green"></span>
                                        Feature
                                    </a>
                                    <a class="dropdown-item" data-rel="spider" href="#0">
                                        <span class="color-orange"></span>
                                        Spider theme
                                    </a>
                                    <a class="dropdown-item" href="#0" data-rel="open">
                                        <span class="color-theme"></span>
                                        Open
                                    </a>
                                    <a class="dropdown-item" data-rel="bug" href="#0">
                                        <span class="color-pink"></span>
                                        Bug !
                                    </a>
                                    <a class="dropdown-item" data-rel="doc" href="#0">
                                        <span class="color-light-green"></span>
                                        Docs
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuAssignee" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Assignee
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuAssignee">
                                <h3 class="title">Filter by author</h3>

                                <form action="#" class="cate-search-form">
                                    <input type="text" placeholder="Filter users">
                                </form>

                                <div class="all-users">
                                    <a class="dropdown-item" href="#">
                                        <img src="images/forum/us.png" alt="user">
                                        Richard Tea
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="images/forum/us.png" alt="user">
                                        Druid Wensleydale
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="images/forum/us.png" alt="user">
                                        Weir Doee
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="images/forum/us.png" alt="user">
                                        Giles Posture
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <h3 class="title">Sort by</h3>
                                <div class="short-by">
                                    <a class="dropdown-item active-short" href="#0">Newest</a>
                                    <a class="dropdown-item" href="#0">Oldest</a>
                                    <a class="dropdown-item" href="#0">Most commented</a>
                                    <a class="dropdown-item" href="#0">Least commented</a>
                                    <a class="dropdown-item" href="#0">Recently updated</a>
                                    <a class="dropdown-item" href="#0">Least recently updated</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                <!-- /.post-header -->
                @foreach($topics as $topic)
                @php
                session()->put('categoryid',$categoryid);
                @endphp
                <div class="community-posts-wrapper bb-radius">
                    <div class="community-post style-two docly richard bug">
                        <div class="post-content">
                            <div class="author-avatar">
                                <img src="images/forum/p2.jpg" alt="community post" style="border-radius: 50%;">
                            </div>
                            <div class="entry-content">
                                <h3 class="post-title">
                                    <form action="singlequestion" method="post">
                                        @csrf
                                        <input type="hidden" name="topicid" value="{{$topic->id}}">
                                        <button type="submit" style="border: none; outline:none;" class="bg-white pt-2">{{$topic->name}}
                                        </button>
                                    </form>
                                </h3>
                                <ul class="meta">
                                    <li><img src="images/forum/f1.jpg" alt="cmm"><a href="#"> {{$topic->name}}</a></li>
                                    <li><i class="icon_calendar"></i>{{$topic->created_at->diffForHumans()}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-meta-wrapper">
                            <ul class="post-meta-info">
                                <div class="row">
                                    <li style="margin-right: 40px;margin-top: 20px;"><a href="#"><i class="fa fa-comment"></i> &nbsp; 20</a></li>
                                    <li style="margin-top: 20px;"><a href="#"><i class="fa fa-star"></i> &nbsp;5</a></li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <!-- /.community-post -->
                </div>
                @endforeach
                <!-- /.community-posts-wrapper -->
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
                <!-- Pagination for sites -->
                <div class="pagination justify-content-center">
                    {{ $topics->links() }}
                </div>

                <!-- /.pagination-wrapper -->

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
                        <!-- /.open-hours -->
                    </div>
                    <!-- <div class="widget usefull_links_widget">
                                <h4 class="c_head">Usefull Links</h4>
                                <ul class="list-unstyled usefull-links">
                                    <li><i class="icon_lightbulb_alt"></i><a href="#">FAQs</a></li>
                                    <li><i class="icon_clock_alt"></i><a href="#">Popular</a></li>
                                    <li><i class="icon_piechart"></i><a href="#">Recent</a></li>
                                    <li><i class="icon_info_alt"></i><a href="#">Unanswered</a></li>
                                </ul>
                            </div> -->
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
                                    <li><a href="#">Product board</a></li>
                                    <li><a href="#">WordPress</a></li>
                                    <li><a href="#">Design</a></li>
                                    <li><a href="#">ui/ux</a></li>
                                    <li><a href="#">Doc Design</a></li>
                                    <li><a href="#">DocAll</a></li>
                                </ul>
                            </div> -->

                </div>
            </div>
            <!-- /.col-lg-4 -->
        </div>
    </div>
</section>
@endsection