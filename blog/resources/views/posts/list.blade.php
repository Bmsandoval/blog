@extends('posts')

@section('content')

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Blog Posts</h1>
                <p class="lead text-muted">Get a little taste of the life of my friends and I.
                    Come on a journey and learn a little along the way.</p>
                <p>
                    @if(Auth::check())
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-2">
                                <a href="/create" class="btn btn-outline-primary">Create Post</a>
                            </div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                @if($stash)
                                    <a href="/posts" class="btn btn-outline-success">View Posts</a>
                                @elseif(!$stash)
                                    <a href="/posts/stash" class="btn btn-outline-warning">View Stash</a>
                                @endif
                            </div>
                        </div>
                    @endif
                </p>
            </div>
        </section>

        <div class="container text-muted">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-1"></div>
                    <div class="card col-lg-3 bg-light" >
                        <a href="/posts/{{ $post->id }}" class="block-link" style="color:inherit">
                            <p>{{ substr($post->title,0,30) }}</p>
                            <hr>
                            <p class="card-text">{{ substr($post->description,0,120) }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

@endsection