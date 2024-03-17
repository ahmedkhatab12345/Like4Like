<?php

namespace App\Http\Controllers\API\Website;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class ProfitSiteController extends Controller
{
    public function index()
    {
        $withdrawals = Withdrawal::all();
        return response()->json($withdrawals);
    }
}