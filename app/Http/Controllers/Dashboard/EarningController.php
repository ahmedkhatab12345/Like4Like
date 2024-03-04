<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Earning;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class EarningController extends Controller
{
    
    public function index(){
        $chart_options = [
            'chart_title' => 'Earning by day',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Earning',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);
        
        return view('dashboard.earnings.index', compact('chart1'));
    }
}
