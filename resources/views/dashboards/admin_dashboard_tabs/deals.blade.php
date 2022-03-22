<div>
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
<div class="modal fade" id="dealModal" tabindex="-1" aria-labelledby="dealModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dealModalLabel">Add new Deal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('deals.store')}}"  method="POST" enctype="multipart/form-data">
                    @include('deals._form',['submitText'=>'Create'])
                </form>
            </div>
        </div>
    </div>
</div>
<!--END add new deal -->

<!--Deals list table -->
<h3>Deals list</h3>
    <a class="btn MainButt" href="{{route('DealsExport')}}">Download Deals list</a>
    <button class="MainButt btn m-2" data-bs-toggle="modal" data-bs-target="#dealModal" >New deal</button>
    <div class="m-2" style="display: inline-block">
                <input wire:model.debounce.100ms="search" type="text" class=" appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Search deals...">
                <select wire:model="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option value="">All</option>
                    <option value="Valid">Valid</option>
                    <option value="Expired">Expired</option>
                    <option value="Deleted">Deleted</option>
                </select>
                <select wire:model="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option value="0">Descending</option>
                    <option value="1">Ascending</option>
                </select>
                <select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
            </div>

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
                @foreach($deals as $deal)
                    <tbody>
                    <tr>
                        <td class="admin-deal-td td-fullTable">
                            {{$deal->id}}
                        </td >
                        <td class="myTitle_column admin-deal-td td-fullTable" data-bs-toggle="modal" data-bs-target="#dealModal{{$deal->id}}" >
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
            <div  style="font-size: 24px;margin-top:18px; padding-left:45%;">
                {!! $deals->links() !!}
            </div>
    </div>
