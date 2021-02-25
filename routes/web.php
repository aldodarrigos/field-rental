<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\FieldsController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\CompetitionsController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\Payments\ProductsController;
use App\Http\Controllers\Frontend\Payments\ServicePaymentController;

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ReservationController;
use App\Http\Controllers\Backend\ContentController;
use App\Http\Controllers\Backend\ContentGroupsController;
use App\Http\Controllers\Backend\FieldsBackController;
use App\Http\Controllers\Backend\ServicesBackController;
use App\Http\Controllers\Backend\NewsBackController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\TagsbackController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\SlidesController;
use App\Http\Controllers\Backend\CompetitionController;
use App\Http\Controllers\Backend\CompetitionCategoriesController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\StoreController;
use App\Http\Controllers\Backend\ProductSizeController;
use App\Http\Controllers\Backend\SizeController;

use App\Http\Controllers\SendmailController;
use App\Providers\RouteServiceProvider;

use App\Mail\BookingMailable;
use Illuminate\Support\Facades\Mail;
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
Route::get('services', [ServicesController::class, 'services'])->name('frontend.services');
Route::get('services/{slug?}', [ServicesController::class, 'service'])->name('frontend.service');
Route::get('service/registration/{id?}', [ServicesController::class, 'registration'])->name('service.registration');
Route::post('service/registration-submit', [ServicesController::class, 'submit'])->name('service.registration-submit');
Route::get('service/registration-confirmation/{id?}', [ServicesController::class, 'confirmation'])->name('service.registration-confirmation');
Route::post('service-payment', [ServicePaymentController::class, 'payment'])->name('service.payment');
Route::get('service-payment-status', [ServicePaymentController::class, 'status'])->name('service.payment.status');
Route::get('service-payment-success', [ServicePaymentController::class, 'success'])->name('service.payment.success');
Route::get('service-payment-fail', [ServicePaymentController::class, 'fail'])->name('service.payment.fail');

