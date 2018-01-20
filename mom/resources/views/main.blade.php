<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://use.fontawesome.com/5ca3a5c3b0.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Skynet Now</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="/css/cover.css" rel="stylesheet">
    <link href="/css/site.css" rel="stylesheet">
</head>

<body>
@include('layouts.nav')
<div class="site-wrapper">
    <div class="site-wrapper-inner">
<div class="homepage-hero-module">
    <div class="video-container">
        <video autoplay loop class="fillWidth opaque">
            <source src="{{ asset('multimedia/Love-Coding.mp4') }}" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
            <source src="{{ asset('multimedia/Love-Coding.webm') }}" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
        </video>



        <div class="title-container bg-danger filter bg-overlay">
        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                </div>
            </div>

            <div class="inner cover">
                @yield('content')
            </div>

            <div class="mastfoot">
                <div class="inner">
                </div>
            </div>

        </div>

        </div>

    </div>
</div>
    </div>
</div>

@include('layouts.footer')
</body>
<script type="text/javascript">
    //jQuery is required to run this code//jQuery is required to run this code
    $( document ).ready(function() {

        scaleVideoContainer();

        initBannerVideoSize('.video-container .poster img');
        initBannerVideoSize('.video-container .filter');
        initBannerVideoSize('.video-container video');

        $(window).on('resize', function() {
            scaleVideoContainer();
            scaleBannerVideoSize('.video-container .poster img');
            scaleBannerVideoSize('.video-container .filter');
            scaleBannerVideoSize('.video-container video');
        });

    });

    function scaleVideoContainer() {

        var height = $(window).height() + 5;
        var unitHeight = parseInt(height) + 'px';
        $('.homepage-hero-module').css('height',unitHeight);

    }

    function initBannerVideoSize(element){

        $(element).each(function(){
            $(this).data('height', $(this).height());
            $(this).data('width', $(this).width());
        });

        scaleBannerVideoSize(element);

    }

    function scaleBannerVideoSize(element){

        var windowWidth = $(window).width(),
            windowHeight = $(window).height() + 5,
            videoWidth,
            videoHeight;

        // console.log(windowHeight);

        $(element).each(function(){
            var videoAspectRatio = $(this).data('height')/$(this).data('width');

            $(this).width(windowWidth);

            if(windowWidth < 1000){
                videoHeight = windowHeight;
                videoWidth = videoHeight / videoAspectRatio;
                $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

                $(this).width(videoWidth).height(videoHeight);
            }

            $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

        });
    }
</script>
</html>
