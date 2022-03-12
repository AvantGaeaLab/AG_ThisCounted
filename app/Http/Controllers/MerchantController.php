<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MerchantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('merDeals');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::id() > 3){
            return abort(401);
        }

        $merchant = new Merchant;
        $merchant->name = $request->name;
        if($request->hasFile('merchant_logo')) {
            $file = $request->file('merchant_logo');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/merchants_logo', $filename);
            $merchant->merchant_logo = $filename;
        }
        $merchant->save();
        return redirect()-> back()->with('status','Merchant Added Successfully');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchant $merchant)
    {
        if(Auth::id() > 3){
            return abort(401);
        }

        $merchant->name = $request->name;
        if($request->hasFile('merchant_logo')) {
            $destination = 'uploads/merchants_logo/'.$merchant->merchant_logo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('merchant_logo');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/merchants_logo', $filename);
            $merchant->merchant_logo = $filename;
        }
        $merchant->update();

        return redirect()->back()->with('status','Merchant Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        if(Auth::id() > 3){
            return abort(401);
        }
        if($merchant->deals->count() > 0){
        foreach($merchant->deals as $Dealsstatus)
            $Dealsstatus->status = "Deleted";
        $Dealsstatus->update();
        }
        $merchant->delete();
        return redirect()->back()->with('status','The Merchant Deleted Successfully');
    }

    public function merDeals( Merchant $merchant){
        $merchantDeals = $merchant->deals->where('status', 'Valid');
        return view('pages.merchantDeals', compact('merchant','merchantDeals'));
    }
}
