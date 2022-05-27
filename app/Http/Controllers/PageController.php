<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Deal;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // for now this is the home page
    public function mainPage(){
        if(auth::user()){
            $favDeals = auth()->user()->dealsFavorite()->latest()->get();
        }else{
            $favDeals=null;
        }
        $foodCatId = 1;
        $drinkCatId = 2;
        $studentsCatId = 6;

        $lastDeals = Deal::take(7)->where('status', 'Valid')->orderBy('id', 'DESC')->get();

        $foodCat = Deal::whereHas('categories', function ($query) use($foodCatId) {
            $query->where('id', $foodCatId)->where('status', 'Valid');
        })->take(7)->get();

        $drinksCat = Deal::whereHas('categories', function ($query) use($drinkCatId) {
            $query->where('id', $drinkCatId)->where('status', 'Valid');
        })->take(7)->get();

        $studentsCat = Deal::whereHas('categories', function ($query) use($studentsCatId) {
            $query->where('id', $studentsCatId)->where('status', 'Valid');
        })->take(7)->get();


        return view('welcome', compact(
            'lastDeals',
            'foodCat',
            'drinksCat',
            'studentsCat',
            'favDeals'));
    }

    public function foodPage(){

        $foodDeals= Deal::findCat(1)->ValidDeal()->latest()->get();

        $lastDeals = $foodDeals->take(7);

        $foodUnder10Deals = Deal::findCat(1)->findCat(3)->ValidDeal()->get();

        $foodUnder20Deals = Deal::findCat(1)->findCat(4)->ValidDeal()->get();

        $SnacksAndDesserts = Deal::findCat(5)->ValidDeal()->get();

        return view('pages.categories.foodCat',compact(
            'lastDeals',
            'foodDeals',
            'SnacksAndDesserts',
            'foodUnder10Deals',
            'foodUnder20Deals'));
    }

    public function activitiesPage(){
        $lastDeals = Deal::whereRelation('categories', 'id' , 7)
            ->where('status', 'Valid')->latest()->take(7)->get();

        $Indoor=  Deal::whereRelation('categories', 'id' , 8)
            ->where('status', 'Valid')->latest()->get();

        $Outdoor =  Deal::whereRelation('categories', 'id' , 9)
            ->where('status', 'Valid')->latest()->get();

        return view('pages.categories.activitiesCat',
            compact(
            'lastDeals',
            'Indoor',
            'Outdoor'));
    }

    public function policy(){
        return view('pages.policy');
    }
}
