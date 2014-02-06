<?php
use Slave\Dbtools\Dbtools;
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

	public function postUpdate($model , $tablekey=null){
		$id = 0;
		$key = $tablekey==null?'id':$tablekey;
		if($model  == "Employee")    $id = Auth::user()->userId;
		else 						 $id = Input::get('id');
		Dbtools::updateFromModel($model, $id ,$tablekey);
	}

}