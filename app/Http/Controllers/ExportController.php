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

    public function isAdmin(){
        isAdmin();
    }

    public function UsersExport(){
        $this->isAdmin();

        return (new UserExport())->download('ThisCounted Users '.date('Y-m-d').'.xlsx');
    }

    public function DealsExport(){
        $this->isAdmin();

        return (new DealsExport())->download('ThisCounted Deals '.date('Y-m-d').'.xlsx');
    }

    public function OrdersExport(){
        $this->isAdmin();

        return (new OrdersExport())->download('ThisCounted Orders '.date('Y-m-d').'.xlsx');
    }

    public function MerchantsExport(){
        $this->isAdmin();

        return (new MerchantsExport())->download('ThisCounted Merchants '.date('Y-m-d').'.xlsx');
    }
}
