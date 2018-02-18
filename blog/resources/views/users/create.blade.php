@extends('main')

@section('content')
    <section class="jumbotron text-left">
{{--        <div class="container">--}}
            <form method="POST" action={{"/activate/".$token}}>
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Name:</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label for="body">Display Name:</label>
                    <textarea type="text" class="form-control" name="username"></textarea>
                </div>

                <div class="form-group">
                    <label for="body">Email:</label>
                    <textarea type="text" class="form-control" name="email"></textarea>
                </div>

                <div class="form-group">
                    <label for="body">Password:</label>
                    <textarea type="password" class="form-control" name="password"></textarea>
                </div>
                <div class="form-group">
                    <label for="body">Confirm Password:</label>
                    <textarea type="password" class="form-control" name="password_confirmation"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
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
{{--        </div>--}}
    </section>


@endsection
