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
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('/screens', 'ScreenController');

    Route::resource('/messages', 'MessageController');

    Route::get('/household/settings', 'HouseholdController@settings')->name('household.settings');
    Route::put('/household/settings/{household}', 'HouseholdController@update')->name('household.update');

    Route::get('/calendars', 'CalendarController@index')->name('calendars.index');
    Route::post('/calendars', 'CalendarController@store')->name('calendars.store');
    Route::delete('/calendars/{calendar}', 'CalendarController@destroy')->name('calendars.destroy');

});
