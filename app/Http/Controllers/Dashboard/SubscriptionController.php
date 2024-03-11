<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use App\Traits\UploadTrait;
use File;
use Illuminate\Support\Facades\Storage;
class SubscriptionController extends Controller
{
    use UploadTrait;

    public function index(){
        $subscriptions = Subscription::where('status', 'pending')->get();
        return view('dashboard.subscriptions.index', compact('subscriptions'));
    }
    
    public function accepted_sub(){   
        $subscriptions = Subscription::where('status', 'active')->get();
        return view('dashboard.subscriptions.accepted_subscription', compact('subscriptions'));
    }
    public function cancelled_sub(){   
        $subscriptions = Subscription::where('status', 'cancelled')->get();
        return view('dashboard.subscriptions.cancelled_subscription', compact('subscriptions'));
    }

    public function updateStatus($subscriptionId, $status)
    {
        $subscription = Subscription::find($subscriptionId);

        if (!$subscription) {
            abort(404, 'Subscription not found');
        }

        $subscription->status = $status;
        $subscription->save();
        toastr()->success('تم بنجاح');
        return response()->json(['message' => 'Subscription status updated successfully']);
    }

    
}
