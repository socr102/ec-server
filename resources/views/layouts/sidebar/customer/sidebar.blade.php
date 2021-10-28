<div class="sidebar-eatchef">
    <div class="menu-wrapper">
        <div class="menu-wrapper-logo">
            <img src="{{ asset('images/logo/logo-with-desc.png') }}" alt="Logo Eatcheff">
        </div>
        <ul class="menu-wrapper-nav">
            <li class="menu-wrapper-nav-item">
                <a href="{{ route('home.customer.dish-list') }}">
                    <i class="fa fa-flag-checkered"></i>
                    Leaderboard
                </a>
            </li>
            {{-- <li class="menu-wrapper-nav-item">
                <a href="{{ route('home.customer.leaderboard') }}">
                    <i class="fa fa-tasks"></i>
                    Leaderboard
                </a>
            </li> --}}
            <!-- <li class="menu-wrapper-nav-item menu-wrapper-nav-item-dropdown">
                    <a href="{{ route('home.customer.order.list') }}">
                        <i class="fas fa-compass"></i>
                        Ordering
                    </a>
                    <ul class="dropdown-nav">
                        <li class="dropdown-nav-item">
                            <a href="{{ route('home.customer.order.list') }}">
                                <i class="fas fa-check"></i>
                                Order List
                            </a>
                        </li>
                        <li class="dropdown-nav-item">
                            <a href="{{ route('home.customer.order.history') }}">
                                <i class="fas fa-history"></i>
                                History List
                            </a>
                        </li>
                    </ul>
                </li> -->
            <!-- <li class="menu-wrapper-nav-item">
                <a href="{{ route('home.customer.order.cart') }}">
                    <i class="fas fa-shopping-cart"></i>
                    Cart
                </a>
            </li> -->
            <li class="menu-wrapper-nav-item">
                <a href="{{ route('home.customer.help-me') }}">
                    <i class="fa fa-pray"></i>
                    Help Me
                </a>
            </li>
            <li class="menu-wrapper-nav-item">
                <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <div class="bottom-menu">
        <div class="profile">
            <a>
                <div class="profile-img-wrapper">
                    <form action="{{ route('home.customer.change.photo.post') }}" method="POST" id="postPhoto" enctype='multipart/form-data'>
                        @csrf
                        <label for="user-photo" style="cursor: pointer;">
                            @if (auth()->user()->photo)
                            <img src="{{ asset('storage/user_photo/'.auth()->user()->photo)  }}" alt="">
                            @else
                            <img src="{{ asset('images/people/default.jpg') }}" alt="">
                            @endif
                        </label>
                        <input type="file" name="photo" style="display: none;" id="user-photo" onchange="form.submit()">
                    </form>
                </div>
                <p class="profile-name">
                    Hello, <span>{{ Auth::user()->username }}</span>
                </p>
            </a>
        </div>
    </div>
</div>