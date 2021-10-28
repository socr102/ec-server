<header id="header" class="header fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ route('login') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('images/logo/logo.png') }}" alt="">
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="button primary-grad" href="{{ route('signup.customer') }}">Sign up <i class="fas fa-user-plus"></i></a></li>
                <li><a class="button dark-grad" href="{{ route('login') }}">Login <i class="fas fa-sign-in-alt"></i></a></li>
            </ul>
        </nav>
    </div>
</header>