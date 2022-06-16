<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    //Deals favorites
    public function store(Request $request)
    {
        if (!auth()->user()->favoriteHas(request('dealId'))) {
            auth()->user()->dealsFavorite()->attach(request('dealId'));
            return redirect()->back()->with('status', 'The Deal in the favorite list');
        }
    }
    public function destroy(){
        auth()->user()->dealsFavorite()->detach(request('dealId'));
    }

    //Merchant
    public function MerStore(Request $request)
    {
        if (!auth()->user()->merchantFavoriteHas(request('merchantId'))) {
            auth()->user()->merchantsFavorite()->attach(request('merchantId'));
            return redirect()->back()->with('status', 'The Merchant in the favorite list');
        }
    }
    public function MerDestroy(){
        auth()->user()->merchantsFavorite()->detach(request('merchantId'));
    }

    public function show(){
        $deals =auth()->user()
            ->dealsFavorite()
            ->latest()
            ->get();
        $merchants =auth()->user()
            ->merchantsFavorite()
            ->latest()
            ->get();
        return view('pages.favorite',compact('deals','merchants'));
    }
}
