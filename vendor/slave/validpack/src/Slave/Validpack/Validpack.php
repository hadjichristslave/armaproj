<?php namespace Slave\Validpack;
use View;
class Validpack {

	public function foo(){
		echo 'hello world';
	}
	/*
	* Validate every model using the laravel validator class given its rules
	* rules need to be set as a model variable.
	* 
	*/
	public static function validateoperation(&$obj){
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