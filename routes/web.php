<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Clients\HomeController as HomeClient;
use App\Http\Controllers\Clients\CheckoutController;
use App\Http\Controllers\Clients\ProductController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\AccountController;



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
    Route::get('/', [HomeClient::class, 'index'])->name('clients.index');
    Route::get('/login', [HomeClient::class, 'login'])->name('clients.login');
    Route::prefix('/checkout')->group(function () {
        Route::get('/checkout-details', [CheckoutController::class, 'checkoutDetail'])->name('checkout.checkout-details');
        Route::get('/checkout-shipping', [CheckoutController::class, 'checkoutShipping'])->name('checkout.checkout-shipping');
        Route::get('/checkout-payment', [CheckoutController::class, 'checkoutPayment'])->name('checkout.checkout-payment');
        Route::get('/checkout-complete', [CheckoutController::class, 'checkoutComplete'])->name('checkout.checkout-complete');
        Route::get('/checkout-review', [CheckoutController::class, 'checkoutReview'])->name('checkout.checkout-review');
    });
    Route::prefix('/shop')->group(function () {
        Route::get('/shop-grid', [ProductController::class, 'shopGrid'])->name('shop.shop-grid');
        Route::get('/shop-list', [ProductController::class, 'shopList'])->name('shop.shop-list');
        Route::get('/product-details', [ProductController::class, 'productDetails'])->name('shop.product-details');
    });
    Route::prefix('/cart')->group(function () {
        Route::get('/cart-list', [CartController::class,'cartList'])->name('cart.cart-list');
    });
    Route::prefix('/account')->group(function () {
        Route::get('/order-tracking', [AccountController::class, 'orderTracking'])->name('account.order-tracking');
        Route::get('/wishlist', [AccountController::class, 'wishlist'])->name('account.wishlist');
        Route::get('/order-list', [AccountController::class, 'orderList'])->name('account.order-list');
        Route::get('/account-info', [AccountController::class, 'accountInfo'])->name('account.account-info');
        Route::get('/account-address', [AccountController::class, 'accountAddress'])->name('account.account-address');
        Route::get('/account-payment', [AccountController::class, 'accountPayment'])->name('account.account-payment');
    });
});


/* Admin */


Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', [HomeController::class, 'index'] )->name('admin.index');

    // Categories
    Route::resource('categories', CategoryController::class);
    Route::post('/detach-brand', [CategoryController::class,'detach_brand'])->name('detach-brand');
    //Request
    Route::resource('/brand', BrandController::class );

    Route::resource('/products', ProductController::class );

    //Attributes
    Route::resource('/attribute', AttributeController::class);
    Route::get('/attribute/{id}', [CategoryController::class, 'attribute'])->name('attribute');
    Route::get('/variant-attribute/{slug}', [AttributeController::class, 'variant'])->name('variant');
    Route::get('/list_variants', [AttributeController::class, 'list_variants'])->name('list_variants');
    Route::post('/add_variants', [AttributeController::class, 'add_variants'])->name('add_variants');
    Route::get('/delete_variants', [AttributeController::class, 'delete_variants'])->name('delete_variants');
    Route::resource('/user', UserController::class );
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

