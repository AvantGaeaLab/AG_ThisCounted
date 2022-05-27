<!-- Deals favorite -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.AddToFavorite', function (e){
        e.preventDefault();
        @guest()
        alert('Most login to make favorite deal! ✖✖')
        @endguest

        var iconId = $(this).attr('data-deal-id')

        $.ajax({
            type:'post',
            url:"{{Route('favorites.store')}}",
            data:{'dealId': $(this).attr('data-deal-id')},
            success: function(response){
            $('#dealHeart'+iconId)
                .removeClass("myHeart-deal")
                .addClass("myHeart-deal-added")
                .attr('id', 'removeDealHeart'+iconId)
            $('#dealFavBtn'+iconId)
                .removeClass("AddToFavorite")
                .addClass("removeFavDeal")
                .attr('id', '#removeDealFavBtn'+iconId)
            }
        })
    })
</script>

<!-- Merchants favorite -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.AddMerToFavorite', function (e){
        e.preventDefault();
        @guest()
        alert('Most login to make favorite merchant! ✖✖')
        @endguest

        var iconMerId = $(this).attr('data-merchant-id')

        $.ajax({
            type:'post',
            url:"{{Route('MerStore')}}",
            data:{'merchantId': $(this).attr('data-merchant-id')},
            success: function(response){
                $('#favMerBtn'+iconMerId)
                    .removeClass("myFav-merchant")
                    .addClass("myFav-merchant-added")
                    .attr('id', 'removeFavMerBtn'+iconMerId)
                $('#removeFavMerchant'+iconMerId)
                    .removeClass("myFav-merchant-added")
                    .addClass("myFav-merchant")
                    .attr('id', '#AddMerToFavorite'+iconMerId)
            }
        })
    })
</script>
