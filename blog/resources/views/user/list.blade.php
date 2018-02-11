@extends('posts')

@section('content')

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Meet the Bloggers</h1>
                </p>
            </div>
        </section>

        <div class="album text-muted">
            <div class="container">
                <div class="row">
                    @foreach($users as $user)
                        <div class="card bg-secondary" >
                            <a href="/users/{{ $user->id }}">
                                <h1>{{ $user->name }}</h1>
                                <h1>{{ $user->username }}</h1>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

@endsection