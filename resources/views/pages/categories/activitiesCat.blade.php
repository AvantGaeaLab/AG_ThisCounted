@extends('layouts.app')
@section('title', __("Activities"))
@section('content')

    <div class="content">
        @if (session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
        @endif

        <h1 class="s-b-sm">
            Food Deals
        </h1>
        <h1 class="s-b-sm mt-5"> New Activities </h1>
        <div class="row slider">
            @forelse($lastDeals as $deal)
                @include('forms._home_DealsSlider', $deal)
            @empty
                <h2>Sorry no content for now</h2>
            @endforelse
        </div>
        <br>

        <hr>
        <h1 class="mt-5"><b>Indoor Activities</b></h1>
        @forelse($Indoor as $deal)
            @include('deals.index', $deal)
        @empty
            <br>
            <h4> Sorry, this category did not match any deals. Please try again.</h4>
        @endforelse
        <hr>

        <h1 class="mt-5"><b>Outdoor Activities</b></h1>
        @forelse($Outdoor as $deal)
            @include('deals.index', $deal)
        @empty
            <br>
            <h4> Sorry, this category did not match any deals.</h4>
        @endforelse


        @foreach($lastDeals as $deal)
            @include('popups.showDeal')
        @endforeach
            @foreach($Indoor as $deal)
                @include('popups.showDeal')
            @endforeach
            @foreach($Outdoor as $deal)
                @include('popups.showDeal')
            @endforeach
    </div>

    <!-- JavaScript -->
    @include('components.addFavoritejs')
    @include('components.deleteFavoritejs')
    @include('components.sliderjs')

@endsection

