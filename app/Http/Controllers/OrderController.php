<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if($request->status != "Valid"){
            return redirect('/')->with('error', 'The deal is invalid');
        }

        $request->validate([
            'quantity' => 'min:1|max:50|required',
        ]);

        $user = Auth::user();
        $order = $user->orders()->create($request->except( 'deals'));
        $order->quantity = $request->quantity;
        $order->deals()->attach($request->deal_id);
        $order->total = $request->price*$request->quantity;

        $order->save();

        return redirect('user_dashboard')->with('status', 'the order added successfully');
    }

    public function CheckOrder(Request $request, Order $item)
    {
        if($request->inputPass == "1122"){
            $order = Order::where('id', $request->order_id)->first();
            if($order->used < $order->quantity) {
                $order->used++;
                if($order->used >= $order->quantity) {$order['status']='Used';}
                $order->update();
                return redirect('user_dashboard')->with('status', 'The order is Redemmed')->with('orderTitle', $request->order_title);
            }else{
                return redirect('user_dashboard')->with('error', 'The code is Expire');
            }
        }else{
            return redirect('user_dashboard')->with('error', 'The code is Wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if(Auth::id() > 3){
            return abort(401);
        }
        $order->update($request->all());
        return redirect()->back()->with('status','Order Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if(Auth::id() > 3){
            return abort(401);
        }
        $order->delete();
        return redirect()->back()->with('status','The Order Deleted Successfully');
    }
}
