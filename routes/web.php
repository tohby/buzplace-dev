<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Spatie\Honeypot\ProtectAgainstSpam;

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

 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/the-hub');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(ProtectAgainstSpam::class)->group(function() {
    Auth::routes();
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login/google', 'Auth\LoginController@redirectToProvider');
    Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
    Route::get('/', 'HomeController@landingPage');
    Route::get('/posts', 'GuestNewsController@posts');
});
Route::get('/news', 'NewsController@index');
Route::get('/news/{canvas}', 'NewsController@show');
Route::group(['middleware' => 'auth'], function() {
    Route::resource('/the-hub', 'HubController');
    Route::resource('/directories', 'DirectoriesController');

    Route::get('/profile/{user}', 'ProfileController@show');
    Route::get('/profile/{user}/edit', 'ProfileController@edit');
    Route::resource('/profile', 'ProfileController', ['names'=>[
        'view'=>'profile.view',
        'edit'=>'profile.edit'
    ]]);
  
    Route::get('/the-hub/{slug}', ['as'=>'post.view', 'uses'=>'HubController@show']);
    Route::get('directories/search/{searchKey}', 'DirectoriesController@search');
    Route::post('directories/search', 'DirectoriesController@search');
    Route::resource('/consultation', 'ConsultationController');
});
