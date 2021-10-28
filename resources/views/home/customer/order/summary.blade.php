@extends('layouts.base.base')
@section('title', __('Eatchefs - Order Summary'))
@section('script')
<script>
    $(document).ready(function () {
        $('#ordering-navigator, #list-navigator').addClass('active');
    });

</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">
    @include('layouts.sidebar.customer.sidebar')
    <div class="base-page order-summary-page">
        <div class="container">
            <div class="base-page-card full">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-wallet"></i>
                            <h5>Order <span>Summary</span></h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content mb-lg-5">
                    <div class="order-details">
                        <button class="btn-edit d-lg-none">
                            <i class="fa fa-pencil-alt"></i>
                            <p>Edit Order</p>
                        </button>
                        <div class="order-detail-topic mt-lg-0">
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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="order-detail-topic">
                                    <div class="head">
                                        <h5>Delivery Method</h5>
                                    </div>
                                    <div class="body d-flex align-items-center">
                                        <div class="left">
                                            <img src="{{ asset('images/icon/homedelivery.png') }}" alt="">
                                            <p>Home Delivery</p>
                                        </div>
                                        <div class="right">
                                            <div class="info-row block">
                                                <h5>Address Line 1</h5>
                                                <p>1600 Seaport Boulevart</p>
                                            </div>
                                            <div class="info-row block">
                                                <h5>Address Line 2</h5>
                                                <p>Redwood City, CA</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="order-detail-topic">
                                    <div class="head">
                                        <h5>Payment Method</h5>
                                    </div>
                                    <div class="body d-flex align-items-center">
                                        <div class="left">
                                            <img src="{{ asset('images/icon/cc.png') }}" alt="">
                                            <p>Credit Card</p>
                                        </div>
                                        <div class="right">
                                            <div class="info-row block">
                                                <h5>Address Line 1</h5>
                                                <p>1600 Seaport Boulevart</p>
                                            </div>
                                            <div class="info-row block">
                                                <h5>Address Line 2</h5>
                                                <p>Redwood City, CA</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-footer d-none d-lg-flex justify-content-center">
                    <button class="btn-edit w-fit-content px-5">
                        <i class="fa fa-pencil-alt"></i>
                        <p>Edit Order</p>
                    </button>
                </div>
            </div>
            @include('layouts.bottom-nav.customer.order-navigator')
        </div>
    </div>
</div>
    @include('layouts.bottom-nav.customer.bottom-nav')
    @endsection
