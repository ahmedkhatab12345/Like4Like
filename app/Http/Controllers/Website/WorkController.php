<?php

namespace App\Http\Controllers\Website;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Customer;
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

    public function index()
    {
        $works = Work::all();
        return view('webSite.work.index', compact('works'));
    }

    public function facebook()
    {
        
        $customer = Customer::find(auth()->guard('customer')->id());
        $todayDate=Carbon::today()->toDateString();
        $myWork = Customer_work::where('type',1)->whereDate('created_at','=', $todayDate)->where('customer_id', auth()->guard('customer')->id())->pluck('work_id')->values()->all();
        // dd($myWork );
        if(count($myWork)> 0){
        $facebookLinks = Work::where(function ($query) use ($myWork) {
            foreach ($myWork as $key => $value) {
                $query->whereNotIn('id', [$value]);
            }
        })->where('status','0')->where('type','facebook')->take(10 - $customer->like_count_facebook)->get();
        // dd($facebookLinks);
    }else{
        $facebookLinks = Work::where('status','0')->where('type','facebook')->take(10)->get();
    }

    
        return view('website.work.facebook', compact('facebookLinks'));
    }

    public function youtube()
    {
          
        $customer = Customer::find(auth()->guard('customer')->id());
        $todayDate=Carbon::today()->toDateString();
        $myWork = Customer_work::where('type',1)->whereDate('created_at','=', $todayDate)->where('customer_id', auth()->guard('customer')->id())->pluck('work_id')->values()->all();
        // dd($myWork );
        if(count($myWork)> 0){
        $youtubeLinks = Work::where(function ($query) use ($myWork) {
            foreach ($myWork as $key => $value) {
                $query->whereNotIn('id', [$value]);
            }
        })->where('status','0')->where('type','youtube')->take(10 - $customer->like_count_youtube)->get();
        // dd($youtubeLinks);fac
        }else{
            $youtubeLinks = Work::where('status','0')->where('type','youtube')->take(10)->get();
        }
        return view('website.work.youtube', compact('youtubeLinks'));
    }

    public function executeTask(Request $request, $workId)
    {
        try {
            if ($request->hasFile('photo')) {
                $file_name = $this->saveImage($request->file('photo'), 'images/website/screenshots');
            }
        
            $customer = Customer::findOrFail(auth()->guard('customer')->id());
            $MyWork= new Customer_work();
            $MyWork->customer_id = auth()->guard('customer')->id();
            $MyWork->type=1;
            $MyWork->work_id = $workId;
            $MyWork->save();
    
            $customer = Customer::findOrFail(auth()->guard('customer')->id());
            $links = Work::findOrFail($workId);
            $likeCountField = $links->type === 'facebook' ? 'like_count_facebook' : 'like_count_youtube';
            $customer->update([
                'like_count_facebook'=>($customer->like_count_facebook+1),
                'like_count_youtube'=>($customer->like_count_youtube+1),
                'total_earning'=> ($customer->total_earning+1),
                $likeCountField => ($customer->$likeCountField += 1),
                'total_earning' => ($customer->total_earning + 1),
            ]);
    
            $customer->screenshots()->create([
                'photo' => $file_name,
            ]);
    
            // Update the status of the work
            $work = Work::findOrFail($workId);
            $work->status = '1';
            $work->save();
    
            return redirect()->back()->with('success', 'تم تنفيذ المهمة بنجاح.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء تنفيذ المهمة.');
        }
    }
     

}