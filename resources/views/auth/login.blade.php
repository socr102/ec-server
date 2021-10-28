@extends('layouts.base.base')

@section('title', __('Eatchefs - Login'))
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

</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-guest')

    <div class="login auth-page">
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
                    <div class="col-lg-6 auth-content-register pt-0">
                        <form method="POST" action="{{ route('login-post') }}">
                            {{ csrf_field() }}
                            <div class="auth-form">
                                <div class="auth-form-head">
                                    <h4 class="auth-form-head__title">
                                        <i class="fas fa-user"></i>
                                        Login
                                    </h4>
                                </div>
                                @include('layouts.alert.flash-message')
                                <div class="auth-form-content">
                                    <div class="form-row">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" name="email" placeholder="Email goes here" required value="{{ old('email') }}"/>
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-row mb-0">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" id="passwordInput"
                                            placeholder="Password goes here" required />
                                        <a onclick="togglePass()" href="#" class="toggler-password" id="togglerTypePass">
                                            <i class="far fa-eye" id="togglerTypePass__Icon"></i>
                                        </a>
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-row btn-action-auth">
                                        <button type="submit" name="signup" class="btn btn-submit-form">
                                            Log me in
                                        </button>
                                    </div>
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
                                <div class="auth-form-footer d-flex justify-content-around">
                                    <div class="auth-alter-link">
                                        <a href="{{ route('signup.customer') }}">Not Member ? <b>Sign Up</b></a>
                                    </div>
                                    <div class="auth-alter-link">
                                        <a href="{{ route('password.request') }}">Forgot your password ?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
</div>
</section>
</div>
@endsection

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
    </script>
@endsection
