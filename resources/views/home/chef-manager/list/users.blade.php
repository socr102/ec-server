@extends('layouts.base.base')
@section('title', __('Eatchefs - Notifications'))
@section('script')
<script>
    $(document).ready(function () {
        $('#list-navigator').addClass('active');

        $('.deleteButton').on('click', function(){
            $('.field-user-id').val($(this).data('userid'));
        });
    });

</script>
@endsection
@section('content')

    @include('layouts.navbar.navbar-dashboard')
    <div class="dashboard-wrapper">
        @include('layouts.sidebar.chef-manager.sidebar')
        <div class="base-page person-list-page">
            <div class="container">
                <div class="base-page-card full">
                    <div class="base-page-card-header d-flex justify-content-between align-items-center">
                        <div class="page-title w-fit-content">
                            <div class="hold">
                                <i class="fa fa-tasks"></i>
                                <h5>List Users</h5>
                            </div>
                        </div>
                        <div class="navigator-row row taste-approval-tab d-none d-lg-flex m-0">
                            <a class="col-6 active" href="{{ route('home.chef-manager.list.users') }}">
                                List Users
                            </a>
                            <a class="col-6" href="{{ route('home.chef-manager.list.home-chefs') }}">
                                List Home Chefs
                            </a>
                        </div>
                    </div>
                    <div class="base-page-card-content overflow-hidden">
                        <div class="navigator-row row d-lg-none">
                            <a class="col-6 active" href="{{ route('home.chef-manager.list.users') }}">
                                List Users
                            </a>
                            <a class="col-6" href="{{ route('home.chef-manager.list.home-chefs') }}">
                                List Home Chefs
                            </a>
                        </div>
                        <form action="{{ route('home.chef-manager.list.users') }}" method="GET">
                            <div class="searchbar">
                                <div class="searchbar-frame">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-search"></i>
                                        <input type="text" name="user" placeholder="Search for person name" value="{{ request()->query('user') }}">
                                        <input type="submit" style="display: none"/>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @include('layouts.alert.flash-message')

                        @if(request()->query('user') != '')
                            <p>Search result for "{{ request()->query('user') }}" </p>
                        @endif

                        <div class="person-list">
                            @forelse ($users as $user)
                            <div class="person-item">
                                <div class="img-col">
                                    <div class="check-hold">
                                        <img src="{{ asset('images/people/people-1.jpeg') }}" alt="">
                                    </div>
                                </div>
                                <div class="info-col">
                                    <h5>{{ $user->username }}</h5>
                                    <p class="text-center">Join Since : <span>{{ $user->created_at->rawFormat('j F Y') }}</span></p>
                                    <button class="promote deleteButton btn-danger"data-userid="{{ $user->id }}" type="submit" data-toggle="modal" data-target="#modalConfirmationDeleteUser">
                                        Delete
                                    </button>
                                </div>
                            </div>

                            @empty
                            <p class="text-center mt-3">person not found</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modalConfirmationDelete modal620" id="modalConfirmationDeleteUser" tabindex="-1" role="dialog" aria-labelledby="modalConfirmationDeleteUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('home.chef-manager.delete.users') }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalConfirmationDeleteUserLabel">Delete User Confirmation</h5>
                        <input type="hidden" name="userId" class="field-user-id">
                    </div>
                    <div class="modal-body">
                        <div class="modal-form-row my-2">
                            <h5 class="fsz-15 lh-1-5 font-weight-normal">
                                Are you sure want to <b>delete</b> this user and all his/her data?
                                <br>
                                <br>
                                Continuing this means that you are ready to bear all the consequences
                            </h5>
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
