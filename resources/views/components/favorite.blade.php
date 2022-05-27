<div class="mb-1 justify-content-center" style="white-space: nowrap;" >

    <!-- Deals favorite -->
    @auth()
    @if(auth()->user()->favoriteHas($deal->id))
            <a id="removeDealFavBtn{{$deal->id}}" class=" me-5 removeFavDeal" data-deal-id="{{$deal->id}}" style="color:#636b6f;  font-size:32px; display: inline-block" >
                <i id="removeDealHeart{{$deal->id}}" class="bi bi-heart-fill myHeart-deal-added"></i>
                <p style="font-size:12px; margin: 0">Deal</p>
            </a>
    @else
        <a id="dealFavBtn{{$deal->id}}" class="me-5 AddToFavorite" data-deal-id="{{$deal->id}}" style="color:#636b6f;  font-size:32px; display: inline-block" >
            <i id="dealHeart{{$deal->id}}" class="bi bi-heart-fill myHeart-deal"></i>
            <p style="font-size:12px; margin: 0">Deal</p>
        </a>
    @endif
    @endauth
    @guest()
        <a class="me-5 AddToFavorite" data-deal-id="{{$deal->id}}" style="color:#636b6f;  font-size:32px; display: inline-block" >
            <i class="bi bi-heart-fill myHeart-deal"></i>
            <p style="font-size:12px; margin: 0">Deal</p>
        </a>
        @endguest
        <!-- Merchant favorite -->
    @isset($deal->merchant)
        @auth()
        @if(auth()->user()->merchantFavoriteHas($deal->merchant->id))
                    <a id="removeFavMerchant{{$deal->merchant->id}}" class="removeMerToFavorite" data-merchant-id="{{$deal->merchant->id}}" style="color:#636b6f;  font-size:33px; display: inline-block" >
                        <i id="removeFavMerBtn{{$deal->merchant->id}}" class="bi bi-star-fill myFav-merchant-added"></i>
                        <p style="font-size:12px">Merchant</p>
                    </a>
        @else
                <a id="AddMerToFavorite{{$deal->merchant->id}}" class="AddMerToFavorite" data-merchant-id="{{$deal->merchant->id}}" style="color:#636b6f;  font-size:33px; display: inline-block" >
                    <i id="favMerBtn{{$deal->merchant->id}}" class="bi bi-star-fill myFav-merchant"></i>
                    <p style="font-size:12px">Merchant</p>
                </a>
        @endif
        @endauth
            @guest()
                <a class="AddMerToFavorite" data-merchant-id="{{$deal->merchant->id}}" style="color:#636b6f;  font-size:33px; display: inline-block" >
                    <i id="favMerIcon" class="bi bi-star-fill myFav-merchant"></i>
                    <p style="font-size:12px">Merchant</p>
                </a>
            @endguest
    @endisset

</div>
