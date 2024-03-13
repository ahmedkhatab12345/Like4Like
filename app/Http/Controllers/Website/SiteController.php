<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\Subscription;
use App\Models\Work;
use Illuminate\Http\Request;
class SiteController extends Controller
{
    public function index()
    {
        $subscription = Subscription::all();
        return view('webSite.index',compact('subscription'));
    }
    
    public function welcom()
    {
        return view('webSite.welcom');
    }

    

    

}
