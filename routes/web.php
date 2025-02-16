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

Route::get('/unique', 'HandicapController@unique');

Route::get('/set_presume/{id}/{val}', 'PatientController@set_presume');

/** PATIENT ROUTES **/

Route::get('/patients/{filters?}', 'PatientController@show_patients'); /* non validated to edit */
Route::get('/validate_patients/{filters?}', 'PatientController@validate_patients'); /* to validate non validated */
Route::get('/validated_patients/{filters?}', 'PatientController@validated_patients'); /* validated */
Route::get('/rejected_patients/{filters?}', 'PatientController@rejected_patients'); /* rejected */

Route::get('/add_patient', 'PatientController@add_patient');
Route::get('/edit_patient/{id}', 'PatientController@edit_patient');
Route::get('/validate_patient/{id}', 'PatientController@validate_patient');
Route::get('/delete_patient/{id}', 'PatientController@delete_patient');

Route::post('/insert_patient', 'PatientController@insert_patient');
Route::post('/update_patient', 'PatientController@update_patient');
Route::post('/confirm_patient', 'PatientController@confirm_patient');

Route::get('/stats/{annee?}/{mois?}', 'PatientController@stats');
Route::get('/get_stats/{annee?}/{mois?}', 'PatientController@get_stats');

/** USER ROUTES **/
Route::get('/users', 'UsersController@users');
Route::post('/add_user', 'UsersController@add_user');
Route::get('/modify_user/{id}', 'UsersController@modify_user');
Route::post('/update_user', 'UsersController@update_user');
Route::post('/delete_user', 'UsersController@delete_user');
Route::post('/chnage_profile_photo','UsersController@chnage_profile_photo');

/** ATTESTATIONS ROUTES */

Route::get('/fiche/{id}/{type}', 'AttestationController@fiche');
Route::get('/decision/{id}/', 'AttestationController@decision');
Route::get('/get_last/{handicap}', 'AttestationController@get_last');
Route::get('/padding/{val}', 'AttestationController@padding');
Route::get('/paddings/{name}/{val}', 'AttestationController@paddings');
/** HANDICAPS ROUTES */
Route::get('/ajouter_handicap/', 'HandicapController@ajouter');
Route::get('/modifier_handicap/{id}', 'HandicapController@modifier');
Route::get('/handicaps/', 'HandicapController@index');

Route::post('/insert_handicap/', 'HandicapController@add_handicap');
Route::post('/update_handicap/', 'HandicapController@update_handicap');

/** DESISTEMENT ROUTES */
Route::get('/select/{type?}/{filters?}', 'RecoursController@select');

Route::get('/ajouter_desistement/{id}', 'RecoursController@ajouter_desistement');
Route::get('/delete_desistement/{id}', 'RecoursController@delete_desistement');
Route::get('/confirm_desistements/{filters?}', 'RecoursController@confirm_desistements');
Route::get('/desistements/{filters?}', 'RecoursController@desisted');
Route::get('/desistements_not/{filters?}', 'RecoursController@desisted_not');

Route::get('/confirm_desistement/{id}', 'RecoursController@confirm_desistement');
Route::post('/desist_patient', 'RecoursController@desist_patient');

/** RECOURS ROUTES */
Route::get('/ajouter_recours/{id}', 'RecoursController@ajouter_recours');
Route::get('/edit_recours/{id}', 'RecoursController@edit_recours');
Route::get('/edit_real_recours/{id}', 'RecoursController@edit_real_recours');
Route::get('/delete_recours/{id}', 'RecoursController@delete_recours');
Route::get('/confirm_recours/{filters?}', 'RecoursController@confirm_recours');
Route::get('/recours/{filters?}', 'RecoursController@recours');
Route::get('/recours_not/{filters?}', 'RecoursController@recours_not');

Route::get('/confirmer_recours/{id}', 'RecoursController@confirmer_recours');

Route::post('insert_recours', 'RecoursController@insert_recours');
Route::post('update_recours', 'RecoursController@update_recours');
Route::post('update_real_recours', 'RecoursController@update_real_recours');
Route::post('validate_recours', 'RecoursController@validate_recours');

/** AUTH ROUTES **/
Auth::routes();
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');


Auth::routes();


