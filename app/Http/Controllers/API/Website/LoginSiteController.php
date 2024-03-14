<?php

namespace App\Http\Controllers\API\Website;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginSiteController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function getSignin(Request $request)
    {
        $customer = Customer::all();
        return response()->json(compact('customer'));
    }

        public function getSignup()
    {
        return response()->json(['message' => 'Signup endpoint is accessed'], 200);
    }

    public function customerSignup(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone_number' => 'required|string|max:20|unique:customers|regex:/^[0-9]{10,20}$/',
            'password' => 'required|string|min:8',
        ];

        // Validation messages
        $messages = [
            'name.required' => 'حقل الاسم مطلوب',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'email.unique' => 'البريد الإلكتروني موجود مسبقاً',
            'phone_number.required' => 'حقل رقم الهاتف مطلوب',
            'phone_number.regex' => 'رقم الهاتف غير صحيح',
            'phone_number.unique' => 'رقم الهاتف موجود مسبقاً',
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.min' => 'يجب أن تتكون كلمة المرور من الأقل 8 أحرف',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Proceed with saving data if validation passes
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'تم تسجيل العميل بنجاح'], 201);
    }

    public function customerSignin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'password.required' => 'حقل كلمة المرور مطلوب',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            toastr()->success('تم تسجيل الدخول بنجاح');

            return response()->json(['message' => 'تم تسجيل الدخول بنجاح'], 200);
        }

        return response()->json(['error' => 'فشل تسجيل الدخول، يرجى التحقق من البريد الإلكتروني وكلمة المرور'], 401);
    }

    public function customerLogout()
    {
        Auth::guard('customer')->logout();

        return response()->json(['message' => 'تم تسجيل الخروج بنجاح'], 200);
    }
}