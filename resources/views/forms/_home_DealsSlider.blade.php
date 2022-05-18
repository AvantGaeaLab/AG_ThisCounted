<div class="mySlider-main col-m-4 content">
        <h4 class="myTitle" data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}">{{$deal->title}}</h4>
        <div class="mySlider-main-img-container">
            <img class="mySlider-main-img " data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}" src="{{asset('storage/uploads/deals_pics/'.$deal->first_image())}}" loading="lazy">
        </div>
    <a class="merName" @isset($deal->merchant) href="{{route('merchants.deals', $merchant=$deal->merchant)}}" target="_blank" @endisset>
        <b>{{$deal->merchant->name ?? "Deleted merchant"}}</b>
    </a>
        <div class="myDescription-slider">
           <p>{!!nl2br($deal->description)!!}</p>
        </div>
    <div class="mt-2"><b class="myPrice">${{$deal->price}}</b></div>
    @include('components.favorite')
</div>



