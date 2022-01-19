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
    public function user_dashboard(){
        $order = Order::where('user_id', Auth::id())->get();;
        return view('dashboards/user_dashboard', compact('order'));
    }

    public function admin_dashboard(Request $request, Deal $deal){
        if(Auth::id() > 3){
            return abort(401);
        }
        $orders = Order::all();
        $deals=Deal::all();
        $users=User::all();
        $merchants = Merchant::all();
        $categories = Category::all()->pluck('title', 'id');

        $dealCategories = $deal->categories()->pluck('id')->toArray();
        $dealMerchants = $deal->merchants()->pluck('name', 'id')->toArray();
        return view('dashboards/admin_dashboard', compact(
            'users',
            'categories',
            'merchants',
            'deals',
            'orders',
            'dealMerchants',
            'dealCategories'

        ));
    }


}
