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
        @include('layouts.sidebar.home-chef.sidebar')
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
                    <div class="base-page-card-content mb-lg-4">
                        <form action="{{ route('home.home-chef.leaderboard') }}" method="GET">
                            <div class="searchbar">
                                <div class="searchbar-frame">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-search"></i>
                                        <input type="text" name="dish" placeholder="Search for dish name" value="{{ request()->query('dish') }}">
                                        <input type="submit" style="display: none"/>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @if(request()->query('dish') != '')
                            <p>Search result for "{{ request()->query('dish') }}" </p>
                        @endif

                        <div class="dish-list">
                            @foreach ($dishes as $dish)
                                <div class="dish-item">
                                    <a href="{{ route('home.home-chef.dish.dish', $dish->id_dish) }}">
                                        <div class="info-col text-dark">
                                            {{-- <h5 class="food__name">{{ $dt->dish_name }}</h5> --}}
                                            {{-- <p class="food__dish-type">Main Dish - Keto</p> --}}
                                            <p class="food__dish-type">{{ $dish->dish_name }}</p>
                                            <p class="food__chef">{{ $dish->chef->username }} - {{ $dish->chef->titleName }}</p>
                                        </div>
                                        <div class="img-col">
                                            <img src="{{ asset('images/food/'.$dish->dish_image) }}" alt="">
                                        </div>
                                        <div class="rangking">{{ $loop->iteration }}</div>
                                    </a>
                                    <div
                                        class="sharethis-inline-share-buttons"
                                        data-url="{{ route('home.home-chef.dish.dish', $dish->id_dish) }}"
                                        data-title="{{ $dish->dish_name }}"
                                        data-image="{{ asset('images/food/'.$dish->dish_image) }}"
                                        data-description="{{ $dish->description }}"
                                    ></div>
                                    {{-- <div class="calory">
                                        <p>{{ $dish->nutrition->calorie }}</p>
                                        <img src="{{ asset('images/icon/fork-spoon.png') }}" alt="">
                                    </div> --}}
                                    <form action="{{ route('home.home-chef.dish.upvote', $dish->id_dish) }}" method="post">
                                        @csrf
                                        <button class="voting @if ($dish->isVoted) voted @endif" type="submit">
                                            <p class="voting-count">{{ $dish->upvote }}</p>
                                            <i class="fa fa-thumbs-up"></i>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="base-page-card-footer">
                        <div class="btn-group">
                            <a href="#" class="btn-paginate"><i class="fa fa-chevron-left mr-2"></i> Previous</a>
                            <a href="#" class="btn-paginate">Next <i class="fa fa-chevron-right ml-2"></i></a>
                        </div>
                    </div> --}}
                </div>
                {{-- @include('layouts.bottom-nav.home-chef.home-navigator') --}}
            </div>
        </div>
    </div>
    @include('layouts.bottom-nav.home-chef.bottom-nav')
@endsection
