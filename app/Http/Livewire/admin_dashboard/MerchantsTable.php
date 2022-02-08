<?php

namespace App\Http\Livewire\admin_dashboard;

use App\Models\Merchant;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class MerchantsTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;
    public $search;
    public $orderBy = 'id';
    public $orderAsc = false;

    public function render()
    {
        return view('dashboards.admin_dashboard_tabs.merchants',
            ['merchants'=>Merchant::search($this->search)
                ->with('deals')
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->Paginate($this->perPage)
            ]);
    }

}
