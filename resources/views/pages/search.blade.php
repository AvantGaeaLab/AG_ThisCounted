@extends('layouts.app')
@section('title', __('search'))
@section('content')

    <div class="content">
        @if (session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
        @endif

        <h1 class="s-b-sm">
            Search about: {{$title}}
        </h1>
            <br>
        @forelse($searchDeals as $deal)
            @include('deals.index')
            @empty
                <br>
                <h4> Sorry, your search "{{$title}}" did not match any deals. Please try again.</h4>
            @endforelse

            @foreach($searchDeals as $deal)
                @include('popups.showDeal')
            @endforeach
    </div>
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
                alert('❤ Deal added to favorite !')
            }
        })
    })
</script>
@endsection

