<?php

namespace App\Http\Livewire\admin_dashboard;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class OrdersTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search;
    public $status='';
    public $orderBy = 'id';
    public $orderAsc = false;


    public function render()
    {
        return view('dashboards.admin_dashboard_tabs.orders',
            ['orders'=>Order::
        search($this->search)
            ->where('status', 'like', '%'.$this->status.'%')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->Paginate($this->perPage)]);
    }

}
