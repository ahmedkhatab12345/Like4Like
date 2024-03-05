<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\ProfitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\SiteController;

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
Route::get('subscription', [SiteController::class, 'subscription'])->name('subscription');
Route::post('subscription', [SiteController::class, 'storeSubscription'])->name('storeSubscription');


Route::get('/ipa', function () {
    return view('webSite.selected.ipa' );
});

Route::get('/vcash', function () {
    return view('webSite.selected.vcash' );
});
// End Payment

Route::resource('profits',ProfitController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
