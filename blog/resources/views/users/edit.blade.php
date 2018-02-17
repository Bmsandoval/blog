@extends('main')

@section('content')
        <div class="container">
            {{ Form::model($user, array('route' => array('users.update', $user['id']), 'method' => 'PATCH')) }}
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-3 text-left"> {{ Form::label('name', 'Name:') }} </div>
                    <div class="col-sm-7 text-left"> {{ Form::text('name', $user['name'] , array('class' => 'form-control')) }} </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-left"> {{ Form::label('username', 'Username:') }} </div>
                    <div class="col-sm-7 text-left"> {{ Form::text('username', $user['username'] , array('class' => 'form-control')) }} </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-left"> {{ Form::label('email', 'Email:') }} </div>
                    <div class="col-sm-7 text-left"> {{ Form::text('email', $user['email'] , array('class' => 'form-control')) }} </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-left"> {{ Form::label('password', 'Password:') }} </div>
                    <div class="col-sm-7 text-left"> {{ Form::text('password', '', array('class' => 'form-control')) }} </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 text-left"> {{ Form::label('password_confirmation', 'confirm password:') }} </div>
                    <div class="col-sm-7 text-left"> {{ Form::text('password_confirmation', '', array('class' => 'form-control')) }} </div>
                    <div class="col-sm-2"></div>
                </div>

                <button type="submit" id="submit" name="submit" value="save" class="btn btn-primary">Update Information</button>
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
@endsection
