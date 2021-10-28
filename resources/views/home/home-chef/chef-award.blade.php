@extends('layouts.base.base')
@section('title', __('Eatchefs - Homepage'))
@section('script')
<script>
    $(document).ready(function () {
        $('#homepage-navigator, #chef-award-navigator').addClass('active');
    });

</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">
    @include('layouts.sidebar.home-chef.sidebar')
    <div class="base-page chef-award">
        <div class="container">
            <div class="base-page-card">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-medal"></i>
                            <h5>Eatchefs <span>Chef Award</span></h5>
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
                    <div class="dish-list">
                        <a class="dish-item" href="{{ route('home.home-chef.critique-evaluation') }}">
                            <div class="info-col">
                                <h5 class="food__name">Broodje Kaasworst</h5>
                                <p class="food__chef">Louisl Oaksbane</p>
                            </div>
                            <div class="img-col">
                                <img src="{{ asset('images/food/food1.png') }}" alt="">
                                <div class="overnap">
                                    <p></p>
                                </div>
                                <div class="medal">
                                    <img src="{{ asset('images/icon/win1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="rangking">1</div>
                        </a>
                        <a class="dish-item" href="{{ route('home.home-chef.critique-evaluation') }}">
                            <div class="info-col">
                                <h5 class="food__name">Chocolate Mousse</h5>
                                <p class="food__chef">Firiel Kalzairos</p>
                            </div>
                            <div class="img-col">
                                <img src="{{ asset('images/food/food2.png') }}" alt="">
                                <div class="overnap">
                                    <p>90</p>
                                </div>
                                <div class="medal">
                                    <img src="{{ asset('images/icon/win2.png') }}" alt="">
                                </div>
                            </div>
                            <div class="rangking">2</div>
                        </a>
                        <a class="dish-item" href="{{ route('home.home-chef.critique-evaluation') }}">
                            <div class="info-col">
                                <h5 class="food__name">Creeme Brulee</h5>
                                <p class="food__chef">Dunces Morgwyn</p>
                            </div>
                            <div class="img-col">
                                <img src="{{ asset('images/food/food3.png') }}" alt="">
                                <div class="overnap">
                                    <p>85</p>
                                </div>
                                <div class="medal">
                                    <img src="{{ asset('images/icon/win3.png') }}" alt="">
                                </div>
                            </div>
                            <div class="rangking">3</div>
                        </a>
                    </div>
                </div>
            </div>
            @include('layouts.bottom-nav.home-chef.home-navigator')
        </div>
    </div>

    @include('layouts.bottom-nav.home-chef.bottom-nav')
    @endsection
