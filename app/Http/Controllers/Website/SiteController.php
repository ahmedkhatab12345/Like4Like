<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\Subscription;
use App\Models\Work;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
class SiteController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $settings = Setting::firstOrFail();
        $customerId = auth('customer')->id();
        $subscription = Subscription::where('customer_id', $customerId)->firstOrFail();
        return view('webSite.index',compact('subscription','settings','sliders'));
    }
    
    public function welcom()
    {
        return view('webSite.welcom');
    }

    

    

}
