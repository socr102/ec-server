@extends('layouts.base.base')
@section('title', __('Eatchefs - Home Delivery Info'))
@section('script')
<script>
    $(document).ready(function () {
        $('#ordering-navigator, #new-order-navigator').addClass('active');

        $('.choose').click(function () {
            $('.choose img').addClass('d-none')
            $(this).find('img').removeClass('d-none')
        });
    });

</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">
    @include('layouts.sidebar.customer.sidebar')
    <div class="base-page order-track-page">
        <div class="container">
            <div class="base-page-card">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-store"></i>
                            <h5>Pick-Up <span>Info</span></h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content">
                    <div class="order-details row mb-5">
                        <div class="col-lg-6">
                            <div class="order-detail-topic">
                                <div class="head">
                                    <h5>Delivery Time</h5>
                                </div>
                                <div class="body">
                                    <div class="info-row input">
                                        <h5>Delivery Date</h5>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="info-row input">
                                        <h5>Delivery Time</h5>
                                        <input type="time" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="order-detail-topic">
                                <div class="head">
                                    <h5>Store Address</h5>
                                </div>
                                <div class="body">
                                    <div class="info-row input">
                                        <h5>Address Line 1</h5>
                                        <input class="form-control" type="text" name="address_line_1"
                                            value="1600 Seaport Boulevart" disabled />
                                    </div>
                                    <div class="info-row input">
                                        <h5>Address Line 2</h5>
                                        <input class="form-control" type="text" name="address_line_2"
                                            value="Redwood City, CA" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-footer">
                    <a class="checkout-button" href="{{ route('home.customer.order.new-order.step-2') }}">
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
