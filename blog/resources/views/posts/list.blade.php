@extends('posts')

@section('content')

        <section class="jumbotron text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-4">
                        <h1 class="jumbotron-heading">Blog Posts</h1>
                    </div>
                    <div class="col-lg-8 offset-lg-3">
                        <p class="lead text-muted">Get a little taste of the life of my friends and I. Come on a journey and learn a little along the way.</p>
                    </div>
                </div>
                <p>
                    @auth
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <a href="/create" class="btn btn-outline-primary">Create Post</a>
                            </div>
                            <div class="col-sm-5"></div>
                            <div class="col-sm-2">
                                @if($stash)
                                    <a href="{{ route('posts.list') }}" class="btn btn-outline-success">View Posts</a>
                                @elseif(!$stash)
                                    <a href="{{ route('posts.stash') }}" class="btn btn-outline-warning">View Stash</a>
                                @endif
                            </div>
                        </div>
                    @endauth
                </p>
            </div>
        </section>

        <div class="container text-muted">
                <div class="row">
                @foreach($posts as $key => $column)
                    <div id="accordion_{{ $key }}" role="tablist" aria-multiselectable="true" class="col-sm-3 offset-sm-1 bg-light">
                        <div class="row">
                        @foreach($column as $post)
                            <div class="card bg-light col-sm-12" >
                                <a class="collapsed block-link" style="color:inherit" data-toggle="collapse" data-parent="#accordion_{{ $key }}"
                                   href="#collapse_{{ $post->id }}" aria-expanded="false" aria-controls="collapse_{{ $post->id }}">
                                <div class="card-header" role="tab" id="heading_{{ $post->id }}">
                                    <h5 class="mb-0">
                                            {{ substr($post->title,0,30) }}
                                    </h5>
                                </div>
                                </a>
                                <a href="{{ route('posts.show', [$post->id]) }}" class="block-link" style="color:inherit">
                                <div id="collapse_{{ $post->id }}" class="collapse" role="tabpanel" aria-labelledby="heading_{{ $post->id }}">
                                    <div class="card-block">
                                        <p class="card-text">{{ substr($post->description,0,120) }}</p>
                                    </div>
                                </div>
                                </a>
                            </div>
                        @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

@endsection