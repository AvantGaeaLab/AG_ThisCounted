<!-- Deals list table -->

<!--add new deal -->
<button class="MainButt btn m-2" data-bs-toggle="modal" data-bs-target="#dealModal" >New deal</button>
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

<div class="content">
    <ul class="nav nav-tabs tabsContainer" id="myTab" role="tablist" >
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="Valid-tab" data-bs-toggle="tab" data-bs-target="#Valid" type="button" role="tab" aria-controls="Valid" aria-selected="true">Valid deals</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="Expired-tab" data-bs-toggle="tab" data-bs-target="#Expired" type="button" role="tab" aria-controls="Expired" aria-selected="false">Expired deals</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="Deleted-tab" data-bs-toggle="tab" data-bs-target="#Deleted" type="button" role="tab" aria-controls="Deleted" aria-selected="false">Deleted deals</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Valid" role="tabpanel" aria-labelledby="Valid-tab">
            <!-- Valid Deals -->
            @include('dashboards.admin_dashboard_tabs.deals_table', $DealsStatus = $validDeals)
        </div>
        <div class="tab-pane fade" id="Expired" role="tabpanel" aria-labelledby="profile-tab">
            <!-- Expired  Deals -->
            @include('dashboards.admin_dashboard_tabs.deals_table', $DealsStatus = $expiredDeals)
        </div>
        <div class="tab-pane fade" id="Deleted" role="tabpanel" aria-labelledby="contact-tab">
            <!-- Deleted Deals -->
            @include('dashboards.admin_dashboard_tabs.deals_table', $DealsStatus = $deletedDeals)
        </div>
    </div>
</div>
