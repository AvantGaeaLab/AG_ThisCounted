<div style="text-align:center">
    <div>
        <img class="myShow-img" src="{{asset('uploads/deals_pics/'.$deal->main_pic)}}">
    </div>
    <div>
        <a href="{{route('deals.show',$deal)}}">
         <h1 class="myShow-title"><b>{{$deal->title}}</b></h1>
        </a>
    </div>
    <div>
        <a class="merName" href="{{route('merchants.deals', $merchant=$deal->merchant)}}" target="_blank">
        <b class="myMerchantName">{{$deal->merchant->name}}</b>
        </a>
    </div>
    <br>
    <div>
        <h3>{!!nl2br($deal->description)!!}</h3>
    </div>
    <br>
    @isset($deal->more_info)
    <div>
        <h4>{{$deal->more_info}}</h4>
    </div>
    @endisset
    @isset($deal->location)
    <div>
        <h4>{{$deal->location}}</h4>
    </div>
    @endisset
    <br>
    @isset($deal->start_at)
        <div>
            <h4>Start at: {{\Carbon\Carbon::parse($deal->start_at)->format('Y-m-d')}}</h4>
        </div>
    @endisset
    @isset($deal->end_at)
        <div>
            <h4>End at: {{\Carbon\Carbon::parse($deal->end_at)->format('Y-m-d')}}</h4>
        </div>
        <br>
    @endisset

@isset($deal->retails_price)
        <div>
            <h4>{{$deal->retails_price}}</h4>
        </div>
    @endisset
    @isset($deal->price)
        <div>
            <h4>{{$deal->price}}</h4>
            <br>
        </div>
    @endisset

    <br/>
    @include('components.showCategories')
    <br><hr>
    @include('forms._placeOrder')
</div>
