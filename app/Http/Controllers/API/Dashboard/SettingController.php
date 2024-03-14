<?php
namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
    $settings = Setting::firstOrFail(); 
    return response()->json($settings);
}

    public function update(Request $request)
    {
        $settings = Setting::firstOrFail(); 
        $settings->update($request->all());
        return response()->json(['message' => 'Settings updated successfully.'], 200);
    }
}
