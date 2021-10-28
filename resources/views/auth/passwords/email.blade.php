@extends('layouts.base.base')
@section('title', __('Eatchefs - Forgot Password'))
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
                            <form action="{{route('password.email')}}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <label for="email" class="poppins mb-2 fsz-12">Fill your email to get the recovery link</label>
                                    <input class="form-control" type="email" name="email" placeholder="Email goes here" required />
                                </div>
                                <div class="form-row btn-action-auth">
                                    <button type="submit" name="signup" class="btn btn-submit-form">
                                        Send me a recovery link
                                    </button>
                                </div>
                            </form>
                            <div class="form-row btn-action-auth">
                                <a href="{{ route('login') }}" class="w-100">
                                    <button type="button" name="signup" class="btn btn-submit-form">
                                        Cancel
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
