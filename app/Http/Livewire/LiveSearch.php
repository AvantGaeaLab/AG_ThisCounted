<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Deal;
use Livewire\Component;

class LiveSearch extends Component
{
    public $search;
    public $selectedCat = '';

    public function render()
    {
        $categories = Category::all();
        $search = $this->search;

        $searchDeals =
            Deal::
                where("title", "like", "%".$search."%")
                ->orwhere("description", "like", "%".$search."%")
                ->orwhere("location", "like", "%".$search."%")
                ->orwhereHas('merchant', function ($query) use ($search) {
                    $query->where('name', 'like', "%".$search."%");})
                ->orwhereHas('categories', function ($query) use ($search) {
                    $query->where('title', 'like', "%".$search."%");})
                ->ValidDeal()->get();

        return view('livewire.live-search',
        compact('categories', 'searchDeals'));
    }
}
