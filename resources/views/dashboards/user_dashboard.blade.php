@extends('layouts.app')
@section('title', __('User dashboard'))
@section('content')

    <style>
        @media
        only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px)  {
            .user-td:nth-of-type(1):before { background-color: #ffce23; padding-inline:6px; font-weight: bold; content: "ID"; }
        .user-td:nth-of-type(2):before { font-weight: bold; content: "Title"; }
        .user-td:nth-of-type(3):before { font-weight: bold; content: "Merchant"; }
        .user-td:nth-of-type(4):before { font-weight: bold; content: "Expire on"; }
        .user-td:nth-of-type(5):before { font-weight: bold; content: "Quantity"; }
        .user-td:nth-of-type(6):before { font-weight: bold; content: "Used"; }
        .user-td:nth-of-type(7):before { font-weight: bold; content: "Total"; }
        .user-td:nth-of-type(8):before { font-weight: bold; content: "Status"; }
        }
    </style>

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

            <table>
                <thead>
                <tr>
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
                </thead>
                @foreach($order as $item)
                    <tbody>
                    <tr>
                    <td class="user-td td-fullTable">{{$item->id}}</td>
                    @foreach($item->deals as $deal)
                    <td class="user-td td-fullTable" data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}">{{$deal->title}}</td>
                    <td class="user-td td-fullTable" ><a class="merName" href="{{route('merchants.deals', $merchant=$deal->merchant)}}" target="_blank">
                        {{$deal->merchant->name}}
                        </a></td>
                    <td class="user-td td-fullTable">{{($deal->end_at)}}</td>
                        @include('popups.showDeal')
                    @endforeach
                    <td class="user-td td-fullTable">{{$item->quantity}}</td>
                    <td class="user-td td-fullTable">{{$item->used}}</td>
                    <td class="user-td td-fullTable">{{$item->total}}</td>
                    <td class="user-td td-fullTable">{{$item->status}}</td>
                    <td class="user-td">
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
             </tbody>
                @endforeach
            </table>



    </div>

@endsection
