<h3 class="myShow-title" >{{$orderDeal->title}}</h3>
<form action="{{route('orders.update', $order)}}"  method="POST" >
    @csrf
    @method('PUT')

    <label  for="status">Status</label>
    <select id="status" class="form-select" name="status"  aria-label="Default select example" required>
        <option selected>{{$order->status}}</option>
        <option value="1">Valid</option>
        <option value="2">Canceled</option>
        <option value="3">Refunded</option>
        <option value="4">Used</option>
        <option value="5">Expire</option>
    </select>

    <label for="quantity">quantity</label>
    <input id="quantity" class="form-control" type="number" name="quantity" value="{{$order->quantity}}" required>

    <label for="total">Total</label>
    <input id="total" class="form-control" type="number" name="total" value="{{$order->total}}" required>

    <label for="used">Used</label>
    <input id="used" class="form-control" type="number" name="used" value="{{$order->used}}" required>
    <button class="btn btn-primary m-1">Edit</button>
</form>

        <!-- Delete form -->
        <form method='post' action="{{route('orders.destroy', $order)}}">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure you want delete the order ({{$orderDeal->title}}) ?')" >Delete</button>
        </form>
