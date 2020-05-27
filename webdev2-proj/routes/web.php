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

// default is en
Route::redirect('/', '/en');

Route::group(['prefix' => '{language}'], function() {
    Route::get('/', 'HomeController@getIndex')->name('home');
    Route::get('/contact', 'ContactController@getIndex')->name('contact');
    Route::post('/contact', 'MailController@sendContact')->name('contact.save');
    Route::get('/homebanner/add', 'HomeBannerController@add')->name('addHomeBanner');
    Route::post('/homebanner/save', 'HomeBannerController@save')->name('saveHomeBanner');

    // Auth::routes();
});

