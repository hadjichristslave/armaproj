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

Route::get('/', function()
{
	var_dump(Geographcompartment::find(1)->counties);
	echo '-----------------------------';
	var_dump(County::find(1)->compartment);
	var_dump(County::find(1)->town);
	echo '-----------------------------';
	var_dump(Town::find(1)->county);
	var_dump(Town::find(1)->area);
	echo '-----------------------------';
	var_dump(Area::find(1)->town);
	return View::make('hello');
});

Route::controller('database', 'Slave\Dbtools\DbtoolsController');
Route::controller('auth', 'Slave\Login\LoginController');