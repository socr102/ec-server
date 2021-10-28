@extends('layouts.base.base')
@section('title', __('Eatchefs - Add Dish step 2'))
@section('script')
<script>
    $(document).ready(function () {
        $('.alert-add-ingredient').hide();
        $('#add-dish-navigator').addClass('active');
        let listIngredient = [];

        $('.add-ingredient-button').click(function () {
            if (!$('#formIngredient').valid()) {
                return
            }

            if ($('#ingredient').val() != '' && $('#quantity').val() != '') {
                valIngredient = $('#ingredient').val();
                valQuantity = $('#quantity').val().toString();
                valUnit = $('#unit').val();

                fullVal = valQuantity + ' ' + valUnit + ' ' + valIngredient

                $('#ingredient, #quantity').val('');

                // add to list
                listIngredient.push({
                    ingredient: valIngredient,
                    quantity: valQuantity,
                    unit: valUnit,
                }, );

                $('#ingredientBody').append('<div class="card-ingredient"><p>' + fullVal + '</p></div>');
            }

            $('.alert-add-ingredient').hide();
        });

        $('#btn-ingredient').click(function () {
            if (listIngredient.length == 0) {
                $('.alert-add-ingredient').show();
            } else {
                $('#dataIngredient').val(JSON.stringify(listIngredient));
                $('#ingredient-form').submit();
            }
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
@section('style')
<style>
    .error {
        color: red !important;
    }

</style>
@endsection

@section('content')
@include('layouts.navbar.navbar-dashboard')

<div class="dashboard-wrapper">
    @include('layouts.sidebar.home-chef.sidebar')
    <div class="add-address base-page form-page new-dish step-2">
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
                <div class="base-page-card-content mb-lg-5">
                    <div class="form-body">
                        <form id="ingredient-form" action="{{ route('home.home-chef.dish.new-dish.step-3.post') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="dataIngredient" id="dataIngredient">
                        </form>
                        <div class="form-hold">
                            <div class="navigator-row row">
                                <a class="col-4">
                                    Main Info
                                </a>
                                <a class="col-4 active">
                                    Ingredient
                                </a>
                                <a class="col-4">
                                    Nutrition
                                </a>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <form id="formIngredient">
                                        <div class="form-row">
                                            <label for="ingredient">Ingredient</label>
                                            <input class="form-control" type="text" name="ingredient" id="ingredient" placeholder="Please specify the ingredients" required value="{{ old('ingredient') }}" />
                                        </div>
                                        <div class="form-row">
                                            <label for="quantity">Quantity</label>
                                            <input class="form-control" type="number" name="quantity" id="quantity" placeholder="Please specify the amount of ingredients" required value="{{ old('quantity') }}" />
                                        </div>
                                    </form>
                                    <div class="form-row mt-lg-4">
                                        <label for="unit">Unit</label>
                                        <select class="custom-select" id="unit">
                                            <option>Kilogram</option>
                                            <option>Gram</option>
                                            <option>Miligram</option>
                                            <option>Ons</option>
                                            <option>Pcs</option>
                                            <option>Cup</option>
                                        </select>
                                    </div>
                                    <a class="add-ingredient-button d-block">
                                        <i class="fa fa-plus mr-2"></i> Add Ingredient
                                    </a>
                                    <span class="text-danger alert-add-ingredient">Please press here to add ingredient</span>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-hold">
                                        <div class="head">
                                            <h5>Ingredients</h5>
                                        </div>

                                        <div class="body" id="ingredientBody"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-footer">
                    <button type="submit" class="next-page-button px-5 rounded-pill" id="btn-ingredient">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.bottom-nav.home-chef.bottom-nav')
    @endsection
