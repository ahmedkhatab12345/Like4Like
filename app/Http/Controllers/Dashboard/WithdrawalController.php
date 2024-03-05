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

    public function update(Request $request, $id)
    {
    $withdrawal = Withdrawal::findOrFail($id);
    
    if ($request->has('accepted')) {
        $withdrawal->update(['status' => 'accepted']);
    } elseif ($request->has('rejected')) {
        $withdrawal->update(['status' => 'rejected']);
    }
    
    if ($request->hasFile('photo')) {
        $file_name = $this->saveImage($request->file('photo'), 'images/site/withdrawals');
        $withdrawal->update(['photo' => $file_name]);
    }

    return redirect()->back()->with('success', 'تم تحديث حالة السحب بنجاح.');
    }
    
}
