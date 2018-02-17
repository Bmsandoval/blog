@extends('main')

@section ('content')
{{--    <section class="jumbotron">--}}
{{--        <div class="container">--}}
            <div class="blog-user">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5 text-left">
                        <h2 class="blog-user-title">User Information</h2>
                    </div>
                    <div class="col-sm-3 text-right">
                    </div>
                    <div class="col-sm-3 text-right">
                        <div class="row">
                            @if(Auth::check())
                                <a class="btn btn-default btn-sm" href="/invite">
                                    <i class="fa fa-user-plus"></i> Invite Blogger</a>
                            @endif
                        </div>
                        <div class="row">
                            @if(Auth::check())
                                <a class="btn btn-default btn-sm" href="/users/{{$userid}}/edit">
                                    <i class="fa fa-pencil"></i> Edit Information</a>
                            @endif
                        </div>
                    </div>
                </div>
                @foreach($user as $key=>$value)
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-8text-left">
                            <p class="blog-user-meta">{{ $key }} : {{ $value }}</p>
                        </div>
                    </div>
                @endforeach
            </div><!-- /.blog-user -->
{{--        </div>--}}
{{--    </section>--}}
@endsection
