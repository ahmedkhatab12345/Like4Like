<?php

namespace App\Http\Controllers\API\Dashboard;

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
        return response()->json(compact('withdrawals'));
    }
    
    public function accepted_withdrawals(){
        $withdrawals = Withdrawal::where(['status'=>'accept'])->get();
        return response()->json(compact('withdrawals'));
    }

    public function rejected_withdrawals(){
        $withdrawals = Withdrawal::where(['status'=>'rejected'])->get();
        return response()->json(compact('withdrawals'));
    }

    public function updateStatus($withdrawalId, $status)
    {
        $withdrawal = Withdrawal::find($withdrawalId);

        if (!$withdrawal) {
            abort(404, 'withdrawal not found');
        }

        $withdrawal->status = $status;
        $withdrawal->save();
        return response()->json(['message' => 'withdrawal status updated successfully']);
    }
    
}