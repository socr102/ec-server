@extends('layouts.base.base')
@section('title', __('Eatchefs - Support Details'))
@section('script')
    <script>
        $(document).ready(function () {
            $('#support-navigator').addClass('active');
        });
    </script>
@endsection
@section('content')

    @include('layouts.navbar.navbar-dashboard')
    <div class="dashboard-wrapper">
        @include('layouts.sidebar.chef-manager.sidebar')
        <div class="base-page support-details">
            <div class="container">
                <div class="base-page-card full">
                    <div class="base-page-card-header">
                        <div class="page-title">
                            <div class="hold">
                                <i class="fa fa-question-circle"></i>
                                <h5>Support Details</h5>
                            </div>
                        </div>
                    </div>
                    <div class="base-page-card-content">
                        <div class="img-row">
                            <img src="{{ asset('images/people/people-1.jpeg') }}" alt="">
                        </div>
                        <div class="person-row">
                            <h5>{{ $help->user->username }}</h5>
                            <p>{{ $help->user->email }}</p>
                        </div>
                        <div class="problem-card">
                            <div class="problem-row">
                                <h5>Request Categories</h5>
                                <p>{{ $help->category }}</p>
                            </div>
                            <div class="problem-row">
                                <h5>Problem</h5>
                                <p>{{ $help->problem }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.bottom-nav.chef-manager.bottom-nav')
@endsection
