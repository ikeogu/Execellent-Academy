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
// Route::group(['middleware' => 'auth'], function () {
    Route::get('contact_us','ContactController@create')->name('contact');
    Route::post('contact','ContactController@store')->name('storecontact');
    Route::resource('event', 'EventController');
    Route::resource('about', 'AboutController');
    Route::resource('journal', 'JournalController');
    Route::resource('publish', 'PublishedController');
    Route::resource('article', 'ArticleController');
    Route::resource('category', 'CategoryController');
    Route::resource('book', 'BookController');
    Route::resource('author', 'AuthorController');
    Route::resource('family', 'FamilyController');
    
// });// open file
Route::get('open_recieved/{id}','ArticleController@readBook')->name('readBook');
Route::get('published/{id}','PublishedController@readBook')->name('read');
Auth::routes();
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/login');
})->name('logout');
Route::get('/dashboard', 'JournalController@create')->name('dashboard');

  //disable author and books
  Route::get('disable_auth/{author}','AuthorController@disable')->name('dis_auth');
  Route::get('enable_auth/{author}','AuthorController@enable')->name('ena_auth');
  
  Route::get('disable_book/{book}','BookController@disable')->name('dis_book');
  Route::get('enable_book/{book}','BookController@enable')->name('ena_book');

// payment
Route::post('/pay', 'BookController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'BookController@handleGatewayCallback');
Route::get('/published','PublishedController@show')->name('artpub');
Route::get('{id}/download/{email}','BookController@downloadPDF')->name('down')->middleware('signed');

Route::get('purchases','BookController@purchase_create')->name('purchase_create');
Route::delete('purchase_destroy/{id}','BookController@purchase_destroy')->name('purchase_destroy');