//Route::get('fields', [FrontendController::class, 'fields'])->name('frontend.fields');
Route::get('news', [FrontendController::class, 'news'])->name('frontend.news');
Route::get('post/{slug?}', [FrontendController::class, 'post'])->name('frontend.post');
Route::get('tags/{slug?}', [FrontendController::class, 'tags'])->name('frontend.tags');
Route::get('contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::post('contact', [FrontendController::class, 'contact'])->name('frontend.contact.send');
Route::get('covid-19-protocol', [FrontendController::class, 'covid'])->name('frontend.covid');

Route::get('signin', [UserController::class, 'login'])->name('frontend.login');
Route::get('signup', [UserController::class, 'singup'])->name('frontend.singup');
Route::post('user-authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::get('profile/dashboard', [UserController::class, 'dashboard'])->name('frontend.user.dashboard');

Route::get('tournaments', [CompetitionsController::class, 'tournaments'])->name('frontend.tournaments');
Route::get('leagues', [CompetitionsController::class, 'leagues'])->name('frontend.leagues');
Route::get('tournaments/{slug?}', [CompetitionsController::class, 'competition'])->name('frontend.tournament');
Route::get('leagues/{slug?}', [CompetitionsController::class, 'competition'])->name('frontend.league');
Route::get('registration/{id?}/{slug?}', [CompetitionsController::class, 'registration'])->name('frontend.competitions.registration');
Route::post('registration/submit', [CompetitionsController::class, 'submit'])->name('competitions.registration.submit');
Route::post('competition/contact', [CompetitionsController::class, 'contact'])->name('competitions.contact');
Route::get('team-registration/{id?}/{slug?}', [CompetitionsController::class, 'team_registration']);
Route::post('registration/team-submit', [CompetitionsController::class, 'team_submit']);

Route::get('fieldsrental', [PaymentController::class, 'fieldsrental'])->name('frontend.fieldsrental');
Route::post('fieldsrental', [PaymentController::class, 'fieldsrental'])->name('frontend.fieldsrental');
Route::get('payment', [PaymentController::class, 'payment'])->name('payment');
Route::post('payment', [PaymentController::class, 'payment'])->name('payment');
Route::get('paypal/failed', [PaymentController::class, 'paypalFailed'])->name('payment.failed');
Route::get('paypal/status', [PaymentController::class, 'payPalStatus'])->name('payment.status');
Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('payment.success');

Route::get('shop', [ShopController::class, 'index'])->name('frontend.shop');
Route::get('shop/product/{slug?}', [ShopController::class, 'product'])->name('frontend.product');
Route::get('product-payment', [ProductsController::class, 'payment'])->name('product.payment');
Route::post('product-payment', [ProductsController::class, 'payment'])->name('product.payment');
Route::get('product-payment-status', [ProductsController::class, 'status'])->name('product.payment.status');
Route::get('product-payment-success', [ProductsController::class, 'success'])->name('product.payment.success');
Route::get('product-payment-fail', [ProductsController::class, 'fail'])->name('product.payment.fail');

//AJAX FUNCTIONS
Route::get('fields_x_players/{slug?}', [FieldsController::class, 'fields_x_players']);

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('registration', [FrontendController::class, 'registration'])->name('frontend.registratio.link');
Route::get('kidsleague', [FrontendController::class, 'kidsleague'])->name('frontend.kidsleague');
Route::get('friendshipcup', [FrontendController::class, 'friendshipcup'])->name('frontend.friendshipcup');


/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/

Route::middleware(['admin'])->group(function () {

    Route::get('backend/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');

    //BOOKING
    Route::resource('backend-booking', ReservationController::class);
    Route::get('calendar', [ReservationController::class, 'calendar'])->name('backend.calendar');
    Route::get('get-reservations', [ReservationController::class, 'get_reservations'])->name('backend.get-reservations');

    //CONTENT
    Route::resource('content', ContentController::class);
    Route::resource('content-groups', ContentGroupsController::class);
    
    //FIELDS
    Route::resource('backend-fields', FieldsBackController::class);

    //Services
    Route::resource('backend-services', ServicesBackController::class);
    Route::post('services-sort', [ServicesBackController::class, 'sort'])->name('backend.services.sort');
    Route::get('bservices-registration', [ServicesBackController::class, 'registration'])->name('bservices-registration');
    Route::get('serv-registration-detail/{id?}', [ServicesBackController::class, 'registration_detail']);
    
    //NEWS
    Route::resource('backend-news', NewsBackController::class);
    Route::resource('backend-tags', TagsbackController::class);

    //GALLERY
    Route::resource('gallery', GalleryController::class);
    Route::get('delete-file/{id?}', [GalleryController::class, 'destroy'])->name('backend.gallery.delete');

    //SETTINGS
    Route::resource('settings', SettingsController::class);
    Route::resource('slides', SlidesController::class);
    Route::post('slides-sort', [SlidesController::class, 'sort'])->name('backend.slides.sort');
    Route::get('waiver', [SettingsController::class, 'waiver']);
    Route::put('update-waiver', [SettingsController::class, 'update_waiver']);

    //USERS
    Route::resource('users', UsersController::class);

    //MENU
    Route::resource('menu', MenuController::class);
    Route::post('menu-sort', [MenuController::class, 'sort'])->name('backend.menu.sort');
    Route::get('delete-menu/{id?}', [MenuController::class, 'destroy'])->name('backend.menu.delete');

    //COMPETITIONS
    Route::resource('competitions', CompetitionController::class);
    Route::get('competition-registrations/{id?}', [CompetitionController::class, 'registration'])->name('backend.competitions-registrations');
    Route::get('competition-registration/{id?}', [CompetitionController::class, 'registration_detail'])->name('backend.competition-registration');
    Route::get('get-categories/{id?}', [CategoriesController::class, 'get_categories']);
    Route::get('get-categories-select/{id?}', [CategoriesController::class, 'get_categories_select']);
    Route::post('categories-sort', [CategoriesController::class, 'sort'])->name('backend.categories.sort');
    Route::get('competitions-contact', [CompetitionController::class, 'contact'])->name('backend.competitions.contact');
    Route::get('competition-message/{id?}', [CompetitionController::class, 'message'])->name('backend.competitions.message');
    Route::resource('competition-categories', CompetitionCategoriesController::class);
    Route::get('competition-reg-dashboard', [CompetitionController::class, 'dashboard']);

    Route::resource('categories', CategoriesController::class);

    //STORE
    Route::resource('store', StoreController::class);
    Route::resource('product-sizes', ProductSizeController::class);
    Route::resource('sizes', SizeController::class);
    Route::get('get-sizes/{id?}', [ProductSizeController::class, 'get_sizes']);
    Route::get('get-sizes-select/{id?}', [ProductSizeController::class, 'get_sizes_select']);
    Route::post('sizes-sort', [SizeController::class, 'sort'])->name('backend.sizes.sort');


});
