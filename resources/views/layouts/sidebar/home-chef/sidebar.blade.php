<div class="sidebar-eatchef">
    <div class="menu-wrapper">
        <div class="menu-wrapper-logo">
            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo Eatcheff">
        </div>
        <ul class="menu-wrapper-nav">
            {{-- <li class="menu-wrapper-nav-item">
                <a href="{{ route('home.home-chef.leaderboard') }}">
                    <i class="fa fa-home"></i>
                    Dashboard
                </a>
            </li> --}}
            <li class="menu-wrapper-nav-item">
                {{-- <a href="{{ route('home.home-chef.competition') }}">
                    <i class="fa fa-flag-checkered"></i>
                    Competition
                </a> --}}
                <a href="{{ route('home.home-chef.leaderboard') }}">
                    <i class="fa fa-flag-checkered"></i>
                    Leaderboard
                </a>
                {{-- <ul class="dropdown-nav">
                    <li class="dropdown-nav-item">
                        <a href="{{ route('home.home-chef.leaderboard') }}">
                            <i class="fa fa-poll"></i>
                            Leaderboard
                        </a>
                    </li>
                    <li class="dropdown-nav-item">
                        <a href="{{route('home.home-chef.stages')}}">
                            <i class="fa fa-layer-group"></i>
                            Stage & Rules
                        </a>
                    </li>
                    <li class="dropdown-nav-item">
                        <a href="{{route('home.home-chef.chef-award')}}">
                            <i class="fa fa-medal"></i>
                            Awards
                        </a>
                    </li>
                </ul> --}}
            </li>
            <li class="menu-wrapper-nav-item menu-wrapper-nav-item-dropdown">
                <a href="#">
                    <i class="fa fa-concierge-bell"></i>
                    Dish
                </a>
                <ul class="dropdown-nav">
                    <li class="dropdown-nav-item">
                        <a href="{{route('home.home-chef.dish-list')}}">
                            <i class="fas fa-bars"></i>
                            List
                        </a>
                    </li>
                    <li class="dropdown-nav-item">
                        <a href="{{route('home.home-chef.dish.new-dish.step-1')}}">
                            <i class="fas fa-plus"></i>
                            Add
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu-wrapper-nav-item">
                <a href="{{ route('home.home-chef.help-me') }}">
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
                    <form action="{{ route('home.home-chef.change.photo.post') }}" method="POST" id="postPhoto" enctype='multipart/form-data'>
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