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

Route::get('admin', 'IndexController@index')->name('login');
Route::name('admin.')->group(
    function () {

        Route::get('/', 'IndexController@index');

        # to show login form
        Route::get('/auth/login', [
            'uses'  => 'Auth\LoginController@showLoginForm',
            'as'    => 'auth.login'
        ]);

        # login form submits to this route
        Route::post('/auth/login', [
            'uses'  => 'Auth\LoginController@login',
            'as'    => 'auth.login'
        ]);

        # logs out admin user
        # it was post method before I recieved MethodNotAllowedHttpException
        Route::any('/auth/logout', [
            'uses'  => 'Auth\LoginController@logout',
            'as'    => 'auth.logout'
        ]);

        # Password reset routes
        Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
        Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

        # shows dashboard
        Route::get('dashboard', [
            'uses'  => 'DashboardController@index',
            'as'    => 'dashboard.index'
        ]);
        Route::get('update-profile', 'AdministratorsController@editProfile')->name('update-profile');
        Route::resource('administrators', 'AdministratorsController');
        Route::post('administrators/front', 'AdministratorsController@isActive')->name('administrators.front');
        Route::resource('site-settings', 'SiteSettingsController');
        Route::post('/store-image', 'MediaController@StoreImage')->name('store_image');
        Route::post('/store-our-people-image', 'OurPeopleController@StoreImage')->name('store_ourpeople_image');
        Route::post('/store-news-image', 'NewsController@StoreImage')->name('store_news_image');
        // Route::resource('subscription', 'SubscriptionController');
        Route::get('contact/export', 'ContactController@export')->name('export');
        Route::resource('contact', 'ContactController');
        Route::get('inquiry/export', 'InquiryController@export')->name('export');
        Route::resource('inquiry', 'InquiryController');
        Route::get('free-quote/export', 'FreeQuoteController@export')->name('export');
        Route::resource('free-quote', 'FreeQuoteController');
        Route::resource('subscribe', 'SubscribeController');
        Route::resource('pages', 'PagesController');
        Route::post('pages/front', 'PagesController@isActive')->name('pages.front');
        Route::resource('media-files', 'MediaFilesController');
        Route::resource('banners', 'BannersController');
        Route::post('banners/front', 'BannersController@isActive')->name('banners.front');
        Route::resource('testimonials', 'TestimonialsController');
        Route::post('testimonials/front', 'TestimonialsController@isActive')->name('testimonials.front');
        Route::resource('media', 'MediaController');
        Route::resource('working-process', 'WorkingProcessController');
        Route::post('working-process/isactive', 'WorkingProcessController@isActive')->name('working-process.isactive');
        Route::resource('technologies', 'technologiesController');
        Route::post('technologies/front', 'technologiesController@isActive')->name('technologies.front');
        Route::resource('industries', 'industriesController');
        Route::resource('blogs', 'blogController');
        Route::post('blogs/front', 'blogController@isActive')->name('blogs.front');
        Route::post('industries/front', 'industriesController@isActive')->name('industries.front');
        Route::resource('news', 'NewsController');
        Route::resource('achievements', 'achievementsController');
        Route::post('working-process/front', 'achievementsController@isActive')->name('achievements.front');
        Route::resource('our-people', 'OurPeopleController');
        Route::post('media/reorder', 'MediaController@reorder')->name('media.reorder');
        Route::post('news/front', 'NewsController@frontPage')->name('news.front');

         // content pages route
         Route::get('/content-pages/terms', 'ContentPageController@terms')->name('content-pages.terms');
         Route::put('/content-pages/termsUpdate', 'ContentPageController@termsUpdate')->name('content-pages.termsUpdate');
 
         Route::get('/content-pages/privacy', 'ContentPageController@privacy')->name('content-pages.privacy');
         Route::put('/content-pages/privacyUpdate', 'ContentPageController@privacyUpdate')->name('content-pages.privacyUpdate');
 
         Route::get('/content-pages/about', 'ContentPageController@about')->name('content-pages.about');
         Route::put('/content-pages/aboutUpdate', 'ContentPageController@aboutUpdate')->name('content-pages.aboutUpdate');
    }
);
