<?php

namespace App\Http\Controllers\API\Website;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProfitSiteController extends Controller
{
    public function index()
    {
        $withdrawals = Customer::all();
        return response()->json($withdrawals);
    }
}