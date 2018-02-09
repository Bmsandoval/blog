@extends('main')

@section('content')
    {{ Form::open(array('url' => 'login')) }}
{{--    <h1>Login</h1>--}}

    <!-- if there are login errors, show them here -->
    <p>
        {{ $errors->first('email') }}
        {{ $errors->first('password') }}
    </p>

    <div class="row">
        <div class="col-sm-4 text-right">
            {{ Form::label('email', 'Email Address') }}
        </div>
        <div class="col-sm-8 text-left">
            {{ Form::email('email')}}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 text-right">
            {{ Form::label('password', 'Password') }}
        </div>
        <div class="col-sm-8 text-left">
            {{ Form::password('password') }}
        </div>
    </div>
    <div class="row"> </div>
    {{ Form::submit('Login') }}

    {{ Form::close() }}
@endsection
