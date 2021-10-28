@extends('layouts.base.base')
@section('title', __('Eatchefs - Dish Approval'))
@section('script')
<script>
    $(document).ready(function() {
        $('#notification-navigator').addClass('active');

        $('.navigator-row a').click(function() {
            $('.navigator-row a').removeClass('active');
            $(this).addClass('active');

            if ($(this).hasClass('photoNav')) {
                $('#photoDish').removeClass('d-none')
                $('#photoDish').addClass('d-block')

                $('#videoDish').removeClass('d-block')
                $('#videoDish').addClass('d-none')
            } else {
                $('#photoDish').removeClass('d-block')
                $('#photoDish').addClass('d-none')

                $('#videoDish').removeClass('d-none')
                $('#videoDish').addClass('d-block')
            }
        });
    });
</script>
@endsection
@section('content')

    @include('layouts.navbar.navbar-dashboard')
    <div class="dashboard-wrapper">
        @include('layouts.sidebar.chef-manager.sidebar')
        <div class="base-page taste-approval">
            <div class="container">
                <div class="base-page-card full">
                    <div class="base-page-card-header d-flex justify-content-between align-items-center">
                        <div class="page-title w-fit-content">
                            <div class="hold">
                                <i class="fa fa-check"></i>
                                <h5>Dish <span>Approval</span></h5>
                            </div>
                        </div>
                        <div class="navigator-row row taste-approval-tab d-none d-lg-flex m-0">
                            <a class="col-6 active photoNav" href="#">
                                Photo
                            </a>
                            <a class="col-6 videoNav" href="#">
                                Video
                            </a>
                        </div>
                    </div>
                    <div class="base-page-card-content">
                        <div class="card">
                            <h5 class="food__name">{{ $dish->dish->dish_name }}</h5>
                            <div class="navigator-row row d-flex taste-approval-tab d-lg-none">
                                <a class="col-6 active photoNav" href="#">
                                    Photo
                                </a>
                                <a class="col-6 videoNav" href="#">
                                    Video
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="card-const">
                                        <div class="card-const-attachment">
                                            <img src="{{ asset('images/food/'.$dish->dish->dish_image) }}" id="photoDish" alt="">
                                            <div id="videoDish" class="d-none">
                                                <player data-uuid='{{ $dish->dish->video_dish }}' data-width='100%' data-height='500' data-displaytitle='false'></player>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <p>
                                                {{ $dish->dish->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="button-row">
                                        <button class="black" data-toggle="modal" data-target="#modalDeclined">
                                            <ion-icon name="close-outline"></ion-icon>
                                            <p>Decline</p>
                                        </button>
                                        <button class="grey" data-toggle="modal" data-target="#modalApproved">
                                            <ion-icon name="checkmark-done-outline"></ion-icon>
                                            <p>Accept</p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modalApproval modal620" id="modalApproved" tabindex="-1" role="dialog" aria-labelledby="modalApprovedLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('home.chef-manager.notification.taste-approval.post') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_approval" value="{{ $dish->id_approval_dish }}">
                    <input type="hidden" name="status" value="Accepted">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalApprovedLabel">Approval Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        <div class="modal-form-row">
                            <h5 class="fsz-12 lh-1-5 font-weight-normal">Are you sure want to <b>approve</b> the meal to be produced to public?</h5>
                            <p class="pt-3 fsz-12 poppins">Send a message the reason for being approved (optional)</p>

                            <div class="form-row mb-0">
                                <textarea class="form-control" name="message" placeholder="Write about how you feel when you see his/her dish and about why you approve it to be produced to public."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancel" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn ok">OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade modalApproval modal620" id="modalDeclined" tabindex="-1" role="dialog" aria-labelledby="modalDeclinedLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('home.chef-manager.notification.taste-approval.post') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_approval" value="{{ $dish->id_approval_dish }}">
                    <input type="hidden" name="status" value="Declined">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDeclinedLabel">Decline Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        <div class="modal-form-row">
                            <h5 class="fsz-12 lh-1-5 font-weight-normal">Are you sure want to <b>decline</b> the meal to be produced to public?</h5>
                            <p class="pt-3 fsz-12 poppins">Send a message the reason for being declined (optional)</p>

                            <div class="form-row mb-0">
                                <textarea class="form-control" name="message" placeholder="Write about how you feel when you see his/her dish and about why you decline it to be produced to public."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancel" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn ok">OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@include('layouts.bottom-nav.chef-manager.bottom-nav')
@endsection
