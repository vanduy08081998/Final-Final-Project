<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

/* Không cần include controller vào cho dài dòng */

define('__BASEADMIN__', 'App\Http\Controllers\Admin');

define('__BASECLIENT__', 'App\Http\Controllers\Clients');


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


/* Clients */

Route::prefix('/')->group(function () {
    Route::get('/', ['as' => 'clients.index', 'uses' => __BASECLIENT__ . '\HomeController@index']);
    Route::get('/login', ['as' => 'clients.login', 'uses' => __BASECLIENT__ . '\HomeController@login']);
    Route::prefix('/checkout')->group(function () {
        Route::get('/checkout-details', ['as' => 'checkout.checkout-details', 'uses' => __BASECLIENT__ . '\CheckoutController@checkoutDetail']);
        Route::get('/checkout-shipping', ['as' => 'checkout.checkout-shipping', 'uses' => __BASECLIENT__ . '\CheckoutController@checkoutShipping']);
        Route::get('/checkout-payment', ['as' => 'checkout.checkout-payment', 'uses' => __BASECLIENT__ . '\CheckoutController@checkoutPayment']);
        Route::get('/checkout-complete', ['as' => 'checkout.checkout-complete', 'uses' => __BASECLIENT__ . '\CheckoutController@checkoutComplete']);
        Route::get('/checkout-review', ['as' => 'checkout.checkout-review', 'uses' => __BASECLIENT__ . '\CheckoutController@checkoutReview']);
    });
    Route::prefix('/shop')->group(function () {
        Route::get('/shop-grid', ['as' => 'shop.shop-grid', 'uses' => __BASECLIENT__ . '\ProductController@shopGrid']);
        Route::get('/shop-list', ['as' => 'shop.shop-list', 'uses' => __BASECLIENT__ . '\ProductController@shopList']);
        Route::get('/product-details', ['as' => 'shop.product-details', 'uses' => __BASECLIENT__ . '\ProductController@productDetails']);
    });
});


/* Admin */


Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', ['as' => 'admin.index', 'uses' => __BASEADMIN__ . '\HomeController@index']);

    // Categories
    Route::resource('categories', __BASEADMIN__.'\CategoryController'); // Route và controller đã chỉnh sửa
    Route::post('/detach-brand', __BASEADMIN__.'\CategoryController@detach_brand')->name('detach-brand');
    //Request
    Route::resource('/brand', __BASEADMIN__.'\BrandController');

    Route::resource('/products', __BASEADMIN__.'\ProductController');

    Route::resource('/user', __BASEADMIN__.'\UserController');
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

