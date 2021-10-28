@extends('layouts.base.base')
@section('title', __('Eatchefs - Order Confirmation'))
@section('script')
<script>
    $(document).ready(function () {
        $('#ordering-navigator, #new-order-navigator').addClass('active');
    });

</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">
    @include('layouts.sidebar.customer.sidebar')
    <div class="base-page order-confirmation form-page">
        <div class="container">
            <div class="base-page-card full">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-check"></i>
                            <h5>Order <span>Confirmation</span></h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content mb-5">
                    <div class="dash-fill">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="check-hold">
                                    <img class="filter-color" src="{{ asset('images/icon/checkmark.png') }}" alt="">
                                </div>
                                <h5>Order Placed Successfully!</h5>
                                <p>Your ID : 9876512032</p>
                                <a href="{{ route('home.customer.order.list') }}" class="checkout-button mb-3 d-lg-none mt-5">
                                    View Order List
                                </a>
                            </div>
                            <div class="col-lg-7 d-none d-lg-block">
                                <div class="order-detail-topic">
                                    <div class="head">
                                        <h5>Order Details</h5>
                                    </div>
                                    <div class="body">
                                        <div class="info-row">
                                            <h5>Bruella Reginville</h5>
                                            <p>59.00</p>
                                        </div>
                                        <div class="info-row">
                                            <h5>Broodje Kaasworst</h5>
                                            <p>20.00</p>
                                        </div>
                                        <div class="info-row">
                                            <h5>Extra Fees</h5>
                                            <p>5.00</p>
                                        </div>
                                        <div class="add-line">
                                            <div class="line"></div>
                                            <ion-icon name="add-outline"></ion-icon>
                                        </div>
                                        <div class="info-row final">
                                            <h5>Raw Price</h5>
                                            <p>84.00</p>
                                        </div>
                                        <div class="info-row">
                                            <h5>Participant Discount</h5>
                                            <p>5.30</p>
                                        </div>
                                        <div class="add-line">
                                            <div class="line"></div>
                                            <ion-icon name="remove-outline"></ion-icon>
                                        </div>
                                        <div class="info-row final">
                                            <h5>Total Price</h5>
                                            <p>$ 78.70</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-footer d-none d-lg-flex justify-content-center">
                    <a href="{{ route('home.customer.order.list') }}" class="checkout-button px-5 py-2 w-fit-content">
                        View Order List
                    </a>
                </div>
            </div>
            @include('layouts.bottom-nav.customer.order-navigator')
        </div>
    </div>
</div>
@include('layouts.bottom-nav.customer.bottom-nav')
@endsection
