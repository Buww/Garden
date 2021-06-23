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

Route::get('/', 'HomeController@index');
Route::post('/entrySave', 'HomeController@entrySave');
Route::post('/departureSave', 'HomeController@departureSave');

Route::post('/childrenEntry', 'HomeController@entry');
Route::post('/childrenDeparture', 'HomeController@departure');

Route::get('/registration', 'RegistrationController@index');
Route::post('/registration', 'RegistrationController@store');

Route::get('/recap', 'RecapController@index');
Route::post('/recap', 'RecapController@find');