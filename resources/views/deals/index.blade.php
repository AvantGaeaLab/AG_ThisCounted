<div class="row" style="display: inline-block">
    <div class="col m-3" >

    <div class="card" style="width: 18rem; ">
        <img class="card-img-top" style="height:18rem" data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}" src="{{asset('uploads/deals_pics/'.$deal->main_pic)}}">
        <div class="card-body">
            <h4 class="card-title myTitle-search align-middle" data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}">{{$deal->title}}</h4>
                <b class="card-text myDescription">{{$deal->merchant->name}}</b>
            <p class="myDescription">{!!nl2br($deal->description)!!}</p>
        </div>
        <div><b class="myPrice">${{$deal->price}}</b></div>

        <div class="mb-5 justify-content-center" style="white-space: nowrap;" >
            <a class=" me-5 AddToFavorite guest-modal " href="#" data-deal-id="{{$deal->id}}" style="color:#636b6f;  font-size:32px; display: inline-block" >
                <i class="bi bi-heart-fill myHeart-deal"></i>
                <p style="font-size:12px; margin: 0">Deal</p>
            </a>
            <a class=" AddToFavorite guest-modal " href="#" data-deal-id="{{$deal->id}}" style="color:#636b6f;  font-size:33px; display: inline-block" >
                <i class="bi bi-star-fill myHeart-deal"></i>
                <p style="font-size:12px">Merchant</p>
            </a>
        </div>
    </div>

    </div>
</div>
