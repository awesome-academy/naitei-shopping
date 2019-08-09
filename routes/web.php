<?php
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
Route::prefix('/admin')->group(function(){
    Route::middleware('admin.auth')->group(function(){
        Route::get('/', 'Admin\DashboardController@index')->name('admin_dashboard_index');
        Route::prefix('/user')->group(function(){
            Route::get('/', 'Admin\UserController@index')->name('admin_user_index');
            Route::get('/create', 'Admin\UserController@create')->name('admin_user_create');
            Route::post('/store', 'Admin\UserController@store')->name('admin_user_store');
            Route::get('/show/{id?}', 'Admin\UserController@show')->name('admin_user_show');
            Route::get('/edit/{id?}', 'Admin\UserController@edit')->name('admin_user_edit');
            Route::post('/update/{id?}', 'Admin\UserController@update')->name('admin_user_update');
            Route::get('/delete/{id?}', 'Admin\UserController@destroy')->name('admin_user_destroy');
        });
        Route::prefix('/product')->group(function(){
            Route::get('/', 'Admin\ProductController@index')->name('admin_product_index');
            Route::get('/create', 'Admin\ProductController@create')->name('admin_product_create');
            Route::post('/store', 'Admin\ProductController@store')->name('admin_product_store');
            Route::get('/show/{id?}', 'Admin\ProductController@show')->name('admin_product_show');
            Route::get('/edit/{id?}', 'Admin\ProductController@edit')->name('admin_product_edit');
            Route::post('/update/{id?}', 'Admin\ProductController@update')->name('admin_product_update');
            Route::get('/delete/{id?}', 'Admin\ProductController@destroy')->name('admin_product_destroy');
            Route::post('/import', 'Admin\ProductController@importData')->name('admin_product_import_data');
        });
        Route::get('/category', 'Admin\CategoryController@index')->name('admin_category_index');
        Route::get('/order', 'Admin\OrderController@index')->name('admin_order_index');
        Route::get('/logout', 'Admin\AuthController@logout')->name('admin_logout');
    });
    Route::middleware('admin.auth.logined')->group(function(){
        Route::get('/login', 'Admin\AuthController@index')->name('admin_login_index');
        Route::post('/login', 'Admin\AuthController@login')->name('admin_login');
    });
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{id?}', 'ProductController@show')->name('product_detail');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/register', 'Auth\RegisterController@create')->name('register');
Route::post('/register', 'Auth\RegisterController@store');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/product/{id?}', 'UserController@comment')->name('user.comment');
