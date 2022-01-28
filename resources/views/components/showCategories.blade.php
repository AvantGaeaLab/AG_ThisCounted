@foreach($deal->categories as $category)
    <span>
            - <a href="{{route('categories.deals',$category->id)}}" target="_blank">
                {{$category->title}}
            </a>
        </span>
@endforeach
