<?php namespace Slave\Validpack;

use Illuminate\Database\Eloquent\Model;

class Validator extends Model {


	public static function validate(){
		echo 'asdfasd';
	}
	public static function validateop(&$obj){
		$rules = $obj->rules;
		$data     = array();
		foreach($rules as $key=>$val){
			$data[$key] = $obj->$key;
		}
		$validator = Validator::make($data,$rules);
		if($validator->passes())
			return true;
		return $validator->errors();
	}	
}