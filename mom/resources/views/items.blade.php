
<!doctype html>
<html lang="en">
    <head>
        <script src="https://use.fontawesome.com/5ca3a5c3b0.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Skynet Now</title>

        <!-- Bootstrap core CSS -->
    {{--    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">--}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

        <!-- Custom styles for this template -->
        <link href="/css/posts.css" rel="stylesheet">
        <link href="/css/site.css" rel="stylesheet">
    </head>
    @include('layouts.nav')
    <body>
        <div class="container">
            <div class="row">
                <div class="{{--col-sm-7 offset-sm-1--}} blog-content">
                    @yield('content')
                </div>
{{--                <div class="col-sm-3 offset-sm-1 blog-sidebar">
                    @include('layouts.sidebar')
                </div>--}}
           </div>
        </div>
        @include('layouts.footer')
    </body>
</html>
