<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    use UploadTrait;
    public function subscription()
    {
        return view('webSite.payment.payment');
    }

    public function storeSubscription(Request $request)
    {
        // التحقق مما إذا كانت هناك بيانات للطلبات vcash أو ipa
        if ($request->has('payment_method') && ($request->payment_method === 'vcash' || $request->payment_method === 'ipa')) {
            // التحقق مما إذا كانت هناك ملف صورة مرفق مع الطلب
            if ($request->hasFile('photo')) {
                $file_name = $this->saveImage($request->file('photo'), 'images/dashboard/subscriptions');
            }
            // الحصول على بيانات الاشتراكات من الطلب
            $subscriptions_data = [
                'phone_number' => $request->phone_number,
            ];

            // تحديد طريقة الدفع بناءً على قيمة payment_method في الطلب
            $method = $request->payment_method;

            // إنشاء سجل اشتراك جديد
            $subscriptions = Subscription::create([
                'phone_number' => $subscriptions_data['phone_number'],
                'method' => $method,
                'photo' => $file_name ?? null, // تعيين اسم الملف إذا كان موجودًا، وإلا فإنه يتم تعيينه إلى قيمة null
                ]);

            // إعادة توجيه المستخدم إلى الصفحة الرئيسية مع رسالة نجاح
            return redirect()->route('website.index')->with('success', 'تم الاشتراك بنجاح.');
        }

        // إذا لم تتوفر بيانات الدفع المطلوبة، يتم إعادة توجيه المستخدم إلى الصفحة الرئيسية مع رسالة خطأ
        return redirect()->route('website.index')->with('error', 'يرجى اختيار طريقة دفع صحيحة.');
    }
}
