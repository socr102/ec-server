<div class="sidebar-eatchef">
    <div class="menu-wrapper">
        <div class="menu-wrapper-logo">
            <img src="{{ asset('images/logo/logo-with-desc.png') }}" alt="Logo Eatcheff">
        </div>
        <ul class="menu-wrapper-nav">
            <li class="menu-wrapper-nav-item">
                <a href="{{ route('home.chef-manager.notification.list') }}">
                    <i class="fa fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li class="menu-wrapper-nav-item">
                <a href="{{ route('home.chef-manager.notification.list') }}">
                    <i class="fas fa-bell"></i>
                    Notification
                </a>
            </li>
            <li class="menu-wrapper-nav-item">
                <a href="{{ route('home.chef-manager.list.users') }}">
                    <i class="fa fa-tasks"></i>
                    User List
                </a>
            </li>
            <li class="menu-wrapper-nav-item">
                <a href="{{ route('home.chef-manager.customer-support') }}">
                    <i class="fas fa-question-circle"></i>
                    Support
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
                    <form action="{{ route('home.chef-manager.change.photo.post') }}" method="POST" id="postPhoto" enctype='multipart/form-data'>
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
                    Hello, <span>{{ Auth::user()->username}}</span>
                </p>
            </a>
        </div>
    </div>
</div>