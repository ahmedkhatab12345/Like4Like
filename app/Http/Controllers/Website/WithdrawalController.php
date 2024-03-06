<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WithdrawalController extends Controller
{
    public function index()
    {
        $withdrawals = Withdrawal::all();
        return view('webSite.withdrawal.index', ['withdrawals' => $withdrawals]);
    }



    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string',
            'withdrawal_amount' => 'required|numeric|min:50',
            'methoud' => 'required|in:cach,insta',
        ],[
            'phone_number.required' => 'حقل مطلوب',
            'withdrawal_amount.min' => 'عفوا اقل مبلغ للسحب 50 ج',
            'withdrawal_amount.required' => 'حقل مطلوب',
            'methoud' => 'حقل مطلوب',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new instance of the Withdrawal model
        $withdrawal = new Withdrawal();

        // Fill the model with validated data
        $withdrawal->phone_number = $request->phone_number;
        $withdrawal->withdrawal_amount = $request->withdrawal_amount;
        $withdrawal->methoud = $request->methoud;

        // Save the model to the database
        $withdrawal->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'تمت عملية السحب بنجاح.');
    }
}
