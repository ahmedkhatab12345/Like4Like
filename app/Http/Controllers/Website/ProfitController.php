<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function index()
    {
        $withdrawals = Withdrawal::all();
        return view('webSite.profit.index');
    }
}
