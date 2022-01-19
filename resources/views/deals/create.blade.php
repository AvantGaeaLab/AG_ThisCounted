@extends('layouts.app')
@section('title','Create Deal')

@section('content')
    <div class="myForm">
         <h2 class="content">Create New Deal</h2>
        <br>
        <form action="{{route('deals.store')}}"  method="POST" enctype="multipart/form-data">
        @include('deals._form',['submitText'=>'Create'])
    </form>
    </div>
@endsection
