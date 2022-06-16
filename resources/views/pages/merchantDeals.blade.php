@extends('layouts.app')
@section('title', __($merchant->name))
@section('content')

    <div class="content">
        @if (session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
        @endif

            <img class="myTable-img mt-5" src="{{asset('storage/uploads/merchants_logo/'.$merchant->merchant_logo)}}"  width="auto" height="50%"  alt="">
        <h1 class="s-b-sm mt-3">
             {{$merchant->name}}
        </h1>
        <br>
        @forelse($merchantDeals as $deal)
            @include('deals.index')
        @empty
            <br>
            <h4> Sorry, "{{$merchant->name}}" did not have any deals for now.</h4>
        @endforelse

        @foreach($merchantDeals as $deal)
            @include('popups.showDeal')
        @endforeach
    </div>

    @include('components.addFavoritejs')
    @include('components.deleteFavoritejs')
@endsection

