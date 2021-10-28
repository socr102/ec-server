@extends('layouts.base.base')
@section('title', __('Eatchefs - Homepage'))
@section('script')
<script>
    $(document).ready(function() {
        $('#dish-list-navigator').addClass('active');
    });
</script>
<script>
    function searchDish() {
        return {
            isLoading: false,
            isSearch: false,
            dishName: null,
            linkImage: "{{ asset('images/food/') }}",
            linkDetailDish: "{{ route('home.home-chef.dish.dish', ['id'=> 'id']) }}",
            listDish: [],
            searchDishFunc: function(e) {
                console.log(this.dishName);
                this.isLoading = true;
                const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
                fetch("{{ route('dish.search.name')  }}", {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': csrfToken
                        },
                        method: "POST",
                        credentials: "same-origin",
                        body: JSON.stringify({
                            name: this.dishName,
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.isLoading = false;
                        this.isSearch = true;
                        this.listDish = data;
                        console.log(data)

                        window.__sharethis__.initialize()
                    });



            }
        }
    }
</script>
@endsection
@section('content')

@include('layouts.navbar.navbar-dashboard')
<div class="dashboard-wrapper">
    @include('layouts.sidebar.home-chef.sidebar')
    <div class="base-page dish-list-page">
        <div class="container">
            <div class="base-page-card full">
                <div class="base-page-card-header">
                    <div class="page-title">
                        <div class="hold">
                            <i class="fa fa-concierge-bell"></i>
                            <h5>Eatchefs <span>Dish List</span></h5>
                        </div>
                    </div>
                </div>
                <div class="base-page-card-content">
                    <div x-data="searchDish()">
                        <div class="searchbar">
                            <div class="searchbar-frame">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-search"></i>
                                    <input type="text" x-model="dishName" x-on:input.debounce.850="searchDishFunc()" placeholder="Search for dish name">
                                </div>
                            </div>
                        </div>
                        <div class="dish-list">
                            <template x-if="isLoading">
                                <p class="text-center">Loading...</p>
                            </template>
                            <template x-if="isSearch && listDish.length == 0">
                                <div class="section-title">
                                    <h5>Results dish "<span x-text="dishName"></span>"</h5>
                                </div>
                                <p class="text-center">dish not found</p>
                            </template>
                            <template x-if="isSearch && listDish.length > 0">
                                <div class="section-title">
                                    <h5>Results dish "<span x-text="dishName"></span>"</h5>
                                </div>
                                <div class="dish-row">
                                    <template x-for="(item, index) in listDish" :key="index">
                                        <div class="dish-item">
                                            <a x-bind:href="linkDetailDish.replace('id', item.id_dish)">
                                                <div class="info-col">
                                                    <p class="food__dish-type" x-text="item.dish_name"></p>
                                                    <p class="food__chef" x-text="item.chef.username+' - '+item.chef.title.name"></p>
                                                </div>
                                                <div class="img-col">
                                                    <img x-bind:src="linkImage+'/'+item.dish_image" alt="">
                                                </div>
                                            </a>
                                            <div class="rangking" x-text="index + 1"></div>
                                            <div
                                                class="sharethis-inline-share-buttons"
                                                x-bind:data-url="linkDetailDish.replace('id', item.id_dish)"
                                                x-bind:data-title="item.dish_name"
                                                x-bind:data-image="linkImage+'/'+item.dish_image"
                                                x-bind:data-description="item.description"
                                            ></div>
                                            <div class="voting voted" type="submit">
                                                <p class="voting-count" x-text="item.upvote"></p>
                                                <i class="fa fa-thumbs-up"></i>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>

                    @include('layouts.alert.flash-message')

                    <div class="dish-list">
                        <div class="section-title">
                            <h5>Your Own Dish</h5>
                        </div>
                        @if(count($listOwnDish) == 0)
                            <p class="text-center">you not have dish yet</p>
                        @else
                            <div class="dish-row">
                                @foreach($listOwnDish as $key => $dt)
                                <div class="dish-item">
                                    <a href="{{ route('home.home-chef.dish.dish', ['id'=>$dt->id_dish]) }}">
                                        <div class="info-col">
                                            {{-- <h5 class="food__name">{{ $dt->dish_name }}</h5> --}}
                                            {{-- <p class="food__dish-type">Main Dish - Keto</p> --}}
                                            <p class="food__dish-type">{{ $dt->dish_name }}</p>
                                            <p class="food__chef">{{ $dt->chef->username }} - {{ $dt->chef->titleName }}</p>
                                        </div>
                                        <div class="img-col">
                                            <img src="{{ asset('images/food/'.$dt->dish_image) }}" alt="">
                                        </div>
                                    </a>
                                    <div
                                        class="sharethis-inline-share-buttons"
                                        data-url="{{ route('home.home-chef.dish.dish', ['id'=>$dt->id_dish]) }}"
                                        data-title="{{ $dt->dish_name }}"
                                        data-image="{{ asset('images/food/'.$dt->dish_image) }}"
                                        data-description="{{ $dt->description }}"
                                    ></div>
                                    <div class="rangking">{{ $key +1 }}</div>
                                    {{-- <div class="calory">
                                        <p>{{ $dt->nutrition->calorie }}</p>
                                        <img src="{{ asset('images/icon/fork-spoon.png') }}" alt="">
                                    </div> --}}
                                    <div class="voting voted" type="submit">
                                        <p class="voting-count">{{ $dt->upvote }}</p>
                                        <i class="fa fa-thumbs-up"></i>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endif
                        <!-- <div class="section-title">
                            <h5>Trending Dish</h5>
                        </div>
                        <div class="dish-item">
                            <a class="info-col" href="">
                                <h5 class="food__name">Grand Velas Tacos</h5>
                                <p class="food__dish-type">Main Dish - Keto</p>
                                <p class="food__chef">Urthis Swornith - Advance</p>
                            </a>
                            <div class="img-col">
                                <img src="{{ asset('images/food/food4.png') }}" alt="">
                            </div>
                            <div class="sharethis-inline-share-buttons"></div>
                            <div class="rangking">9</div>
                            <div class="calory">
                                <p>195</p>
                                <img src="{{ asset('images/icon/fork-spoon.png') }}" alt="">
                            </div>
                        </div>
                        <div class="dish-item">
                            <a class="info-col" href="">
                                <h5 class="food__name">Beluga's Almas</h5>
                                <p class="food__dish-type">Main Dish - Keto</p>
                                <p class="food__chef">Urthis Swornith - Advance</p>
                            </a>
                            <div class="img-col">
                                <img src="{{ asset('images/food/food5.jpg') }}" alt="">
                            </div>
                            <div class="sharethis-inline-share-buttons"></div>
                            <div class="rangking">12</div>
                            <div class="calory">
                                <p>360</p>
                                <img src="{{ asset('images/icon/fork-spoon.png') }}" alt="">
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            {{-- @include('layouts.bottom-nav.home-chef.home-navigator') --}}
        </div>
    </div>
    @include('layouts.bottom-nav.home-chef.bottom-nav')
    @endsection
