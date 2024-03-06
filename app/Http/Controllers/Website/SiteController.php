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







// public function storeSubscription(Request $request)
// {
//     if ($request->payment_method === 'vcash') {
//         // Process Vodafone Cash subscription
//         $subscription = new Subscription();
//         $subscription->phone_number = $request->phone_number;
//         if ($request->hasFile('photo')) {
//             $file_name = $this->saveImage($request->file('vcash_photo'), 'images/dashboard/subscriptions');
//         }
//         $subscription->method = 'vcash'; // تخزين طريقة الدفع
//         $subscription->save();
//     } elseif ($request->payment_method === 'ipa') {
//         // Process Insta Pay subscription
//         $subscription = new Subscription();
//         $subscription->phone_number = $request->phone_number;
//         $file_name = $this->saveImage($request->file('ipa_photo'), 'images/dashboard/subscriptions');
//         $subscription->method = 'ipa';  // تخزين طريقة الدفع
//         $subscription->save();
//     }

//     return redirect()->route('website.index');
// }

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


    // public function storeSubscription(Request $request)
    // {
    //     if ($request->payment_method === 'vcash') {
    //         // Process Vodafone Cash subscription
    //         $subscription = new Subscription();
    //         $subscription->phone_number = $request->phone_number;
    //         if ($request->hasFile('photo')) {
    //             $file_name = $this->saveImage($request->file('photo'), 'images/dashboard/subscriptions');
    //             $subscription->photo = $file_name;
    //         }
    //         $subscription->method = 'vcash'; // تخزين طريقة الدفع
    //         $subscription->save();
    //     } elseif ($request->payment_method === 'ipa') {
    //         // Process Insta Pay subscription
    //         $subscription = new Subscription();
    //         $subscription->phone_number = $request->phone_number;
    //         if ($request->hasFile('photo')) {
    //             $file_name = $this->saveImage($request->file('photo'), 'images/dashboard/subscriptions');
    //             $subscription->photo = $file_name;
    //         }
    //         $subscription->method = 'ipa';  // تخزين طريقة الدفع
    //         $subscription->save();
    //     }

    //     return redirect()->route('website.index');
    // }
}
