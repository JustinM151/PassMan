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
Route::get('/', 'HomeController@index')->name('home');

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
Route::POST('authenticate','Auth\TwoFactorPinController@auth')->name('2FA.authenticate');
Route::get('authenticate','Auth\TwoFactorPinController@require')->name('2FA.require');
Route::get('authenticate/resend','Auth\TwoFactorPinController@resend')->name('2FA.resend');

/////////// SETUP ///////////
Route::get('/setup', 'SetupController@setup');


/////////// DEMO ///////////
Route::get('/demo', 'PasswordController@randomPass');