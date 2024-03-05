<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Profit;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function index()
    {
        $profits = Profit::all();
        return view('webSite.profits.index',compact('profits'));
    }
}
