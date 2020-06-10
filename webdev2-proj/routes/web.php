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
Route::any('/webhooks/mollie', 'WebhookController@handle')->name('webhooks.mollie');

// everything with prefix {language}
Route::group(['prefix' => '{language?}'], function() { //needs to be optional for requesting reset password link 
    
    Route::get('/', 'StartController@getIndex')->name('start');
    Route::post('/', 'MailController@store')->name('subscribe');

    Route::get('/pages/{slug}', 'PagesController@getIndex')->name('pages.read');
    
    Route::get('/donate', 'DonationsController@getIndex')->name('donate');
    Route::post('/donate', 'DonationsController@preparePayment')->name('donate.pay');
    Route::get('/donate/succes', 'DonationsController@getSucces')->name('donationSuccess');

    Route::get('/contact', 'ContactController@getIndex')->name('contact');
    Route::post('/contact', 'MailController@sendContact')->name('contact.save');

    Route::get('/news', 'NewsController@getIndex')->name('news');
    Route::get('/news/{slug}', 'NewsController@getDetail')->name('news.detail');   
    
    Route::get('/privacy-policy', 'PrivaciesController@getIndex')->name('privacy');
    Route::get('/about', 'AboutsController@getIndex')->name('about');

    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showReseterForm')->name('redirect.password.reset');
    Route::post('/password/reset/', 'Auth\ResetPasswordController@reset')->name('password.update');

    // prefixed everything admin with "dashboard"
    Route::group(['prefix' => 'dashboard'], function() {
        Auth::routes();

        Route::get('/', 'DashboardController@getIndex')->name('admin');

        Route::get('/homebanner', 'HomeBannerController@getIndex')->name('homeBanner');
        Route::get('/homebanner/add', 'HomeBannerController@add')->name('homeBanner.add');
        Route::post('/homebanner/add', 'HomeBannerController@save')->name('saveHomeBanner');
        Route::get('/homebanner/edit/{id}', 'HomeBannerController@edit')->name('homeBanner.edit');
        Route::get('/homebanner/destroy/{id}', 'HomeBannerController@destroy')->name('homeBanner.destroy');
        
        Route::get('/news', 'NewsAdminController@getIndex')->name('newsAdmin');
        Route::get('/news/add', 'NewsAdminController@add')->name('newsAdmin.add');
        Route::post('/news/add', 'NewsAdminController@save')->name('saveNewsAdmin');
        Route::get('/news/edit/{id}', 'NewsAdminController@edit')->name('newsAdmin.edit');
        Route::get('/news/destroy/{id}', 'NewsAdminController@destroy')->name('newsAdmin.destroy');

        Route::get('/privacy/edit', 'PrivaciesAdminController@edit')->name('privacy.edit');
        Route::post('/privacy/edit', 'PrivaciesAdminController@save')->name('savePrivacy');
        
        Route::get('/about/edit', 'AboutsAdminController@edit')->name('about.edit');
        Route::post('/about/edit', 'AboutsAdminController@save')->name('saveAbout');

        Route::get('/donations', 'DonationsAdminController@getIndex')->name('donations.read');

        Route::get('/pages', 'PagesAdminController@getIndex')->name('pages.index');
        Route::get('/pages/create', 'PagesAdminController@getCreatePage')->name('pages.create');
        Route::post('/pages/create', 'PagesAdminController@postCreatePage')->name('pages.save');
        Route::get('/pages/edit/{id}', 'PagesAdminController@getEditPage')->name('pages.edit');
        Route::get('/pages/destroy/{id}', 'PagesAdminController@destroyPage')->name('pages.destroy');

        Route::get('/newsletter', 'NewsletterAdminController@getIndex')->name('newsletter.index');
        Route::post('/newsletter', 'NewsletterAdminController@update')->name('newsletter.update');
        Route::get('/newsletter/create', 'NewsletterAdminController@create')->name('newsletter.create');
        Route::post('/newsletter/create', 'NewsletterAdminController@save')->name('newsletter.save');
        Route::get('/newsletter/edit/{id}', 'NewsletterAdminController@edit')->name('newsletter.edit');
        Route::get('/newsletter/destroy/{id}', 'NewsletterAdminController@destroy')->name('newsletter.destroy');

        Route::get('/users', 'Auth\RegisterController@getIndex')->name('users');
        Route::get('/users/register', 'Auth\RegisterController@getRegister')->name('admin.register');
        Route::post('/users/register', 'Auth\RegisterController@register')->name('saveAdmin.register');
        Route::get('/users/destroy/{id}', 'Auth\RegisterController@destroy')->name('admin.destroy');
    });
});

Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@redirecting')->name('password.reset'); //redirect to custom reset. (the sent email doesn't support {langauge} parameter)