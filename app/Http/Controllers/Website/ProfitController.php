<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('webSite.profit.index');
    }
}
