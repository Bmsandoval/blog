@extends('posts')

@section ('content')
    <section class="jumbotron text-left">
        <div class="container">
            <div class="blog-post">
                <div class="row">
                    <div class="col-sm-2">
                        <h2 class="blog-post-title">{{$post->title}}</h2>
                    </div>
                    <div class="col-sm-2">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="row">
                    <p class="blog-post-meta">Created {{$post->created_at}}</p>
                </div>
                <p>{{$post->description}}</p>
                <hr>
                <p>{{$post->article}}</p>
            </div><!-- /.blog-post -->
        </div>
    </section>
@endsection
