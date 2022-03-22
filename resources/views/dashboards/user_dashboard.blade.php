@extends('layouts.app')
@section('title', __('User dashboard'))
@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            <h4>{{session('orderTitle')}}</h4>
            <h4 class="alert-heading">{{session('status')}}  <i class="bi bi-check-circle"></i></h4>
            <hr>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger " role="alert">
            <h4 class="alert-heading">{{session('error')}}</h4>
            <p></p>
            <hr>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="content">
        <h1 class="s-b-sm">User dashboard</h1>

        <nav>
            <div class="tabsContainer-favList nav nav-tabs" id="nav-tab" role="tablist">
                <button class="myTab nav-link active" id="nav-orders-tab" data-bs-toggle="tab" data-bs-target="#nav-orders" type="button" role="tab" aria-controls="nav-orders" aria-selected="true">Orders</button>
                <button class="myTab nav-link" id="nav-user_info-tab" data-bs-toggle="tab" data-bs-target="#nav-user_info" type="button" role="tab" aria-controls="nav-user_info" aria-selected="true">User information</button>
            </div>
        </nav>
        <!-- orders Tab -->
        <div class="tab-content" id="nav-tabContent">
            <br>
            <!-- orders Tab -->
            <div class="tab-pane fade show active" id="nav-orders" role="tabpanel" aria-labelledby="nav-orders-tab">
                <h3>Orders</h3>
                @include('dashboards.user_dashboard_tabs.orders')
            </div>

            <!-- user info Tab -->
            <div class="tab-pane fade" id="nav-user_info" role="tabpanel" aria-labelledby="nav-user_info-tab">
                <h3>User information</h3>
                @include('dashboards.user_dashboard_tabs.userInfo')
            </div>
        </div>


    </div>

@endsection
