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

// 首页
Route::get('/', function () {
    return view('welcome');
});

// auth
Auth::routes();

// 后台
Route::get('dashboard', 'DashboardController@index')
    ->name('dashboard.index');
Route::get('dashboard/settings', 'DashboardController@settings')
    ->name('dashboard.settings');
Route::get('dashboard/company', 'DashboardController@company')
    ->name('dashboard.company');
Route::get('dashboard/flow', 'DashboardController@flow')
    ->name('dashboard.flow');
Route::get('dashboard/contact', 'DashboardController@contact')
    ->name('dashboard.contact');

/**
 * 产品
 */
Route::get('product/create', 'ProductController@create')
    ->name('product.create');
Route::post('product', 'ProductController@store');
Route::get('product/{product}', 'ProductController@edit')
    ->name('product.edit');
Route::get('product/del/{product}', 'ProductController@destroy');
Route::put('product/{product}', 'ProductController@update');
Route::get('product', 'ProductController@index')
    ->name('product.index');

// 官网
Route::get('website', 'WebsiteController@index')
    ->name('website.index');
Route::get('website/company', 'WebsiteController@company')
    ->name('website.company');
Route::get('website/flow', 'WebsiteController@flow')
    ->name('website.flow');
Route::get('website/contact', 'WebsiteController@contact')
    ->name('website.contact');
Route::get('website/product', 'WebsiteController@product')
    ->name('website.product');
Route::get('website/productdetail/{product}', 'WebsiteController@productdetail')
    ->name('website.productdetail');

// api-设置
Route::post('settings', 'SettingController@store');
Route::put('settings/{setting}', 'SettingController@update');

Route::post('company', 'CompanyController@store');
Route::put('company/{company}', 'CompanyController@update');

Route::post('flow', 'FlowController@store');
Route::put('flow/{flow}', 'FlowController@update');

Route::post('contact', 'ContactController@store');
Route::put('contact/{contact}', 'ContactController@update');
