<?php

namespace App\Http\Controllers\API\Website;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
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
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:255|regex:/^[0-9]{10,20}$/', // يجب أن يكون رقم الهاتف حقلًا إلزاميًا ونصًا بحد أقصى 255 حرفًا            'withdrawal_amount' => 'required|numeric|min:50',
            'methoud' => 'required|in:cach,insta',
        ],[
            'phone_number.required' => 'حقل مطلوب',
            'phone_number.regex' => 'رقم الهاتف غير صحيح',
            'withdrawal_amount.min' => 'عفوا اقل مبلغ للسحب 50 ج',
            'withdrawal_amount.required' => 'حقل مطلوب',
            'methoud' => 'حقل مطلوب',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new instance of the Withdrawal model
        $withdrawal = new Withdrawal();
        $customerId = Auth::guard('customers')->id();
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