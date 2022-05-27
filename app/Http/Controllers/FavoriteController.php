<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    //Deals favorites
    public function store()
    {
        if (!auth()->user()->favoriteHas(request('dealId'))) {
            auth()->user()->dealsFavorite()->attach(request('dealId'));
            return response()->json(['success' => true]);
        }
    }
    public function destroy(){
        auth()->user()->dealsFavorite()->detach(request('dealId'));
        return response()->json(['success' => true]);
    }

    //Merchant
    public function MerStore(Request $request)
    {
        if (!auth()->user()->merchantFavoriteHas(request('merchantId'))) {
            auth()->user()->merchantsFavorite()->attach(request('merchantId'));
            return response()->json(['success' => true]);
        }
    }
    public function MerDestroy(){
        auth()->user()->merchantsFavorite()->detach(request('merchantId'));
        return response()->json(['success' => true]);
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
