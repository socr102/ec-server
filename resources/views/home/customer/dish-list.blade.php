@extends('layouts.base.base')
@section('title', __('Eatchefs - Homepage'))
@section('script')
<script>
    $(document).ready(function() {
    //     $('#homepage-navigator').addClass('active');

    //     $('.voting').click(function() {
    //         countStr = $(this).find('.voting-count').text();

    //         if ($(this).hasClass('voted')) {
    //             $(this).find('.voting-count').text(parseInt(countStr) - 1)

    //             $(this).removeClass('voted');
    //         } else {
    //             $(this).find('.voting-count').text(parseInt(countStr) + 1)

    //             $(this).addClass('voted');
    //         }
    //     });
        $('#homepage-navigator').addClass('active');
    });
</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">

    @include('layouts.sidebar.customer.sidebar')
    <div class="base-page dish-list-page">
        <div class="container">
            <div class="base-page-card full">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-concierge-bell"></i>
                            <h5>Eatchefs <span>Dish List</span></h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content">
                    <form action="{{ route('home.customer.dish-list') }}" method="GET">
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
                        <div class="dish-row">
                            @forelse($listDish as $dt)
                                <div class="dish-item">
                                    <a href="{{ route('home.customer.dish.dish', ['id'=>$dt->id_dish]) }}">
                                        <div class="info-col">
                                            {{-- <h5 class="food__name">{{ $dt->dish_name }}</h5> --}}
                                            {{-- <p class="food__dish-type">Main Dish - Keto</p> --}}
                                            <p class="food__dish-type">{{ $dt->dish_name }}</p>
                                            <p class="food__chef">{{ $dt->chef->username }} - {{ $dt->chef->titleName }}</p>
                                        </div>
                                        <div class="img-col">
                                            <img src="{{ asset('images/food/'.$dt->dish_image) }}" alt="">
                                        </div>
                                    </a>
                                    <div
                                        class="sharethis-inline-share-buttons"
                                        data-url="{{ route('home.customer.dish.dish', ['id'=>$dt->id_dish]) }}"
                                        data-title="{{ $dt->dish_name }}"
                                        data-image="{{ asset('images/food/'.$dt->dish_image) }}"
                                        data-description="{{ $dt->description }}"
                                    ></div>
                                    <div class="rangking">{{ $loop->iteration }}</div>
                                    {{-- <div class="calory">
                                        <p>{{ $dt->nutrition->calorie }}</p>
                                        <img src="{{ asset('images/icon/fork-spoon.png') }}" alt="">
                                    </div> --}}
                                    <form action="{{ route('home.customer.dish.upvote', $dt->id_dish) }}" method="post">
                                        @csrf
                                        <button class="voting @if ($dt->isVoted) voted @endif" type="submit">
                                            <p class="voting-count">{{ $dt->upvote }}</p>
                                            <i class="bi  @if ($dt->isVoted) bi-hand-thumbs-up-fill @else bi-hand-thumbs-up @endif"></i>
                                        </button>
                                    </form>
                                </div>
                            @empty
                                <p class="text-center">dish not found</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container nav-hold d-lg-none">
            <div class="navigator">
                <a href="{{ route('home.customer.leaderboard') }}">
                    <p>Leaderboard</p>
                    <i class="fa fa-trophy"></i>
                </a>
            </div>
        </div> --}}
    </div>

    @include('layouts.bottom-nav.customer.bottom-nav')
@endsection

