@extends('layouts.base.base')
@section('title', __('Eatchefs - Cart'))
@section('script')
    <script>
        $(document).ready(function () {
            $('#ordering-navigator, #new-order-navigator').addClass('active');

            $('.choose').click(function () { 
                $('.choose img').addClass('d-none');
                $(this).find('img').removeClass('d-none');

                if($('#homeDelivery img').hasClass('d-none')) {
                    $('#homeDeliveryButton').addClass('d-none')
                    $('#pickupButton').removeClass('d-none')
                } else if($('#pickup img').hasClass('d-none')) {
                    $('#homeDeliveryButton').removeClass('d-none')
                    $('#pickupButton').addClass('d-none')
                }
            });
        });
    </script>
@endsection
@section('content')

    @include('layouts.navbar.navbar-dashboard')
    <div class="dashboard-wrapper">
        @include('layouts.sidebar.customer.sidebar')
        <div class="base-page options-page">
            <div class="container">
                <div class="base-page-card">
                    <div class="base-page-card-header">
                        <div class="page-title">
                            <div class="hold">
                                <i class="fa fa-truck"></i>
                                <h5>Delivery <span>Options</span></h5>
                            </div>
                        </div>
                    </div>
                    <div class="base-page-card-content">
                        <div class="options-list row">
                            <div class="col-lg-6">
                                <div class="options-item">
                                    <div class="info-col">
                                        <p class="option__title">Home Delivery</p>
                                        <h5 class="option__desc">Let the food you ordered come delivered to your house</h5>
                                    </div>
                                    <button class="choose" id="homeDelivery">
                                        <img src="{{ asset('images/icon/checkmark.png') }}" alt="">
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="options-item">
                                    <div class="info-col">
                                        <p class="option__title">Pick-Up</p>
                                        <h5 class="option__desc">Go to the place where this food is being traded take your order and go</h5>
                                    </div>
                                    <button class="choose" id="pickup">
                                        <img src="{{ asset('images/icon/checkmark.png') }}" class="d-none" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="base-page-card-footer">
                        <a href="{{ route('home.customer.order.new-order.homedelivery-information') }}" id="homeDeliveryButton">
                            <div class="checkout-button">
                                <button>Next Step</button>
                            </div>
                        </a>
                        <a href="{{ route('home.customer.order.new-order.pickup-information') }}" id="pickupButton" class="d-none">
                            <div class="checkout-button">
                                <button>Next Step</button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.bottom-nav.customer.order-navigator')
    </div>
    @include('layouts.bottom-nav.customer.bottom-nav')
@endsection
