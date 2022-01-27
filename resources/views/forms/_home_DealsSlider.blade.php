<div class="mySlider-main col-m-4">
        <h4 class="myTitle" data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}">{{$deal->title}}</h4>
        <div class="mySlider-main-img-container">
            <img class="mySlider-main-img " data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}" src="{{asset('uploads/deals_pics/'.$deal->main_pic)}}">
        </div>
    <a class="merName" href="{{route('merchants.deals', $merchant=$deal->merchant)}}" target="_blank">
        <b>{{$deal->merchant->name}}</b>
    </a>
        <div>
           <p class="myDescription mt-0">{!!nl2br($deal->description)!!}</p>
        </div>
    <div><b class="myPrice">${{$deal->price}}</b></div>

    <div class="mb-5 justify-content-center" style="white-space: nowrap;" >
            <a class=" me-5 AddToFavorite guest-modal " href="#" data-deal-id="{{$deal->id}}" style="color:#636b6f;  font-size:32px; display: inline-block" >
            <i class="bi bi-heart-fill myHeart-deal"></i>
                <p style="font-size:12px; margin: 0">Deal</p>
            </a>
        <a class=" AddMerToFavorite guest-modal " href="#" data-merchant-id="{{$deal->merchant->id}}" style="color:#636b6f;  font-size:33px; display: inline-block" >
            <i class="bi bi-star-fill myHeart-deal"></i>
            <p style="font-size:12px">Merchant</p>
        </a>
    </div>
</div>



