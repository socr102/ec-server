@extends('layouts.base.base')
@section('title', __('Eatchefs - Help Me'))
@section('script')
<script>
    $(document).ready(function () {
        $('#request-help-navigator').addClass('active');

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

    @include('layouts.sidebar.home-chef.sidebar')
    <div class="add-address base-page form-page">
        <div class="container">
            <div class="base-page-card">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-pray"></i>
                            <h5>Help <span>ME</span></h5>
                        </div>
                    </div>
                </div>
                <form action="{{ route('home.home-chef.help-me.post') }}" method="post">
                    @csrf
                    <div class="base-page-card-content mb-lg-3">
                        @include('layouts.alert.flash-message')

                        <div class="form-body help-me-form">
                            <div class="form-hold">
                                <div class="form-row">
                                    <label>Request Categories</label>
                                    <select class="custom-select" name="category">
                                        @foreach ($categories as $category)
                                        <option @if (old('category') === $category) selected @endif>{{$category}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <label>Your problem</label>
                                    <textarea class="form-control" type="text" name="problem" placeholder="Describe your problem. Keep the problem description concise and include, if you have any suggestion way to fix this problem please let us know it :)">{{ old('problem') }}</textarea>
                                    @if ($errors->has('problem'))
                                        <span class="text-danger">{{ $errors->first('problem') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="base-page-card-footer">
                        <button type="submit" class="next-page-button" href="{{ route('home.customer.order.new-order.homedelivery-information') }}">
                            Submit This Problem
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.bottom-nav.home-chef.bottom-nav')
@endsection
