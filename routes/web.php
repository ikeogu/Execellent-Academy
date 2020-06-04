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

Route::get('/','JournalController@start' );
Route::get('contact_us','ContactController@create')->name('contact');
Route::post('contact','ContactController@store')->name('storecontact');
Route::resource('event', 'EventController');
Route::resource('about', 'AboutController');
Route::resource('journal', 'JournalController');
Route::resource('publish', 'PublishedController');
Route::resource('article', 'ArticleController');
Route::resource('category', 'CategoryController');

// open file
Route::get('open_recieved/{id}','ArticleController@readBook')->name('readBook');
Route::get('published/{id}','PublishedController@readBook')->name('read');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
