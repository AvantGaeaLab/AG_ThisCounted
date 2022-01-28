@extends('layouts.app')

@section('title', __('Welcome'))
@section('content')
        <div class="content">
            @if (session('status'))
                <h6 class="alert alert-success">{{session('status')}}</h6>
            @endif

            <div class="title m-b-md">
                ThisCounted
            </div>
            <!-- the main slider-->
            <div class="myContainer">
                <div class="row mb-5">
                    <a class="col" href="{{route('foodPage')}}">
                    <img class='mainCat-img mt-3' src="{{asset('uploads/mainCats_imgs/food.jpg')}}" alt="">
                    </a>
                    <img class='mainCat-img mt-3' src="{{asset('uploads/mainCats_imgs/drinks.jpg')}}" alt="">
                    <img class='mainCat-img mt-3' src="{{asset('uploads/mainCats_imgs/Act_Category.jpg')}}" alt="">
                </div>
                <div class="row">
                    <a class="col" href="{{route('categories.deals', $category=5)}}" target="_blank">
                    <img class="subCat-img" src="{{asset('uploads/mainCats_imgs/SnacksAndDesserts_Category.jpg')}}" alt="" >
                    </a>
                    <a class="col" href="{{route('categories.deals', $category=3)}}" target="_blank">
                    <img class="subCat-img" src="{{asset('uploads/mainCats_imgs/Under10_Category.jpg')}}" alt="">
                    </a>
                    <a class="col" href="{{route('categories.deals', $category=4)}}" target="_blank">
                    <img class="subCat-img" src="{{asset('uploads/mainCats_imgs/Under20_Category.jpg')}}" alt="">
                    </a>
                </div>
                <br>
                <a class="merName" href="{{route('categories.deals', $category=6)}}" target="_blank">
                <img class="sub-img-student" src="{{asset('uploads/mainCats_imgs/Student_exclusive.png')}}" alt="Student exclusive" >
                </a>
            </div>
                <!-- new deals slider-->
                <br>
                <div class="mt-5">
                    <h1> New Deals </h1>
                    <div class="row slider">
                        @forelse($lastDeals as $deal)
                            @include('forms._home_DealsSlider', $deal)
                        @empty
                            <h2>Sorry no content for now</h2>
                        @endforelse
                    </div>
                </div>
                <br/><hr/>
                <!-- Food slider-->
                <br>
                <div class="mt-5">
                        <a class="merName" href="{{route('categories.deals', $category=1)}}" target="_blank">
                    <h1> Food Deals </h1>
                        </a>
                    <div class="row slider mt-5">
                        @foreach($foodCat as $deal)
                            @include('forms._home_DealsSlider', $deal)
                        @endforeach
                    </div>
                        <hr>
                        <a class="merName" href="{{route('categories.deals', $category=2)}}" target="_blank">
                        <h1> Drinks Deals </h1>
                        </a>
                    <div class="row slider mt-5">
                        @foreach($drinksCat as $deal)
                            @include('forms._home_DealsSlider', $deal)
                        @endforeach
                    </div>
                            <hr>
                    <a class="merName" href="{{route('categories.deals', $category=6)}}" target="_blank">
                    <h1> Students exclusive Deals </h1>
                    </a>
                    <div class="row slider mt-5">
                        @forelse($studentsCat as $deal)
                            @include('forms._home_DealsSlider', $deal)
                        @empty
                            <h2>Sorry no content for now</h2>
                        @endforelse
                    </div>
                            <hr>
                    @auth()
                        <h1>Favourite deals  </h1>
                        <div class="row slider mt-5">
                            @foreach($favDeals as $deal)
                                @include('forms._home_DealsSlider', $deal)
                            @endforeach
                        </div>
                            @foreach($favDeals as $deal)
                                @include('popups.showDeal')
                            @endforeach
                        @endauth
                </div>
            </div>
                <!-- Linking the popups -->
            @foreach($lastDeals as $deal)
                @include('popups.showDeal')
            @endforeach
            @foreach($foodCat as $deal)
                @include('popups.showDeal', $deal)
            @endforeach
            @foreach($drinksCat as $deal)
                @include('popups.showDeal')
            @endforeach
            @foreach($studentsCat as $deal)
                @include('popups.showDeal')
            @endforeach

        </div>
        <!-- for the sliders -->

        @include('components.addFavoritejs')
        @include('components.sliderjs')

@endsection


