<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'DashboardController@index');

    Route::resource('/screens', 'ScreenController');

    Route::get('/household/settings', 'HouseholdController@settings')->name('household.settings');
    Route::put('/household/settings', 'HouseholdController@update')->name('household.update');

});
