<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MidtransController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');
Route::post('/checkout/{id}', [CheckoutController::class, 'process'])->middleware(['auth', 'verified'])->name('checkout-process');
Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->middleware(['auth', 'verified'])->name('checkout');
Route::post('/checkout/create/{id}', [CheckoutController::class, 'create'])->middleware(['auth', 'verified'])->name('checkout-create');
Route::get('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])->middleware(['auth', 'verified'])->name('checkout-remove');
Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success'])->middleware(['auth', 'verified'])->name('checkout-success');

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('travel-package', TravelPackageController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('transaction', TransactionController::class);
});

Auth::routes(['verify' => true]);

Route::post('/midtrans/callback', [MidtransController::class, 'notificationHandler'])->name('notification-handler');
Route::get('/midtrans/finish', [MidtransController::class, 'finishRedirect'])->name('finish-redirect');
Route::get('/midtrans/unfinish', [MidtransController::class, 'unfinishRedirect'])->name('unfinish-redirect');
Route::get('/midtrans/error', [MidtransController::class, 'errorRedirect'])->name('error-redirect');
