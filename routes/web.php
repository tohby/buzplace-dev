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
    Route::resource('/profile', 'ProfileController', ['names'=>[
        'view'=>'profile.view',
        'edit'=>'profile.edit'
    ]]);
    Route::get('/profile/{user}/add_product', 'ProfileController@create_product');
    Route::post('add_product', 'ProfileController@store_product');
    Route::resource('/product', 'ProductsController', ['names'=>[
        'edit'=>'profile.edit_product'
    ]]);
    Route::post('comment', 'NewsController@storeComment');
    Route::post('comment/reply', 'CommentRepliesController@store');
    Route::get('comment/delete/{id}', 'NewsController@deleteComment');
    Route::get('comment/edit/{id}', 'NewsController@editComment');
    Route::get('comment/reply/delete/{id}', 'CommentRepliesController@destroy');
    Route::get('comment/reply/edit/{id}', 'CommentRepliesController@edit');
});
