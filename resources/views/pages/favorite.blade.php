@extends('layouts.app')
@section('title', __('Favorite'))
@section('content')

    <div class="content">


        @if (session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
        @endif

            <h1 class="s-b-sm">
                Favorite Lists
            </h1>

    <nav>
        <div class="tabsContainer-favList nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-deals-tab" data-bs-toggle="tab" data-bs-target="#nav-deals" type="button" role="tab" aria-controls="nav-deals" aria-selected="true">Deals</button>
            <button class="nav-link" id="nav-merchants-tab" data-bs-toggle="tab" data-bs-target="#nav-merchants" type="button" role="tab" aria-controls="nav-merchants" aria-selected="false">Merchants</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
            <!-- Favorite Deals -->
        <div class="tab-pane fade show active" id="nav-deals" role="tabpanel" aria-labelledby="nav-deals-tab">
            <table class="table table-bordered myTable">
                <tr class="myTable-h">
                    <th>Deal</th>
                    <th>Title</th>
                    <th>Merchant</th>
                    <th>price</th>
                    <th>Remove</th>
                </tr>
                @foreach($deals as $deal)
                <tr class="myTable-r">
                    <td data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}" >
                        <img class="myShow-img" src="{{asset('uploads/deals_pics/'.$deal->main_pic)}}" width="70" height="70"  alt="{{$deal->title}}">
                    </td>
                    <td data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}" >
                        {{$deal->title}}
                    </td>
                    <td>{{$deal->merchant->name}}</td>
                    <td data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}">{{$deal->price}}</td>
                    <td>
                        <a class="myHeart-fav removeFavDeal" data-deal-id="{{$deal->id}}">
                           <i class="bi bi-heart-fill "></i>
                        </a>
                    </td>
                </tr>
                    @include('popups.showDeal')
                @endforeach

            </table>
        </div>
        <!-- Favorite Merchants -->
        <div class="tab-pane fade" id="nav-merchants" role="tabpanel" aria-labelledby="nav-merchants-tab">
            <table class="table table-bordered ">
                <tr class="myTable-h">
                    <th>Logo</th>
                    <th>Merchant</th>
                    <th>Remove</th>
                </tr>
                @foreach($merchants as $merchant)
                <tr class="myTable-r">
                    <td>
                        @isset($merchant->merchant_logo)
                            <img class="myTable-img" src="{{asset('uploads/merchants_logo/'.$merchant->merchant_logo)}}"  width="480px" height="720px" >
                        @endisset
                    </td>
                    <td>
                        <a class="merName" href="{{route('merchants.deals', $merchant)}}" target="_blank"><b>{{$merchant->name}}</b></a></td>
                    <td>
                        <a class="myHeart-fav removeFavMerchant" data-merchant-id="{{$merchant->id}}">
                            <i class="bi bi-star-fill "></i>
                        </a>
                    </td>
                </tr>
                    @endforeach
            </table>

        </div>
    </div>
    </div>
    @include('components.deleteFavoritejs')
@endsection
