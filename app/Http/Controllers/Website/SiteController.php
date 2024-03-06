<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\Subscription;
use App\Models\Work;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use File;

class SiteController extends Controller
{
    use UploadTrait;
    
    public function welcom()
    {
        return view('webSite.welcom');
    }

    public function index()
    {
        $today = Carbon::today()->toDateString();
        $works = Work::whereDate('created_at', $today)->take(20)->get();
        return view('webSite.index', compact('works'));
    }

    

}
