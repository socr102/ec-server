<nav class="navbar-dashboard">
    <div class="container">
        <a class="navbar-brand d-lg-none">
            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo Eatcheff">
        </a>
        <ul class="navbar-dashboard-menu">
            <li class="dropdown d-lg-none">
                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="profile">
                        <p>
                            Hello, <span>{{Auth::user()->username}}!</span>
                        </p>
                        <div class="img" style="background-image: url({{ asset('images/people/people-1.jpeg') }})"></div>
                    </div>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                  {{-- <a class="dropdown-item" href="#">
                    <i class="fas fa-user-edit"></i>
                        Edit Profile
                  </a> --}}
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            <li>

            </li>
            <li style="opacity: 0">
                <a class="btn btn-dark-grad ">
                    Notification <i class="fas fa-bell"><span class="badge">3</span></i>
                </a>
            </li>
        </ul>
    </div>
</nav>
