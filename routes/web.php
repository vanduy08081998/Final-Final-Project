<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\CommentController;
use App\Http\Controllers\Customer\MailController;
use App\Http\Controllers\Admin\BlogCateController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Clients\SearchController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\FlashDealController;
use App\Http\Controllers\Clients\AccountController;

use App\Http\Controllers\Clients\ProductController;
use App\Http\Controllers\Clients\CheckoutController;
use App\Http\Controllers\Admin\InformationsController;
use App\Http\Controllers\Clients\HomeController as HomeClient;
use App\Http\Controllers\Admin\ProductController as ProductAdmin;
use App\Http\Controllers\Clients\WishlistController;
use App\Http\Livewire\Users;
use App\Models\Wishlist;

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
  Route::get('search', [SearchController::class, 'find']);
  Route::get('/blog', [HomeClient::class, 'blog'])->name('clients.blog');
  Route::get('/blog-single/{id}', [HomeClient::class, 'blogSingle'])->name('clients.blog-single');
  Route::get('/blog-category/{id}', [HomeClient::class, 'blogCategory'])->name('clients.blog-category');
  Route::get('/contact', [HomeClient::class, 'contact'])->name('clients.contact');
  Route::post('/contact', [HomeClient::class, 'feedback'])->name('clients.feedback');
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
        Route::post('/get-variant-price', [ProductController::class, 'getVariantPrice'])->name('products.get_variant_price');
        Route::get('/products-category/{id_cate}', [ProductController::class, 'productsCategory'])->name('shop.products_category');
        Route::get('/products-brand/{id}', [ProductController::class, 'productsBrand'])->name('shop.products_brand');

        
    });

    Route::prefix('/cart')->group(function () {
        Route::post('/card-add', [CartController::class, 'addToCart'])->name('card.add');
        Route::get('/cart-list', [CartController::class, 'cartList'])->name('cart.cart-list');
        Route::get('/cart-delete', [CartController::class, 'cartDelete'])->name('cart.delete');
        Route::post('/cart-update', [CartController::class, 'cartUpdate'])->name('cart.update');
        Route::get('/cart-dropdown', [CartController::class, 'cartDropdown'])->name('cart.dropdown');
    });

    Route::prefix('/account')->group(function () {
        Route::post('/update-profile-customer/{id}', [AccountController::class, 'update_profile_customer'])->name('account.update-profile-customer');
        Route::get('/order-tracking', [AccountController::class, 'orderTracking'])->name('account.order-tracking');
        Route::get('/order-list', [AccountController::class, 'orderList'])->name('account.order-list');
        Route::get('/account-info', [AccountController::class, 'accountInfo'])->name('account.account-info');
        Route::get('/account-address', [AccountController::class, 'accountAddress'])->name('account.account-address');
        Route::get('/account-payment', [AccountController::class, 'accountPayment'])->name('account.account-payment');
        Route::post('change-profile-picture', [AccountController::class, 'crop'])->name('crop');
        Route::post('/select-address', [AccountController::class, 'select_address'])->name('select-address');
    });
    // wishlist
    Route::prefix('/wishlist')->group(function () {
        Route::get('/list', [WishlistController::class, 'wishlist'])->name('account.wishlist');
        Route::post('addToWish', [WishlistController::class, 'addToWish'])->name('wishlist.addToWish');
        Route::post('deleteWishlist', [WishlistController::class, 'deleteWishlist'])->name('wishlist.deleteWishlist');
    });
    // Bình luận
    Route::resource('/comment', CommentController::class);
    Route::get('/comment/editComment/{id}', [CommentController::class, 'editComment'])->name('comment.editComment');
    Route::get('/comment/saveComment/{id}', [CommentController::class, 'saveComment'])->name('comment.saveComment');
    Route::get('/comment/recall/{id}', [CommentController::class, 'recall'])->name('comment.recall');

    Route::prefix('/search')->group(function () {
        Route::post('/searchs/',[SearchController::class, 'searchs'])->name('search.searchs');
        Route::post('/range', [SearchController::class, 'range'])->name('search.range');
    });
    Route::get('/users', Users::class);
});

