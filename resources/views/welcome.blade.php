@extends('layouts.app')

@section('title', __("It's time to get out"))
@section('content')
        <div class="content">
            @if (session('status'))
                <h6 class="alert alert-success">{{session('status')}}</h6>
            @endif

                @if(session('error'))
                    <div class="alert alert-danger " role="alert">
                        <h4 class="alert-heading">{{session('error')}}</h4>
                        <p></p>
                        <hr>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            <!-- the main slider-->
            <div class="thumbnailsContainer">
                <div class="row">
                    <a class="col" href="{{route('foodPage')}}">
                    <img class='mainCat-img' src="{{asset('images/mainCats_imgs/food.jpg')}}" alt="">
                    </a>
                    <a class="col" href="{{route('categories.deals', $category=2)}}" target="_blank">
                    <img class='mainCat-img' src="{{asset('images/mainCats_imgs/drinks.jpg')}}" alt="">
                    </a>
                    <a class="col" href="{{route('activitiesPage')}}">
                    <img class='mainCat-img' src="{{asset('images/mainCats_imgs/Act_Category.jpg')}}" alt="">
                    </a>
                </div>
                <div class="row mt-3">
                    <a class="col" href="{{route('categories.deals', $category=5)}}" target="_blank">
                    <img class="subCat-img" src="{{asset('images/mainCats_imgs/SnacksAndDesserts_Category.jpg')}}" alt="" >
                    </a>
                    <a class="col" href="{{route('categories.deals', $category=3)}}" target="_blank">
                    <img class="subCat-img" src="{{asset('images/mainCats_imgs/Under10_Category.jpg')}}" alt="">
                    </a>
                    <a class="col" href="{{route('categories.deals', $category=4)}}" target="_blank">
                    <img class="subCat-img" src="{{asset('images/mainCats_imgs/Under20_Category.jpg')}}" alt="">
                    </a>
                </div>

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
                        <img class="sub-img-student" src="{{asset('images/mainCats_imgs/Student_exclusive.png')}}" alt="Student exclusive" >
                    </a>
                    <div class="row slider mt-5">
                        @forelse($studentsCat as $deal)
                            @include('forms._home_DealsSlider', $deal)
                        @empty
                            <h2>Sorry no content for now</h2>
                        @endforelse
                    </div>
                    @auth()
                        <hr>
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
                    <br>
                    <hr>
                    <div>
                        <img class='sub-img-student mt-3' src="{{asset('images/thumbnails/Vendor Activty.png')}}" alt="Vendor Activity" loading="lazy">
                        <div class="row">
                            <img class='subCat-img col mt-3' src="{{asset('images/thumbnails/Vendor Food.png')}}" alt="Vendor Activity" loading="lazy">
                            <img class='subCat-img col mt-3' src="{{asset('images/thumbnails/Telegram banner.png')}}" alt="Vendor Activity" loading="lazy">
                        </div>
                    </div>
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
        @include('components.deleteFavoritejs')
        @include('components.sliderjs')

@endsection


