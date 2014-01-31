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
	Area::all();
	County::all();
	Employee::all();
	Employeeorder::all();
	Geographcompartment::all();
	Order::all();
	Orderstate::all();
	Product::all();
	Store::all();
	Storeproduct::all();
	Town::all();
	User::all();
	Usergroup::all();
	Warehouse::all();
	return View::make('hello');
});

Route::controller('database', 'Slave\Dbtools\DbtoolsController');
Route::controller('auth', 'Slave\Login\LoginController');