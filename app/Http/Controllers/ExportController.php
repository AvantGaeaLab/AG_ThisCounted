<?php

namespace App\Http\Controllers;

use App\Exports\DealsExport;
use App\Exports\MerchantsExport;
use App\Exports\OrdersExport;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'catDeals','search');
    }

    public function UsersExport(){
        if (Auth::id() > 3) {
            return abort(401);}

        return (new UserExport())->download('ThisCounted Users '.date('Y-m-d').'.xlsx');
    }

    public function DealsExport(){
        if (Auth::id() > 3) {
            return abort(401);}

        return (new DealsExport())->download('ThisCounted Deals '.date('Y-m-d').'.xlsx');
    }

    public function OrdersExport(){
        if (Auth::id() > 3) {
            return abort(401);}

        return (new OrdersExport())->download('ThisCounted Orders '.date('Y-m-d').'.xlsx');
    }

    public function MerchantsExport(){
        if (Auth::id() > 3) {
            return abort(401);}

        return (new MerchantsExport())->download('ThisCounted Merchants '.date('Y-m-d').'.xlsx');
    }
}
