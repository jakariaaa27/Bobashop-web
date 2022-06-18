<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'APIController@userLogin');
Route::post('register', 'APIController@userRegister');
Route::get('destination', 'APIController@getDestination');
Route::get('maps', 'APIController@getMaps');
Route::get('detialDestination/{id}', 'APIController@detailDestination');
Route::post('search', 'APIController@Search');

Route::post('jadwal/{username}', 'APIController@getJadwal');
Route::put('password/{id}', 'APIController@getPassword');
Route::put('profile/proses/{id}', 'APIController@updateProfile');

//GET
Route::get('tampil/jadwal/{username}', 'APIController@showJadwal');
Route::get('bayi/{id}', 'APIController@getBayi');
Route::get('perkembangan/{id}', 'APIController@getPerkembangan');
Route::get('dafbayi/{id}', 'APIController@daftarbayi');
Route::get('profile/{id}', 'APIController@getProfile');
Route::get('coba', 'APIController@notif');
Route::get('tes', 'APIController@coba');
Route::get('tes2', 'APIController@coba2'); 

// POST
// Route::post('search', 'APIController@getPencarian');
