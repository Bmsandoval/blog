@extends('posts')

@section('header_scripts')
    <script type="text/javascript" src="{{ asset('js/ckeditor4/ckeditor.js') }}"></script>
@endsection

@section('footer_scripts')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'post_body' );
    </script>
@endsection

@section('content')
    <section class="jumbotron text-left">
        <div class="container">
            {{ Form::model('', ['id'=>'myForm','route' => ['posts.store'], 'method' => 'POST']) }}
                {{csrf_field()}}
                <div class="form-group">
                    {{ Form::label('post_title', 'Title') }}
                    {{ Form::text('post_title', '', ['placeholder'=>'Catchy yet descriptive title','class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('post_synopsis', 'Synopsis') }}
                    {{ Form::textarea('post_synopsis', '', ['placeholder'=>'Short description of the problem and solution','class' => 'form-control','rows'=> '5','cols'=> '80']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('post_body', 'Body') }}
                    {{ Form::textarea('post_body', '', ['placeholder'=>'Tell the world what you did'/*,'class' => 'form-control'*/,'rows'=> '100','cols'=> '80', 'id'=> 'post_body']) }}
                </div>
                {{ Form::button('Publish',['type'=>'submit','name'=>'submit','value'=>'publish','class'=>'btn btn-outline-success']) }}
                {{ Form::button('Stash',['type'=>'submit','name'=>'submit','value'=>'stash','class'=>'btn btn-outline-warning']) }}
                {{ Form::button('Discard',['type'=>'submit','name'=>'submit','value'=>'discard','class'=>'btn btn-outline-danger']) }}
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
