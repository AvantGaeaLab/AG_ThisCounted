@extends('layouts.app')
@section('title','Create Deal')
@section('content')

    @if (session('status'))
        <h6 class="alert alert-success">{{session('status')}}</h6>
    @endif

    <div class="myForm">
         <h2 class="content">Create New Deal</h2>
        <br>
        <form action="{{route('deals.store')}}"  method="POST" enctype="multipart/form-data">
        @include('deals._form',['submitText'=>'Create'])
    </form>
    </div>
@endsection
