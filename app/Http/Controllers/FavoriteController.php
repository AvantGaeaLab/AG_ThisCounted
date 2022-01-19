<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        if (!auth()->user()->favoriteHas(request('dealId'))) {
            auth()->user()->dealsFavorite()->attach(request('dealId'));
            return redirect()->back()->with('status', 'The Deal in the favorite list');
        }
    }


    public function show(){
        $deals =auth()->user()
            ->dealsFavorite()
            ->latest()
            ->get();
        return view('favorite',compact('deals'));
    }

    public function destroy(){
        auth()->user()->dealsFavorite()->detach(request('dealId'));
    }
}
