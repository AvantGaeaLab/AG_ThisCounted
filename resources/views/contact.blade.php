@extends('layouts.app')
@section('title', __('Register'))
@section('content')

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="" method="post">
    {{csrf_field()}}
    <input type="text" name="senderName" placeholder="Your name">
    <br>
    <textarea name="message" id="" cols="30" rows="10" placeholder="Your message"></textarea>
    <br>
    <button type="submit">Send!</button>
</form>
@endsection
