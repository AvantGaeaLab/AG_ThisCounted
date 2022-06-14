<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Deal;
use App\Models\Merchant;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show', 'catDeals');
    }

    public function isAdmin(){
        isAdmin();
    }

    public function user_dashboard(){
        $order = Order::where('user_id', Auth::id())->latest()->get();;
        return view('dashboards/user_dashboard', compact('order'));
    }

    public function admin_dashboard(Request $request, Deal $deal){
        $this->isAdmin();

        $categories = Category::all()->pluck('title', 'id');

        return view('dashboards/admin_dashboard', compact(
            'categories',
        ));
    }


}
