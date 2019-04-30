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
Route::get('/store/view/{slug}', 'StoreController@index')->name('store-view');
Route::get('/store/access/{slug}', 'StoreController@access')->name('store-access');
Route::get('/store/access/{slug}/campaign/{uuid}', 'CouponController@access')->name('coupon-access');
Route::get('/stores','StoreController@show')->name('all-stores');
Route::get('/stores/{slug}','StoreController@filter')->name('stores.filter');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); // display account info
    Route::get('/balance', 'DashboardController@index')->name('balance'); // display current paycheck balance
    Route::get('/withdrawal-history', 'DashboardController@withdrawal')->name('withdrawal-history'); // display withdrawal history
    Route::get('/settings', 'DashboardController@settings')->name('settings'); // display account settings
    Route::get('/subsriptions', 'DashboardController@index')->name('subscriptions'); // display current subscriptions
    Route::get('/trips', 'DashboardController@trips')->name('trips'); // display all trips
});


// Auth::routes();
// Authentication Routes...
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
 
Route::post('/login', 'Auth\LoginController@loginAjax')->name('user.login');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('logout/', 'Admin\Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

    Route::get('/members', 'Admin\MembersController@members')->name('admin.members');
    Route::get('/members-list', 'Admin\MembersController@membersList')->name('admin.members.list');
    Route::get('/members/remove/{user}', 'Admin\MembersController@remove')->name('admin.member.remove');
    Route::get('/members/view/{user}', 'Admin\MembersController@view')->name('admin.member.view');
    Route::get('/members/edit/{user}', 'Admin\MembersController@edit')->name('admin.member.edit');
    Route::post('/members/edit/{user}', 'Admin\MembersController@update')->name('admin.member.update');
    Route::post('/members/password/reset', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.member.password.reset');
    Route::get('/members/add', 'Admin\MembersController@add')->name('admin.member.add');
    Route::post('/members/add', 'Admin\MembersController@create')->name('admin.member.create');

    Route::get('/retailers', 'Admin\RetailersController@retailers')->name('admin.retailers');
    Route::get('/retailers/view/{retailer}', 'Admin\RetailersController@view')->name('admin.retailer.view');
    Route::get('/retailers/edit/{retailer}', 'Admin\RetailersController@edit')->name('admin.retailer.edit');
    Route::post('/retailers/edit/{retailer}', 'Admin\RetailersController@update')->name('admin.retailer.update');
    Route::get('/retailers/add', 'Admin\RetailersController@add')->name('admin.retailer.add');
    Route::post('/retailers/add', 'Admin\RetailersController@create')->name('admin.retailer.create');

    Route::get('/categories', 'Admin\CategoriesController@categories')->name('admin.categories');
    Route::get('/categories/view/{category}', 'Admin\CategoriesController@view')->name('admin.category.view');
    Route::get('/categories/edit/{category}', 'Admin\CategoriesController@edit')->name('admin.category.edit');
    Route::post('/categories/edit/{category}', 'Admin\CategoriesController@update')->name('admin.category.update');
    Route::get('/categories/add', 'Admin\CategoriesController@add')->name('admin.category.add');
    Route::post('/categories/add', 'Admin\CategoriesController@create')->name('admin.category.create');
}) ;

Route::get('/home', 'HomeController@index')->name('home');

