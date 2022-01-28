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

        $lastDeals = Deal::take(7)->orderBy('id', 'DESC')->get();

        $foodCat = Deal::whereHas('categories', function ($query) use($foodCatId) {
            $query->where('id', $foodCatId);
        })->take(7)->get();

        $drinksCat = Deal::whereHas('categories', function ($query) use($drinkCatId) {
            $query->where('id', $drinkCatId);
        })->take(7)->get();
        $studentsCat = Deal::whereHas('categories', function ($query) use($studentsCatId) {
            $query->where('id', $studentsCatId);
        })->take(7)->get();


        return view('welcome', compact(
            'lastDeals',
            'foodCat',
            'drinksCat',
            'studentsCat',
            'favDeals'));
    }

    public function foodPage(){
        $categoryId = 1;
        $foodUnder10Id= [1,3];

        $lastDeals = Deal::whereHas('categories', function ($query) use($categoryId) {
            $query->where('id', $categoryId);
        })->take(7)->get();

        $foodDeals= Category::find(1);
        $SnacksAndDesserts = Category::find(5);

        /*
        $foodUnder10 = Deal::whereHas('categories', function ($query) use($foodUnder10Id) {
            $query->where('id', $foodUnder10Id);
        })->get();*/


        return view('pages.categories.foodCat',compact(
            'lastDeals',
            'foodDeals',
            'SnacksAndDesserts'));
    }

    public function activitiesPage(){
        $categoryId = 7;

        $lastDeals = Deal::whereHas('categories', function ($query) use($categoryId) {
            $query->where('id', $categoryId);
        })->take(7)->get();
        $Indoor= Category::find(8);
        $Outdoor = Category::find(9);

        return view('pages.categories.activitiesCat',compact(
            'lastDeals',
            'Indoor',
            'Outdoor'));
    }
}
