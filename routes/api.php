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

Route::group(['middleware' => 'auth.screen'], function () {
    Route::get('/screen', 'API\ScreenController@index');

    Route::get('/messages', 'API\MessageController@index');

    Route::get('/calendar', 'API\CalendarController@index');
});
