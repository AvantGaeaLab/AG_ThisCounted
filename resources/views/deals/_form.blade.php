@csrf
<div class="form-group" >
    <input type="text" name="title" class="form-control mb-3" placeholder="Title" @isset($deal) value="{{$deal->title}}"@endisset required>
</div>
<div class="form-group mb-3">
    @foreach($categories as $key =>$title)
        <label for="category_{{$key}}">{{$title}}</label>
        <input id="category_{{$key}}" type="checkbox" name="categories[]" value="{{$key}}"
               @if(isset($deal) && in_array($key, $dealCategories)) checked @endif>
    @endforeach
</div>
<div class="form-group mb-3">
    <label  for="merchant">Merchant</label>
    <select id="merchant" class="form-select" name="merchant_id">
        @isset($deal)<option selected>{{$deal->merchant->name}}</option>@endisset
        <option></option>
            @foreach($merchants as $merchant)
                    <option value="{{$merchant->id}}">{{$merchant->name}}</option>
                @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label for="start_at">Valid date start: @isset($deal->start_at)<br><span> current date <b>{{$deal->start_at}}</b></span>@endisset</label>
    <input type="date" name="start_at" class="form-control" placeholder="start at" @isset($deal) value={{$deal->start_at}} @endisset>
</div>
<div class="form-group mb-3">
    <label for="end_at">Valid date end: @isset($deal->end_at)<br><span> current date <b>{{$deal->end_at}}</b></span>@endisset</label>
    <input type="date" name="end_at" class="form-control" placeholder="end at" @isset($deal) value={{$deal->end_at}}@endisset>
</div>
<div class="form-group mb-3">
    <input type="text" name="retails_price" class="form-control" placeholder="retails_price" @isset($deal) value="{{$deal->retails_price}}"@endisset>
</div>
<div class="form-group mb-3">
    <input type="text" name="price" class="form-control" placeholder="price" @isset($deal) value="{{$deal->price}}"@endisset>
</div>
<div class="form-group mb-3">
    <textarea type="textarea" name="description" class="form-control" placeholder="description" >@isset($deal) {{$deal->description}}@endisset</textarea>
</div>
<div class="form-group mb-3">
    <input type="text" name="more_info" class="form-control" placeholder="more info" @isset($deal) value="{{$deal->more_info}}"@endisset>
</div>
<div class="form-group mb-3">
    <input type="text" name="location" class="form-control" placeholder="location" @isset($deal) value="{{$deal->location}}"@endisset >
</div>
<div>
    <label for="main_pic"> Deal Main pic </label>
    <input type="file" name="main_pic" class="form-control">
    @isset($deal->main_pic)
        <img src="{{asset('uploads/deals_pics/'.$deal->main_pic)}}"  width="480px" height="720px">
    @endisset
</div>
<div>
    <label for="pic2"> Deal pic 2 </label>
    <input type="file" name="pic2" class="form-control" >
    @isset($deal->pic2)
        <img src="{{asset('uploads/deals_pics/'.$deal->pic2)}}"  width="480px" height="720px" >
    @endisset
</div>
<div>
    <label for="pic3"> Deal pic 3 </label>
    <input type="file" name="pic3" class="form-control" >
    @isset($deal->pic3)
        <img src="{{asset('uploads/deals_pics/'.$deal->pic3)}}"  width="480px" height="720px" >
    @endisset
</div>
<button type="submit" class="MainButt btn mt-2">{{$submitText}}</button>


