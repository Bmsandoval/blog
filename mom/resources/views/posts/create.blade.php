@extends('posts')

@section('content')
    <section class="jumbotron text-left">
        <div class="container">
            <form method="POST" action="/posts">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" placeholder="title" name="title">
                </div>

                <div class="form-group">
                    <label for="body">Synopsis</label>
                    <textarea type="text" class="form-control" placeholder="synopsis" name="synopsis"></textarea>
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea type="text" class="form-control" placeholder="body" name="body"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Publish</button>
            </form>
            @if (count($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </section>
@endsection
