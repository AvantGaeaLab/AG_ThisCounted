@extends('layouts.app')
@section('title', __($merchant->name))
@section('content')

    <div class="content">
        @if (session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
        @endif

        <h1 class="s-b-sm">
             {{$merchant->name}}
        </h1>
        <br>
        @forelse($merchant->deals as $deal)
            @include('deals.index')
        @empty
            <br>
            <h4> Sorry, "{{$merchant->name}}" did not have any deals for now.</h4>
        @endforelse

        @foreach($merchant->deals as $deal)
            @include('popups.showDeal')
        @endforeach
    </div>

    @include('components.addFavoritejs')
@endsection

