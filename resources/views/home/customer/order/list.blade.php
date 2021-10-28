@extends('layouts.base.base')
@section('title', __('Eatchefs - Orders'))
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
    <div class="base-page order-list-page">
        <div class="container">
            <div class="base-page-card full">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-check"></i>
                            <h5>Order List</h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content">
                    <div class="notif-list row">
                        <div class="col-lg-6">
                            <a class="notif-item" href="{{ route('home.customer.order.summary') }}">
                                <div class="img-col">
                                    <div class="check-hold">
                                        <i class="fa fa-shopping-basket"></i>
                                    </div>
                                </div>
                                <div class="info-col">
                                    <h5>Order #1724903</h5>
                                    <p>Home Delivery - Bostom Street 98</p>
                                    <p class="date">Sun, 5 Feb 2021 <span>On the way</span></p>
                                </div>
                                <div class="price">
                                    <p>$ 59.08</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a class="notif-item" href="{{ route('home.customer.order.summary') }}">
                                <div class="img-col">
                                    <div class="check-hold">
                                        <i class="fa fa-shopping-basket"></i>
                                    </div>
                                </div>
                                <div class="info-col">
                                    <h5>Order #1724903</h5>
                                    <p>Pickup - Crawford Bean 12</p>
                                    <p class="date">Sun, 5 Feb 2021 <span>On the way</span></p>
                                </div>
                                <div class="price">
                                    <p>$ 59.08</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a class="notif-item" href="{{ route('home.customer.order.summary') }}">
                                <div class="img-col">
                                    <div class="check-hold">
                                        <i class="fa fa-shopping-basket"></i>
                                    </div>
                                </div>
                                <div class="info-col">
                                    <h5>Order #1724903</h5>
                                    <p>Pickup - Crawford Bean 12</p>
                                    <p class="date">Sun, 5 Feb 2021 <span>On the way</span></p>
                                </div>
                                <div class="price">
                                    <p>$ 59.08</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.bottom-nav.customer.order-navigator')
        </div>
    </div>
    @include('layouts.bottom-nav.customer.bottom-nav')
    @endsection
