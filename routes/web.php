<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Admin\BlogCateController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\FlashDealController;
use App\Http\Controllers\Clients\AccountController;
use App\Http\Controllers\Clients\ProductController;
use App\Http\Controllers\Clients\CheckoutController;
use App\Http\Controllers\Clients\HomeController as HomeClient;
use App\Http\Controllers\Admin\ProductController as ProductAdmin;

use App\Http\Controllers\Auth\LoginController;



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
    Route::get('/blog', [HomeClient::class, 'blog'])->name('clients.blog');
    Route::get('/contact', [HomeClient::class, 'contact'])->name('clients.contact');
    Route::get('/about', [HomeClient::class, 'about'])->name('clients.about');
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
        Route::get('/product-details/{slug}', [ProductController::class, 'productDetails'])->name('shop.product-details');
    });
    Route::prefix('/cart')->group(function () {
        Route::get('/cart-list', [CartController::class,'cartList'])->name('cart.cart-list');
    });
    Route::prefix('/account')->group(function () {
        Route::get('/order-tracking', [AccountController::class, 'orderTracking'])->name('account.order-tracking');
        Route::get('/order-list', [AccountController::class, 'orderList'])->name('account.order-list');
        Route::get('/account-info', [AccountController::class, 'accountInfo'])->name('account.account-info');
        Route::get('/account-address', [AccountController::class, 'accountAddress'])->name('account.account-address');
        Route::get('/account-payment', [AccountController::class, 'accountPayment'])->name('account.account-payment');
        Route::get('/wishlist', [AccountController::class, 'wishlist'])->name('account.wishlist');
    });
});


/* Admin */
Route::group(['prefix' => 'admin'], function(){
// Dashboard
    Route::get('/', [HomeController::class, 'index'] )->name('admin.index');

    // Categories
    Route::resource('categories', CategoryController::class);
    Route::get('/detach-brand/{brand_id}/{cate_id}', [CategoryController::class,'detach_brand'])->name('detach-brand');
    Route::post('/add-attr-category/{cate_id}', [CategoryController::class, 'add_attr_category'])->name('add_attr_category');
    //Brand
    Route::get('/brand/trash', [BrandController::class, 'trash'])->name('trash');
    Route::post('/brand/restore/{id}', [BrandController::class, 'restore'])->name('restore');
    Route::post('/brand/force-delete/{id}', [BrandController::class, 'forceDelete'])->name('forceDelete');
    Route::resource('/brand', BrandController::class );

    Route::resource('/products', ProductAdmin::class );
    Route::get('product__attributes', [ProductAdmin::class , 'getProductAttributes'])->name('admin.product__attributes');
    Route::get('product__variants', [ProductAdmin::class, 'productVariants'])->name('admin.product__variants');
    Route::post('/sku_combinations', [ProductAdmin::class, 'sku_combinations'])->name('sku_combinations');
    Route::post('/sku_combinations_edit', [ProductAdmin::class, 'sku_combinations_edit'])->name('sku_combinations_edit');
    //Attributes
    Route::resource('/attribute', AttributeController::class);
    Route::get('/category-attribute/{id}', [CategoryController::class, 'attribute'])->name('attribute');
    Route::get('/detach_cate_attr/{attr_id}/{cate_id}', [CategoryController::class, 'detach_cate_attr'])->name('detach_cate_attr');
    Route::get('/variant-attribute/{slug}', [AttributeController::class, 'variant'])->name('variant');
    Route::get('/list_variants', [AttributeController::class, 'list_variants'])->name('list_variants');
    Route::post('/add_variants', [AttributeController::class, 'add_variants'])->name('add_variants');
    Route::get('/delete_variants', [AttributeController::class, 'delete_variants'])->name('delete_variants');


    Route::resource('/flash-deals', FlashDealController::class);
    //Route prefix function

    Route::get('filemanager', function () {
        return view('admin.FileManager.index');
    })->name('filemanager');

    Route::resource('blogCate', BlogCateController::class);
    Route::resource('blogs', BlogController::class);

    //user
Route::resource('/users', UserController::class );
Route::get('/user/trash', [UserController::class, 'trash'])->name('user_trash');
Route::post('/user/restore/{id}', [UserController::class, 'restore'])->name('user_restore');
Route::post('/user/force-delete/{id}', [UserController::class, 'forceDelete'])->name('user_forceDelete');


});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//Login Google
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

//Login Facebook
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);
