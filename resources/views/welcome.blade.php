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
                <div class="row slider mb-5">
                    @include('forms._home_mainSlider',['categoryImg'=>'food.jpg'])
                    @include('forms._home_mainSlider',['categoryImg'=>'drinks.jpg'])
                    @include('forms._home_mainSlider',['categoryImg'=>'Act_Category.jpg'])
                    @include('forms._home_mainSlider',['categoryImg'=>'SnacksAndDesserts_Category.jpg'])
                    @include('forms._home_mainSlider',['categoryImg'=>'students_Category.jpg'])
                    @include('forms._home_mainSlider',['categoryImg'=>'Under10_Category.jpg'])
                    @include('forms._home_mainSlider',['categoryImg'=>'Under20_Category.jpg'])
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
                    @isset($foodCat->deals)
                    <h1> Food Deals </h1>
                    <div class="row slider mt-5">
                        @foreach($foodCat->deals as $deal)
                            @include('forms._home_DealsSlider', $deal)
                        @endforeach
                    </div>
                        <hr>
                    @endisset
                        @isset($drinksCat->deals)
                        <h1> Drinks Deals </h1>
                    <div class="row slider mt-5">
                        @foreach($drinksCat->deals as $deal)
                            @include('forms._home_DealsSlider', $deal)
                        @endforeach
                    </div>
                            <hr>
                        @endisset
                        @isset($drinksCat->deals)
                        <h1> Students exclusive Deals </h1>
                    <div class="row slider mt-5">
                        @foreach($studentsCat->deals as $deal)
                            @include('forms._home_DealsSlider', $deal)
                        @endforeach
                    </div>
                            <hr>
                        @endisset
                    @auth()
                        <h1>Favourite deals  </h1>
                        <div class="row slider mt-5">
                            @foreach($favDeals as $deal)
                                @include('forms._home_DealsSlider', $deal)
                            @endforeach
                        </div>
                    @endauth
                </div>
            </div>

            @foreach($deals as $deal)
                @include('popups.showDeal')
            @endforeach

            @include('popups.favoriteListGuest')
        </div>
        <!-- for the sliders -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.AddToFavorite', function (e){
            e.preventDefault();
            @guest()
            alert('Most login to make favorite deal! ✖✖')

            @endguest
            $.ajax({
                type:'post',
                url:"{{Route('favorites.store')}}",
                data:{'dealId': $(this).attr('data-deal-id')},
                success: function(data){
                    alert('❤ Deal added to favorite !')
                }
            })
        })
    </script>

    <script type="text/javascript">
        $('.slider').slick({
            slidesToShow: 5,
            slidesToScroll: 2,
            mobileFirst: true,
            infinite:true,
            loop: true,
            dots: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1920,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },{
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 380,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]

        });
    </script>
@endsection


