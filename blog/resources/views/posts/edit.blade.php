@extends('posts')

@section('header_scripts')
{{--    ****** Html Parsing for Post Previewing ******--}}
    <script type="text/javascript" src="{{ asset('js/ckeditor4/ckeditor.js') }}"></script>
@endsection

@section('footer_scripts')
    <script>
        // ****** Html Parsing for Post Previewing ******
        CKEDITOR.replace( 'post_body' );


        // ****** Data Dismissal Warning ******
        $(window).on("beforeunload", function() {
            return "Are you sure? You didn't finish the form!";
        });

        $(document).ready(function() {
            $("#myForm").on("submit", function(e) {
                $(window).off("beforeunload");
                return true;
            });
        });
    </script>
@endsection

@section('content')
    <section class="jumbotron text-left">
        <div class="container">
            {{ Form::model($post, ['id'=>'myForm','route' => [$route_name, $post->id], 'method' => $html_verb]) }}
                {{csrf_field()}}
                <div class="form-group">
                    {{ Form::label('post_title', 'Title') }}
                    {{ Form::text('post_title', $post->title, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('post_synopsis', 'Synopsis') }}
                    {{ Form::textarea('post_synopsis', $post->description, ['class' => 'form-control','rows'=>'5']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('post_body', 'Article') }}
                    {{ Form::textarea('post_body', $post->article, ['class' => 'form-control']) }}
                </div>
                {{ Form::button('Publish', ['type'=>'submit','name'=>'submit','value'=>'publish','class'=>'btn btn-outline-success']) }}
                {{ Form::button('Stash',['type'=>'submit','name'=>'submit','value'=>'stash','class'=>'btn btn-outline-warning']) }}
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
        </div>
    </section>
@endsection
