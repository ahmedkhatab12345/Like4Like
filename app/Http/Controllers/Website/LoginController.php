<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Validator;

use File;
class LoginController extends Controller
{
    use UploadTrait;
    //public function getSignup(){}
    public function getSignin(){
        return view('dashboard.customer.auth.signin');
    }

    public function getSignup(){
        return view('dashboard.customer.auth.signup');
    }

    public function CustomerSignup(Request $request) {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone_number' => 'required|string|max:20|unique:customers|regex:/^[0-9]{10,20}$/',
            'password' => 'required|string|min:8',
        ];
        // Validation messages
        $messages = [
            'name.required' => 'حقل مطلوب',
            'email.required' => 'حقل مطلوب',
            'email.email' => 'ايميل غير صحيح',
            'email.unique' => 'ايميل موجود مسبقا',
            'phone_number.required' => 'حقل مطلوب',
            'phone_number.regex' => 'رقم الهاتف غير صحيح',
            'phone_number.unique' => 'رقم الهاتف موجود مسبقا',
            'password.required' => 'حقل مطلوب',
            'password.min' => 'يجب الا تقل كلمة السر عن 8 حروف او ارقام',
        ];
    
        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Proceed with saving data if validation passes
        $customers = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
        ]);
        Auth::guard('customer')->loginUsingId($customers->id);
        toastr()->success('تم تسجيل الدخول بنجاح ');

        return redirect()->route('webSite.index');
    }
    

    public function CustomerSignin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'حقل مطلوب',
            'email.email' => 'ايميل غير صحيح',
            'password.required' => 'حقل مطلوب',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            toastr()->success('تم تسجيل الدخول بنجاح ');

            return redirect()->route('webSite.index');
        }

        return redirect()->back()->with('error', 'فشل تسجيل الدخول، يرجى التحقق من البريد الإلكتروني وكلمة المرور');
    }

    public function CustomerLogout()
    {
        Auth::guard('customer')->logout();
        toastr()->success('تم تسجيل الخروج بنجاح ');
        return redirect()->route('website.welcome');
        
    }

}