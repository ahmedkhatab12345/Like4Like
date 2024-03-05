<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use File;

class SiteController extends Controller
{
    use UploadTrait;
    // public function index(){
    //     return view('webSite.index');
    // }

    public function index()
    {
        $works = Work::where('created_at', '>=', Carbon::now()->subDay())
                     ->take(20)
                     ->get();

        return view('webSite.index', compact('works'));
    }

    public function help(){
        return view('webSite.help');
    }



    public function subscription()
    {
        return view('webSite.payment');
    }

    public function storeSubscription(Request $request)
    {
        if ($request->has('vcash')) {
            // Process Vodafone Cash subscription
            $subscription = new Subscription();
            $subscription->phone_number = $request->phone_number;
            // $subscription->photo = $request->photo;
            $subscription->photo = $this ->saveImage($request->photo,'images/dashboard/admins');
            $subscription->status = $request->status;
            $subscription->method = 'vcash'; // تخزين طريقة الدفع
            $subscription->save();
        } elseif ($request->has('ipa')) {
            // Process Insta Pay subscription
            $subscription = new Subscription();
            $subscription->insta_link = $request->insta_link;
            $subscription->photo = $this ->saveImage($request->photo,'images/dashboard/admins');
            $subscription->status = $request->status;
            $subscription->method = 'ipa'; // تخزين طريقة الدفع
            $subscription->save();
        }

        return redirect()->route('website.index');
    }
    // public function subscription(Request $request){
    //     $user = new Subscription();
    //     $user->phone_number = $request-> phone_number;
    //     $user->photo = $request-> photo;
    //     $user->status = $request-> status;
    //     $user->method = $request-> method;
    //     $user->customer_id = $request-> customer_id;
    //     $user->save();
    //     return redirect()->route("website.index");
    // }

}
