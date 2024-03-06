<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Traits\UploadTrait;
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

    function CustomerSignup(Request $request) {
        $file_name = $this->saveImage($request->photo, 'images/website/customers');
        $customers = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
            'photo' => $file_name,
        ]);
        Auth::guard('customers')->loginUsingId($customers->id);

        return redirect()->route('works.customer.index')->with('success', 'تم التسجيل وتسجيل الدخول بنجاح');
    }

    function CustomerSignin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customers')->attempt($credentials)) {
            return redirect()->route('works.customer.index')->with('success', 'تم تسجيل الدخول بنجاح');
        }

        return redirect()->back()->with('error', 'فشل تسجيل الدخول، يرجى التحقق من البريد الإلكتروني وكلمة المرور');
    }

}
