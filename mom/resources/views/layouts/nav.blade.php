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
                    <li><a href="#" class="text-white">Follow on Twitter</a></li>
                    <li><a href="#" class="text-white">Like on Facebook</a></li>
                    <li><a href="#" class="text-white">Email me</a></li>
                    <li><a href="{{ URL::to('logout') }}" class="text-white">Logout</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="navbar navbar-inverse bg-inverse">
        <div class="row">
            <div class="text-white col-sm-2">Skynet.How</div>
            <div class="text-white col-sm-2">
                <a href="/" class="navbar-brand">Home</a>
            </div>
            <div class="text-white col-sm-2">
                <a href="/posts" class="navbar-brand">Blog</a>
            </div>
            <div class="text-white col-sm-2">
                <a href="/items" class="navbar-brand">Shop</a>
            </div>
            <div class="text-white col-sm-3">
                <a href="/about" class="navbar-brand">About</a>
            </div>
            <div class="text-white col-sm-1">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </div>
</header>
