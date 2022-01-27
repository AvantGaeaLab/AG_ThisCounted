@extends('layouts.app')
@section('title', __("Search: ".$title))
@section('content')

    <div class="content">
        @if (session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
        @endif

        <h1 class="s-b-sm">
            Search about: {{$title}}
        </h1>
            <br>
        @forelse($searchDeals as $deal)
            @include('deals.index')
            @empty
                <br>
                <h4> Sorry, your search "{{$title}}" did not match any deals. Please try again.</h4>
            @endforelse

            @foreach($searchDeals as $deal)
                @include('popups.showDeal')
            @endforeach
    </div>

    @include('components.addFavoritejs')
@endsection

