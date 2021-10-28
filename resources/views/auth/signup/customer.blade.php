@extends('layouts.base.base')
@section('title', __('Eatchefs - Sign Up as Customer'))
@section('script')
<script>
    function togglePass() {
        var v = document.getElementById("passwordInput");
        var t = document.getElementById('togglerTypePass__Icon');
        if (v.type === "password") {
            v.type = "text";
            t.classList.remove('fa-eye')
            t.classList.add('fa-eye-slash')
        } else {
            v.type = "password";
            t.classList.add('fa-eye')
            t.classList.remove('fa-eye-slash')
        }
    }

    function cTogglePass() {
        var v = document.getElementById("cPasswordInput");
        var t = document.getElementById('cTogglerTypePass__Icon');
        if (v.type === "password") {
            v.type = "text";
            t.classList.remove('fa-eye')
            t.classList.add('fa-eye-slash')
        } else {
            v.type = "password";
            t.classList.add('fa-eye')
            t.classList.remove('fa-eye-slash')
        }
    }

    function toa(e) {
        if (e.checked) {
            $('.btn-submit-form').removeAttr('disabled');
        } else {
            $('.btn-submit-form').attr('disabled', 'disabled');
        }
    }

</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-guest')

<div class="signup auth-page">
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
                <div class="col-lg-6 auth-content-register">
                    <div class="auth-form">
                        <div class="auth-form-head register">
                            <div class="navigator-row row">
                                <a class="col-6" href="{{ route('signup.homechef') }}">
                                    Home Chef
                                </a>
                                <a class="col-6 active" href="{{ route('signup.customer') }}">
                                    Customer
                                </a>
                                {{-- <a class="col-4" href="{{ route('signup.chefmanager') }}">
                                    Chef Manager
                                </a> --}}
                            </div>
                            <h4 class="auth-form-head__title">
                                <i class="fas fa-user"></i>
                                Sign Up
                            </h4>
                        </div>
                        <div class="auth-form-content">
                            <form method="POST" action="{{ route('signup.customer') }}">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="username">Username</label>
                                        <input class="form-control" type="text" name="username"
                                            placeholder="Username goes here" required value="{{ old('username') }}"/>
                                        @if ($errors->has('username'))
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" name="email"
                                            placeholder="Email goes here" required pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" value="{{ old('email') }}"/>
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" id="passwordInput"
                                            placeholder="Password goes here" required/>
                                        <a onclick="togglePass()" href="#" class="toggler-password" id="togglerTypePass">
                                            <i class="far fa-eye" id="togglerTypePass__Icon"></i>
                                        </a>
                                        @if ($errors->has('password'))
                                        <p>
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        </p>

                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="password_confirm">Password Confirmation</label>
                                        <input class="form-control" type="password" name="password_confirmation"
                                            id="cPasswordInput" placeholder="Password Confirmation" required/>
                                        <a onclick="cTogglePass()" href="#" class="toggler-password" id="cTogglerTypePass">
                                            <i class="far fa-eye" id="cTogglerTypePass__Icon"></i>
                                        </a>
                                        @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="custom-checkbox">
                                        <input name="acceptTermAgreement" type="checkbox" class="custom-control-input"
                                            id="acceptTermAgreement" onchange="toa(this)">
                                        <label class="custom-control-label" for="acceptTermAgreement">I accept Terms of Use
                                            & Privacy Policy</label>
                                    </div>
                                </div>

                                <div class="form-row btn-action-auth">
                                    <button type="submit" name="signup" class="btn btn-submit-form" disabled>
                                        Create my account
                                    </button>
                                </div>

                            </form>
                            <div class="social-login">
                                <p>
                                    <span>Or sign up using</span>
                                </p>
                                <div class="social-row row">
                                    @foreach(['google', 'facebook'] as $provider)
                                        <div class="col-6">
                                            <a href="{{ route('social.login', ['provider' => $provider]) }}">
                                                <img src="{{ asset('images/icon/'. $provider .'.png') }}" alt="">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="auth-form-footer">
                            <div class="auth-alter-link">
                                <a href="{{ route('login') }}">Not Member ? <b>Sign In</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
