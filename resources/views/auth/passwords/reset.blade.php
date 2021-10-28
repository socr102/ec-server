@extends('layouts.base.base')
@section('title', __('Eatchefs - Reset Password'))
@section('content')

@include('layouts.navbar.navbar-guest')

<div class="reset-pass auth-page">
    <section class="signupSection">
        <div class="container" id="signup-container">
            <div class="auth-content row">
                <div class="col-lg-6 auth-content-logo">
                    <div class="auth-image">
                        <div>
                            <img src="{{ asset('images/logo/logo-with-desc.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="auth-form">
                        <div class="auth-form-head">
                            <h4 class="auth-form-head__title">
                                <i class="fas fa-lock"></i>
                                Reset Password
                            </h4>
                        </div>
                        @include('layouts.alert.flash-message')
                        <div class="auth-form-content">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-row">
                                    <label for="email" class="poppins mb-2 fsz-12">Email Address</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email goes here"/>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label for="password" class="poppins mb-2 fsz-12">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password goes here">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <label for="password-confirm" class="poppins mb-2 fsz-12">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password goes here">
                                </div>

                                <div class="form-row btn-action-auth">
                                    <button type="submit" class="btn btn-submit-form">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
