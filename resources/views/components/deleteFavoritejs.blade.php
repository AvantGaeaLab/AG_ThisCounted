<!-- Deals -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.removeFavDeal', function (e){
        e.preventDefault();

        var iconId = $(this).attr('data-deal-id')

        $.ajax({
            type:'delete',
            url:"{{Route('favorites.destroy')}}",
            data:{'dealId': $(this).attr('data-deal-id')},
            success: function(response){
            $('#removeDealHeart'+iconId)
                .removeClass("myHeart-deal-added")
                .addClass("myHeart-deal")
                .attr('id', 'dealHeart'+iconId)
            $('#removeDealFavBtn'+iconId)
                .removeClass("removeFavDeal")
                .addClass("AddToFavorite")
                .attr('id', '#dealFavBtn'+iconId)
            }
        })
    })
</script>

<!-- Merchants -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.removeMerToFavorite', function (e){
        e.preventDefault();
        @guest()

        @endguest
        var iconMerId = $(this).attr('data-merchant-id')

        $.ajax({
            type:'delete',
            url:"{{Route('MerDestroy')}}",
            data:{'merchantId': $(this).attr('data-merchant-id')},
            success: function(response){
                $('#removeFavMerBtn'+iconMerId)
                    .removeClass("myFav-merchant-added")
                    .addClass("myFav-merchant")
                    .attr('id', '#favMerBtn'+iconMerId)
                $('#AddMerToFavorite'+iconMerId)
                    .removeClass("myFav-merchant")
                    .addClass("myFav-merchant-added")
                    .attr('id', 'removeFavMerBtn'+iconMerId)

            }
        })
    })
</script>
