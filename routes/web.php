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

// 页面
Route::get('dashboard', 'DashboardController@index')
    ->name('dashboard.index');
Route::get('dashboard/settings', 'DashboardController@settings')
    ->name('dashboard.settings');
Route::get('website', 'WebsiteController@index')
    ->name('website.index');

// api-设置
Route::post('settings', 'SettingController@store');
Route::put('settings/{setting}', 'SettingController@update');

