@extends('main')

@section('content')
    <section class="jumbotron text-left">
        <div class="container">
            {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PATCH')) }}
                {{csrf_field()}}
                <div class="form-group">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('username', 'Username:') }}
                    {{ Form::text('username', '', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', '', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Password:') }}
                    {{ Form::password('password', '', array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation', 'Password:') }}
                    {{ Form::password('password_confirmation', '', array('class' => 'form-control')) }}
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
    </section>
@endsection
