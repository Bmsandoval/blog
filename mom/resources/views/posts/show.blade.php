@extends('posts')

@section ('content')
    <section class="jumbotron text-left">
        <div class="container">
            <div class="blog-post">
                <h2 class="blog-post-title">{{$post->title}}</h2>
                <p class="blog-post-meta">Created {{$post->created_at}}</p>

                <p>{{$post->description}}</p>
                <hr>
                <p>{{$post->article}}</p>
            </div><!-- /.blog-post -->
        </div>
    </section>
@endsection
