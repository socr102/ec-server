@extends('layouts.base.base')
@section('title', __('Eatchefs - Customer Supports'))
@section('script')
<script>
    $(document).ready(function () {
        $('#support-navigator').addClass('active');
    });

</script>
@endsection
@section('style')
<style scoped>
    .person-item .info-col h5{
        position: relative;
    }
    .person-item .info-col h5 span {
        font-size: 10px;
        top: 0;
        right: 0;
        font-weight: 500;
        position: absolute;
        color: #898989;
    }
</style>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')'
<div class="dashboard-wrapper">
    @include('layouts.sidebar.chef-manager.sidebar')
    <div class="base-page person-list-page">
        <div class="container">
            <div class="base-page-card full">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-question-circle"></i>
                            <h5>Customer Supports</h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content">
                    <div class="person-list">
                        @forelse ($helps as $help)
                            <a href="{{ route('home.chef-manager.support-details', $help->id) }}" class="person-item">
                                <div class="img-col">
                                    <div class="check-hold">
                                        <img src="{{ asset('images/people/people-1.jpeg') }}" alt="">
                                    </div>
                                </div>
                                <div class="info-col">
                                    <h5>{{ $help->user->username }}</h5>
                                    <h6>{{ $help->created_at->diffForHumans() }}</h6>
                                    <p>This man is asking for your help</p>
                                </div>
                            </a>
                        @empty
                            <div class="empty-list">
                                <p class="text-center">
                                    Customer help is empty
                                </p>
                            </div>
                        @endforelse
                    </div>
                </div>
         </div>
        </div>
    </div>
</div>

@include('layouts.bottom-nav.chef-manager.bottom-nav')
@endsection
