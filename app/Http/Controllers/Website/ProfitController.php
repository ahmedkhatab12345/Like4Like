<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Customer_work;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class ProfitController extends Controller
{
    public function index()
    {
        $customerId = auth('customer')->id();
        $withdrawals = Customer::findOrFail($customerId);
        $today = Carbon::today();
        $daily_profit_count = Customer_work::where('customer_id',$customerId)->whereDate('updated_at', $today)->count();        
        return view('webSite.profit.index', compact('withdrawals','daily_profit_count'));
        
    }
}