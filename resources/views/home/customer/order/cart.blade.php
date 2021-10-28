@extends('layouts.base.base')
@section('title', __('Eatchefs - Cart'))
@section('script')
    <script>
        $(document).ready(function () {
            $('#ordering-navigator, #cart-navigator').addClass('active');

            $('.minusQuantity').click(function () { 
                num = parseInt($(this).siblings('.inputQuantity').val());
                if(num > 0) {
                    $(this).siblings('.inputQuantity').val(num-1);
                }
            });

            $('.plusQuantity').click(function () { 
                num = parseInt($(this).siblings('.inputQuantity').val());
                $(this).siblings('.inputQuantity').val(num+1);
            });

            // Listen for input event on numInput.
            $('#quantity').keydown(function (e) {
                if (!((e.keyCode > 95 && e.keyCode < 106) || (e.keyCode > 47 && e.keyCode < 58) || e.keyCode == 8)) {
                    return false;
                }
            })
        });
    </script>
@endsection
@section('content')
    @include('layouts.navbar.navbar-dashboard')
    <div class="dashboard-wrapper">
        @include('layouts.sidebar.customer.sidebar')
        <div class="base-page cart-page">
            <div class="container">
                <div class="base-page-card full">
                    <div class="base-page-card-header">
                        <div class="page-title">
                            <div class="hold">
                                <i class="fa fa-shopping-basket"></i>
                                <h5>Eatchefs <span>Cart</span></h5>
                            </div>
                        </div>
                    </div>
                    <div class="base-page-card-content mb-lg-3">
                        <div class="dish-list row">
                            <div class="col-lg-6">
                                <div class="dish-item">
                                    <div class="info-col">
                                        <p class="food__chef">Louisl Oaksbane</p>
                                        <h5 class="food__name">Broodje Kaasworst</h5>
                                        <div class="quantity">
                                            <button class="minusQuantity">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input type="number" value="1" class="inputQuantity">
                                            <button class="plusQuantity">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="img-col">
                                        <img src="{{ asset('images/food/food1.png') }}" alt="">
                                    </div>
                                    <div class="rangking">1</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dish-item">
                                    <div class="info-col">
                                        <p class="food__chef">Louisl Oaksbane</p>
                                        <h5 class="food__name">Broodje Kaasworst</h5>
                                        <div class="quantity">
                                            <button class="minusQuantity">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input type="number" value="1" class="inputQuantity">
                                            <button class="plusQuantity">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="img-col">
                                        <img src="{{ asset('images/food/food1.png') }}" alt="">
                                    </div>
                                    <div class="rangking">1</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dish-item">
                                    <div class="info-col">
                                        <p class="food__chef">Louisl Oaksbane</p>
                                        <h5 class="food__name">Broodje Kaasworst</h5>
                                        <div class="quantity">
                                            <button class="minusQuantity">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input type="number" value="1" class="inputQuantity">
                                            <button class="plusQuantity">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="img-col">
                                        <img src="{{ asset('images/food/food1.png') }}" alt="">
                                    </div>
                                    <div class="rangking">1</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dish-item">
                                    <div class="info-col">
                                        <p class="food__chef">Louisl Oaksbane</p>
                                        <h5 class="food__name">Broodje Kaasworst</h5>
                                        <div class="quantity">
                                            <button class="minusQuantity">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input type="number" value="1" class="inputQuantity">
                                            <button class="plusQuantity">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="img-col">
                                        <img src="{{ asset('images/food/food1.png') }}" alt="">
                                    </div>
                                    <div class="rangking">1</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="base-page-card-footer d-flex justify-content-center">
                        <a href="{{ route('home.customer.order.new-order.step-1') }}" class="checkout-button">
                            <button class="px-5 w-fit-content">Proceed To Checkout</button>
                        </a>
                    </div>
                </div>
            @include('layouts.bottom-nav.customer.order-navigator')
        </div>
    </div>
    @include('layouts.bottom-nav.customer.bottom-nav')
@endsection
