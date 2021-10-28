@extends('layouts.base.base')
@section('title', __('Eatchefs - Add Address'))
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
    <div class="add-address base-page form-page">
        <div class="container">
            <div class="base-page-card">
                <div class="base-page-card-header">
            <div class="page-title">
                <div class="hold">
                    <i class="fa fa-map-marker-alt"></i>
                    <h5>Delivery <span>Options</span></h5>
                </div>
            </div>
        </div>
        <div class="base-page-card-content">
            <div class="form-body">
                {{-- <form action=""> --}}
                    <div class="form-hold">

                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label for="address_line_1">Address Line 1</label>
                                <input class="form-control" type="text" name="address_line_1" placeholder="1600 Seaport Boulevart" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="address_line_2">Address Line 2</label>
                                <input class="form-control" type="text" name="address_line_2" placeholder="Redwood City, CA" />
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="country">Country</label>
                            <select class="custom-select">
                                <option>Indonesia</option>
                                <option>America</option>
                                <option>Netherlands</option>
                                <option>Africa</option>
                                <option>Russia</option>
                                <option>France</option>
                                <option>England</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="city">City</label>
                                <input class="form-control" type="text" name="city" placeholder="Redwood City" />
                            </div>
                            <div class="form-group col-6">
                                <label for="zipcode">Zipcode</label>
                                <input class="form-control" type="text" name="zipcode" placeholder="09871" />
                            </div>
                        </div>

                        <a type="submit" class="next-page-button" href="{{ route('home.customer.order.new-order.homedelivery-information') }}">
                            Add New Address
                        </a>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
            </div>
        @include('layouts.bottom-nav.customer.order-navigator')
    </div>
    </div>
    </div>
    @include('layouts.bottom-nav.customer.bottom-nav')
@endsection
