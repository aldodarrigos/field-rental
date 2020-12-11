<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;

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
Route::get('flields', [FrontendController::class, 'flields'])->name('frontend.services');
Route::get('news', [FrontendController::class, 'news'])->name('frontend.news');
Route::get('post/{slug?}', [FrontendController::class, 'post'])->name('frontend.post');
Route::get('contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('covid-19-protocol', [FrontendController::class, 'covid'])->name('frontend.covid');
Route::get('fieldsrental', [FrontendController::class, 'fieldsrental'])->name('frontend.fieldsrental');
Route::get('registration', [FrontendController::class, 'registration'])->name('frontend.registration');
Route::get('shop', [FrontendController::class, 'shop'])->name('frontend.shop');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
