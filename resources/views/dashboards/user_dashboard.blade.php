@extends('layouts.app')
@section('title', __('User dashboard'))
@section('content')

    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                <h4>{{session('orderTitle')}}</h4>
                <h4 class="alert-heading">{{session('status')}}  <i class="bi bi-check-circle"></i></h4>
                <hr>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
                <div class="alert alert-danger " role="alert">
                    <h4 class="alert-heading">{{session('error')}}</h4>
                    <p></p>
                    <hr>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <h1 class="s-b-sm">User dashboard</h1>

            <table class="table table-bordered">
                <tr class="myTable-h">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Merchant</th>
                    <th>Expire on</th>
                    <th>Quantity</th>
                    <th>Used</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Merchant code</th>
                </tr>
                @foreach($order as $item)
                <tr class="myTable-r">
                    <td>{{$item->id}}</td>
                    @foreach($item->deals as $deal)
                    <td  data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}">{{$deal->title}}</td>
                    <td><a class="merName" href="{{route('merchants.deals', $merchant=$deal->merchant)}}" target="_blank">
                        {{$deal->merchant->name}}
                        </a></td>
                    <td>{{\Carbon\Carbon::parse($deal->end_at)->format('Y-m-d')}}</td>
                        @include('popups.showDeal')
                    @endforeach
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->used}}</td>
                    <td>{{$item->total}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        @if($item->status == 'Valid')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CheckOrder{{$item->id}}">
                            merchant code
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="CheckOrder{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3>{{$deal->title}}</h3>
                                        <br>
                                        <form action="{{route('CheckOrder')}}" method="get">
                                            <input type="hidden" name="order_title" value="{{$deal->title}}">
                                            <p>Merchant code</p>
                                            <input type="hidden" name="status" value="{{$item->status}}" />
                                            <input type="hidden" name="order_id" value="{{$item->id}}" />
                                            <input type="text" name="inputPass" autocomplete="off"
                                                   readonly onfocus="this.removeAttribute('readonly');"
                                                   style="text-security:disc; -webkit-text-security:disc;">
                                            <button type="submit" class="MainButt btn">Check</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endif
                    </td>
                </tr>
                @endforeach
            </table>
    </div>

@endsection
