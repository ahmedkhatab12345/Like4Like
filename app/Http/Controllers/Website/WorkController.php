<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    public function index(){
        $works = Work::all();
        return view('webSite.work.index',compact('works'));
    }

    public function facebook(){
        $works = Work::where(['type'=>'facebook'])->get();
        return view('webSite.work.facebook',compact('works'));
    }

    public function youtube(){
        $works = Work::where(['type'=>'youtube'])->get();
        return view('webSite.work.youtube',compact('works'));
    }
}
