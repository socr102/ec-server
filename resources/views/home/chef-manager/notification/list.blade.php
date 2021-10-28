@extends('layouts.base.base')
@section('title', __('Eatchefs - Notifications'))
@section('script')
<script>
    $(document).ready(function() {
        $('#notification-navigator').addClass('active');
    });
</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">
    @include('layouts.sidebar.chef-manager.sidebar')
        <div class="base-page notification-list-page">
            <div class="container">
                <div class="base-page-card full">
                    <div class="base-page-card-header">
                        <div class="page-title">
                            <div class="hold">
                                <i class="fa fa-bell"></i>
                                <h5>Notifications</h5>
                            </div>
                        </div>
                    </div>
                    <div class="base-page-card-content">

                    @include('layouts.alert.flash-message')

                    <div class="notif-list">
                        @forelse($listNotification as $dt)
                        <a class="notif-item" href="{{ route('home.chef-manager.notification.taste-approval', $dt->id_approval_dish) }}">
                            <div class="img-col">
                                <div class="check-hold">
                                    <img src="{{ asset('images/icon/checkmark.png') }}" alt="">
                                </div>
                            </div>
                            <div class="info-col">
                                <h5>{{ $dt->dish->chef->username }}</h5>
                                <h6>{{ $dt->created_at->diffForHumans() }}</h6>
                                <p>Waiting for your <span>Dish Approval</span></p>
                            </div>
                        </a>
                        @empty
                        <p class="text-center fw-600 poppins">Notification empty</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
</div>


@include('layouts.bottom-nav.chef-manager.bottom-nav')
@endsection
