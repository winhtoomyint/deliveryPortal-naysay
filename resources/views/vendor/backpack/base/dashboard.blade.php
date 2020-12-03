@extends(backpack_view('blank'))
@section('content')
<script type="text/javascript">
    function display_c() {
        var refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct()', refresh)
    }

    function display_ct() {
        var x = new Date();
        var h = x.getHours(),
            m = x.getMinutes() + ":" + x.getSeconds();
        var ime = (h > 12) ? (h - 12 + ':' + m + ' PM') : (h + ':' + m + ' AM');
        document.getElementById('ct').innerHTML = ime;
        display_c();
    }
</script>
<section class="content-header" style="padding-top: 5px">
    <strong>
        <h1 class="container-fluid" style="font-family:Times New Roman; font-size:35px; font-weight: bold !important; color: #404e67;">
            Welcome Back, {{Auth::user()->name}} !
        </h1>
    </strong>
    <h3 class="container-fluid mb-5" style="padding-top: 0px;margin-top: 10px;">
        <small style="font-family: Centaur; font-size: 20px; font-weight: bold; color: #60099e;">
            Today is <?php
                        $date = Carbon\Carbon::now();
                        echo date('l, d F Y', strtotime($date)); //June, 2017
                        ?>

            <body onload=display_ct();>
                <span id='ct'></span>
            </body>
        </small>
    </h3>
</section>
@endsection
<?php
$widgets['after_content'][] =
    [
        'type' => 'div',
        'class' => 'container-fluid row',
        'content' => [ // widgets 
            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => $users . ' users',
                'description'   => 'Registered Users',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-primary',
            ],

            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => $cities . ' cities',
                'description'   => 'Registered Cities',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-success',
            ],

            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => $townships . ' townships',
                'description'   => 'Registered Townships',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-warning',
            ],

            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => $channels . ' channels',
                'description'   => 'Registered Channels',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-dark',
            ],

            [
                'type'          => 'progress_white',
                'class'         => 'card mb-2',
                'value'         => $posts . ' posts',
                'description'   => 'Registered Posts',
                'progress'      => 100, // integer
                'progressClass' => 'progress-bar bg-danger',
            ],
        ]
    ];
?>


