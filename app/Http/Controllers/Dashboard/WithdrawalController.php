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

    public function updateStatus($withdrawalId, $status)
    {
        // ابحث عن السحب باستخدام المعرف المرسل
        $withdrawal = Withdrawal::find($withdrawalId);

        if (!$withdrawal) {
            // في حالة عدم العثور على السحب قم بإرجاع استثناء أو رسالة خطأ
            abort(404, 'withdrawal not found');
        }

        // قم بتحديث حالة السحب
        $withdrawal->status = $status;
        $withdrawal->save();

        // ارجاع رسالة نجاح أو أي بيانات أخرى
        return response()->json(['message' => 'withdrawal status updated successfully']);
    }
    
}
