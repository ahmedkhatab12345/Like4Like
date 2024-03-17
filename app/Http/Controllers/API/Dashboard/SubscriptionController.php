<?php

namespace App\Http\Controllers\API\Dashboard;

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
        return response()->json(compact('subscriptions'));
    }
    
    public function accepted_sub(){   
        $subscriptions = Subscription::where('status', 'active')->get();
        return response()->json(compact('subscriptions'));
    }
    public function cancelled_sub(){   
        $subscriptions = Subscription::where('status', 'cancelled')->get();
        return response()->json(compact('subscriptions'));
    }

    public function updateStatus($subscriptionId, $status)
    {
        $subscription = Subscription::find($subscriptionId);

        if (!$subscription) {
            return response()->json(['error' => 'Subscription not found'], 404);
        }

        $subscription->status = $status;
        $subscription->save();
        return response()->json(['message' => 'Subscription status updated successfully']);
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        
        // Perform search query
        $subscriptions = Subscription::whereHas('customer', function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->get();

        return response()->json(compact('subscriptions'));

    }
    
}