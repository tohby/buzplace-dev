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
    Route::resource('/the-hub', 'HubController', ['names'=>[
        'create'=>'the-hub.create'
    ]]);
    Route::resource('/directories', 'DirectoriesController');
    Route::resource('/news', 'NewsController');
    Route::get('/profile/{user}', 'ProfileController@show');
    Route::get('/profile/{user}/edit', 'ProfileController@edit');
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
    Route::get('comment/edit', 'NewsController@updateComment');
    Route::get('comment/reply/edit', 'CommentRepliesController@update');
    Route::get('/the-hub/{slug}', ['as'=>'post.view', 'uses'=>'HubController@show']);
<<<<<<< HEAD
    Route::get('/admin/messages', 'MessageController@index');
    Route::get('/loadMessage', 'MessageController@message');
    Route::post('/admin/messages/getMessage/{id}', 'MessageController@getMessage');
    Route::get('/admin/messages/sendMessage/{id}', 'MessageController@sendMessage');
    Route::get('directories/search/{searchKey}', 'DirectoriesController@search');
    Route::post('directories/search', 'DirectoriesController@search');
    Route::resource('/consultation', 'ConsultationController');
});

Route::get('/migrate', function () {
    $exitCode = Artisan::call('migrate', []);
    echo $exitCode;
    Route::post('/admin/messages/sendMessage/{id}', 'MessageController@sendMessage');
=======
    Route::get('directories/search/{searchKey}', 'DirectoriesController@search');
    Route::post('directories/search', 'DirectoriesController@search');
    Route::resource('/consultation', 'ConsultationController');
>>>>>>> 6671dd80f332d374d24891289dc4d5d5fd2997d9
});

Route::get('/migrate', function () {
    $exitCode = Artisan::call('migrate', []);
    echo $exitCode; 
});