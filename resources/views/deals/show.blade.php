@extends('layouts.app')
@section('title','show Deal')

@section('content')
    <h1>Checkout</h1>
    <h3>Deals list</h3>
    <table class="table table-bordered table-">
        <tr class="myTable-h">
            <th>Deal</th>
            <th>Deal title</th>
            <th>Price</th>
        </tr>
            <tr class="myTable-r">
                <td>
                    <img class="myShow-img" src="{{asset('uploads/deals_pics/'.$deal->main_pic)}}">
                </td>
                <td>
                    {{$deal->title}}
                </td>
                <td>
                    {{$deal->price}}
                </td>
            </tr>
    </table>
        @include('forms._placeOrder')


@endsection
