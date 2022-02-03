<style>
    @media
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {
        .admin-deal-btns-td{ padding-left: 50px; padding-top: 6px;text-align: center}
    .admin-deal-td:nth-of-type(1):before { background-color: #ffce23; padding-inline:6px; font-weight: bold; content: "ID"; }
    .admin-deal-td:nth-of-type(2):before { font-weight: bold; content: "Deal title"; }
    .admin-deal-td:nth-of-type(3):before { font-weight: bold; content: "Merchant"; }
    .admin-deal-td:nth-of-type(4):before { font-weight: bold; content: "start at"; }
    .admin-deal-td:nth-of-type(5):before { font-weight: bold; content: "end at"; }
    .admin-deal-td:nth-of-type(6):before { font-weight: bold; content: "Status"; }
    }
</style>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Deal title</th>
        <th>Merchant</th>
        <th>start at</th>
        <th>end at</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    @foreach($DealsStatus as $deal)
        <tbody>
        <tr>
            <td class="admin-deal-td td-fullTable">
                {{$deal->id}}
            </td >
            <td class="admin-deal-td td-fullTable" data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}" >
                {{$deal->title}}
            </td>
            <td class="admin-deal-td td-fullTable">
                <b>{{$deal->merchant->name ?? "Deleted Merchant"}}</b>
            </td>
            <td class="admin-deal-td td-fullTable">
                {{$deal->start_at}}
            </td>
            <td class="admin-deal-td td-fullTable">
                {{$deal->end_at}}
            </td>
            <td class="admin-deal-td td-fullTable">
                {{$deal->status}}
            </td>
            <td class="admin-deal-btns-td px-5">
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
        </tbody>
        @include('popups.showDeal', $deal)
    @endforeach
</table>
