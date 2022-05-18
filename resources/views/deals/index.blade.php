<div class="row" style="display: inline-block">
    <div class="col m-3" >

    <div class="card myBg-index" style="width: 18rem; ">
        <img class="card-img-top" style="height:18rem" data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}" src="{{asset('storage/uploads/deals_pics/'.$deal->first_image())}}">
        <div class="card-body">
            <h4 class="card-title myTitle-search align-middle" data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}">{{$deal->title}}</h4>
            <a class="merName" @isset($deal->merchant)href="{{route('merchants.deals', $merchant=$deal->merchant)}}" target="_blank" @endisset>
                <b class="card-text myDescription">{{$deal->merchant->name ?? "Deleted merchant"}}</b>
            </a>
            <div class="myDescription-slider">
            <p>{!!nl2br($deal->description)!!}</p>
            </div>
        </div>
        <div><b class="myPrice">${{$deal->price}}</b></div>

        @include('components.favorite')

        <div class="pb-4">
        @include('components.showCategories')
        </div>
    </div>

    </div>
</div>
