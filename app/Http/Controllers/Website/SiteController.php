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
        return view('webSite.index',compact('sliders'));
    }
    
    public function welcom()
    {
        return view('webSite.welcom');
    }

    

    

}
