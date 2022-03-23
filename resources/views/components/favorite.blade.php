<div class="mb-5 justify-content-center" style="white-space: nowrap;" >

    <!-- Deals favorite -->
    @auth()
    @if(auth()->user()->favoriteHas($deal->id))
            <a class=" me-5 removeFavDeal guest-modal " href="#" data-deal-id="{{$deal->id}}" style="color:#636b6f;  font-size:32px; display: inline-block" >
                <i class="bi bi-heart-fill myHeart-deal-added"></i>
                <p style="font-size:12px; margin: 0">Deal</p>
            </a>
    @else
        <a class="me-5 AddToFavorite guest-modal " href="#" data-deal-id="{{$deal->id}}" style="color:#636b6f;  font-size:32px; display: inline-block" >
            <i class="bi bi-heart-fill myHeart-deal"></i>
            <p style="font-size:12px; margin: 0">Deal</p>
        </a>
    @endif
    @endauth
    @guest()
        <a class="me-5 AddToFavorite guest-modal " href="#" data-deal-id="{{$deal->id}}" style="color:#636b6f;  font-size:32px; display: inline-block" >
            <i class="bi bi-heart-fill myHeart-deal"></i>
            <p style="font-size:12px; margin: 0">Deal</p>
        </a>
        @endguest
        <!-- Merchant favorite -->
    @isset($deal->merchant)
        @auth()
        @if(auth()->user()->merchantFavoriteHas($deal->merchant->id))
                    <a class="removeFavMerchant guest-modal " href="#" data-merchant-id="{{$deal->merchant->id}}" style="color:#636b6f;  font-size:33px; display: inline-block" >
                        <i class="bi bi-star-fill myFav-merchant-added"></i>
                        <p style="font-size:12px">Merchant</p>
                    </a>
        @else
                <a class=" AddMerToFavorite guest-modal " href="#" data-merchant-id="{{$deal->merchant->id}}" style="color:#636b6f;  font-size:33px; display: inline-block" >
                    <i class="bi bi-star-fill myFav-merchant"></i>
                    <p style="font-size:12px">Merchant</p>
                </a>
        @endif
        @endauth
            @guest()
                <a class=" AddMerToFavorite guest-modal " href="#" data-merchant-id="{{$deal->merchant->id}}" style="color:#636b6f;  font-size:33px; display: inline-block" >
                    <i class="bi bi-star-fill myFav-merchant"></i>
                    <p style="font-size:12px">Merchant</p>
                </a>
            @endguest
    @endisset

</div>
