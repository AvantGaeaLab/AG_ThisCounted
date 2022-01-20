@extends('layouts.app')
@section('title','Edit Deal')

@section('content')
    <div class="myForm">
        <h2 class="content">Edit Deal <br><br> {{$deal->title}}</h2>
        <br>
        <form action="{{route('deals.update', $deal)}}"  method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('deals._form',['submitText'=>'Edit'])
        </form>
    </div>

@endsection
