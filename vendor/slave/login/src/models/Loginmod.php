<?php namespace Slave\Login;
use DB;
use Input;
use Validpack;
use Hash;
use Illuminate\Database\Eloquent\Model;

class Loginmod extends Model {
	
    public static function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
    	return $randomString;
	}
}