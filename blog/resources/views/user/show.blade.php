@extends('posts')

@section ('content')
    <section class="jumbotron">
        <div class="container">
            <div class="blog-post">
                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-default btn-sm" href="/posts/{{$post->id}}/edit">
                            <i class="fa fa-pencil"></i> Edit</a>
                    </div>
                    <div class="col-sm-6">
                        <h2 class="blog-post-title">{{$post->title}}</h2>
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
