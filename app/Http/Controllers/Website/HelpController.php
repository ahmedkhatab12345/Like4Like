<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class HelpController extends Controller
{
    public function index(){
        $settings = Setting::firstOrFail();
        return view('webSite.help.help',compact('settings'));
    }
}
