<?php

namespace App\Http\Controllers;

use App\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class MerchantController extends Controller
{

    public function __construct(){
        $this->middleware('auth')-> except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  \App\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchant $merchant){
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
     * @param  \App\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        if(Auth::id() > 3){
            return abort(401);
        }

        $merchant->delete();
        return redirect()->back()->with('status','The Merchant Deleted Successfully');

    }
}
