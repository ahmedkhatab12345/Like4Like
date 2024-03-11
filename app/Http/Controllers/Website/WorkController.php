<?php

namespace App\Http\Controllers\Website;

use Illuminate\Support\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Link;
use App\Models\Screenshot;
use App\Models\Customer_work;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    use UploadTrait;

    public function index(){
        $works = Work::all();
        return view('webSite.work.index',compact('works'));
    }

    public function facebook()
    {
        
        $facebookLinks = Work::where('type', 'facebook')->where('status', '0')->take(5)->get();

        foreach ($facebookLinks as $link) {
        $link->status = '1'; 
        $link->save();
        $today = Carbon::today()->toDateString();
        $mylink = Customer_work::where('customer_id', auth()->user()->id)
            ->whereDate('updated_at', $today)
            ->count();
        
        if ($mylink > 0) {
            $mylink -= 1; 
        }
    }

        return view('website.work.facebook', compact('facebookLinks', 'mylink'));

    }

    public function executeTask(Request $request, $workId)
    {
        $customer = auth('customers')->user();
        $customer->work()->updateExistingPivot($workId, ['status' => 1]);

        return redirect()->back()->with('success', 'تم تنفيذ المهمة بنجاح.');
    }
    
}
