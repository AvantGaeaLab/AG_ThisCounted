@extends('layouts.app')
@section('title', __($category->title))
@section('content')

    <div class="content">
        @if (session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
        @endif

        <h1 class="s-b-sm">
            Category: {{$category->title}}
        </h1>
        <br>
        @forelse($catDeals as $deal)
            @include('deals.index')
        @empty
            <br>
            <h4> Sorry, category "{{$category->title}}" did not include any deals for now.</h4>
        @endforelse

        @foreach($catDeals as $deal)
            @include('popups.showDeal')
        @endforeach
    </div>
@endsection
