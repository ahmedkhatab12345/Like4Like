<?php

use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\SubscriptionController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\WithdrawalController;
use App\Http\Controllers\API\WorkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//users api's
Route::apiResource('users', UserController::class);

//profile api's
Route::get('users_profile', [ProfileController::class, 'get_Profile']);

//subscriptions api's
Route::get('subscriptions', [SubscriptionController::class,'index']);
Route::get('subscriptions/accepted', [SubscriptionController::class,'accepted_sub']);
Route::get('subscriptions/cancelled', [SubscriptionController::class,'cancelled_sub']);
Route::put('subscriptions/{subscriptionId}/status/{status}', [SubscriptionController::class,'updateStatus']);


//withdrawals api's
Route::get('withdrawals', [WithdrawalController::class, 'index']);
Route::get('withdrawals/accepted', [WithdrawalController::class, 'accepted_withdrawals']);
Route::get('withdrawals/rejected', [WithdrawalController::class, 'rejected_withdrawals']);
Route::put('withdrawals/{withdrawalId}/status/{status}', [WithdrawalController::class,'updateStatus']);


//works api's
Route::get('works/facebook', [WorkController::class, 'getFacebookLinks']);
Route::get('works/youtube', [WorkController::class, 'getYoutubeLinks']);
Route::post('/works', [WorkController::class, 'store']);
Route::put('/works/{id}',[WorkController::class, 'update']);
Route::delete('/works/{id}',[WorkController::class, 'destroy']);
