<header>
    <div class="collapse bg-inverse" id="navbarHeader">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2 py-4 text-left">
                <p class="text-white"> Skynet.How wants Skynet NOW! </p>
                <p class="text-white"> Join the revolution! </p>
            </div>
            <div class="col-sm-7"></div>
            <div class="col-sm-2 py-4 text-left">
                <h4 class="text-white">Contact</h4>
                <ul class="list-unstyled">
                    <li><a href="https://www.linkedin.com/in/bryan-sandoval-36bbb51a/" class="text-white">Follow on LinkedIn</a></li>
                    <li><a href="skynethow@gmail.com" class="text-white">Email me</a></li>
                    @if(!Auth::check())
                        <li><a href="{{ route('login') }}" class="text-white">Login</a></li>
                    @else
                        <li><a href="{{ route('users.read',['user'=> Auth::user()->id]) }}" class="text-white">User</a></li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
    <div class="navbar navbar-inverse bg-inverse">
        <div class="row">
            <div class="text-white col-sm-2 text-left">
                <a href="{{ route('home') }}" class="navbar-brand">Skynet.How</a>
            </div>
            <div class="text-white col-sm-3">
                <a href="{{ route('home') }}" class="navbar-brand">Home</a>
            </div>
            <div class="text-white col-sm-3">
                <a href="{{ route('posts.list') }}" class="navbar-brand">Blog</a>
            </div>
            <div class="text-white col-sm-2">
                <a href="{{ route('about') }}" class="navbar-brand">About</a>
            </div>
            <div class="text-white col-sm-2 text-right">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </div>
</header>
