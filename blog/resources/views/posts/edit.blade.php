@extends('posts')

@section('content')
    <section class="jumbotron text-left">
        <div class="container">
{{--            <form method="POST" action="/posts/{{$post->id}}/update">--}}
            {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PATCH')) }}
                {{csrf_field()}}
                <div class="form-group">
                    {{ Form::label('title', 'Title:') }}
                    {{ Form::text('title', 'test', array('class' => 'form-control')) }}
{{--                    <input type="text" class="form-control" placeholder="{{ $post->title }}" name="title">--}}
                </div>

                <div class="form-group">
                    <label for="body">Synopsis</label>
                    <textarea type="text" class="form-control" placeholder="synopsis" name="synopsis">{{ $post->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea type="text" class="form-control" placeholder="body" name="body">{{ $post->article }}</textarea>
                </div>

                <button type="submit" id="submit" name="submit" value="save" class="btn btn-primary">Publish Changes</button>
                <button type="submit" id="remove" name="submit" value="remove" class="btn btn-primary">Remove Post</button>
            {{ Form::close() }}

            {{--            <a class="btn btn-default btn-sm" href="/posts/{{$post->id}}/delete">
                <i class="fas fa-eraser"></i> Remove</a>--}}
{{--            {{ Form::open(array('url' => '/posts/' . $post->id . '/delete', 'class' => 'pull-right')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete this post?', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}--}}
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
