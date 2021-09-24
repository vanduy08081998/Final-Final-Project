<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
});


/* Admin */


Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', ['as' => 'clients.index', 'uses' => __BASEADMIN__ . '\HomeController@index']);

    // Categories
    Route::resource('categories', __BASEADMIN__.'\CategoryController'); // Route và controller đã chỉnh sửa
    Route::post('/detach-brand', __BASEADMIN__.'\CategoryController@detach_brand')->name('detach-brand');
    //Request
    Route::resource('/brand', __BASEADMIN__.'\BrandController');

    Route::resource('/products', __BASEADMIN__.'\ProductController');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

