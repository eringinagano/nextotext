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

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes([
    'register' => false
]);

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('/linelogin/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', function() {
    return view('top');
});

Route::group(['prefix' => 'profile'], function() {
    Route::get('{id}', 'ProfileController@showProfile');
    Route::get('{id}/edit', 'ProfileController@showEditProfile');
    Route::get('{id}/detail', 'ProfileController@showSellbookDetail');
    Route::post('{id}/update', 'ProfileController@editProfile');
});

Route::group(['prefix' => 'textbook', 'as' => 'textbook.'], function() {
    Route::get('index', 'TextbookController@showTextbooks')->name('index');
    Route::get('post', 'TextbookController@showTextbookForm')->name('post');
    Route::get('favorites', 'TextbookController@showFavorites')->name('favorites');
    Route::get('{textbook}', 'TextbookController@showTextbookDetail')->name('detail');
    Route::get('{textbook}/chat', 'TextbookController@addChat')->name('chat');
    Route::post('post', 'TextbookController@postTextbookForm')->name('post');
    Route::post('category', 'TextbookController@checkCategory')->name('category');
    Route::post('search', 'TextbookController@searchWord')->name('search');
    Route::post('{textbook}/favorite', 'TextbookController@addFavoriteTextbook')->name('favorite');
    Route::post('{textbook}/remove', 'TextbookController@removeFavoriteTextbook')->name('remove');
});

Route::group(['prefix' => 'message', 'as' => 'message.'], function() {
    Route::get('/', 'MessageController@showMessages')->name('index');
    Route::get('{group}/detail', 'MessageController@showMessageDetail')->name('detail');
    Route::get('{group}/delete', 'MessageController@showDeleteForm');
    Route::post('{group}/detail', 'MessageController@postMessage');
    Route::post('{group}/delete', 'MessageController@deleteChat');
});

Route::group(['prefix' => 'mylist', 'as' => 'mylist.'], function() {
   Route::get('/', 'MyListController@showMyList')->name('index');
   Route::get('register', 'MyListController@showRegisterForm')->name('register');
   Route::post('register', 'MyListController@addTextbook')->name('register');
   Route::post('{mylist}/delete', 'MyListController@deleteMylist');
});
