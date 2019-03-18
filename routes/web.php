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


// Route::get('/blank', function () {
//     return view('pages/blankpage');
// });
// Route::get('/chat', function () {
//     return view('pages/chat');
// });
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::group(['middleware' => 'guest'], function () {
    Route::get('login/google', 'Auth\LoginController@redirectToProvider');
    Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
    Route::get('/', function () {
        return view('welcome');
    });
});
Route::group(['middleware' => 'auth'], function() {
    Route::resource('/the-hub', 'hubController');
    Route::resource('/directories', 'directoriesController');
    Route::resource('/news', 'newsController');
    Route::get('/profile/{user}', 'profileController@show');
    Route::get('/profile/{user}/edit', 'profileController@edit');
});