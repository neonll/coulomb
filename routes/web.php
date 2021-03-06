<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
//    return view('welcome');
    return view('layout.app');
});

Route::get('sessions/checkFile', 'SessionController@checkFile');
Route::get('sessions/getFile', 'SessionController@getFile');
Route::get('sessions/getCurrentSession', 'SessionController@getCurrentSession');
Route::get('sessions/getCurrentState', 'SessionController@getCurrentState');
Route::post('sessions/deleteFile', 'SessionController@deleteFile');
Route::post('sessions/putFile', 'SessionController@putFile');
Route::get('sessions/{session}/getAjaxPoints/{lastload?}', 'SessionController@getAjaxPoints');
Route::resource('sessions', 'SessionController');

Route::post('profiles/saveProfile', 'ProfileController@saveProfile');
Route::delete('profiles/deleteProfile', 'ProfileController@deleteProfile');
Route::get('profiles/getProfilesList/{type}', 'ProfileController@getProfilesList');
Route::get('profiles/getProfile/{profile}', 'ProfileController@getProfile');

Route::post('preferences/save', 'PreferencesController@save');

Route::get('coulomb/getData', 'CoulombController@getData');
