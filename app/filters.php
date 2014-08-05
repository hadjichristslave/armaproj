<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

Route::filter('mail', function()
{
	$path =  Request::path();
	$needl1 = "Employeeorder";
	$needl2 = "update";
	$needl3 = Input::get('stateId');
	$id     = Input::get('id');
	if($needl3!=null){
		if(strpos($path, $needl1)>0 && strpos($path, $needl2)>0){
			if($needl3==4){
				$user = User::where('userGroup' , '=' , '4')->get();
				foreach($user as $us){
					Mail::send('emails.neworder', array('title'=>"Νέα παραγγελία!" ,
												 'name'=>$us->username, 
												 'id' =>$id), 
							function($message) use ($us){
								$message->to($us->email,"Panos")->subject('Νέα παραγγελία');
			   		});
				}
			}else if($needl3==5 && Employeeorder::find($id)->stateId==4){
				$user = User::where('userGroup' , '=' , '4')->get();
				foreach($user as $us){
					Mail::send('emails.orderclose', array('title'=>"Νέα παραγγελία!" ,
												 'name'=>$us->username, 
												 'id' =>$id), 
							function($message) use ($us){
								$message->to($us->email,"Panos")->subject('Νέα παραγγελία');
			   		});
				}
			}
		}
	}
	
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});