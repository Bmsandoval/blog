@extends('main')

@section('content')
    <section class="jumbotron text-left">
        <div class="container">
            <form method="POST" action="/users">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Email:</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Invite</button>
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
