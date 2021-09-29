<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AttributeController;

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
    Route::prefix('/cart')->group(function () {
        Route::get('/cart-list', ['as' => 'cart.cart-list', 'uses' => __BASECLIENT__ . '\CartController@cartlist']);
    });
    Route::prefix('/account')->group(function () {
        Route::get('/order-tracking', ['as' => 'account.order-tracking', 'uses' => __BASECLIENT__ . '\AccountController@orderTracking']);
        Route::get('/wishlist', ['as' => 'account.wishlist', 'uses' => __BASECLIENT__ . '\AccountController@wishlist']);
        Route::get('/order-list', ['as' => 'account.order-list', 'uses' => __BASECLIENT__ . '\AccountController@orderList']);
        Route::get('/account-info', ['as' => 'account.account-info', 'uses' => __BASECLIENT__ . '\AccountController@accountInfo']);
        Route::get('/account-address', ['as' => 'account.account-address', 'uses' => __BASECLIENT__ . '\AccountController@accountAddress']);
        Route::get('/account-payment', ['as' => 'account.account-payment', 'uses' => __BASECLIENT__ . '\AccountController@accountPayment']);
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

<<<<<<< HEAD
    //Attributes
    Route::resource('/attribute', AttributeController::class);
    Route::get('/attribute/{id}', [CategoryController::class, 'attribute'])->name('attribute');
=======
    Route::resource('/user', __BASEADMIN__.'\UserController');
>>>>>>> main
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

