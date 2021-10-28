@extends('layouts.base.base')
@section('title', __('Eatchefs - Add Dish step 3'))
@section('script')
<script>
    $(document).ready(function() {
        $('#add-dish-navigator').addClass('active');

        $('.next-page-button').click(function () {
            if ($('.card-ingredient input').val() < 0) {
                alert('there should not be any negative number')
            }
        });
    });
</script>
@endsection
@section('content')
@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">

    @include('layouts.sidebar.home-chef.sidebar')
    <div class="add-address base-page form-page new-dish step-3">
        <div class="container">
            <div class="base-page-card full">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-concierge-bell"></i>
                            <h5>Add <span>Dish</span></h5>
                        </div>
                    </div>
                </div>
                <form action="{{ route('home.home-chef.dish.new-dish.step-3.post') }}" method="post">
                    @csrf
                    <div class="base-page-card-content mb-lg-5">
                        <div class="form-body">
                            <div class="form-hold">
                                <div class="navigator-row row">
                                    <a class="col-4">
                                        Main Info
                                    </a>
                                    <a class="col-4">
                                        Ingredient
                                    </a>
                                    <a class="col-4 active">
                                        Nutrition
                                    </a>
                                </div>

                                <div class="card-hold">
                                    <div class="head">
                                        <h5>Nutrition</h5>
                                    </div>

                                    <div class="body">
                                        <div class="card-ingredient">
                                            <label for="fats">Fats</label>
                                            <input class="form-control" type="number" min="0" name="fats" id="fats" placeholder="0" value="{{ old('fats') }}"/>
                                            @if ($errors->has('fats'))
                                            <span class="text-danger">{{ $errors->first('fats') }}</span>
                                            @endif
                                        </div>
                                        <div class="card-ingredient">
                                            <label for="calorie">Calorie</label>
                                            <input class="form-control" type="number" min="0" name="calorie" id="calorie" placeholder="0" value="{{ old('calorie') }}" />
                                            @if ($errors->has('calorie'))
                                            <span class="text-danger">{{ $errors->first('calorie') }}</span>
                                            @endif
                                        </div>
                                        <div class="card-ingredient">
                                            <label for="carbs">Carbs</label>
                                            <input class="form-control" type="number" min="0" name="carbs" id="carbs" placeholder="0" value="{{ old('carbs') }}" />
                                            @if ($errors->has('carbs'))
                                            <span class="text-danger">{{ $errors->first('carbs') }}</span>
                                            @endif
                                        </div>
                                        <div class="card-ingredient">
                                            <label for="protein">Protein</label>
                                            <input class="form-control" type="number" min="0" name="protein" id="protein" placeholder="0" value="{{ old('protein') }}" />
                                            @if ($errors->has('protein'))
                                            <span class="text-danger">{{ $errors->first('protein') }}</span>
                                            @endif
                                        </div>
                                        <div class="card-ingredient">
                                            <label for="cholestrol">Cholestrol</label>
                                            <input class="form-control" type="number" min="0" name="cholestrol" id="cholestrol" placeholder="0" value="{{ old('cholestrol') }}" />
                                            @if ($errors->has('cholestrol'))
                                            <span class="text-danger">{{ $errors->first('cholestrol') }}</span>
                                            @endif
                                        </div>
                                        <div class="card-ingredient">
                                            <label for="sodium">Sodium</label>
                                            <input class="form-control" type="number" min="0" name="sodium" id="sodium" placeholder="0" value="{{ old('sodium') }}" />
                                            @if ($errors->has('sodium'))
                                            <span class="text-danger">{{ $errors->first('sodium') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="base-page-card-footer">
                        <button type="submit" class="next-page-button">
                            Submit My Dish
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.bottom-nav.home-chef.bottom-nav')
    @endsection
