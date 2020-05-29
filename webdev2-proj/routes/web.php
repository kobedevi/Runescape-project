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

    Route::get('/', 'StartController@getIndex')->name('start');

    Route::get('/contact', 'ContactController@getIndex')->name('contact');
    Route::post('/contact', 'MailController@sendContact')->name('contact.save');

    Route::get('/news', 'NewsController@getIndex')->name('news');
    Route::get('/news/{id}', 'NewsController@getDetail')->name('news.detail');   
    
    Route::get('/privacy-policy', 'PrivaciesController@getIndex')->name('privacy');

    
    Route::group(['prefix' => 'dashboard'], function() {
        Auth::routes(['verify' => true]);

        Route::get('/', 'DashboardController@getIndex')->name('admin');

        Route::get('/homebanner', 'HomeBannerController@getIndex')->name('homeBanner');
        Route::get('/homebanner/add', 'HomeBannerController@add')->name('homeBanner.add');
        Route::post('/homebanner/save', 'HomeBannerController@save')->name('saveHomeBanner');
        Route::get('/homebanner/edit/{id}', 'HomeBannerController@edit')->name('homeBanner.edit');
        Route::get('/homebanner/destroy/{id}', 'HomeBannerController@destroy')->name('homeBanner.destroy');
        
        Route::get('/news', 'NewsAdminController@getIndex')->name('newsAdmin');
        Route::get('/news/add', 'NewsAdminController@add')->name('newsAdmin.add');
        Route::post('/news/save', 'NewsAdminController@save')->name('saveNewsAdmin');
        Route::get('/news/edit/{id}', 'NewsAdminController@edit')->name('newsAdmin.edit');
        Route::get('/news/destroy/{id}', 'NewsAdminController@destroy')->name('newsAdmin.destroy');

        Route::get('/privacy/edit', 'PrivaciesController@edit')->name('privacy.edit');
        Route::post('/privacy/save', 'PrivaciesController@save')->name('savePrivacy');
    });

});