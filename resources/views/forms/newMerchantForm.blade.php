    @csrf
    <div class="form-group" >
        <input type="text" name="name" class="form-control" placeholder="Name" @isset($newMerchant) value="{{$newMerchant->name}}"@endisset required>
    </div>
        <div>
            <label for="merchant_logo"> Merchant logo </label>
            <input type="file" name="merchant_logo" class="form-control">
            @isset($newMerchant->merchant_logo)
                <img class="myTable-img" src="{{asset('uploads/merchants_logo/'.$newMerchant->merchant_logo)}}">
            @endisset
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="MainButt btn">Save changes</button>
    </div>

