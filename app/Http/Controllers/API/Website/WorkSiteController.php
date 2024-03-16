<?php

namespace App\Http\Controllers\API\Website;
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

class WorkSiteController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $works = Work::all();
        return response()->json($works);
    }

    public function facebook()
    {
        
        $customer = Customer::find(auth()->guard('customer')->id());
        $todayDate=Carbon::today()->toDateString();
        $myWork = Customer_work::where('type',1)->whereDate('created_at','=', $todayDate)->where('customer_id', auth()->guard('customer')->id())->pluck('work_id')->values()->all();
        if(count($myWork)> 0){
        $facebookLinks = Work::where(function ($query) use ($myWork) {
            foreach ($myWork as $key => $value) {
                $query->whereNotIn('id', [$value]);
            }
        })->where('status','0')->where('type','facebook')->take(10 - $customer->like_count_facebook)->get();
    }else{
        $facebookLinks = Work::where('status','0')->where('type','facebook')->take(10)->get();
    }
    return response()->json($facebookLinks);
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
        return response()->json($youtubeLinks);
    }

    public function executeTask(Request $request, $workId)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if ($request->hasFile('photo')) {
            $file_name = $this->saveImage($request->file('photo'), 'images/website/screenshots');
        }
    
        $customer = Customer::findOrFail(auth()->guard('sanctum')->id());
        $MyWork= new Customer_work();
        $MyWork->customer_id = auth()->guard('sanctum')->id();
        $MyWork->type=1;
        $MyWork->work_id = $workId;
        $MyWork->save();
        $customer = Customer::findOrFail(auth()->guard('sanctum')->id());
        $links = Work::findOrFail($workId); // assuming you retrieve the $links object from somewhere
        $likeCountField = $links->type === 'facebook' ? 'like_count_facebook' : 'like_count_youtube';
        $customer->update([
            $likeCountField => ($customer->$likeCountField += 1),
            'total_earning' => ($customer->total_earning + 1)
        ]);

        $customer->screenshots()->create([
            'photo' => $file_name,
        ]);

        return response()->json(['message' => 'Task executed successfully.'], 200);
}
    

}