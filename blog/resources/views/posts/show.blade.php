@extends('posts')

@section ('content')
    <section class="jumbotron">
        <div class="container">
            <div class="blog-post">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="blog-post-title">{{$post->title}}</h2>
                    </div>
                    @if(Auth::check())
                        <div class="col-sm-6 text-right">
                            <a class="btn btn-default btn-sm" href="/posts/{{$post->id}}/edit">
                                <i class="fa fa-pencil"></i> Edit </a>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <p class="blog-post-meta"> {{$post->created_at}}</p>
                </div>
                <hr>
                <div class="row">
                    <p>{{$post->description}}</p>
                </div>
                <hr>
                <div class="row">
                    <p>{!! nl2br($post->article) !!}</p>
                </div>
            </div><!-- /.blog-post -->
        </div>
    </section>
@endsection
