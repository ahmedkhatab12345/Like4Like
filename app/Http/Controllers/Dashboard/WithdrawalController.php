<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WithdrawalRequest;
use App\Models\Withdrawal;
use App\Traits\UploadTrait;
use File;
use Illuminate\Support\Facades\Storage;
class WithdrawalController extends Controller
{
    use UploadTrait;

    public function index(){
        $withdrawals = Withdrawal::where(['status'=>'pending'])->get();
        return view('dashboard.withdrawals.index',compact('withdrawals'));
    }
    
    public function accepted_withdrawals(){
        $withdrawals = Withdrawal::where(['status'=>'accept'])->get();
        return view('dashboard.withdrawals.accepted_withdrawals',compact('withdrawals'));
    }

    public function rejected_withdrawals(){
        $withdrawals = Withdrawal::where(['status'=>'rejected'])->get();
        return view('dashboard.withdrawals.rejected_withdrawals',compact('withdrawals'));
    }


    public function update(Request $request)
{
    $withdrawal = Withdrawal::findOrFail($request->withdrawal_id);

    if ($request->hasFile('photo')) {
        $file_name = $this->saveImage($request->photo, 'images/dashboard/withdrawals');
        $withdrawal->update([
            'status' => 'accept',
            'photo' => $file_name,
        ]);
    } else {
        $withdrawal->update(['status' => 'accept']);
    }

    return response()->json(['message' => 'تم تحديث حالة السحب إلى "موافقة" بنجاح']);
}


    public function reject(Withdrawal $withdrawal)
    {
        $withdrawal->update(['status' => 'rejected']);

        return response()->json(['message' => 'تم تحديث حالة السحب إلى "رفض" بنجاح']);
    }
}
