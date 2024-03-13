<?php

namespace App\Http\Controllers\API\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Help extends Controller
{
    public function index(Request $request){
        return response()->json([
            'message' => 'Welcome to the help API.'
        ]);
    }
}
