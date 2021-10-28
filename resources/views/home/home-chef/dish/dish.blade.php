@extends('layouts.base.base')
@section('title', __('Eatchefs - Homepage'))
@section('script')
<script>
    $(document).ready(function() {
        $('#homepage-navigator').addClass('active');
    });
</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">

    @include('layouts.sidebar.home-chef.sidebar')
    <div class="base-page dish-page">
        <div class="container">
            <div class="base-page-card full">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-concierge-bell"></i>
                            <h5>Eatchefs <span>Dish</span></h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content overflow-hidden d-lg-none"> {{-- ini code agak kotor tapi gamasalah -- MOBILE VER --}}
                    <div class="navigator-row row navigator-mobile">
                        <a class="col-4 active" href="{{ route('home.home-chef.dish.dish', ['id'=>$dish->id_dish]) }}">
                            Main Info
                        </a>
                        <a class="col-4" href="{{ route('home.home-chef.dish.details',['id'=>$dish->id_dish]) }}">
                            Details
                        </a>
                        <a class="col-4" href="{{ route('home.home-chef.dish.video',['id'=>$dish->id_dish]) }}">
                            Video
                        </a>
                    </div>
                    <div class="dish-item">
                        <div class="competition-wrapper">
                            <div class="competition-phase">
                                <div class="card">
                                    <img src="{{ asset('images/food/'.$dish->dish_image) }}" alt="">
                                    <div class="share-row row">
                                        <div class="col-4">
                                            <div class="share-item">
                                                <ion-icon name="eye-outline"></ion-icon>
                                                <p>2</p>
                                            </div>
                                        </div>
                                        <div class="col-4 middle">
                                            <div class="share-item">
                                                <ion-icon name="share-social-outline"></ion-icon>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <a class="share-item" href="{{ route('home.home-chef.dish.comment',['id'=>$dish->id_dish]) }}">
                                                <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                                                <p>{{ count($dish->comments) }}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="competition-header">
                                    <h5>{{ $dish->dish_name }}</h5>
                                    <p>{{ $dish->chef->username }} - {{ $dish->chef->titleName }}</p>
                                    <div class="info-span">
                                        <div class="black">
                                            Voting
                                        </div>
                                        <div class="primary">
                                            {{ $dish->upvote }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="competition-body">
                                <div class="desc">
                                    <p>
                                        {{ $dish->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content d-none d-lg-block __desktop-ver">
                    <div class="asset-row row">
                        <div class="col-lg-9">
                            <player data-uuid='{{ $dish->video_dish }}' data-width='100%' data-height='450' data-displaytitle='false'></player>
                        </div>
                        <div class="col-lg-3">
                            <div class="card-main-info">
                                <div class="title">
                                    <h6>Images</h6>
                                </div>
                                <img src="{{ asset('images/food/'.$dish->dish_image) }}" alt="">
                                <div class="info">
                                    <h5>{{ $dish->dish_name }}</h5>
                                    <p>{{ $dish->chef->username }} - {{ $dish->chef->titleName }}</p>
                                    <div class="info-span">
                                        <div class="black">
                                            Vote(s)
                                        </div>
                                        <div class="primary">
                                            {{ $dish->upvote }}
                                        </div>
                                    </div>
                                    {{-- <div class="order">
                                        <button>
                                            Order
                                        </button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="desc-row row">
                        <div class="col-lg-9">
                            <p class="desc">
                                {{ $dish->description }}
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <div class="btn-grp">
                                <form action="{{ route('home.home-chef.dish.upvote', $dish->id_dish) }}" method="post">
                                    @csrf
                                    <button class="act-btn left @if ($dish->isVoted) bg-secondary @endif">
                                        <i class="fa fa-thumbs-up"></i>
                                        {{ $dish->upvote }}
                                    </button>
                                </form>
                                <button class="act-btn right">
                                    <div
                                        class="sharethis-inline-share-buttons"
                                        data-title="{{ $dish->dish_name }}"
                                        data-image="{{ asset('images/food/'.$dish->dish_image) }}"
                                        data-description="{{ $dish->description }}"
                                    ></div>
                                    <i class="fa fa-share-alt"></i>
                                    
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="info-row row">
                        <div class="col-lg-4">
                            <h5 class="section-title">
                                Ingredient
                            </h5>
                            <div class="section-inner">
                                @foreach($dish->ingredient as $dt)
                                <div class="inner-row">
                                    <h5>{{ $dt->quantity." ".$dt->unit." ".$dt->ingredient  }}</h5>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="col-lg-4">
                            <h5 class="section-title">
                                Nutrition List
                            </h5>
                            <div class="section-inner">
                                <div class="inner-row">
                                    <h5>Fats</h5>
                                    <p>{{ $dish->nutrition->fats }}</p>
                                </div>
                                <div class="inner-row">
                                    <h5>Carbs</h5>
                                    <p>{{$dish->nutrition->carbs}}</p>
                                </div>
                                <div class="inner-row">
                                    <h5>Protein</h5>
                                    <p>{{$dish->nutrition->protein}}</p>
                                </div>
                                <div class="inner-row">
                                    <h5>Cholesterol</h5>
                                    <p>{{$dish->nutrition->cholestrol}}</p>
                                </div>
                                <div class="inner-row">
                                    <h5>Sodium</h5>
                                    <p>{{$dish->nutrition->sodium}}</p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-4">
                            <h5 class="section-title">
                                Preparation Guide
                            </h5>
                            <div class="section-inner">
                                <div class="inner-row">
                                    <h5><i class="fa fa-clock mr-2 text-secondary"></i> {{ $dish->time_preparation }} minutes</h5>
                                </div>
                                <div class="inner-row">
                                    <h5><i class="fa fa-users mr-2 text-secondary"></i> {{ $dish->number_of_availability }} serving(s)</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-box">
                        <form action="{{ route('dish.comments.create', ['id'=>$dish->id_dish]) }}" method="post">
                            @csrf
                            <div class="add-comment-row">
                                <input type="text" name="comment" class="form-control" placeholder="Write your comment here..." required autocomplete="off">
                                <button type="submit">
                                    Comment
                                </button>
                            </div>
                        </form>
                        @if (session('success'))
                        <br>
                        <div class="alert alert-success">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="comment-inner">
                            @if(count($dish->comments) == 0)
                                <div class="text-center">
                                    <p>no comment yet</p>
                                </div>
                            @else
                                @foreach($dish->comments as $comment)
                                <div class="comment-row">
                                    <div class="left">
                                        <img src="{{ asset('images/people/people-1.jpeg') }}" alt="">
                                    </div>
                                    <div class="right">
                                        <h5 class="name">{{ $comment->user->username }}</h5>
                                        <p class="desc">
                                            {{ $comment->comment }}
                                        </p>
                                        <h6 class="desc">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </h6>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- @include('layouts.bottom-nav.home-chef.home-navigator') --}}
        </div>
    </div>
    @include('layouts.bottom-nav.home-chef.bottom-nav')
</div>
@endsection
