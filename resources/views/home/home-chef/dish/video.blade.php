@extends('layouts.base.base')
@section('title', __('Eatchefs - Homepage'))
@section('script')
<script>
    $(document).ready(function () {
        $('#homepage-navigator').addClass('active');
    });

</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">

    @include('layouts.sidebar.home-chef.sidebar')
    <div class="base-page dish-page">
        <div class="container">
            <div class="base-page-card">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-concierge-bell"></i>
                            <h5>Eatchefs <span>Dish</span></h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content overflow-hidden">
                    <div class="navigator-row row navigator-mobile">
                        <a class="col-4" href="{{ route('home.home-chef.dish.dish', ['id'=>$dish->id_dish]) }}">
                            Main Info
                        </a>
                        <a class="col-4" href="{{ route('home.home-chef.dish.details',['id'=>$dish->id_dish]) }}">
                            Details
                        </a>
                        <a class="col-4 active" href="{{ route('home.home-chef.dish.video',['id'=>$dish->id_dish]) }}">
                            Video
                        </a>
                    </div>
                    <div class="dish-item">

                        <div class="card ">
                            <player data-uuid='{{ $dish->video_dish }}' data-width='100%' data-height='450' data-displaytitle='false'></player>
                        </div>

                    </div>
                </div>
            </div>
            {{-- @include('layouts.bottom-nav.home-chef.home-navigator') --}}
        </div>
    </div>
    @include('layouts.bottom-nav.home-chef.bottom-nav')
    @endsection
