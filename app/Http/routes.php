<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
//
// });
Route::get('/','boxofficecontroller@show');
Route::post('save','mastercontroller@saverecord');
Route::post('update','mastercontroller@updaterecord');
Route::post('showdata','mastercontroller@display');
Route::get('/home','mastercontroller@index');
Route::Get('/boxoffice','mastercontroller@boxoffice');
Route::post('editdata','mastercontroller@edit');
Route::post('deletedata','mastercontroller@delete');
Route::get('/auth/facebook','Auth\AuthController@redirectToProvider');
Route::get('/callback','Auth\AuthController@handleProviderCallback');
