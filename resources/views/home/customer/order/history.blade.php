@extends('layouts.base.base')
@section('title', __('Eatchefs - Orders'))
@section('script')
<script>
    $(document).ready(function () {
        $('#ordering-navigator, #history-navigator').addClass('active');
    });

</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">
    @include('layouts.sidebar.customer.sidebar')
    <div class="base-page order-history-page">
        <div class="container">
            <div class="base-page-card full">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-clock"></i>
                            <h5>History List</h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content">
                    <div class="notif-list row">
                        <div class="col-lg-6">
                            <a class="notif-item" href="{{ route('home.customer.order.track') }}">
                                <div class="info-col">
                                    <h5>Order #1724903</h5>
                                    <p>Home Delivery - Bostom Street 98</p>
                                    <p class="date">Sun, 5 Feb 2021</p>
                                </div>
                                <div class="act-col">
                                    <button>
                                        Delivered
                                    </button>
                                    <button class="middle">
                                        Re-Order <i class="fa fa-share"></i>
                                    </button>
                                    <button>
                                        Rate <i class="fa fa-star"></i>
                                    </button>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a class="notif-item" href="{{ route('home.customer.order.track') }}">
                                <div class="info-col">
                                    <h5>Order #1724903</h5>
                                    <p>Home Delivery - Bostom Street 98</p>
                                    <p class="date">Sun, 5 Feb 2021</p>
                                </div>
                                <div class="act-col">
                                    <button>
                                        Delivered
                                    </button>
                                    <button class="middle">
                                        Re-Order <i class="fa fa-share"></i>
                                    </button>
                                    <button>
                                        Rate <i class="fa fa-star"></i>
                                    </button>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a class="notif-item" href="{{ route('home.customer.order.track') }}">
                                <div class="info-col">
                                    <h5>Order #1724903</h5>
                                    <p>Home Delivery - Bostom Street 98</p>
                                    <p class="date">Sun, 5 Feb 2021</p>
                                </div>
                                <div class="act-col">
                                    <button>
                                        Delivered
                                    </button>
                                    <button class="middle">
                                        Re-Order <i class="fa fa-share"></i>
                                    </button>
                                    <button>
                                        Rate <i class="fa fa-star"></i>
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.bottom-nav.customer.order-navigator')
        </div>
    </div>
</div>
        @include('layouts.bottom-nav.customer.bottom-nav')
        @endsection
