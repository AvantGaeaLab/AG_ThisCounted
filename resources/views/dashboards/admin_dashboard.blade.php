@extends('layouts.app')

@section('title', __('Admin dashboard'))
@section('content')
    @csrf
    <div class="content">

        @if (session('status'))
            <h6 class="alert alert-success">{{session('status')}}</h6>
            @endif

        <h1 class="s-b-sm">
            Admin dashboard
        </h1>

        <nav>
            <div class="tabsContainer nav nav-tabs" id="nav-tab" role="tablist">
                <button class="myTab nav-link active" id="nav-Deals-tab" data-bs-toggle="tab" data-bs-target="#nav-Deals" type="button" role="tab" aria-controls="nav-Deals" aria-selected="true">Deals</button>
                <button class="myTab nav-link" id="nav-Users-tab" data-bs-toggle="tab" data-bs-target="#nav-Users" type="button" role="tab" aria-controls="nav-Users" aria-selected="true">Users</button>
                <button class="myTab nav-link" id="nav-orders-tab" data-bs-toggle="tab" data-bs-target="#nav-orders" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Orders</button>
                <button class="myTab nav-link" id="nav-merchants-tab" data-bs-toggle="tab" data-bs-target="#nav-merchants" type="button" role="tab" aria-controls="nav-merchants" aria-selected="false">Merchants</button>
                <button class="myTab nav-link" id="nav-categories-tab" data-bs-toggle="tab" data-bs-target="#nav-categories" type="button" role="tab" aria-controls="nav-categories" aria-selected="false">Categories</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-Deals" role="tabpanel" aria-labelledby="nav-Deals-tab">
                @include('dashboards.admin_dashboard_tabs.deals')
            </div>

            <div class="tab-pane fade" id="nav-Users" role="tabpanel" aria-labelledby="nav-Users-tab">
                <!-- Users list table -->
                <h3>Users list</h3>

                <table class="table table-bordered table-">
                    <tr class="myTable-h">
                        <th>ID</th>
                        <th>username</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Orders count</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($users as $user)
                        <tr class="myTable-r">
                            <td>
                                {{$user->id}}
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{$user->phone_number}}
                            </td>
                            <td>
                                {{$user->orders->count()}}
                            </td>
                            <!-- Edit User -->
                            <td class="myTable-r">
                                <button class="MainButt btn" data-bs-toggle="modal" data-bs-target="#Edit">Edit</button>
                                <div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="EditDealModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h2><b>Coming soon :)</b></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <!-- END users list table -->
            </div>
            <!-- END users list table -->

            <div class="tab-pane fade" id="nav-orders" role="tabpanel" aria-labelledby="nav-orders-tab">
                <!-- Orders list -->
                <h3>Orders list</h3>

                <table class="table table-bordered ">
                    <tr class="myTable-h">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Merchant</th>
                        <th>Username </th>
                        <th>Email </th>
                        <th>Price</th>
                        <th>Purchase Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($orders as $order)
                        <tr class="myTable-r">
                            <td>
                                {{$order->id}}
                            </td>
                            @foreach($order->deals as $orderDeal)
                            <td>
                                {{$orderDeal->title}}</td>
                            <td>
                                <a class="merName" href="{{route('merchants.deals', $merchant=$orderDeal->merchant)}}" target="_blank"><b>
                                {{$orderDeal->merchant->name}}
                                    </b></a>
                            </td>
                            @endforeach
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->user->email}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->status}}</td>
                            <!-- Edit User -->
                            <td class="myTable-r">
                                <button class="MainButt btn" data-bs-toggle="modal" data-bs-target="#EditDeal{{$order->id}}">Edit</button>
                                <div class="modal fade" id="EditDeal{{$order->id}}" tabindex="-1" aria-labelledby="EditDealModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="EditDealModalLabel"> Edit Deal</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                    @include('forms._editOrder')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                </table>


            </div>
            <div class="tab-pane fade" id="nav-merchants" role="tabpanel" aria-labelledby="nav-merchants-tab">
                <!--add new Merchant -->
                <button class="MainButt btn m-2" data-bs-toggle="modal" data-bs-target="#merchantModal" >New merchant</button>
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
                <table class="table table-bordered ">
                    <tr class="myTable-h">
                        <th id="id">Logo</th>
                        <th id="title">Name</th>
                        <th id="title">Deals</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($merchants as $newMerchant)
                        <tr class="myTable-r">
                            <td>
                                <div >
                                    @isset($newMerchant->merchant_logo)
                                    <img class="myTable-img" src="{{asset('uploads/merchants_logo/'.$newMerchant->merchant_logo)}}"  width="480px" height="720px" >
                                        @endisset
                                </div>
                            </td>
                            <td>
                                <b><a class="merName" href="{{route('merchants.deals', $merchant=$newMerchant)}}" target="_blank">
                                        {{$newMerchant->name}}
                                    </a></b>
                            </td>
                            <td>
                                {{$newMerchant->deals->count()}}
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
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want delete ({{$newMerchant->name}}) ?')" >Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <!--list of merchants -->

            </div>
            <div class="tab-pane fade" id="nav-categories" role="tabpanel" aria-labelledby="nav-categories-tab">
                <!--add new Categories -->
                <button class="MainButt btn m-2" data-bs-toggle="modal" data-bs-target="#categoryModal" >New category</button>
                <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="categoryModalLabel">Add new category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('categories.store')}}"  method="post">
                                    @csrf
                                    <div class="form-group" >
                                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="MainButt btn">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END add new category -->
                <!-- category list table -->
                <h3>Categories list</h3>

                <table class="table table-bordered">
                    <tr class="myTable-h">
                        <th id="id">ID</th>
                        <th id="title">Title</th>
                        <th id="actions">Actions</th>
                    </tr>
                        @foreach($categories as $key => $title)
                        <tr class="myTable-r">
                            <td for="id">
                                {{$key}}
                            </td>
                            <td>
                                {{$title}}
                            </td>
                            <!-- Edit Category -->
                            <td>
                                <div class="row">
                                    <div class="col-6" >
                                <a class="btn MainButt" data-bs-toggle="modal" data-bs-target="#EditCategory{{$key}}">Edit</a>
                                    </div>
                                    <div class="modal fade" id="EditCategory{{$key}}" tabindex="-1" aria-labelledby="EditCategoryModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="EditCategoryModalLabel">Edit Category <br> {{$title}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('categories.update', $key)}}"  method="post">
                                                    @method('PATCH')
                                                    @csrf
                                                    <div class="form-group" >
                                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{$title}}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="MainButt btn">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Category -->
                                <form class="col-6" method='post' action="{{route('categories.destroy', $key)}}">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want delete ({{$title}}) ?')" >Delete</a>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <!-- END Category list table -->

            </div>

        </div>
        </div>
    </div>
@endsection
