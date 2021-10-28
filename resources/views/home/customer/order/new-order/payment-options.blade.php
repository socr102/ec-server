@extends('layouts.base.base')
@section('title', __('Eatchefs - Cart'))
@section('script')
<script>
    $(document).ready(function () {
        $('#ordering-navigator, #new-order-navigator').addClass('active');

        $('.choose').click(function () {
            $('.choose img').addClass('d-none');
            $(this).find('img').removeClass('d-none');
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
                            <i class="fa fa-wallet"></i>
                            <h5>Payment <span>Options</span></h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content">
                    <div class="options-list row">
                        <div class="col-lg-6">
                            <div class="options-item">
                                <div class="info-col">
                                    <p class="option__title">Credit Card</p>
                                    <h5 class="option__desc">A credit card allows you to make purchases and pay for them
                                        later. In that sense, it's like a short-term loan.</h5>
                                </div>
                                <button class="choose" id="homeDelivery">
                                    <img src="{{ asset('images/icon/checkmark.png') }}" alt="">
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="options-item">
                                <div class="info-col">
                                    <p class="option__title">iDEAL Account</p>
                                    <h5 class="option__desc">iDEAL is an online payment method that enables consumers to pay
                                        online through their own bank.</h5>
                                </div>
                                <button class="choose" id="iDeal">
                                    <img src="{{ asset('images/icon/checkmark.png') }}" class="d-none" alt="">
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="options-item">
                                <div class="info-col">
                                    <p class="option__title">Tikkie Account</p>
                                    <h5 class="option__desc">Tikkie is an online payment method that enables consumers to
                                        pay online through their own bank.</h5>
                                </div>
                                <button class="choose" id="tikkie">
                                    <img src="{{ asset('images/icon/checkmark.png') }}" class="d-none" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-footer">
                    <a class="checkout-button" href="{{ route('home.customer.order.new-order.step-2.details') }}">
                        <button>Next Step</button>
                    </a>
                </div>
            </div>
        </div>
        @include('layouts.bottom-nav.customer.order-navigator')
    </div>
</div>
@include('layouts.bottom-nav.customer.bottom-nav')
@endsection
