@extends(config('temail.views.layouts.auth'))

@section('content')
    <main class="page-content">
        <div class="page-inner">
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-3 center">
                        <div class="login-box">
                            @include(config('tyondo_sms.views.partials.flash'))
                            <a href="{{url('/')}}" class="logo-name text-lg text-center">{{ config('app.name') }}</a>
                            <p class="text-center m-t-md">Please login into your account.</p>
                            <form class="m-t-md" role="form" method="POST" action="{{ route(config('tyondo_sms.routes.user.login.post')) }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <br>
                                <label>
                                    <input type="checkbox"  name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                </label>
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                                <a href="{{ route(config('tyondo_sms.routes.user.forgot.form')) }}" class="display-block text-center m-t-md text-sm">Forgot Password?</a>
                                <p class="text-center m-t-xs text-sm">Do not have an account?</p>
                                <a href="{{ route(config('tyondo_sms.routes.user.register.form')) }}" class="btn btn-default btn-block m-t-md">Create an account</a>
                            </form>
                            <p class="text-center m-t-xs text-sm">{{date('Y')}} &copy; {{ config('app.name') }} by {{ config('app.company') }}.</p>
                        </div>
                    </div>
                </div><!-- Row -->
            </div><!-- Main Wrapper -->
        </div><!-- Page Inner -->
    </main>
@endsection
