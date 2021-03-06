<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MerchantController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('merDeals');
    }

    public function isAdmin(){
        isAdmin();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->isAdmin();

        $request->validate([
            'name' => 'min:2|max:50|required|unique:merchants,name',
            'merchant_logo'=>'max:2000',
        ]);

        $merchant = new Merchant;
        $merchant->name = $request->name;
        if($request->hasFile('merchant_logo')) {
            $file = $request->file('merchant_logo');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->storeAs('uploads/merchants_logo', $filename, 'public');
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
        $this->isAdmin();

        $request->validate([
            'name' => 'min:2|max:50|required|unique:merchants,name,'.$merchant->id,
            'merchant_logo'=>'max:2000',
        ]);
        $merchant->name = $request->name;
        if($request->hasFile('merchant_logo')) {
            $destination = 'storage/uploads/merchants_logo/'.$merchant->merchant_logo;
            if(File::exists($destination)){
                Storage::delete($destination);
                File::delete($destination);
            }
            $file = $request->file('merchant_logo');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->storeAs('uploads/merchants_logo', $filename, 'public');
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
        $this->isAdmin();

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
