@extends('layouts.app')

@section('title', __('Admin dashboard'))
@section('content')
    @csrf
    <div class="content">

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
                <!-- Deals Tab -->
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-Deals" role="tabpanel" aria-labelledby="nav-Deals-tab">
                    @livewire('admin_dashboard.deals-table')
                </div>

                <!-- Users Tab -->
                <div class="tab-pane fade" id="nav-Users" role="tabpanel" aria-labelledby="nav-Users-tab">
                    <h3>Users list</h3>
                    @livewire('admin_dashboard.users-table')
                </div>

                <!-- Orders Tab -->
                <div class="tab-pane fade" id="nav-orders" role="tabpanel" aria-labelledby="nav-orders-tab">
                    <h3>Orders list</h3>
                    @livewire('admin_dashboard.orders-table')
                </div>

                <!--Merchant Tab-->
                <div class="tab-pane fade" id="nav-merchants" role="tabpanel" aria-labelledby="nav-merchants-tab"><!--list of merchants -->
                    @livewire('admin_dashboard.merchants-table')
                </div>
                <!--Categories Tab -->
                <div class="tab-pane fade" id="nav-categories" role="tabpanel" aria-labelledby="nav-categories-tab">
                    @include('dashboards.admin_dashboard_tabs.categories')
                </div>
        </div>
    </div>
    @livewireScripts
@endsection
