@extends('posts')

@section('content')

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Blog Posts</h1>
                <p class="lead text-muted">Get a little taste of the life of my friends and I.
                    Come on a journey and learn a little along the way.</p>
                @if(Auth::check())
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-2">
                            <a href="/create" class="ui-button ui-corner-all ui-widget">Create Post</a>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-2">
                            @if($stash)
                                <a href="/posts" class="ui-button ui-corner-all ui-widget">View Posts</a>
                            @elseif(!$stash)
                                <a href="/posts/stash" class="ui-button ui-corner-all ui-widget">View Stash</a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <div class="container text-muted">
            <div class="row">
                <div id="accordion" role="tablist" aria-multiselectable="true">
                @foreach($posts as $post)
                    <div class="card col-lg-3 offset-lg-1 bg-light" >
                        <div class="card-header" role="tab" id="heading_{{ $post->id }}">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{ $post->id }}" aria-expanded="false" aria-controls="collapse_{{ $post->id }}">
                                    {{ substr($post->title,0,30) }}
                                </a>
                            </h5>
                        </div>
                        <a href="/posts/{{ $post->id }}" class="block-link" style="color:inherit">
                            <div id="collapse_{{ $post->id }}" class="collapse" role="tabpanel" aria-labelledby="heading_{{ $post->id }}">
                                <div class="card-block">
                                    <hr>
                                    <p class="card-text">{{ substr($post->description,0,120) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                    </div>
                </div>
            </div>
        </div>

@endsection