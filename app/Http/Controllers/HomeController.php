<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Support\Facades\Auth;


use App\Category;
use App\Deal;
use App\Merchant;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

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
        return view('admin_dashboard', compact(
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
