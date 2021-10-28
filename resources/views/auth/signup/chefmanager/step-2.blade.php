@extends('layouts.base.base')
@section('title', __('Eatchefs - Sign Up as Chef Manager'))
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
                                <a class="col-4" href="{{ route('signup.homechef') }}">
                                    Home Chef
                                </a>
                                <a class="col-4" href="{{ route('signup.customer') }}">
                                    Customer
                                </a>
                                {{-- <a class="col-4 active" href="{{ route('signup.chefmanager') }}">
                                    Chef Manager
                                </a> --}}
                            </div>
                            <h4 class="auth-form-head__title">
                                <i class="fas fa-user"></i>
                                Sign Up
                            </h4>
                        </div>
                        <div class="auth-form-content">

                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="address_line_1">Address Line 1</label>
                                    <input class="form-control" type="text" name="address_line_1"
                                        placeholder="1600 Seaport Boulevart" />
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="address_line_2">Address Line 2</label>
                                    <input class="form-control" type="text" name="address_line_2"
                                        placeholder="Redwood City, CA" />
                                </div>
                            </div>
                            <div class="form-row">
                                <label for="country">Country</label>
                                <select class="custom-select">
                                    <option>Indonesia</option>
                                    <option>America</option>
                                    <option>Netherlands</option>
                                    <option>Africa</option>
                                    <option>Russia</option>
                                    <option>France</option>
                                    <option>England</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="city">City</label>
                                    <input class="form-control" type="text" name="city" placeholder="Redwood City" />
                                </div>
                                <div class="form-group col-6">
                                    <label for="zipcode">Zipcode</label>
                                    <input class="form-control" type="text" name="zipcode" placeholder="09871" />
                                </div>
                            </div>
                            <div class="form-row btn-action-auth next">
                                <a class="btn-change-page" href="{{ route('signup.chefmanager') }}">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                                <a href="{{ route('home.chef-manager.notification.taste-approval') }}" class="w-100">
                                    <button type="submit" name="signup" class="btn btn-submit-form">
                                        Create my account
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="auth-form-footer">

                            <div class="auth-alter-link">
                                <a href="{{ route('login') }}">Already a Member ? <b>Sign In</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
