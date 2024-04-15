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

# front end routes

Route::get('/northern-haiti', function () {
    return view('front.pages.northern-haiti');
})->name('northern-haiti');

Route::get('/our-programs', function () {
    return view('front.pages.our-programs');
})->name('our-programs');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/media', 'MediaController@index')->name('media');
Route::post('/subscription/store', 'SubscriptionController@store')->name('subscription.store');
Route::get('/news-listings', 'NewsController@index')->name('news-listings');
Route::get('/news-listings/details/{id}', 'NewsController@show')->name('news-listings-detail');
Route::get('/the-people', 'OurPeopleController@index')->name('the-people');
Route::get('/the-people/detail/{id}', 'OurPeopleController@show')->name('the-people-detail');
Route::get('/load-more-media', 'MediaController@loadMoreMedia')->name('load_more');
Route::get('/load-more-records', 'MediaController@loadMoreRecords')->name('load_more_records');
Route::get('/contact-us', 'ContactController@index')->name('contact-us');
Route::post('/contact-us/store', 'ContactController@store')->name('contact.store');

Route::get('/about-us', function () {
    return view('front.pages.about-us');
})->name('about-us');

Route::get('/terms-of-services', function () {
    return view('front.pages.terms');
})->name('terms');

Route::get('/privacy-policy', function () {
    return view('front.pages.privacy-policy');
})->name('privacy-policy');

Route::get('/support', function () {
    return view('front.pages.support');
})->name('support');

Route::get('create-transaction', 'PayPalController@createTransaction')->name('createTransaction');
Route::get('process-transaction', 'PayPalController@processTransaction')->name('processTransaction');
Route::get('successTransaction', 'PayPalController@successTransaction')->name('successTransaction');
Route::get('cancel-transaction', 'PayPalController@cancelTransaction')->name('cancelTransaction');
