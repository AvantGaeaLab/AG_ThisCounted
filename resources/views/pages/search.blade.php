@extends('layouts.app')
@section('title', __("Search: ".$search))
@section('content')

    <div class="content">
        @if (session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
        @endif

        <h1 class="s-b-sm">
            Search about: {{$search}}
        </h1>

        @livewire('live-search', ['search'=>$search])

    @include('components.addFavoritejs')
    @include('components.deleteFavoritejs')
    @livewireScripts
@endsection

