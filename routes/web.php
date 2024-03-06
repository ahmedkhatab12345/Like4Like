<?php

use App\Http\Controllers\Website\SubscriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\ProfitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\SiteController;
use App\Http\Controllers\Website\WithdrawalController;
use App\Models\Withdrawal;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('web-site', [SiteController::class, 'index'])->name('website.index');

Route::get('help', [SiteController::class, 'help'])->name('help');

// Payment
Route::get('subscription', [SubscriptionController::class, 'subscription'])->name('subscription');
Route::post('store-subscription', [SubscriptionController::class, 'storeSubscription'])->name('storeSubscription');
// End Payment

// Withdrawal
Route::get('withdrawal',[WithdrawalController::class, 'index'])->name('withdrawal.index');
Route::post('store',[WithdrawalController::class, 'store'])->name('store');
// End Withdrawal

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
