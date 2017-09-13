@extends('layouts.auth')

<!-- Main Content -->
@section('content')
    <main class="page-content">
        <div class="page-inner">
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-3 center">
                        <div class="login-box">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <a href="{{url('/')}}" class="logo-name text-lg text-center">{{ config('app.name') }}</a>
                            <p class="text-center m-t-md">Enter your e-mail address below to reset your password</p>
                            <form class="m-t-md" role="form" method="POST" action="{{ url('/password/email') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input name="email" type="email" class="form-control" placeholder="Email" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                <a href="{{ url('/login') }}" class="btn btn-default btn-block m-t-md">Back</a>
                            </form>
                            <p class="text-center m-t-xs text-sm">{{date('Y')}} &copy; {{ config('app.name') }} by {{ config('app.company') }}.</p>
                        </div>
                    </div>
                </div><!-- Row -->
            </div><!-- Main Wrapper -->
        </div><!-- Page Inner -->
    </main>
@endsection
