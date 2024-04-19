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


Route::get('/rapports/{filters?}', 'RapportController@show_rapports');
Route::get('/add_rapport', 'RapportController@add_rapport');
Route::get('/add_rapport_2/{id}', 'RapportController@add_rapport_2');
Route::get('/add_outils/{id}', 'RapportController@add_outils');

Route::post('/insert_rapport', 'RapportController@insert_rapport');
Route::post('/insert_activity', 'RapportController@insert_activity');
Route::post('/insert_outils', 'RapportController@insert_outils');
Route::post('/insert_chemicals', 'RapportController@insert_chemicals');

/** USER ROUTES **/
Route::get('/users', 'UsersController@users');
Route::post('/add_user', 'UsersController@add_user');
Route::get('/modify_user/{id}', 'UsersController@modify_user');
Route::post('/update_user', 'UsersController@update_user');
Route::post('/delete_user', 'UsersController@delete_user');
Route::post('/chnage_profile_photo','UsersController@chnage_profile_photo');

/** RESERVES ROUTES */
Route::get('/add_reserve/{rapport}/{outil}/{state}', 'ReserveController@add_reserve');

Route::post('/insert_reserve', 'ReserveController@insert_reserve');


/** AUTH ROUTES **/
Auth::routes();
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');


Auth::routes();


