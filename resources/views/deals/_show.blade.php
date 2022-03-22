<div style="text-align:center">
        <!-- Image -->
    <div id="deals-carousel_{{$deal->id}}" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#deals-carousel_{{$deal->id}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            @for ($i = 1; $i < $deal->images->count(); $i++)
                <button type="button" data-bs-target="#deals-carousel_{{$deal->id}}" data-bs-slide-to="{{$i}}" aria-label="Slide 2"></button>
            @endfor
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('uploads/deals_pics/'.$deal->first_image())}}" class="d-block w-100" alt="{{$deal->title}}" loading="lazy">
            </div>
            @foreach($deal->images->skip(1) as $image)
            <div class="carousel-item">
                <img src="{{asset('uploads/deals_pics/'.$image->image)}}" class="d-block w-100" alt="...">
            </div>
                @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#deals-carousel_{{$deal->id}}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#deals-carousel_{{$deal->id}}" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
</div>
    <!-- Deal Info -->
    <div>
        <a href="{{route('deals.show',$deal)}}">
         <h1 class="myShow-title"><b>{{$deal->title}}</b></h1>
        </a>
    </div>
    <div>
        @isset($deal->merchant)
        <a class="merName" href="{{route('merchants.deals', $merchant=$deal->merchant)}}" target="_blank">
            <b class="myMerchantName">{{$deal->merchant->name ?? "Deleted merchant"}}</b>
        </a>
        @endisset
    </div>
    <br>
    <div class="myDescription">
        <h3>{!!nl2br($deal->description)!!}</h3>
    </div>
    <br>
    @isset($deal->more_info)
    <div>
        <h4>{!!nl2br($deal->more_info)!!}</h4>
    </div>
    @endisset
    @isset($deal->location)
    <div>
        <h4>{!!nl2br($deal->location)!!}</h4>
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
            <h4>Retails Price: ${{$deal->retails_price}}</h4>
        </div>
    @endisset
    @isset($deal->price)
        <div>
            <h4><b>Price: ${{$deal->price}}</b></h4>
        </div>
    @endisset
    <hr>
    <a href="{{route('deals.show',$deal)}}" class="btn MainButt" >Buy now</a>
</div>
