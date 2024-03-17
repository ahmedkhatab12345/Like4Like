<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\Subscription;
use App\Models\Work;
use App\Models\Setting;
use Illuminate\Http\Request;
class SiteController extends Controller
{
    public function index()
    {
        $subscription = Subscription::all();
        $settings = Setting::firstOrFail();
        return view('webSite.index',compact('subscription','settings'));
    }
    
    public function welcom()
    {
        return view('webSite.welcom');
    }

    

    

}
