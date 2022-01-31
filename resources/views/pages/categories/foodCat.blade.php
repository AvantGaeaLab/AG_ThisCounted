@extends('layouts.app')
@section('title', __("Food Deals"))
@section('content')

    <div class="content">
        @if (session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
        @endif

        <h1 class="s-b-sm">
            Food Deals
        </h1>
            <h1 class="s-b-sm mt-5"> New Deals </h1>
            <div class="row slider">
                @forelse($lastDeals as $deal)
                    @include('forms._home_DealsSlider', $deal)
                @empty
                    <h2>Sorry no content for now</h2>
                @endforelse
            </div>
            <br>
            <hr>
            <h1 class="mt-5"><b>Food Deals</b></h1>
            @forelse($foodDeals as $deal)
                @include('deals.index', $deal)
            @empty
                <br>
                <h4> Sorry, this category did not match any deals. Please try again.</h4>
            @endforelse
            <hr>
            <h1 class="mt-5"><b>Food under $10</b></h1>
            @forelse($foodUnder10Deals as $deal)
                @include('deals.index', $deal)
            @empty
                <h4> Sorry, this category did not match any deals.</h4>
            @endforelse
            <br><hr>
            <h1 class="mt-5"><b>Snacks And Desserts Deals</b></h1>
            @forelse($SnacksAndDesserts as $deal)
                @include('deals.index', $deal)
            @empty
                <br>
                <h4> Sorry, this category did not match any deals.</h4>
            @endforelse


        @foreach($lastDeals as $deal)
            @include('popups.showDeal')
        @endforeach
        @foreach($foodUnder10Deals as $deal)
            @include('popups.showDeal')
        @endforeach
        @foreach($foodUnder20Deals as $deal)
            @include('popups.showDeal')
        @endforeach
        @foreach($SnacksAndDesserts as $deal)
           @include('popups.showDeal')
        @endforeach
    </div>

    @include('components.addFavoritejs')
    @include('components.sliderjs')

@endsection

