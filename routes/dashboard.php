<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\UserController; 
use App\Http\Controllers\Dashboard\WorkController; 
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SubscriptionController; 
use App\Http\Controllers\Dashboard\EarningController; 
use App\Http\Controllers\Dashboard\WithdrawalController;

/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::post('adminLogout', [DashboardController::class, 'AdminLogout'])->name('logout.admin');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    //Start Route Of Menu
    Route::resource('admin/users', UserController::class);
    //End Route Of Menu

    //Start Route Of Works
    Route::resource('admin/works', WorkController::class);
    Route::get('admin/links-facebook', [WorkController::class, 'getfacebooklinks'])->name('facebook.links');
    Route::get('admin/links-youtube', [WorkController::class, 'getyoutubelinks'])->name('youtube.links');
    //End Route Of works
    
    //Start Route Of subscriptions
    Route::resource('admin/subscriptions', SubscriptionController::class);
    Route::get('admin/accepted-subscription', [SubscriptionController::class, 'accepted_sub'])->name('accepted.subscription');
    Route::get('admin/cancelled-subscription', [SubscriptionController::class, 'cancelled_sub'])->name('cancelled.subscription');
    Route::post('subscriptions/{subscriptionId}/{status}', [SubscriptionController::class, 'updateStatus']);
    //End Route Of subscriptions

    //Start Route Of earnings
    Route::resource('earnings', EarningController::class);
    //End Route Of earnings

    //Start Route Of withdrawals 
    Route::get('admin/withdrawals', [WithdrawalController::class, 'index'])->name('withdrawals.index');
    Route::get('admin/accepted-withdrawals', [WithdrawalController::class, 'accepted_withdrawals'])->name('accepted.withdrawals');
    Route::get('admin/rejected-withdrawals', [WithdrawalController::class, 'rejected_withdrawals'])->name('rejected.withdrawals');
    Route::post('admin/withdrawals/{withdrawalId}/{status}', [WithdrawalController::class, 'updateStatus']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
