@extends('layouts.base.base')
@section('title', __('Eatchefs - Homepage'))
@section('script')
<script>
    $(document).ready(function () {
        $('#homepage-navigator, #stages-navigator').addClass('active');
    });

</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">
    @include('layouts.sidebar.home-chef.sidebar')
    <div class="base-page competition">
        <div class="container">
            <div class="base-page-card full">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-flag-checkered"></i>
                            <h5>Stages <span>and Rules</span></h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content overflow-hidden align-items-center d-flex">
                    <div id="carouselCompetition" class="carouselCompetition carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="competition-wrapper">
                                    <div class="competition-phase">
                                        <div class="card">
                                            <img src="{{ asset('images/1round.png') }}" alt="">
                                            {{-- <div class="share-row row">
                                                <div class="col-4">
                                                    <div class="share-item">
                                                        <ion-icon name="eye-outline"></ion-icon>
                                                        <p>125</p>
                                                    </div>
                                                </div>
                                                <div class="col-4 middle">
                                                    <div class="share-item">
                                                        <ion-icon name="share-social-outline"></ion-icon>
                                                        <p>91</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="share-item">
                                                        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                                                        <p>40</p>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="competition-header">
                                            <h5>Starter Round</h5>
                                            <p>Enrollment open until May 2 <sup>nd</sup></p>
                                            <div class="info-span">
                                                <div class="black">
                                                    Up to 3 Videos
                                                </div>
                                                <div class="primary">
                                                    Max 30 Seconds
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="competition-body">
                                        <div class="desc">
                                            <p>
                                                <b>Rule number 1 : </b><br/> Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Reiciendis quisquam non debitis veritatis deleniti ipsa ipsam odit
                                                tempore iusto.
                                            </p>
                                            <p>
                                                <b>Rule number 2 : </b><br/> Adipisicing elit. Pariatur, eos. Voluptates debitis
                                                eaque pariatur vel ullam omnis natus culpa, aliquam reprehenderit officia
                                                placeat unde ab sed doloribus. Blanditiis, vero ipsum?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="competition-wrapper">
                                    <div class="competition-phase">
                                        <div class="card">
                                            <img src="{{ asset('images/2round.png') }}" alt="">
                                            {{-- <div class="share-row row">
                                                <div class="col-4">
                                                    <div class="share-item">
                                                        <ion-icon name="eye-outline"></ion-icon>
                                                        <p>125</p>
                                                    </div>
                                                </div>
                                                <div class="col-4 middle">
                                                    <div class="share-item">
                                                        <ion-icon name="share-social-outline"></ion-icon>
                                                        <p>91</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="share-item">
                                                        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                                                        <p>40</p>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="competition-header">
                                            <h5>Basic Round</h5>
                                            <p>Enrollment open until May 2 <sup>nd</sup></p>
                                            <div class="info-span">
                                                <div class="black">
                                                    Up to 3 Videos
                                                </div>
                                                <div class="primary">
                                                    Max 30 Seconds
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="competition-body">
                                        <div class="desc">
                                            <p>
                                                <b>Rule number 1 : </b><br/> Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Reiciendis quisquam non debitis veritatis deleniti ipsa ipsam odit
                                                tempore iusto.
                                            </p>
                                            <p>
                                                <b>Rule number 2 : </b><br/> Adipisicing elit. Pariatur, eos. Voluptates debitis
                                                eaque pariatur vel ullam omnis natus culpa, aliquam reprehenderit officia
                                                placeat unde ab sed doloribus. Blanditiis, vero ipsum?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev carousel-control" href="#carouselCompetition" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon carousel-control-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next carousel-control" href="#carouselCompetition" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon carousel-control-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            @include('layouts.bottom-nav.home-chef.home-navigator')
        </div>
    </div>
    @include('layouts.bottom-nav.home-chef.bottom-nav')
    @endsection
