<?php
use Slave\Dbtools\Dbtools;
use Slave\Validpack\Validator;

class AppController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
    public function __construct(){
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth');
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
		if($model  == "Employee" || $model = "User")    $id = Auth::user()->userId;
		else 						 $id = Input::get('id');
		/*
		*     USER SPECIFIC UPDATE LOGIC
		*/
		if($model == "User"){
			if(Input::get('newpassword')!=Input::get('rnewpassword')){
				return Redirect::to('/app/user')->with('message' , 'passwords do not match');
			}
			$password       = Input::get('password');
			$hashedPassword = User::find(Auth::user()->id)->password;
			if(!Hash::check($password, $hashedPassword)){
				return Redirect::to('/app/user')->with('message' , 'password given is not correct');
			}
		}
		$message = Dbtools::updateFromModel($model, $id ,$key);
		return Redirect::to('/app/user')
		->with('message' , $message);
	}

	public function getData($model, $action, $id=null){
		return View::make($model."." . $action)->with('id' , $id);
	}

	public function getReturn($model, $id , $singleRecord){
		echo json_encode(Dbtools::returnData($model, $id , $singleRecord));
	}
	public function postData($model, $action, $id=null , $tablekey = null){
		$tblkey = $tablekey==null?'id':$tablekey;
		if($action =='create'){
			$message = Dbtools::createFromModel($model);
			return Redirect::to('/app/data/'. $model. '/' . $action)->with('message' , $message);
		}else if($action=='edit'){
			$message = Dbtools::updateFromModel($model ,Input::get('id') , $tblkey);
			return Redirect::to('/app/data/'. $model. '/' . $action)->with('message' , $message)->with('id' , $id);
		}else if($action=='delete'){
			$message = Dbtools::deleteFromModel($model ,Input::get('id') , $tblkey);
			return Redirect::to('/app/data/'. $model. '/' . $action)->with('message' , $message)->with('id' , $id);
		}

	}

}