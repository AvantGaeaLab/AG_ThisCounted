<?php

namespace App\Http\Livewire\admin_dashboard;

use App\Models\Category;
use App\Models\Deal;
use App\Models\Merchant;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class DealsTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search;
    public $status="";
    public $orderBy = 'id';
    public $orderAsc = false;


    public function render()
    {
        $merchants = Merchant::all();
        $categories = Category::all()->pluck('title', 'id');

        return view('dashboards.admin_dashboard_tabs.deals',
            ['deals'=>Deal::
                search($this->search)
                ->where('status', 'like', '%'.$this->status.'%')
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->Paginate($this->perPage)],
            compact('merchants','categories'));
    }
}
