<?php

use App\Http\Controllers\Dashboard\SliderController;
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
    Route::get('customer-index', [SiteController::class, 'index'])->name('webSite.index');
    Route::get('welcome', [SiteController::class, 'welcom'])->name('website.welcome');
    Route::get('sign-in', [LoginController::class, 'getSignin'])->name('Signin.customer');
    Route::get('sign-up', [LoginController::class, 'getSignup'])->name('Signup.customer');
    Route::post('sign-up', [LoginController::class, 'CustomerSignup'])->name('Signup');
    Route::post('sign-in', [LoginController::class, 'CustomerSignin'])->name('Signin');
    Route::post('CustomerLogout', [LoginController::class, 'CustomerLogout'])->name('logout.customer');
    Route::middleware(['customer'])->prefix('customer')->group(function () {
        Route::middleware(['check.subscription'])->group(function () {
            Route::get('works-user', [WorkController::class, 'index'])->name('webSite.work.index');
            Route::get('facebook', [WorkController::class, 'facebook'])->name('facebook');
            Route::post('faceStore', [WorkController::class, 'faceStore'])->name('faceStore');
            Route::get('youtube', [WorkController::class, 'youtube'])->name('youtube');
            Route::post('youtStore', [WorkController::class, 'youtStore'])->name('youtStore');
            Route::post('executeTask/{id}', [WorkController::class, 'executeTask'])->name('executeTask');
            //Route::post('executeTaskYoutube/{id}', [WorkController::class, 'executeTaskYoutube'])->name('execute.task.youtube');

            // end dashboard  executeTaskYoutube   executeTaskFacebook
            
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

        });        
        
        // Payment
        Route::get('subscription', [SubscriptionController::class, 'subscription'])->name('subscription');
        Route::post('store-subscription', [SubscriptionController::class, 'storeSubscription'])->name('storeSubscription');
        // End Payment
        // Help
        Route::get('help', [HelpController::class, 'index'])->name('help.index');
        // End Help
    });

    //Start Route Of Sliders
    Route::get('admin/sliders', [SliderController::class, 'index'])->name('sliders.index');
    Route::get('sliders/create', [SliderController::class, 'create'])->name('sliders.create');
    Route::post('sliders/store', [SliderController::class, 'store'])->name('sliders.store');
    Route::get('sliders/edit/{id}', [SliderController::class, 'edit'])->name('sliders.edit');
    Route::put('sliders/update/{id}', [SliderController::class, 'update'])->name('sliders.update');
    Route::delete('sliders/delete/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';