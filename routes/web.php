<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\UserController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [FrontendController::class, 'index'])->name('frontend.cover');
Route::get('about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('services', [FrontendController::class, 'services'])->name('frontend.services');
Route::get('service/{slug?}', [FrontendController::class, 'service'])->name('frontend.service');
Route::get('fields', [FrontendController::class, 'fields'])->name('frontend.fields');
Route::get('news', [FrontendController::class, 'news'])->name('frontend.news');
Route::get('post/{slug?}', [FrontendController::class, 'post'])->name('frontend.post');
Route::get('contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('covid-19-protocol', [FrontendController::class, 'covid'])->name('frontend.covid');

Route::get('user-login', [UserController::class, 'login'])->name('frontend.login');
Route::get('profile/dashboard', [UserController::class, 'dashboard'])->name('frontend.user.dashboard');

Route::get('registration', [FrontendController::class, 'registration'])->name('frontend.registration');
Route::get('shop', [FrontendController::class, 'shop'])->name('frontend.shop');
Route::get('singup', [FrontendController::class, 'singup'])->name('frontend.singup');

Route::get('fieldsrental', [PaymentController::class, 'fieldsrental'])->name('frontend.fieldsrental');
Route::post('fieldsrental', [PaymentController::class, 'fieldsrental'])->name('frontend.fieldsrental');
Route::get('payment', [PaymentController::class, 'payment'])->name('payment');
Route::post('payment', [PaymentController::class, 'payment'])->name('payment');
Route::get('paypal/failed', [PaymentController::class, 'paypalFailed'])->name('payment.failed');
Route::get('paypal/status', [PaymentController::class, 'payPalStatus'])->name('payment.status');
Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('payment.success');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
