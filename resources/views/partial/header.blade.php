<nav class="navbar navbar-expand-lg navbar-light navigation  " style="height: min-content;">
    <div class="col">
        <a class="navbar-brand" href="/">
            <img src="../images/deliveryportallogofinal.png" alt="" width="130px" height="50px">
            <!-- <span class="" style="color: #F25959; font-size: 25px; font-weight: bold;">E</span><span>xpress Delivery</span> -->
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav main-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/blog">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/forum">Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/trainingroom">Training Room</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/event">Event</a>
            </li>

            {{--<li class="nav-item dropdown dropdown-slide">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Services <span><i class="fa fa-angle-down"></i></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="servicedetails">Services one</a>
                    <a class="dropdown-item" href="servicedetails">Services two</a>
                    <a class="dropdown-item" href="servicedetails">Services three</a>
                    <a class="dropdown-item" href="servicedetails">Services four</a>
                </div>
            </li>--}}
            @if(!backpack_user())
            <li class="nav-item">
                <a class="nav-link login-button" href="admin/login">Login</a>
            </li>
            @else
            <li class="dropdown pt-2">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:white;">
                    {{ backpack_user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="admin/logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
                @endif
        </ul>
    </div>
</nav>