<?php namespace Slave\Login;

use Controller;
use Input;
use Validpack;
use Hash;
use View;
use Response;
use User;
use Mail;
use App;
use Auth;
use Redirect;


class LoginController extends Controller {
	/**
     * Basic Controller API
     * methods supported
     *
     * Post - /pathToController/login/
     * Get  - /pathToController/login/
     * Get  - /pathToController/logout/
     * Post - /pathToController/update/model/id/#tablekey
     * Post - /pathToController/delete/model/id/#tablekey
     * Get  - /pathToController/return/model/#id/#tablekey
     * #url parameters that contain hashtags are optional
     * All methods must input the data array that corresponds to the table data
     * If no id is given on return urls, all results paginated 15 will be returned
     * can choose page with @page url parameter
     * can choose sorting with @sort url parameter
     * 
     *  Http answer codes : 
     *  #login-1 Succesful login
     *  #login-2 Password error
     *  #login-3 User not found
     *  #login-4 Reset token sent
     *  #login-5 Succesful password reset
     *  #login-6 Token identification error
     *  #login-7 Validation error
     *  #login-8 Password mismatch error
     *  #login-9 Token already validated
     *
     *
     * @return void
     */

	public function __construct(){
		$this->beforeFilter('csrf', array('on' => 'post'));
	 	//$this->beforeFilter('auth'); 
	}

	public function postLogin(){
		if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')),true))
		        return Redirect::intended('app/user');
		else    return Redirect::to("/auth/login")->with('message' , 'wrong credentials!');	
	}
	public function getLogin(){
		if (Auth::check())
		        return Redirect::intended('app/user');
		else    return View::make('login::login');
	}
	public function postSignup(){
		$input = Input::except('_token');
		$user  = new User();
		foreach ($input as $key => $value) {
			$user->$key = $value;
		}
		$flag = Validpack::validateoperation($user);
		if($flag->passes()){
				$user->password = Hash::make($user->password);
				$user->token    = 0;
                $user->save();
				return 'login-1';
		}else
			return 'login-7';
	}
	public function getLogout(){
		Auth::logout();
		return Redirect::intended("auth/login");
	}
	public function postForgot(){
		$count = User::where('email' , '=' , Input::get('email'))->count();
		if($count<=0)
			return Redirect::to('auth/login')->with('message', 'Email not found');

		$user = User::where('email' , '=' , Input::get('email'))->first();
		$token = Loginmod::generateRandomString(20);
		$user->token = $token;
		$user->save();
		Mail::send('login::token', array('email'=>Input::get('email') , 'token'=>$token, 'title' =>'Password reset email!'), function($message){
	      $message->to(Input::get('email'),"Panos")->subject('Password reset email!');
	   	});
	   	return Redirect::to('auth/login')->with('message', 'An email with the reset link has been sent.');
	}

	public function getToken($token , $email){
		return View::make('login::reset')
		->with('token', $token)
		->with('email', $email);
	}

	public function postToken(){
		if(Input::get('password')!= Input::get("rpassword"))
			return Redirect::to('auth/token/'. Input::get('token') . '/' . Input::get('email'))->with('message', 'Password mismatch');
		$input = Input::except("_token");
		$count = User::where('email' , '=' , Input::get('email'))->count();
		if($count==0)
			return Redirect::to('auth/token/'. Input::get('token') . '/' . Input::get('email'))->with('message', 'User not found');
		$user = User::where('email' , '='  , Input::get('email'))->first();
		if(strlen($user->token)==1)
			return Redirect::to('auth/login')->with('message', 'Token already used');
		if($user->token == Input::get('token')){
			$user->password = Input::get('password');
			$flag = Validpack::validateoperation($user);
			if($flag->passes()){
				$user->password = Hash::make($user->password);
				$user->token    = 0;
                $user->save();
				return Redirect::to('auth/login')->with('message', 'Password succesfuly changed!');
			}else
				return Redirect::to('auth/token')->with('message', 'Password not valid');
		}else return Redirect::to('auth/login')->with('message', 'Token mismatch error');
	}

	

}