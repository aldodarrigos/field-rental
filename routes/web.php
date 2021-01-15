<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\FieldsController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ReservationController;
use App\Http\Controllers\Backend\ContentController;
use App\Http\Controllers\Backend\ContentGroupsController;
use App\Http\Controllers\Backend\FieldsBackController;
use App\Http\Controllers\Backend\ServicesBackController;
use App\Http\Controllers\Backend\NewsbackController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\TagsbackController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\SlidesController;
use App\Providers\RouteServiceProvider;
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
Route::get('services/{slug?}', [FrontendController::class, 'service'])->name('frontend.service');
//Route::get('fields', [FrontendController::class, 'fields'])->name('frontend.fields');
Route::get('news', [FrontendController::class, 'news'])->name('frontend.news');
Route::get('post/{slug?}', [FrontendController::class, 'post'])->name('frontend.post');
Route::get('contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('covid-19-protocol', [FrontendController::class, 'covid'])->name('frontend.covid');

Route::get('user-login', [UserController::class, 'login'])->name('frontend.login');
Route::get('singup', [UserController::class, 'singup'])->name('frontend.singup');
Route::post('user-authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('profile/dashboard', [UserController::class, 'dashboard'])->name('frontend.user.dashboard');

Route::get('shop', [FrontendController::class, 'shop'])->name('frontend.shop');


Route::get('fieldsrental', [PaymentController::class, 'fieldsrental'])->name('frontend.fieldsrental');
Route::post('fieldsrental', [PaymentController::class, 'fieldsrental'])->name('frontend.fieldsrental');
Route::get('payment', [PaymentController::class, 'payment'])->name('payment');
Route::post('payment', [PaymentController::class, 'payment'])->name('payment');
Route::get('paypal/failed', [PaymentController::class, 'paypalFailed'])->name('payment.failed');
Route::get('paypal/status', [PaymentController::class, 'payPalStatus'])->name('payment.status');
Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('payment.success');

//AJAX FUNCTIONS
Route::get('fields_x_players/{slug?}', [FieldsController::class, 'fields_x_players']);


Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/

Route::middleware(['admin'])->group(function () {
    Route::get('backend/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
    Route::resource('backend-booking', ReservationController::class);
    Route::get('calendar', [ReservationController::class, 'calendar'])->name('backend.calendar');
    Route::get('get-reservations', [ReservationController::class, 'get_reservations'])->name('backend.get-reservations');
    Route::resource('content', ContentController::class);
    Route::resource('content-groups', ContentGroupsController::class);
    Route::resource('backend-fields', FieldsBackController::class);
    Route::resource('backend-services', ServicesBackController::class);
    Route::resource('backend-news', NewsbackController::class);
    Route::resource('backend-tags', TagsbackController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('settings', SettingsController::class);
    Route::resource('slides', SlidesController::class);
    Route::post('slides-sort', [SlidesController::class, 'sort'])->name('backend.slides.sort');
    Route::resource('users', UsersController::class);
    Route::get('delete-file/{id?}', [GalleryController::class, 'destroy'])->name('backend.gallery.delete');
    Route::resource('menu', MenuController::class);
    Route::post('menu-sort', [MenuController::class, 'sort'])->name('backend.menu.sort');
    Route::post('services-sort', [ServicesBackController::class, 'sort'])->name('backend.services.sort');
    

});
