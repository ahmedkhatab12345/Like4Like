<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\UserController; 
use App\Http\Controllers\Dashboard\WorkController; 
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SubscriptionController; 
use App\Http\Controllers\Dashboard\EarningController; 
use App\Http\Controllers\Dashboard\WithdrawalController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SliderController;

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
    Route::get('admin/works-rewiew', [WorkController::class, 'review'])->name('works.review');
    //End Route Of works
    
    //Start Route Of subscriptions
    Route::resource('admin/subscriptions', SubscriptionController::class);
    Route::get('admin/accepted-subscription', [SubscriptionController::class, 'accepted_sub'])->name('accepted.subscription');
    Route::get('admin/cancelled-subscription', [SubscriptionController::class, 'cancelled_sub'])->name('cancelled.subscription');
    Route::post('subscriptions/{subscriptionId}/{status}', [SubscriptionController::class, 'updateStatus']);
    Route::get('/subscriptions/search', [SubscriptionController::class, 'search'])->name('subscriptions.search');

    //End Route Of subscriptions

    //Start Route Of earnings
    Route::resource('earnings', EarningController::class);
    //End Route Of earnings

    //Start Route Of withdrawals 
    Route::get('admin/withdrawals', [WithdrawalController::class, 'index'])->name('withdrawals.index');
    Route::get('admin/accepted-withdrawals', [WithdrawalController::class, 'accepted_withdrawals'])->name('accepted.withdrawals');
    Route::get('admin/rejected-withdrawals', [WithdrawalController::class, 'rejected_withdrawals'])->name('rejected.withdrawals');
    Route::post('withdrawals/{withdrawalId}/{status}', [WithdrawalController::class, 'updateStatus']);

    //Start Route Of Setting
    Route::get('admin/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('admin/settings', [SettingController::class, 'update'])->name('settings.update');

    //Start Route Of Sliders
    Route::get('admin/sliders', [SliderController::class, 'index'])->name('sliders.index');
    Route::get('sliders/create', [SliderController::class, 'create'])->name('sliders.create');
    Route::post('sliders/store', [SliderController::class, 'store'])->name('sliders.store');
    Route::get('sliders/edit/{id}', [SliderController::class, 'edit'])->name('sliders.edit');
    Route::put('sliders/update/{id}', [SliderController::class, 'update'])->name('sliders.update');
    Route::delete('sliders/delete/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
