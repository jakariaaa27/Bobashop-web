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



// Auth::routes();

// Start Backend
Route::group(['prefix' => 'admin'], function () {	
	Route::group(['namespace' => 'Backend'], function () {
		Auth::routes();
		Route::group(['middleware' => 'auth'], function () {
			Route::resource('city', 'CityController');
			Route::resource('district', 'DistrictController');
			Route::resource('type','TypeController');
			Route::resource('users','UsersController');
			Route::resource('destination','DestinationController');
			Route::resource('guide','GuideController');
			Route::resource('profile','ProfileController');
			Route::get('/dashboard', 'HomeController@index');
			Route::get('/add/city', 'CityController@create');
			Route::get('/add/district', 'DistrictController@create');
			Route::get('/add/type', 'TypeController@create');
			Route::get('/add/users', 'UsersController@create');
			Route::get('/post/destination', 'DestinationController@create');
			Route::get('/add/guide', 'GuideController@create');
			Route::get('/setting/backend', 'SettingController@IndexBackend');
			Route::get('/setting/frontend', 'SettingController@IndexFrontend');
			Route::get('/change-password', 'ProfileController@PWIndex');
			Route::get('/setting/backend{}', 'Setting@PWIndex');
			Route::post('/getdistrictbyid', 'DistrictController@getDistrict');
			Route::put('/update/change-password/{id}', 'ProfileController@updatePassword')->name('ChangePW');
			Route::put('/update/setting/Frontend/{id}', 'SettingController@updateFrontend')->name('UpdateFrontend');
			Route::put('/update/setting/Backend/{id}', 'SettingController@updateBackend')->name('UpdateBackend');
			Route::delete('/delete/city/{id}', 'CityController@destroy');
			Route::delete('/delete/district/{id}', 'DistrictController@destroy');
			Route::delete('/delete/type/{id}', 'TypeController@destroy');
			Route::delete('/delete/users/{id}', 'UsersController@destroy');
			Route::delete('/delete/destination/{id}', 'DestinationController@destroy');
			Route::delete('/delete/guide/{id}', 'GuideController@destroy');
		});
	});
});

// Start Frontend
Route::group(['namespace' => 'Frontend'], function () {
	// Route::get('/register', function () {
	// 	return view('Frontend.auth.register');
	// })->name('register');

	Route::get('/register', '\App\Http\Controllers\Frontend\Auth\RegisterController@showRegistrationForm')->name('register.show');
    Route::post('/register', '\App\Http\Controllers\Frontend\Auth\RegisterController@register')->name('register.perform');

	// Route::get('/register', '\App\Http\Controllers\Frontend\Auth\RegisterController@showRegistrationForm');
	Route::get('/', 'FrontendController@index');
	Route::get('/maps', 'FrontendController@Maps');
	Route::get('/destination/detail/{id}', 'FrontendController@destinationDetail');
	Route::get('/search/destination', 'FrontendController@searchDestination');
	Route::post('/search/destination', 'FrontendController@searchDestination')->name('searchDest');
	Route::get('/category/{id}', 'FrontendController@categoryDestination');
	Route::get('/guide/{id}', 'FrontendController@guideDestination');

});
