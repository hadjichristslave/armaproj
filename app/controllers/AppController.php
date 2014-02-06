<?php
use \Slave\Dbtools as Dboperation;
class AppController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
    public function __construct(){
        $this->beforeFilter('csrf', array('on' => 'post'));
        //$this->beforeFilter('auth');
    }
	public function getDashboard(){
		return View::make('dashboard');
	}

	public function getUser(){
		return View::make('user');
	}

	public function postUpdate($model , $tablekey){
		$id = 0;
		$key = $tablekey==null?'id':$tablekey;
		if($model  == "Employee")    $id = Auth::user()->userId;
		else 						 $id = Input::get('id');
		Dboperation::updateFromModel($model, $id ,$tablekey);
	}

}