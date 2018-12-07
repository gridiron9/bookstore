@extends('layouts.app')

@section('content')
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="{{url('/dashboard')}}">Home</a></li>
                            <li><a  class="active">login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="user-login-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-title text-center mb-30">
                        <h2>Login</h2>
                    </div>
                </div>
                <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
                    <div class="login-form">
                        <form method="post" action= "{{route('login')}}" >
                            {{csrf_field()}}
                            <div class="single-login form-group row">
                                <label for="email" >{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="single-login form-group row">
                                <label for="password" >{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                @endif
                            </div>
                            <div class="single-login single-login-2">
                                <button type="submit" class="btn">login</button>
                                {{--<input id="rememberme" type="checkbox" name="rememberme" value="forever">
                                <span>Remember me</span>--}}
                            </div>
                            <a type="submit">Lost your password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
