<table class="table table-bordered table-">
    <tr class="myTable-h">
        <th>ID</th>
        <th>Deal title</th>
        <th>Merchant</th>
        <th>start at</th>
        <th>end at</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach($DealsStatus as $deal)
        <tr class="myTable-r">
            <td>
                {{$deal->id}}
            </td>
            <td data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}" >
                {{$deal->title}}
            </td>
            <td>
                <b>{{$deal->merchant->name ?? "Deleted Merchant"}}</b>
            </td>
            <td>
                {{$deal->start_at}}
            </td>
            <td>
                {{$deal->end_at}}
            </td>
            <td>
                {{$deal->status}}
            </td>
            <td class="px-5">
                <div class="row">
                    <a class="col-6 MainButt btn" href="{{route('deals.edit',$deal)}}">Edit</a>

                    <form class="col-6" method='post' action="{{route('deals.destroy', $deal)}}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want delete ({{$deal->title}}) ?')" >Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @include('popups.showDeal', $deal)
    @endforeach
</table>
