<div class="home-navigator">
    <div class="nav-row row">
        <div class="nav-col">
            <a class="nav-item" id="competition-navigator" href="{{ route('home.home-chef.competition') }}">
                <i class="fa fa-flag-checkered"></i>
            </a>
        </div>
        <div class="nav-col">
            <a class="nav-item" id="leaderboard-navigator" href="{{ route('home.home-chef.leaderboard') }}">
                <i class="fa fa-poll"></i>
            </a>
        </div>
        <div class="nav-col">
            <a class="nav-item" id="dish-list-navigator" href="{{ route('home.home-chef.dish-list') }}">
                <i class="fa fa-concierge-bell"></i>
            </a>
        </div>
        <div class="nav-col">
            <a class="nav-item" id="stages-navigator" href="{{ route('home.home-chef.stages') }}">
                <i class="fa fa-layer-group"></i>
            </a>
        </div>
        {{-- <div class="nav-col">
            <a class="nav-item" id="chef-award-navigator" href="{{ route('home.home-chef.chef-award') }}">
                <i class="fa fa-medal"></i>
            </a>
        </div> --}}
    </div>
</div>