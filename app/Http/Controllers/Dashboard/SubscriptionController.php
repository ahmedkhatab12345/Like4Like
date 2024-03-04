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

    public function updateStatus($subscriptionId, $status)
    {
        // ابحث عن الاشتراك باستخدام المعرف المرسل
        $subscription = Subscription::find($subscriptionId);

        if (!$subscription) {
            // في حالة عدم العثور على الاشتراك، قم بإرجاع استثناء أو رسالة خطأ
            abort(404, 'Subscription not found');
        }

        // قم بتحديث حالة الاشتراك
        $subscription->status = $status;
        $subscription->save();

        // ارجاع رسالة نجاح أو أي بيانات أخرى
        return response()->json(['message' => 'Subscription status updated successfully']);
    }

    public function destroy($id)
    {
        // ابحث عن الاشتراك باستخدام الهوية الممررة
        $subscription = Subscription::findOrFail($id);

        // قم بحذف الاشتراك
        $subscription->delete();

        // قم بإرجاع رسالة ناجحة
        return response()->json(['message' => 'تم حذف الاشتراك بنجاح.']);
    }
}
