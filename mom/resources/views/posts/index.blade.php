@extends('posts')

@section('content')

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Album example</h1>
                <p class="lead text-muted">Get a little taste of the life of my friends and I.
                    Come on a journey and learn a little along the way.</p>
                <p>
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                </p>
            </div>
        </section>

        <div class="album text-muted">
            <div class="container">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="card bg-danger" >
                            <a href="/posts/{{ $post->id }}">
                                <h1>{{ substr($post->title,0,30) }}</h1>
                            </a>
                            <p class="card-text">{{ substr($post->description,0,120) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

@endsection