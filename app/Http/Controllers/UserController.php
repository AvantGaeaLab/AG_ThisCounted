<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'catDeals','search');
    }

    public function UserUpdate(Request $request){
        if(Auth::id() > 3){
            return abort(401);
        }
        $user = User::find($request->id);
        if (isset($request->password)){
        $user->password = Hash::make($request->password);
        }
        $user->update($request->except('password'));
        return redirect()->back()->with('status','User Updated Successfully');
    }
}
