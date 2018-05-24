@extends('layouts.app')

@section('content')
    <div class="login-container">
        <div class="logo-container">
            <img src="{{ asset('images/unadeca/logo_color_up.svg') }}" alt="unadeca-logo">
        </div>
        <div>
            <p>Login</p>
            @if ($errors->has('code'))
                <span class="help-block">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            @if (session('id'))
                <span class="help-block">
                    {{ session('id') }}
                </span>
            @endif
            @if (session('password'))
                <span class="help-block">
                    {{ session('password') }}
                </span>
            @endif
        </div>
        <form class="form-horizontal" method="post" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="input-field form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="mat-label">
                    <span class="black-text">Your ID</span>
                </label>
                <input id="email" class="active validate form-control" name="code" type="text" value="{{ old('email') }}" required >
            </div>

            <div class="input-field form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="mat-label">
                    <span class="black-text">Password</span>
                </label>
                <input id="password" class="active validate form-control" name="password" type="password" required >

            </div>

            <div class="form-group center-align">
                <button type="submit" class="waves-effect waves-light btn unadeca-btn">
                    login
                </button>
            </div>
        </form>
        <div class="form-group center-align" style="margin: 15px 0">
            <span>or</span>
        </div>
        <div class="form-group center-align">

            <a href="{{ route('register.create') }}" class="waves-effect waves-light btn unadeca-btn">
                Register
            </a>
        </div>
    </div>
    @include('layouts.footer')
@endsection
