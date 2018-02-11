@extends('main')

@section ('content')
    <section class="jumbotron">
        <div class="container">
            <div class="blog-user">
                <div class="row">
                    <div class="col-sm-3">
                        @if(Auth::check())
                            <a class="btn btn-default btn-sm" href="/users/{{$userid}}/edit">
                                <i class="fa fa-pencil"></i> Edit Information</a>
                        @endif
                    </div>
                    <div class="col-sm-3">
                        @if(Auth::check())
                            <a class="btn btn-default btn-sm" href="/invite">
                                <i class="fa fa-user-plus-"></i> Invite Blogger</a>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <h2 class="blog-user-title">User Information</h2>
                    </div>
                </div>
                @foreach($user as $key=>$value)
                    <div class="row">
                        <p class="blog-user-meta">{{ $key }} : {{ $value }}</p>
                    </div>
                @endforeach
            </div><!-- /.blog-user -->
        </div>
    </section>
@endsection
