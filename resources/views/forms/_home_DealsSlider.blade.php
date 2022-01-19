<div class=" justify-content-center col-m-4 pr-1">
        <h4 data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}">{{$deal->title}}</h4>
        <div>
            <img class="mySlider-main-img" data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}" src="{{asset('uploads/deals_pics/'.$deal->main_pic)}}">
        </div>
    @foreach($deal-> merchants as $merchant)
        <b>{{$merchant->name}}</b>
    @endforeach
        <div>
            {!!nl2br($deal->description)!!}
        </div>
        <div class="card-footer "><b>{{$deal->price}}$</b></div>
    <div class="row mb-3">
            <a class="AddToFavorite myHeart-deal guest-modal col-6" href="#" data-deal-id="{{$deal->id}}" style="color:#636b6f;  font-size:20px" >
            <i class="bi bi-heart-fill myHeart-deal"></i>
                <p style="font-size:12px">Deal</p>
            </a>
        <a class="AddToFavorite myHeart-deal guest-modal col-6" href="#" data-deal-id="{{$deal->id}}" style="color:#636b6f;  font-size:20px" >
            <i class="bi bi-star-fill myHeart-deal"></i>
            <p style="font-size:12px">merchant</p>
        </a>
    </div>
</div>



