<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\LoginController;
use App\Http\Controllers\Website\SiteController;
use App\Http\Controllers\Website\WithdrawalController;
use App\Http\Controllers\Website\WorkController;
use App\Http\Controllers\Website\SubscriptionController;
use App\Http\Controllers\Website\HelpController;
use App\Http\Controllers\Website\ProfitController;
use App\Http\Controllers\Website\ScreenshotController;

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

    Route::get('welcome', [SiteController::class, 'welcom'])->name('website.welcome');
    Route::get('sign-in', [LoginController::class, 'getSignin'])->name('Signin.customer');
    Route::get('sign-up', [LoginController::class, 'getSignup'])->name('Signup.customer');
    Route::post('sign-up', [LoginController::class, 'CustomerSignup'])->name('Signup');
    Route::post('sign-in', [LoginController::class, 'CustomerSignin'])->name('Signin');
    Route::post('CustomerLogout/{id}', [LoginController::class, 'CustomerLogout'])->name('test');
    Route::middleware(['customer'])->group(function () {        
        Route::get('works-user', [WorkController::class, 'index'])->name('webSite.work.index');
        Route::get('facebook', [WorkController::class, 'facebook'])->name('facebook');
        Route::post('faceStore', [WorkController::class, 'faceStore'])->name('faceStore');
        Route::get('youtube', [WorkController::class, 'youtube'])->name('youtube');
        Route::post('youtStore', [WorkController::class, 'youtStore'])->name('youtStore');
        Route::post('executeTask', [WorkController::class, 'executeTask'])->name('executeTask');
        // end dashboard

        // Payment
        Route::get('subscription', [SubscriptionController::class, 'subscription'])->name('subscription');
        Route::post('store-subscription', [SubscriptionController::class, 'storeSubscription'])->name('storeSubscription');
        // End Payment

        // Withdrawal
        Route::get('withdrawal',[WithdrawalController::class, 'index'])->name('withdrawal.index');
        Route::post('store',[WithdrawalController::class, 'store'])->name('store');
        // End Withdrawal

        // Profit
        Route::get('profit',[ProfitController::class, 'index'])->name('profit.index');
        // End Profit

        // Help
        Route::post('save-screen', [ScreenshotController::class, 'store'])->name('screenshot.store');
        // End Help

        // Help
        Route::get('help', [HelpController::class, 'index'])->name('help.index');
        // End Help
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
