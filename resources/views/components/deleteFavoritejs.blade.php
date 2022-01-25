<!-- Deals -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.removeFavDeal', function (e){
        e.preventDefault();
        @guest()

        @endguest
        $.ajax({
            type:'delete',
            url:"{{Route('favorites.destroy')}}",
            data:{'dealId': $(this).attr('data-deal-id')},
            success: function(data){
                location.reload();
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

    $(document).on('click', '.removeFavMerchant', function (e){
        e.preventDefault();
        @guest()

        @endguest
        $.ajax({
            type:'delete',
            url:"{{Route('MerDestroy')}}",
            data:{'merchantId': $(this).attr('data-merchant-id')},
            success: function(data){
                location.reload();
            }
        })
    })
</script>
