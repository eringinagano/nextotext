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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes([
    'register' => false
]);

Route::get('/', function() {
    return view('top');
});

Route::get('/register', 'Auth\RegisterController@getRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@postRegistrationForm')->name('register');

Route::get('/profile', 'ProfileController@showProfile')->name('profile');
Route::get('/profile/edit', 'ProfileController@showEditProfile')->name('profile.edit');
Route::post('/profile/edit', 'ProfileController@editProfile')->name('profile.edit');

Route::get('/textbook/index', 'TextbookController@showTextbooks')->name('textbook.index');
Route::get('/textbook/post', 'TextbookController@showTextbookForm')->name('textbook.post');
Route::get('/textbook/favorites', 'TextbookController@showFavorites')->name('textbook.favorites');
Route::get('/textbook/reservations', 'TextbookController@showReservations')->name('textbook.reservations');
Route::get('/textbook/{textbook}/reserve', 'TextbookController@reserveTextbook')->name('textbook.reserve');
Route::get('/textbook/{textbook}', 'TextbookController@showTextbookDetail')->name('textbook.detail');
Route::post('/textbook/post', 'TextbookController@postTextbookForm')->name('textbook.post');
Route::post('/textbook/category', 'TextbookController@checkCategory')->name('textbook.category');
Route::post('/textbook/{textbook}/favorite', 'TextbookController@addFavoriteTextbook')->name('textbook.favorite');
Route::post('/textbook/{textbook}/remove', 'TextbookController@removeFavoriteTextbook')->name('textbook.remove');

Route::get('/home', 'HomeController@index')->name('home');
