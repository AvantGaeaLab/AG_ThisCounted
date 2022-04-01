<div>
    <a class="btn MainButt" href="{{route('OrdersExport')}}">Download orders list</a>
    <div class="m-2" style="display: inline-block">
        <input wire:model.debounce.100ms="search" type="text" class=" appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Search...">
        <select wire:model="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            <option value="">All</option>
            <option value="Valid">Valid</option>
            <option value="Used">Used</option>
            <option value="Canceled">Canceled</option>
            <option value="Refunded">Refunded</option>
            <option value="Expire">Expire</option>
        </select>
        <select wire:model="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            <option value="0">Descending</option>
            <option value="1">Ascending</option>
        </select>
        <select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            <option>10</option>
            <option>25</option>
            <option>50</option>
            <option>100</option>
        </select>
    </div>

    <table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Merchant</th>
        <th>Username </th>
        <th>Email </th>
        <th>Price</th>
        <th>Purchase Date</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    @foreach($orders as $order)
        <tbody>
        <tr>
            <td>
                {{$order->id}}
            </td>
            @foreach($order->deals as $orderDeal)
                <td>
                    {{$orderDeal->title}}
                </td>
                <td>
                   <a class="merName" @isset($orderDeal->merchant) href="{{route('merchants.deals', $merchant=$orderDeal->merchant)}}" target="_blank"@endisset>
                     <b>{{$orderDeal->merchant->name ?? "Deleted merchant"}}</b>
                   </a>
                </td>
            @endforeach
            <td>{{$order->user->name}}</td>
            <td>{{$order->user->email}}</td>
            <td>{{$order->total}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->status}}</td>
            <!-- Edit order -->
            <td class="myTable-r">
                <button class="MainButt btn" data-bs-toggle="modal" data-bs-target="#EditDeal{{$order->id}}">Edit</button>
                <div class="modal fade" id="EditDeal{{$order->id}}" tabindex="-1" aria-labelledby="EditDealModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EditDealModalLabel"> Edit Deal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @include('forms._editOrder')
                            </div>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        </tbody>
    @endforeach
</table>
    <div  style="font-size: 24px;margin-top:18px; padding-left:45%;">
        {{$orders->links()}}
    </div>
</div>
