<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
	return View::make('hello');
});
Route::controller('app', 'AppController');
Route::controller('database', 'Slave\Dbtools\DbtoolsController');
Route::controller('auth', 'Slave\Login\LoginController');
Route::controller('calendar', 'Slave\Calendar\CalendarController');
