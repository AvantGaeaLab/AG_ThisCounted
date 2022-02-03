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
                    {{$orderDeal->title}}</td>
                <td>
                    <a class="merName" href="{{route('merchants.deals', $merchant=$orderDeal->merchant)}}" target="_blank"><b>
                            {{$orderDeal->merchant->name}}
                        </b></a>
                </td>
            @endforeach
            <td>{{$order->user->name}}</td>
            <td>{{$order->user->email}}</td>
            <td>{{$order->total}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->status}}</td>
            <!-- Edit User -->
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
