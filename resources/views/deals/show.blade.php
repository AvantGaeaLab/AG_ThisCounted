@extends('layouts.app')
@section('title','show Deal')

@section('content')
    <div class="content">
    <br>
    <div class="row">
        <div class="col-6" >
            <div class="slider-for">
                @foreach($deal->images as $image)
                    <img class="mb-1" src="{{asset('storage/uploads/deals_pics/'.$image->image)}}" alt="deal image">
                @endforeach
            </div>
            <div class="slider-nav">
                @foreach($deal->images as $image)
                        <img class="mx-1" src="{{asset('storage/uploads/deals_pics/'.$image->image)}}" style="height: 10%;" alt="deal image">
                @endforeach
            </div>
        </div>
        <div class="col-6">
            <h1 class="myShow-title">{{$deal->title}}</h1>
            <div>
                    <h4>Merchant:
                        <a class="merName" @isset($deal->merchant) href="{{route('merchants.deals', $merchant=$deal->merchant)}}" target="_blank"                            @endisset>
                            <b>{{$deal->merchant->name ?? "Deleted merchant"}}</b>
                        </a>
                    </h4>
            </div>
            <div class="myDescription">
            <h4><b>Description:</b><br>{!!nl2br($deal->description)!!}</h4>
            </div>
                <div style="margin-top:3vh; margin-bottom:3vh; text-align:left; padding-left:2vw;">
                @isset($deal->more_info)
                    <h4>{!!nl2br($deal->more_info)!!}</h4>
                @endisset
                @isset($deal->location)
                    <h4 >{!! $deal->location !!}</h4>
                @endisset
                @isset($deal->map)
                    {!!$deal->map!!}
                @endisset
            </div>

            @isset($deal->start_at)
                <h4>Start at: {{\Carbon\Carbon::parse($deal->start_at)->format('Y-m-d')}}</h4>
            @endisset
            @isset($deal->end_at)
                <h4>End at: {{\Carbon\Carbon::parse($deal->end_at)->format('Y-m-d')}}</h4>
            @endisset
            <br>
            @isset($deal->date)
                <h4>{{$deal->date}}</h4>
                <br>
            @endisset
            <hr>
        @isset($deal->retails_price)
                <h4>${{$deal->retails_price}}</h4>
            @endisset
            @isset($deal->price)
                <h4>Price: ${{$deal->price}}</h4>
            @endisset
            @include('components.showCategories')
            <br>
            <hr>
            @include('forms._placeOrder')
        </div>
    </div>
    </div>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
    </script>
    <script>
        document.querySelectorAll( 'oembed[url]' ).forEach( element => {
            iframely.load( element, element.attributes.url.value );
        } );
    </script>

@endsection
