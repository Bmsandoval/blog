@extends('posts')

@section('content')
    <section class="jumbotron text-left">
        <div class="container">
            {{ Form::model($post, ['id'=>'myForm','route' => ['posts.update', $post->id], 'method' => 'PATCH']) }}
                {{csrf_field()}}
                <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', $post->title, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('synopsis', 'Synopsis') }}
                    {{ Form::textarea('synopsis', $post->description, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('body', 'Article') }}
                    {{ Form::textarea('body', $post->article, ['class' => 'form-control']) }}
                </div>
                {{ Form::button('Publish', ['type'=>'submit','name'=>'submit','value'=>'publish','class'=>'btn btn-outline-success']) }}
                {{ Form::button('Delete', ['type'=>'submit','name'=>'submit','value'=>'delete','class'=>'btn btn-outline-danger']) }}
            {{ Form::close() }}
            @if (count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <script>
                $(window).on("beforeunload", function() {
                    return "Are you sure? You didn't finish the form!";
                });

                $(document).ready(function() {
                    $("#myForm").on("submit", function(e) {
                        //check form to make sure it is kosher
                        //remove the ev
                        $(window).off("beforeunload");
                        return true;
                    });
                });
            </script>
        </div>
    </section>
@endsection
