<div class="bottom-nav">
    <div class="nav-row row">
        <div class="col-3 nav-col">
            <a class="nav-item" id="homepage-navigator" href="{{ route('home.home-chef.leaderboard') }}">
                <i class="fa fa-home"></i>
                <p>Home</p>
            </a>
        </div>
        <div class="col-3 nav-col">
            <a class="nav-item" id="dish-list-navigator" href="{{ route('home.home-chef.dish-list') }}">
                <i class="fa fa-concierge-bell"></i>
                <p>Dish List</p>
            </a>
        </div>
        <div class="col-3 nav-col">
            <a class="nav-item" id="add-dish-navigator" href="{{ route('home.home-chef.dish.new-dish.step-1') }}">
                <i class="fa fa-plus"></i>
                <p>Add Dish</p>
            </a>
        </div>
        <div class="col-3 nav-col">
            <a class="nav-item" id="request-help-navigator" href="{{ route('home.home-chef.help-me') }}">
                <i class="fa fa-pray"></i>
                <p>Help me</p>
            </a>
        </div>
    </div>
</div>