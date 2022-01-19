<form action="{{route('orders.store', $deal)}}"  method="POST">
    @csrf
    <input type="hidden" name="deal_id" value="{{$deal->id}}">
    <input type="hidden" name="price" value="{{$deal->price}}">
    <input type="hidden" name="total"  value="{{$deal->price}}">
    <div>
        <button type="submit" class="btn MainButt" >Buy now</button>
    </div>
    <form>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="50" value="1"><br><br>
    </form>
</form>
