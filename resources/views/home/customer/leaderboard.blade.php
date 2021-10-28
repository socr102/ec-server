@extends('layouts.base.base')
@section('title', __('Eatchefs - Homepage'))
@section('script')
    <script>
        $(document).ready(function () {
            $('#homepage-navigator, #leaderboard-navigator').addClass('active');
        });
    </script>
@endsection
@section('content')

    @include('layouts.navbar.navbar-dashboard')
    <div class="dashboard-wrapper">

        @include('layouts.sidebar.customer.sidebar')
    <div class="base-page leaderboard">
        <div class="container">
            <div class="base-page-card full">
                <div class="base-page-card-header">
            <div class="page-title">
                <div class="hold">
                    <i class="fa fa-poll"></i>
                    <h5>Eatchefs <span>Leaderboard</span></h5>
                </div>
            </div>
        </div>
        <div class="base-page-card-content">
            <div class="searchbar">
                <div class="searchbar-frame">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-search"></i>
                        <input type="text" placeholder="Search for dish name">
                    </div>
                </div>
            </div>

            @if(request()->query('dish') != '')
                <p>Search result for "{{ request()->query('dish') }}" </p>
            @endif

            <div class="dish-list">
                @forelse ($dishes as $dish)
                    <div class="dish-item">
                        <a href="{{ route('home.customer.dish.dish', $dish->id_dish) }}">
                            <div class="info-col text-dark">
                                <p class="food__dish-type">{{ $dish->dish_name }}</p>
                                <p class="food__chef">{{ $dish->chef->username }} - {{ $dish->chef->titleName }}</p>
                            </div>
                            <div class="img-col">
                                <img src="{{ asset('images/food/'.$dish->dish_image) }}" alt="">
                            </div>
                        </a>
                        <div class="rangking">{{ $loop->iteration }}</div>
                        {{-- <div class="calory">
                            <p>{{ $dish->nutrition->calorie }}</p>
                            <img src="{{ asset('images/icon/fork-spoon.png') }}" alt="">
                        </div> --}}
                        <form action="{{ route('home.customer.dish.upvote', $dish->id_dish) }}" method="post">
                            @csrf
                            <button class="voting @if ($dish->isVoted) voted @endif" type="submit">
                                <p class="voting-count">{{ $dish->upvote }}</p>
                                <i class="fa fa-thumbs-up"></i>
                            </button>
                        </form>
                    </div>

                @empty
                <p class="text-center">dish not found</p>
                @endforelse
            </div>
        </div>
        <div class="container nav-hold">
            <div class="navigator">
                <a href="{{ route('home.customer.dish-list') }}">
                    <p>Dish List</p>
                    <i class="fa fa-concierge-bell"></i>
                </a>
            </div>
        </div>
    </div>

    @include('layouts.bottom-nav.customer.bottom-nav')
@endsection
