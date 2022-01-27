<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Deal;
use App\Models\Merchant;
use Illuminate\Http\Request;
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
        $lastDeals = Deal::take(7)->orderBy('id', 'DESC')->get();
        $foodCat = Category::find(1);
        $drinksCat = Category::find(2);
        $studentsCat = Category::find(6);

        return view('welcome', compact(
            'lastDeals',
            'foodCat',
            'drinksCat',
            'studentsCat',
            'favDeals'));
    }

}
