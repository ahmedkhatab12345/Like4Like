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
        $works = Work::all();
        return view('webSite.work.facebook');
    }

    public function youtube(){
        $works = Work::all();
        return view('webSite.work.youtube');
    }
}
