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
        $.ajax({
            type:'post',
            url:"{{Route('favorites.store')}}",
            data:{'dealId': $(this).attr('data-deal-id')},
            success: function(data){
                location.reload();
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
        $.ajax({
            type:'post',
            url:"{{Route('MerStore')}}",
            data:{'merchantId': $(this).attr('data-merchant-id')},
            success: function(data){
                location.reload();
            }
        })
    })
</script>
