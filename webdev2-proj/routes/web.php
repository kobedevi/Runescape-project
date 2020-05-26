<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@getIndex')->name('home');
Route::get('/homebanner/add', 'HomeBannerController@add')->name('addHomeBanner');
Route::post('/homebanner/save', 'HomeBannerController@save')->name('saveHomeBanner');


