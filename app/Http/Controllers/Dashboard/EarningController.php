<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;
use App\Models\Earning;
class EarningController extends Controller
{
    public function index(){
        $earnings = Earning::whereDate('date', today())->get(); // استعلام لجلب الأرباح اليومية
        $profitData = $earnings->pluck('daily_earning', 'date'); // جمع الأرباح مع التاريخ

        $chart = Charts::create('line', 'highcharts')
            ->title('Daily Profits')
            ->elementLabel('Profit')
            ->labels($profitData->keys())
            ->values($profitData->values())
            ->dimensions(1000, 500)
            ->responsive(true);

        return view('dashboard.earnings.index', ['chart' => $chart]);
    }
}
