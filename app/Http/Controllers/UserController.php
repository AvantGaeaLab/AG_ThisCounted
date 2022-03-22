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

    public function resetPassword(Request $request){
        $request->validate([
           'current_password' => 'required|min:8|max:100',
           'new_password' => 'required|min:8|max:100',
           'confirm_password' => 'required|same:new_password',
        ]);

        $current_user = auth()->user();

        if(Hash::check($request->current_password, $current_user->password)){
            $current_user->update([
                'password'=>bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('status','Password updated successfully');
        }else{
            return redirect()->back()->with('error','current password does not match');
        }
    }
}
