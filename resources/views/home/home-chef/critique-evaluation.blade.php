@extends('layouts.base.base')
@section('title', __('Eatchefs - Homepage'))
@section('script')
<script>
    $(document).ready(function () {
        $('#homepage-navigator, #chef-award-navigator').addClass('active');
    });

</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">
    @include('layouts.sidebar.home-chef.sidebar')
    <div class="base-page critique-evaluation">
        <div class="container">
            <div class="base-page-card">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-comments"></i>
                            <h5>Eatchefs <span>Critique Evaluation</span></h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content dish-critique">
                    <div class="dish-critique-head">
                        <div class="dish-item">
                            <div class="info-col">
                                <h5 class="food__name">Broodje Kaasworst</h5>
                                <p class="food__chef">Louisl Oaksbane</p>
                            </div>
                            <div class="img-col">
                                <img src="{{ asset('images/food/food1.png') }}" alt="">
                                <div class="overnap">
                                    <p></p>
                                </div>
                                <div class="medal">
                                    <img src="{{ asset('images/icon/win1.png') }}" alt="">
                                </div>
                            </div>
                            <div class="rangking">1</div>
                        </div>
                        <div class="dish-header">
                            <h5>
                                Overall
                                <span>
                                    4.5 <i class="fa fa-star"></i>
                                </span>
                            </h5>
                            <div class="info-span">
                                <div class="black">
                                    Taste <span>4.5 <i class="fa fa-star"></i></span>
                                </div>
                                <div class="grey">
                                    Originatily <span>4.5 <i class="fa fa-star"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="dish-inner">
                        
                        <div class="dish-body">
                            <div class="desc">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae impedit ea
                                    dolorum doloremque, atque quibusdam. Quas ducimus nesciunt, veniam, maiores
                                    voluptatum eius id fugiat velit asperiores quisquam itaque! Adipisci, iusto.
                                </p>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur, eos. Voluptates
                                    debitis eaque pariatur vel ullam omnis natus culpa, aliquam reprehenderit officia
                                    placeat unde ab sed doloribus. Blanditiis, vero ipsum?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.bottom-nav.home-chef.home-navigator')
        </div>
    </div>

    @include('layouts.bottom-nav.home-chef.bottom-nav')
    @endsection
