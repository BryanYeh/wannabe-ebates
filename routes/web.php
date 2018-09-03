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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/store/view/{slug}', 'StoreController@index')->name('index');
Route::get('/store/access/{slug}', 'StoreController@access')->name('store-access');
Route::get('/store/access/{slug}/campaign/{uuid}', 'CouponController@access')->name('coupon-access');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); // display account info
    Route::get('/balance', 'DashboardController@index')->name('balance'); // display current paycheck balance
    Route::get('/withdrawal-history', 'DashboardController@index')->name('withdrawal-history'); // display withdrawal history
    Route::get('/settings', 'DashboardController@settings')->name('settings'); // display account settings
    Route::get('/subsriptions', 'DashboardController@index')->name('subscriptions'); // display current subscriptions
    Route::get('/trips', 'DashboardController@index')->name('trips'); // display all trips
});


Auth::routes();

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Admin\Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
}) ;

Route::get('/home', 'HomeController@index')->name('home');

