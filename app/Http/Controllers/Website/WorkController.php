<?php

namespace App\Http\Controllers\Website;

use Illuminate\Support\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Customer;
use App\Models\Screenshot;
use App\Models\Customer_work;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $works = Work::all();
        return view('webSite.work.index', compact('works'));
    }

    public function facebook()
    {
        $customer = Customer::find(auth()->guard('customer')->id());
        $todayDate=Carbon::today()->toDateString();
        $myWork = Customer_work::whereDate('created_at', $todayDate)->where('customer_id', auth()->guard('customer')->id())->pluck('work_id')->toArray();
        $facebookLinks = Work::where('type', 'facebook')
            ->where('status', '0')
            ->whereNotIn('id', $myWork)
            ->take(10 - $customer->like_count_facebook)
            ->get();
    
        return view('website.work.facebook', compact('facebookLinks'));
    }

    public function youtube()
    {
        $customer = Customer::find(auth()->guard('customer')->id());
        $todayDate = Carbon::today()->toDateString();
        
        // Fetch works created today for the customer
        $myYouTubeWork = Customer_work::whereDate('created_at', $todayDate)
            ->where('customer_id', auth()->guard('customer')->id())
            ->pluck('work_id')
            ->toArray();
        
        // Retrieve YouTube links excluding the ones already done today
        $youtubeLinks = Work::where('type', 'youtube')
            ->where('status', '0')
            ->whereNotIn('id', $myYouTubeWork)
            ->take(10 - $customer->like_count_youtube)
            ->get();
    
        return view('website.work.youtube', compact('youtubeLinks'));
    }

    public function executeTask(Request $request, $workId)
    {
        if ($request->hasFile('photo')) {
            $file_name = $this->saveImage($request->file('photo'), 'images/website/screenshots');
        }
    
        $customer = Customer::findOrFail(auth()->guard('customer')->id());
        $MyWork= new Customer_work();
        $MyWork->customer_id = auth()->guard('customer')->id();
        $MyWork->work_id = $workId;
        $MyWork->save();
        $customer->update([
            'like_count_facebook'=>($customer->like_count_facebook+1),
            'like_count_youtube'=>($customer->like_count_youtube+1),
            'total_earning'=> ($customer->total_earning+1)
        ]);
        $customer->screenshots()->create([
            'photo' => $file_name,
        ]);
    
        // Update the status of the work
        $work = Work::findOrFail($workId);
        $work->status = '1';
        $work->save();
    
       return redirect()->back()->with('success', 'تم تنفيذ المهمة بنجاح.');
}
    

}