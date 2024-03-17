<?php

namespace App\Http\Controllers\API\Website;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WithdrawalSiteController extends Controller
{
    public function index()
    {
        $withdrawals = Withdrawal::all();
        return response()->json(['withdrawals' => $withdrawals], 200);
    }



    public function store(Request $request)
    {
        $customerId = auth('customer')->id();
        $customer = Customer::findOrFail($customerId);
        $total_earning = $customer->total_earning;
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:255|regex:/^[0-9]{10,20}$/',
            'withdrawal_amount' => 'required|numeric|min:20', // قاعدة الحد الأدنى تأتي قبل القاعدة المطلوبة
            'methoud' => 'required|in:cach,insta',
        ], [
            'phone_number.required' => 'حقل مطلوب',
            'phone_number.regex' => 'رقم الهاتف غير صحيح',
            'withdrawal_amount.min' => 'عفوًا، الحد الأدنى للسحب هو 20 جنيهًا',
            'withdrawal_amount.required' => 'حقل مطلوب',
            'methoud.required' => 'حقل مطلوب',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

<<<<<<< HEAD
        // Create a new instance of the Withdrawal model
        $withdrawal = new Withdrawal();
        // Fill the model with validated data
        $withdrawal->phone_number = $request->phone_number;
        $withdrawal->withdrawal_amount = $request->withdrawal_amount;
        $withdrawal->methoud = $request->methoud;
        $withdrawal->customer_id = auth()->guard('sanctum')->id();
=======
        if ($validator->passes()) {
            // التحقق من أن السحب لا يتجاوز الأرباح
            if ($request->withdrawal_amount > $total_earning) {
                return redirect()->back();
                return response()->json(['message' => 'sorry withdrawl_amount less than total_earning'], 422);
>>>>>>> 8a070723f8854a5b83c38242c34f61bdbe93e61c

            }
            // Create a new instance of the Withdrawal model
            $withdrawal = new Withdrawal();
            $customerId = Auth::guard('customer')->id();
            // Fill the model with validated data
            $withdrawal->phone_number = $request->phone_number;
            $withdrawal->withdrawal_amount = $request->withdrawal_amount;
            $withdrawal->methoud = $request->methoud;
            $withdrawal->customer_id = $customerId;

            // Save the model to the database
            $withdrawal->save();

            // Redirect back with a success message
            return response()->json(['message' => 'Withdrawal stored successfully'], 201);
            }
        }
    }
