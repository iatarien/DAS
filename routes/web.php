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

Route::get('/home', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');
Route::get('/close', 'ReserveController@close');


Route::get('/patients/{filters?}', 'PatientController@show_patients');
Route::get('/add_patient', 'PatientController@add_patient');
Route::get('/edit_patient/{id}', 'PatientController@edit_patient');

Route::get('/stats/{annee?}', 'PatientController@stats');
Route::get('/get_stats/{annee?}', 'PatientController@get_stats');

Route::post('/insert_patient', 'PatientController@insert_patient');
Route::post('/update_patient', 'PatientController@update_patient');

/** USER ROUTES **/
Route::get('/users', 'UsersController@users');
Route::post('/add_user', 'UsersController@add_user');
Route::get('/modify_user/{id}', 'UsersController@modify_user');
Route::post('/update_user', 'UsersController@update_user');
Route::post('/delete_user', 'UsersController@delete_user');
Route::post('/chnage_profile_photo','UsersController@chnage_profile_photo');

/** ATTESTATIONS ROUTES */

Route::get('/fiche/{id}/{type}', 'AttestationController@fiche');

/** AUTH ROUTES **/
Auth::routes();
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');


Auth::routes();


