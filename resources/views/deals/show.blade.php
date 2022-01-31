@extends('layouts.app')
@section('title','show Deal')

@section('content')
    <div class="content">
    <br>
    <div class="row">
        <div class="col" >
            <img class="myShow-img" src="{{asset('uploads/deals_pics/'.$deal->main_pic)}}">
        </div>
        <div class="col">
            <h1 class="myShow-title">{{$deal->title}}</h1>
            <h4>Merchant: {{$deal->merchant->name}}</h4>
            <h4 style="margin-top:3vh;margin-bottom:3vh; text-align:left; padding-left:6vw;"><b>Description:<br></b>{!!nl2br($deal->description)!!}</h4>
            <div style="margin-top:3vh; margin-bottom:3vh; text-align:left; padding-left:6vw;">
                @isset($deal->more_info)
                    <h4>{{$deal->more_info}}</h4>
                @endisset
                @isset($deal->location)
                    <h4 >{{$deal->location}}</h4>
                @endisset
            </div>
            @isset($deal->start_at)
                <h4>Start at: {{\Carbon\Carbon::parse($deal->start_at)->format('Y-m-d')}}</h4>
            @endisset
            @isset($deal->end_at)
                <h4>End at: {{\Carbon\Carbon::parse($deal->end_at)->format('Y-m-d')}}</h4>
            @endisset
            <br>
        @isset($deal->retails_price)
                <h4>${{$deal->retails_price}}</h4>
            @endisset
            @isset($deal->price)
                <h4>${{$deal->price}}</h4>
            @endisset
            @include('components.showCategories')
            <br>
            <hr>
            @include('forms._placeOrder')
        </div>
    </div>
    </div>

@endsection
