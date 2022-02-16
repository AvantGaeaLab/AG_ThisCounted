@csrf
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<div class="form-group" >
    <input type="text" name="title" class="form-control mb-3" placeholder="Title" @isset($deal) value="{{$deal->title}}"@endisset required>
</div>
<div class="form-group mb-3">
    @foreach($categories as $key =>$title)
        <div class="form-check form-check-inline">
        <input class="form-check-input" id="category_{{$key}}" type="checkbox" name="categories[]" value="{{$key}}"
               @if(isset($deal) && in_array($key, $dealCategories)) checked @endif>
        <label class="form-check-label" for="category_{{$key}}">{{$title}}</label>
        </div>
        @endforeach
</div>
<div class="form-group mb-3">
    <label  for="merchant">Merchant</label>
    <select id="merchant" class="form-select" name="merchant_id">
        @isset($deal)
            <option value="{{$deal->merchant->id}}" selected>{{$deal->merchant->name}}</option>
        @endisset
        <option></option>
            @foreach($merchants as $merchant)
                <option value="{{$merchant->id}}">{{$merchant->name}}</option>
            @endforeach
    </select>
</div>

@isset($deal)
    <div class="form-group mb-3">
        <label  for="merchant">Deal </label>
        <select id="merchant" class="form-select" name="status">
                <option value="{{$deal->status}}" selected>{{$deal->status}}</option>
                <option></option>
                <option value="Valid">Valid</option>
                <option value="Expired">Expired</option>
                <option value="Deleted">Deleted</option>
        </select>
    </div>
    @endisset

<div class="form-group mb-3">
    <label for="start_at">Valid date start: @isset($deal->start_at)<br><span> current date <b>{{$deal->start_at}}</b></span>@endisset</label>
    <input type="date" name="start_at" class="form-control" placeholder="start at" @isset($deal) value={{$deal->start_at}} @endisset>
</div>
<div class="form-group mb-3">
    <label for="end_at">Valid date end: @isset($deal->end_at)<br><span> current date <b>{{$deal->end_at}}</b></span>@endisset</label>
    <input type="date" name="end_at" class="form-control" placeholder="end at" @isset($deal) value={{$deal->end_at}}@endisset>
</div>
<div class="form-group mb-3">
    <input type="text" name="date" class="form-control" placeholder="the date of the deal" @isset($deal) value={{$deal->date}}@endisset>
</div>
<div class="form-group mb-3">
    <input type="text" name="retails_price" class="form-control" placeholder="retails_price" @isset($deal) value="{{$deal->retails_price}}"@endisset>
</div>
<div class="form-group mb-3">
    <input type="number" step="any" min="0" name="price" class="form-control" placeholder="price" @isset($deal) value="{{$deal->price}}"@endisset required>
</div>

<div class="form-group mb-3">
    <label  for="description_editor">Description</label>
    <textarea type="textarea" id="description_editor" name="description" class="form-control" placeholder="description" >@isset($deal) {{$deal->description}}@endisset</textarea>
</div>
<div class="form-group mb-3">
    <label  for="more_info_editor">More information</label>
    <textarea type="textarea" id="more_info_editor" name="more_info" class="form-control" placeholder="More info" >@isset($deal) {{$deal->more_info}}@endisset</textarea>
</div>
<div class="form-group mb-3">
    <label class="form-label" for="location_editor">Location</label>
    <textarea type="textarea" id="location_editor" name="location" class="form-control" placeholder="location" >@isset($deal) {{$deal->location}}@endisset</textarea>
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
        <img src="{{asset('uploads/deals_pics/'.$deal->pic3)}}"  width="480px" height="auto" >
    @endisset
</div>
<button type="submit" class="MainButt btn mt-2">{{$submitText}}</button>

<script>
    ClassicEditor
        .create( document.querySelector( '#description_editor' ))
        .catch( error => {
            console.error( error );
        } );

    ClassicEditor
        .create( document.querySelector( '#more_info_editor' ) ,
        )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#location_editor' ) )
        .catch( error => {
            console.error( error );
        } );

</script>
