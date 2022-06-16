@csrf
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<div class="form-group" >
    <input type="text" name="title" class="form-control mb-3" placeholder="Title" @isset($deal) value="{{$deal->title}}"@endisset value="{{ old('title') }}" required>
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
    <select id="merchant" class="form-select" name="merchant_id" required>
        @isset($deal)
            <option value="{{$deal->merchant->id ?? null}}" selected>{{$deal->merchant->name ?? "Deleted merchant"}}</option>
        @endisset
        <option></option>
            @foreach($merchants as $merchant)
                <option value="{{$merchant->id }}">{{$merchant->name}}</option>
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
    <input type="text" name="date" class="form-control" placeholder="the date of the deal" @isset($deal) value="{{$deal->date}}"@endisset  value="{{ old('date') }}">
</div>
<div class="form-group mb-3">
    <input type="text" name="retails_price" class="form-control" placeholder="retails_price" @isset($deal) value="{{$deal->retails_price}}"@endisset  value="{{ old('retails_price') }}">
</div>
<div class="form-group mb-3">
    <input type="number" step="any" min="0" name="price" class="form-control" placeholder="price" @isset($deal) value="{{$deal->price}}"@endisset  value="{{ old('price') }}" required>
</div>

<div class="form-group mb-3">
    <label  for="description_editor">Description</label>
    <textarea type="textarea" id="description_editor" name="description" class="form-control" placeholder="description" >@isset($deal) {{$deal->description}}@endisset  {{old('description')}} </textarea>
</div>
<div class="form-group mb-3">
    <label  for="more_info_editor">More information</label>
    <textarea type="textarea" id="more_info_editor" name="more_info" class="form-control" placeholder="More info" >@isset($deal) {{$deal->more_info}} @endisset {{old('more_info')}}</textarea>
</div>
<div class="form-group mb-3">
    <label class="form-label" for="location_editor">Location</label>
    <textarea type="textarea" id="location_editor" name="location" class="form-control" placeholder="Location" >@isset($deal) {{$deal->location}}@endisset {{old('location')}}</textarea>
</div>
<div class="form-group mb-3">
    <label  for="map">map</label>
    <input type="text" name="map" class="form-control" placeholder="Map" @isset($deal) value="{{$deal->map}}" @endisset  value="{{ old('map') }}">
    <a href="https://www.google.com/maps/@1.3488524,103.8733454,14.5z"
       target="popup"
       onclick="window.open('https://www.google.com/maps/@1.3488524,103.8733454,14.5z','popup','width=%90,height=auto'); return false;">
        Map search
    </a>
</div>

@empty($deal)
<div class="form-group mb-3">
    <label for=""> The main image </label>
    <input type="file" name="images[1]" class="form-control" required>
</div>
@endempty
<div class="form-group mb-3">
<label for=""> Extra images </label>
    <input type="file" name="images[]" class="form-control" multiple>
</div>

<button type="submit" class="MainButt btn mt-2">{{$submitText}}</button>
</form>

@isset($deal)
        <div class="mb-3" style="width: 50%; margin: 0 auto">
            @foreach($deal->images as $image)
                <div class="mt-3">
                <img class="img-thumbnail" src="{{asset('storage/uploads/deals_pics/'.$image->image)}}"  width=100% height="720px" alt="{{$deal->title.'Image'}}">
                    <!-- Update image button -->
                    <form action="{{route('update_image')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mt-1" style="display: flex; width: 100%;">
                        <input type="hidden" name="id" value="{{$image->id}}" >
                        <input type="hidden" name="deal_id" value="{{$deal->id}}" >
                        <input type="file" name="updateImage" class="form-control" required>
                        <button type="submit" class="MainButt btn mx-2">update</button>
                    </form>
                    <!-- Delete image button -->
                    @if($deal->images->count() > 1)
                    <form action="{{route('update_image')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{$image->id}}" >
                        <button type="submit" class="btn btn-danger " onclick="return confirm('Are you sure you want delete this image ?')">Delete</button>
                    </form>
                @endif
                </div>
        </div>
                @endforeach
@endisset

<!-- Checkbox required-->
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
