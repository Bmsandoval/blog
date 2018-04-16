
<!doctype html>
<html lang="en">
    <head>
        @include('layouts.head')
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/posts.css') }}" rel="stylesheet">
{{--        <link href="{{ asset('css/themeroller/jquery-ui.css') }}" rel="stylesheet">--}}
    </head>
    @include('layouts.nav')
    <body>

        <div class="container">
            <div class="row">
                <div class="{{--col-sm-7 offset-sm-1 --}}blog-content">
                    <main role="main">
                        @yield('content')
                    </main>
                </div>
{{--                <div class="col-sm-3 offset-sm-1 blog-sidebar">
                    @include('layouts.sidebar')
                </div>--}}
           </div>
        </div>
        @include('layouts.footer')
    </body>
</html>
