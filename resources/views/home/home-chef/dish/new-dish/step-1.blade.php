@extends('layouts.base.base')
@section('title', __('Eatchefs - Add Dish step 1'))
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.10.0/bootstrap-maxlength.min.js"></script>
<script>
    $(document).ready(function () {
        $('[maxlength]').maxlength();
        $('#add-dish-navigator').addClass('active');

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#dish_image_preview').attr('src', e.target.result);
                    $('#dish_image_preview').css('border', '2px solid black');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#dish_image_input").change(function () {
            readURL(this);
        });

        // make button disabled before video done uploading/publishing
        let hasPublished = false;
        let hasProcessed = false;

        CameraTag.observe('video', 'published', function () {
            hasPublished = true;
        });

        CameraTag.observe('video', 'processed', function () {
            hasProcessed = true;

            // manage screen
            $('#waitScreen').addClass('d-none');
            $('#successScreen').removeClass('d-none');
        });

        $('#postForm').submit(function (e) {
            if (!hasPublished) {
                e.preventDefault();
                alert('Please wait until the dish video is uploaded completely');
                return;
            }

            if (!hasProcessed) {
                e.preventDefault();
                alert('Your video is still being processed, please wait a moment');
                return;
            }
        });
    });

</script>
@endsection
@section('content')
@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">

    @include('layouts.sidebar.home-chef.sidebar')
    <div class="base-page form-page new-dish step-1">
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
                <form action="{{ route('home.home-chef.dish.new-dish.step-1.post') }}" method="POST" id="postForm" enctype='multipart/form-data'>
                    @csrf
                    <div class="base-page-card-content">
                        <div class="form-body">
                            <div class="form-hold">
                                <div class="navigator-row row navigator-mobile">
                                    <a class="col-4 active" href="{{ route('home.home-chef.dish.new-dish.step-1') }}">
                                        Main Info
                                    </a>
                                    <a class="col-4">
                                        Ingredient
                                    </a>
                                    <a class="col-4">
                                        Nutrition
                                    </a>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <img class="preview-img" id="dish_image_preview">
                                            <label for="dish_image">Dish Image</label>
                                            <input class="form-control" type="file" name="dish_image" id="dish_image_input" />
                                            @if($errors->has('dish_image'))
                                                <span class="text-danger">{{ $errors->first('dish_image') }}</span>
                                            @endif
                                        </div>
                                        <!-- <div class="form-row">
                                        <img class="preview-img" id="dish_image_preview">
                                        <label for="dish_video">Dish Video</label>
                                        <input class="form-control" type="file" name="dish_video" id="dish_video_input" />
                                    </div> -->
                                        <div class="form-row">
                                            <img class="preview-img" id="dish_image_preview">
                                            <label for="dish_video">Dish Video</label>
                                            <camera data-app-id='a-0ccaf2c0-7cea-0139-71c6-025c64289059' id='video' data-maxlength='30' data-width='9000' data-height='300' data-facing-mode='environment'></camera>
                                            {{-- Custom Camera --}}

                                            {{-- Completed Screen --}}
                                            <div id='video-completed-screen' class="cameratag_screen cameratag_start" style="display: block;">
                                                <div id="waitScreen">
                                                    <div class="cameratag_select_prompt mt-5">
                                                        <span class="check"><i class="fa fa-spinner" aria-hidden="true"></i></span>
                                                        Processing video please wait a moment..
                                                    </div>
                                                </div>

                                                <div id="successScreen" class="d-none">
                                                    <div class="cameratag_select_prompt">
                                                        <span class="check"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
                                                        Published Successfully
                                                    </div>
                                                    <div class="cameratag_select_prompt">Press submit button to continue</div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="form-row">
                                            <label for="number_of_availability">Number of Serving(s) Available</label>
                                            <select class="form-control" name="number_of_availability">
                                                <option>4</option>
                                                <option>8</option>
                                                <option>12</option>
                                            </select>
                                            @if($errors->has('number_of_availability'))
                                                <span class="text-danger">{{ $errors->first('number_of_availability') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-row">
                                            <label for="dish_name">Dish name</label>
                                            <input class="form-control" type="text" name="dish_name" placeholder="Broodje Kaasworst" value="{{ old('dish_name') }}" maxlength="50" />
                                            @if($errors->has('dish_name'))
                                                <span class="text-danger">{{ $errors->first('dish_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-row">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" type="text" name="description" placeholder="Describe what you cook, what is the superiority of your dish. What do you need to cook it and why do you consider this dish worthy to win this competition" maxlength="1000">{{ old('description') }}</textarea>
                                            @if($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                        {{-- <div class="form-row">
                                            <label for="price">Per Serving Price</label>
                                            <input class="form-control" type="number" min="0" name="price" placeholder="340 (in $)" value="{{ old('price') }}"/>
                                            @if($errors->has('price'))
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div> --}}

                                        <div class="form-row">
                                            <label for="time_preparation">Time Preparation</label>
                                            <input class="form-control" type="number" name="time_preparation" placeholder="25 (in Minutes)" value="{{ old('time_preparation') }}" />
                                            @if ($errors->has('time_preparation'))
                                            <span class="text-danger">{{ $errors->first('time_preparation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="base-page-card-footer">
                        <button type="submit" class="next-page-button px-5 rounded-pill">
                            Next Step
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.bottom-nav.home-chef.bottom-nav')
    @endsection