/* Admin */
Route::group(['prefix' => 'admin'], function () {
  // Dashboard
  Route::get('/', [HomeController::class, 'index'])->name('admin.index');

  // Categories
  Route::resource('/categories', CategoryController::class);
  Route::get('/detach-brand/{brand_id}/{cate_id}', [CategoryController::class, 'detach_brand'])->name('detach-brand');
  Route::post('/add-attr-category/{cate_id}', [CategoryController::class, 'add_attr_category'])->name('add_attr_category');
  //Brand
  Route::get('/brand/trash', [BrandController::class, 'trash'])->name('trash');
  Route::post('/brand/restore/{id}', [BrandController::class, 'restore'])->name('restore');
  Route::post('/brand/force-delete/{id}', [BrandController::class, 'forceDelete'])->name('forceDelete');
  Route::resource('/brand', BrandController::class);

  Route::resource('/products', ProductAdmin::class);
  Route::get('product__attributes', [ProductAdmin::class, 'getProductAttributes'])->name('admin.product__attributes');
  Route::get('product__variants', [ProductAdmin::class, 'productVariants'])->name('admin.product__variants');
  Route::get('product__warehouse/{product}', [ProductAdmin::class, 'productWarehouse'])->name('products.warehouse');
  Route::post('product__edit__warehouse/{id}', [ProductAdmin::class, 'producEditWarehouse'])->name('products.editwarehouse');
  Route::post('product__edit__quantity/{id}', [ProductAdmin::class, 'producEditQuantity'])->name('products.editquantity');
  Route::post('product__feature', [ProductAdmin::class, 'editProductFeature'])->name('admin.product-feature');
  Route::post('deals_today', [ProductAdmin::class, 'editDealsToday'])->name('admin.deals-today');
  Route::post('/sku_combinations', [ProductAdmin::class, 'sku_combinations'])->name('sku_combinations');
  Route::put('/sku_combinations_edit', [ProductAdmin::class, 'sku_combinations_edit'])->name('sku_combinations_edit');
  Route::get('/edit_product_feature', [ProductAdmin::class, 'editProductFeature'])->name('products.feature');
  //Attributes
  Route::resource('/attribute', AttributeController::class);
  Route::get('/category-attribute/{id}', [CategoryController::class, 'attribute'])->name('attribute');
  Route::get('/detach_cate_attr/{attr_id}/{cate_id}', [CategoryController::class, 'detach_cate_attr'])->name('detach_cate_attr');
  Route::get('/variant-attribute/{slug}', [AttributeController::class, 'variant'])->name('variant');
  Route::get('/list_variants', [AttributeController::class, 'list_variants'])->name('list_variants');
  Route::post('/add_variants', [AttributeController::class, 'add_variants'])->name('add_variants');
  Route::get('/delete_variants', [AttributeController::class, 'delete_variants'])->name('delete_variants');
  //banner
  Route::resource('/banners', BannerController::class);
  // Discount
  Route::resource('/discount', DiscountController::class);

  Route::resource('/flash-deals', FlashDealController::class);
  //Route prefix function

  Route::get('filemanager', function () {
    echo "<script>window.location='" . url('/') . "/rfm/filemanager/dialog.php'</script>";
  })->name('filemanager');

  Route::resource('blogCate', BlogCateController::class);
  Route::resource('blogs', BlogController::class);
  Route::get('/blogs/BlogOn/{id}', [BlogController::class, 'BlogOn'])->name('blogs.BlogOn');
  Route::get('/blogs/BlogOff/{id}', [BlogController::class, 'BlogOff'])->name('blogs.BlogOff');
  Route::resource('informations', InformationsController::class);
  Route::get('/informations/InforOn/{id}', [InformationsController::class, 'InforOn'])->name('informations.InforOn');
  Route::get('/informations/InforOff/{id}', [InformationsController::class, 'InforOff'])->name('informations.InforOff');

  //user
  Route::get('/admin-trash', [UserController::class, 'admin_trash'])->name('admin_trash');
  Route::get('/customer-trash', [UserController::class, 'customer_trash'])->name('customer_trash');
  Route::post('/users/restore/{id}', [UserController::class, 'restore'])->name('user_restore');
  Route::post('/users/force-delete/{id}', [UserController::class, 'forceDelete'])->name('user_forceDelete');
  route::get('/assign-roles/{id}', [UserController::class, 'assignRoles'])->name('assign-roles');
  route::post('/insert-roles/{id}', [UserController::class, 'insertRoles'])->name('insert-roles');
  Route::get('/list-customer', [UserController::class, 'list_customer'])->name('list_customer');
  Route::get('/list-role', [UserController::class, 'list_role'])->name('list-role');
  Route::get('/delete-role/{id}', [UserController::class, 'delete_role'])->name('delete-role');
  Route::post('/create_role', [UserController::class, 'create_role'])->name('create-role');
  Route::get('/add-permissions/{id}', [UserController::class, 'add_permissions'])->name('add_permissions');
  Route::post('/assign-permissions/{id}', [UserController::class, 'assign_permissions'])->name('assign_permissions');
  Route::get('/add-redirect-permissions/{id}', [UserController::class, 'add_redirect_permissions'])->name('add_redirect_permissions');
  Route::post('/assign-redirect-permissions/{id}', [UserController::class, 'assign_redirect_permissions'])->name('assign_redirect_permissions');
  Route::get('impersonate/{id}', [UserController::class, 'impersonate'])->name('impersonate');
  Route::resource('/users', UserController::class);
});
Route::get('/impersonate-destroy', [UserController::class, 'impersonate_destroy'])->name('impersonate_destroy');




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//Login Google
Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

//Login Facebook
Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleFacebookCallback']);