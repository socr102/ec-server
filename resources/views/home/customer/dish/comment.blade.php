@extends('layouts.base.base')
@section('title', __('Eatchefs - Dish Comments'))
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

    @include('layouts.sidebar.customer.sidebar')
    <div class="base-page dish-page comment-page">
        <div class="container">
            <div class="base-page-card">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-concierge-bell"></i>
                            <h5>Eatchefs <span>Dish - Comment</span></h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content">
                    <div class="navigator-row row">
                        <a class="col-6 active" href="{{ route('home.customer.dish.dish', ['id'=>$id]) }}">
                            Main Info
                        </a>
                        <a class="col-6" href="{{ route('home.customer.dish.details', ['id'=>$id]) }}">
                            Details
                        </a>
                    </div>
                    <div class="card-hold">
                        <div class="head">
                            <h5>Add Comment</h5>
                        </div>
                        <div class="body">
                            <form action="{{ route('dish.comments.create', ['id'=>$id]) }}" method="post">
                                @csrf
                                <div class="add-comment">
                                    <img src="{{ asset('images/people/people-1.jpeg') }}" alt="">
                                    <input type="text" name="comment" class="form-control textbox" placeholder="write your comment here..." required autocomplete="off">
                                    <button type="submit">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    @include('layouts.alert.flash-message')

                    <div class="card-hold">
                        <div class="head">
                            <h5>Like & Comment</h5>
                        </div>
                        <div class="body">
                            @if(count($comments) == 0)
                            <div class="text-center">
                                <p>no comment yet</p>
                            </div>
                            @else
                            @foreach($comments as $dt)
                            <div class="comment-card">
                                <div class="left">
                                    <img src="{{ asset('images/people/people-1.jpeg') }}" alt="">
                                </div>
                                <div class="right">
                                    <h5 class="name">{{ $dt->user->username }}</h5>
                                    <p class="desc">
                                        {{ $dt->comment }}
                                    </p>
                                    <p class="desc">
                                        {{ $dt->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('layouts.bottom-nav.customer.bottom-nav')
@endsection
