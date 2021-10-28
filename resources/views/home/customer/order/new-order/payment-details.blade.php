@extends('layouts.base.base')
@section('title', __('Eatchefs - Cart'))
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
    <div class="base-page payment-details form-page">
        <div class="container">
            <div class="base-page-card">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-credit-card"></i>
                            <h5>Payment <span>Details</span></h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content">
                    <div class="form-body">
                        <div class="row align-items-center">
                            <div class="option-hold col-lg-4">
                                <img class="option-img" src="{{ asset('images/icon/cc.png') }}" alt="">
                                <h5>Credit Card</h5>
                            </div>
                            {{-- <form action=""> --}}
                            <div class="form-hold mb-4 col-lg-8">
                                <div class="form-row">
                                    <label for="card_holder_name">Card Holder Name</label>
                                    <input class="form-control" type="text" name="card_holder_name"
                                        placeholder="Vanessa Oaksmith" />
                                </div>
                                <div class="form-row">
                                    <label for="card_number">Card Number</label>
                                    <input class="form-control" type="number" name="card_number" placeholder="1234567890" />
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="card_expiry">Card Expiry</label>
                                        <input class="form-control" type="month" name="card_expiry" />
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="cvc">Card Verification Code</label>
                                        <input class="form-control" type="number" name="cvc" placeholder="129" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- </form> --}}
                    </div>
                </div>
                <div class="base-page-card-footer">
                    <a href="{{ route('home.customer.order.new-order.order-confirmation') }}">
                        <button class="next-page-button px-5">Next Step</button>
                    </a>
                </div>
            </div>
        </div>
        @include('layouts.bottom-nav.customer.order-navigator')
    </div>
</div>
@include('layouts.bottom-nav.customer.bottom-nav')
@endsection
