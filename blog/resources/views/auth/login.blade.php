@extends('main')

@section('content')
    {{ Form::open(array('url' => 'dologin', 'method'=>'post')) }}
    <h1>Discover the Future</h1>
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
    <!-- Display login errors -->
    <p>
        {{ $errors->first('email') }}
        {{ $errors->first('password') }}
    </p>
    {{ Form::submit('Login') }}

    {{ Form::close() }}
@endsection
