@extends('layouts.base.base')
@section('title', __('Eatchefs - Sign Up as Chef Manager'))
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

    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    var dataSignUp = {
        'step0': '',
        'step1': '',
        'step2': '',
    };

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab2");
        x[n].style.display = "block";
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab2");
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    $(".btn-prev").click(function(e) {
        e.preventDefault();
        nextPrev(-1);
    });

    var testing = false;

    $(".btn-save").click(function(e) {
        e.preventDefault();

        let form = $(".tab2:visible form");
        let url = form.attr("action");
        let method = "POST";

        form.unbind('submit');

        console.log(url);

        form.find(".text-danger").remove();
        form.find(".form-group").removeClass("has-error");

        console.log(form.serialize());

        $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            success: function(res) {
                dataSignUp['step' + currentTab] = form.serializeArray();

                // bypass signup
                $('#dataSignUp').val(JSON.stringify(dataSignUp));
                submitdata();

                // if (currentTab < 1) {
                //     nextPrev(+1);
                // } else {
                //     console.log(dataSignUp);
                //     $('#dataSignUp').val(JSON.stringify(dataSignUp));
                //     submitdata();
                //     // window.location.href = "{{route('signup.homechef.post')}}"+"?data="+JSON.stringify(dataSignUp);
                // }
            },
            error: function(xhr) {
                let res = xhr.responseJSON;
                if ($.isEmptyObject(res) == false) {
                    $.each(res.errors, function(key, val) {
                        $("#" + key)
                            .closest(".form-group")
                            .addClass("has-error")
                            .append(
                                '<span class="text-danger">' +
                                val +
                                "</span>"
                            );
                    });
                }
            }
        });
        return testing;
    });

    function submitdata() {
        $('#signup-form').submit();
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
                                <a class="col-4" href="{{ route('signup.customer') }}">
                                    Home Chef
                                </a>
                                <a class="col-4" href="{{ route('signup.customer') }}">
                                    Customer
                                </a>
                                {{-- <a class="col-4 active" href="{{ route('signup.customer') }}">
                                    Chef Manager
                                </a> --}}
                            </div>
                            <h4 class="auth-form-head__title">
                                <i class="fas fa-user"></i>
                                Sign Up
                            </h4>
                        </div>
                        <div class="auth-form-content">

                            <form id="signup-form" action="{{route('signup.chefmanager.post')}}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="dataSignUp" id="dataSignUp">
                            </form>

                            <div class="tab2">
                                <form method="POST" action="{{ route('signup.chefmanager.step-1') }}">
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <label for="username">Username</label>
                                            <input id="username" class="form-control" type="text" name="username" placeholder="Username goes here" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="email">Email</label>
                                            <input id="email" class="form-control" type="email" name="email" placeholder="Email goes here" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <label for="password">Password</label>
                                            <input id="password" class="form-control" type="password" name="password" id="passwordInput" placeholder="Password goes here" />
                                            <a onclick="togglePass()" class="toggler-password" href="#" id="togglerTypePass">
                                                <i class="far fa-eye" id="togglerTypePass__Icon"></i>
                                            </a>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="password_confirmation">Password Confirmation</label>
                                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" id="cPasswordInput" placeholder="Password Confirmation" />
                                            <a onclick="cTogglePass()" class="toggler-password" href="#" id="cTogglerTypePass">
                                                <i class="far fa-eye" id="cTogglerTypePass__Icon"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="custom-checkbox">
                                            <input name="acceptTermAgreement" type="checkbox" class="custom-control-input" id="acceptTermAgreement" onchange="toa(this)">
                                            <label class="custom-control-label" for="acceptTermAgreement">I accept Terms of
                                                Use & Privacy Policy</label>
                                        </div>
                                    </div>
                                    <div class="form-row btn-action-auth">

                                        <button type="submit" name="signup" class="btn btn-save btn-submit-form" disabled>
                                            Next Step
                                        </button>

                                    </div>
                                </form>
                            </div>

                            <div class="tab2">
                                <form method="POST" action="{{ route('signup.chefmanager.step-2') }}">
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <label for="address_line_1">Address Line 1</label>
                                            <input id="address_line_1" class="form-control" type="text" name="address_line_1" placeholder="1600 Seaport Boulevart" />
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="address_line_2">Address Line 2</label>
                                            <input id="address_line_2" class="form-control" type="text" name="address_line_2" placeholder="Redwood City, CA" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <label for="country">Country</label>
                                        <select id="country" class="custom-select" name="country">
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
                                            <input id="city" class="form-control" type="text" name="city" placeholder="Redwood City" />
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="zipcode">Zipcode</label>
                                            <input id="zipcode" class="form-control" type="text" name="zipcode" placeholder="09871" />
                                        </div>
                                    </div>
                                    <div class="form-row btn-action-auth next">
                                        <a class="btn-change-page btn-prev" href="">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>

                                        <button type="submit" name="signup" class="btn btn-save btn-submit-form">
                                            Create my account
                                        </button>

                                    </div>
                                </form>
                            </div>

                            <div class="social-login mt-0">
                                <p>
                                    <span>Or sign up using</span>
                                </p>
                                <div class="social-row row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img src="{{ asset('images/icon/google.png') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img src="{{ asset('images/icon/facebook.png') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img src="{{ asset('images/icon/instagram.png') }}" alt="">
                                        </a>
                                    </div>
                                </div>
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
