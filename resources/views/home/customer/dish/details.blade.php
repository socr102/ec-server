@extends('layouts.base.base')
@section('title', __('Eatchefs - Dish Details'))
@section('script')
<script>
    $(document).ready(function() {
        $('#homepage-navigator').addClass('active');
    });
</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">

    @include('layouts.sidebar.customer.sidebar')
    <div class="base-page order-track-page dish-page">
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
                <div class="base-page-card-content">
                    <div class="navigator-row row">
                        <a class="col-4" href="{{ route('home.customer.dish.dish', ['id'=>$dish->id_dish]) }}">
                            Main Info
                        </a>
                        <a class="col-4 active" href="{{ route('home.customer.dish.details', ['id'=>$dish->id_dish]) }}">
                            Details
                        </a>
                        <a class="col-4" href="{{ route('home.customer.dish.video', ['id'=>$dish->id_dish]) }}">
                            Video
                        </a>
                    </div>
                    <div class="order-details">
                        {{-- <div class="order-detail-topic">
                            <div class="head">
                                <h5>Nutrition List</h5>
                            </div>
                            <div class="body">
                                <div class="info-row">
                                    <h5>Fats</h5>
                                    <p>{{ $dish->nutrition->fats }}</p>
                                </div>
                                <div class="info-row">
                                    <h5>Crabs</h5>
                                    <p>{{ $dish->nutrition->carbs }}</p>
                                </div>
                                <div class="info-row">
                                    <h5>Protein</h5>
                                    <p>{{ $dish->nutrition->protein }}</p>
                                </div>
                                <div class="info-row">
                                    <h5>Cholesterol</h5>
                                    <p>{{ $dish->nutrition->cholestrol }}</p>
                                </div>
                                <div class="info-row">
                                    <h5>Sodium</h5>
                                    <p>{{ $dish->nutrition->sodium }}</p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="order-detail-topic">
                            <div class="head">
                                <h5>Ingredients</h5>
                            </div>
                            <div class="body">
                                @foreach($dish->ingredient as $dt)
                                <div class="info-row">
                                    <h5>{{ $dt->quantity." ".$dt->unit." ".$dt->ingredient  }}</h5>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="order-detail-topic">
                            <div class="head">
                                <h5>Preparation</h5>
                            </div>
                            <div class="body">
                                <div class="info-row">
                                    <h5>Servings</h5>
                                    <p>{{ $dish->number_of_availability }} serving(s)</p>
                                </div>
                                <div class="info-row">
                                    <h5>Time</h5>
                                    <p>{{ $dish->time_preparation }} minutes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.bottom-nav.customer.bottom-nav')
@endsection
