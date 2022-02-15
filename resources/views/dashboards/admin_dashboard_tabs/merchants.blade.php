<div>
<div class="modal fade" id="merchantModal" tabindex="-1" aria-labelledby="merchantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="merchantModalLabel">Add new merchant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('merchants.store')}}"  method="post" enctype="multipart/form-data">
                    @include('forms.newMerchantForm')
                </form>
            </div>
        </div>
    </div>
</div>
<!--END add new merchant -->
<!--list of merchants -->
<h3>Merchants list</h3>
    <!-- Search Field -->
    <a class="btn MainButt" href="{{route('MerchantsExport')}}">Download merchants list</a>
    <button class="MainButt btn m-2" data-bs-toggle="modal" data-bs-target="#merchantModal" >New merchant</button>

    <div class="mb-2" style="display: inline-block">
        <input wire:model.debounce.100ms="search" type="text" class=" appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Search merchant...">
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
    <!--END Search Field -->

    <table>
    <thead>
    <tr>
        <th>Logo</th>
        <th>Name</th>
        <th>Deals</th>
        <th>Actions</th>
    </tr>
    </thead>
    @foreach($merchants as $newMerchant)
        <tbody>
        <tr>
            <td>
                <div >
                    @isset($newMerchant->merchant_logo)
                        <img class="myTable-img" src="{{asset('uploads/merchants_logo/'.$newMerchant->merchant_logo)}}"  width="auto" height="720px" >
                    @endisset
                </div>
            </td>
            <td>
                <b><a class="merName" href="{{route('merchants.deals', $merchant=$newMerchant)}}" target="_blank">
                        {{$newMerchant->name}}
                    </a></b>
            </td>
            <td>
                {{$newMerchant->deals->where('status', 'Valid')->count()}}
            </td>
            <!-- Edit Merchant -->
            <td>
                <button class="MainButt btn m-2" data-bs-toggle="modal" data-bs-target="#EditMerchant{{$newMerchant->id}}">Edit</button>
                <div class="modal fade" id="EditMerchant{{$newMerchant->id}}" tabindex="-1" aria-labelledby="EditMerchantModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="EditMerchantModalLabel">Edit Merchant <br> {{$newMerchant->name}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('merchants.update', $merchant)}}"  method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    @include('forms.newMerchantForm')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Merchant-->
                <form method='post' action="{{route('merchants.destroy', $newMerchant)}}">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want delete all deals from ({{$newMerchant->name}}) ?')" >Delete deals</button>
                </form>

            </td>
        </tr>
        </tbody>
    @endforeach
</table>
    <div  style="font-size: 24px;margin-top:18px; padding-left:45%;">
    </div>
    {!! $merchants->links() !!}
</div>
