<?php

namespace App\Http\Controllers;

use App\Category;
use App\Deal;
use App\Merchant;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class pageController extends Controller
{


    public function index(){

        if(auth::user()){
        $favDeals = auth()->user()->dealsFavorite()->latest()->get();
        }
        $lastDeals = Deal::take(7)->orderBy('id', 'DESC')->get();
        $foodCat = Category::find(1);
        $drinksCat = Category::find(2);
        $studentsCat = Category::find(6);
        $deals =Deal::all();
        $merchants = Merchant::all();
        $categories = Category::all();

        return view('welcome', compact(
            'lastDeals',
            'foodCat',
            'drinksCat',
            'studentsCat',
            'merchants',
            'categories',
            'deals',
            'favDeals'));
    }

    public function about(Request $request){
        $username = $request->session()->get('username','Friend!');
        return view ('about', ['username' => $username]);
    }

    public function contact(){
        return view ('contact');
    }

    public function storeContact(Request $request){
        $request -> validate([
            'senderName' => 'required|min:1|max:25',
            'message' => 'required|min:1|max:25'
        ]);

       $request -> session()->put('username', $request->senderName);
        return redirect()-> back();
    }

    public function clear(Request $request){
       $request -> session()->forget('username');
        return redirect()-> back();
    }
}
