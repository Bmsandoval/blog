<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <!-- Custom styles for this template -->
    <link href=" {{ asset('css/cover.css') }}" rel="stylesheet">
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



        <div class="title-container">
        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                </div>
            </div>

            <div class="card bg-inverse">
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
