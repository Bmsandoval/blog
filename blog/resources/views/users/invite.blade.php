@extends('main')

@section('content')
            <form method="POST" action="/send">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-3 text-right">
                        <label for="email">Email:</label>
                    </div>
                    <div class="col-sm-6 text-left">
                        <input type="email" class="form-control" name="email">
                    </div>
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
@endsection
