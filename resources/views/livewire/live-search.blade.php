<div>

    <!-- The checkboxes field
                <div style="font-size:24px; background-color: #c7c6c1; border-radius:6px; padding:20px" class="form-group mb-3">
                    <form>
                    @foreach($categories as $category)
                        <input wire:model="selectedCat"  class="form-check-input level-checked" id="category_{{$category->id}}" type="checkbox" name="selectedCat" value="{{$category->id}}">
                        <label for="category_{{$category->id}}">{{$category->title}} |</label>
                    @endforeach
                    </form>
                    <br>
                </div>
            <br> -->
            @forelse($searchDeals as $deal)
                @include('deals.index')
            @empty
                <br>
                <h4> Sorry, your search "{{$search}}" did not match any deals. Please try again.</h4>
            @endforelse

            @foreach($searchDeals as $deal)
                @include('popups.showDeal')
            @endforeach
        </div>
        @include('components.addFavoritejs')
</div>
