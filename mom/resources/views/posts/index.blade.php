@extends('posts')

@section('content')

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Album example</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                <p>
                    <a href="/posts/{{$first_post->id}}" class="btn btn-primary">Main call to action</a>
                    <a href="/posts/{{$last_post->id}}" class="btn btn-secondary">Secondary action</a>
                </p>
            </div>
        </section>

        <div class="album text-muted">
            <div class="container">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="card" >
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