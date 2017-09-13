@extends('layouts.auth')

@section('content')
    <main class="page-content">
        <div class="page-inner">
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-3 center">
                        <div class="login-box">
                            <a href="{{url('/')}}" class="logo-name text-lg text-center">{{ config('app.name') }}</a>
                            <p class="text-center m-t-md">Create a Modern's account</p>
                            <form class="m-t-md" role="form" method="POST" action="{{ url('/password/reset') }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-success btn-block m-t-xs">Submit</button>
                                <p class="text-center m-t-xs text-sm">Already have an account?</p>
                                <a href="{{ url('/login') }}" class="btn btn-default btn-block m-t-xs">Login</a>
                            </form>
                            <p class="text-center m-t-xs text-sm">{{date('Y')}} &copy; {{ config('app.name') }} by {{ config('app.company') }}.</p>
                        </div>
                    </div>
                </div><!-- Row -->
            </div><!-- Main Wrapper -->
        </div><!-- Page Inner -->
    </main>
@endsection
