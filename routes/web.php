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

Auth::routes();

/////////// DASHBOARD ///////////
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function() {
    if(\Illuminate\Support\Facades\Auth::check()) {
        return redirect('/home');
    }
    return redirect('/login');
});

/////////// PORTALS ///////////
Route::get('/portals', 'PortalController@index')->name('portals');
Route::post('/portals', 'PortalController@store')->name('portals.store');
Route::get('/portals/search', 'PortalController@search')->name('portals.search');

Route::get('/portals/new', 'PortalController@create');

Route::get('/portals/{id}', 'PortalController@show');
Route::patch('/portals/{id}', 'PortalController@update');

/////////// PASSWORDS ///////////
Route::post('/passwords/random', 'PasswordController@storeRandom')->name('passwords.storeRandom');
Route::post('/passwords', 'PasswordController@store')->name('passwords.store');

Route::get('/passwords/search', 'PasswordController@search')->name('passwords.search');
Route::get('/passwords/{pass}', 'PasswordController@show')->name('passwords.show');

/////////// TWO FACTOR AUTH ///////////
Route::post('authenticate','Auth\TwoFactorPinController@authenticate')->name('2FA.authenticate');
Route::get('authenticate','Auth\TwoFactorPinController@require')->name('2FA.require');
Route::get('authenticate/resend','Auth\TwoFactorPinController@resend')->name('2FA.resend');

/////////// USERS ///////////
Route::get('/users/{user}', 'UserController@show')->name('users.show');
Route::patch('/users/{user}', 'UserController@update')->name('users.update');
Route::patch('/users/{user}/password', 'UserController@updatePassword')->name('users.updatePassword');
Route::patch('/users/{user}/2fa', 'UserController@update2FA')->name('users.update2FA');


/////////// SETUP ///////////
Route::get('/setup', 'SetupController@setup');


/////////// DEMO ///////////
Route::get('/demo', 'PasswordController@randomPass');