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
        //Auth::login(User::find(1));
        //$this->beforeFilter('csrf', array('on' => 'post'));
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
			return Redirect::to('/app/data/'. $model. '/edit')->with('message' , $message)->with('id' , $id);
		}
	}
	public function postCustom($model, $action , $tablekey = null){
		if($model == 'Employee' && $action=='create'){
			$input = array('name' , 'lname' , 'mobile' , 'phone' , 'groupid');
			$message = Dbtools::createFromModel($model);
			/*Create custom user*/
			$user = new User();
			$user->username = Input::get('name') . substr(Input::get('lname'), 0,2);
			$user->password = Hash::make('123456');
			$user->email    = Input::get('email');
			$user->save();
			$flag = Validpack::validateoperation($user);
			if($flag->passes()){
				$user->save();
			}else{
				Redirect::to('/app/data/'. $model. '/' . $action)->with('message' , 'failed user creation');	
			}
			return Redirect::to('/app/data/'. $model. '/' . $action)->with('message' , $message);
		}if($model == 'Employee' && $action=='delete'){
			$tblkey = $tablekey==null?'id':$tablekey;
			$message = "Employee message " . Dbtools::deleteFromModel($model ,Input::get('id') , $tblkey);
			$message .= "<br>User  message".  Dbtools::deleteFromModel("User",Input::get('id') , "userId");
			return Redirect::to('/app/data/'. $model. '/' . "edit")->with('message' , $message);
		}if($model=="Order" && $action=="create"){
			$initial = false;
			$numberOfElements = (count(Input::all())-3)/3;
			$message          = '';
			$employeeOrder = new EmployeeOrder();
			for ($i=0; $i <$numberOfElements ; $i++) { 
				$currentElement = $i;
				$prefix = $i==0?"":"_".$currentElement;
				$order = new Order();
				$order->setOrderData($prefix);
				$flag = Validpack::validateoperation($order);
				if($flag->passes() && $initial ==false){
					$initial = true;
					$employeeOrder->setEmployeeData();
					$flag2 = Validpack::validateoperation($employeeOrder);
					if($flag2->passes()){
						$employeeOrder->save();
						$order->orderId = $employeeOrder->id;
						$order->save();
					}else{
						return Redirect::to('/app/data/'. $model. '/' . $action)->with('message' , "wrong data on employee, order dropped");
					}
				}else if($flag->passes()){
					$order->orderId = $employeeOrder->id;
					$order->save();

				}
				else
					$message .= $message==""?"product ".$currentElement.", ":$currentElement.", ";
			}
			$message = $message==""?"succesfull data insert":$message." validation error";
			return Redirect::to('/app/data/'. $model. '/' . $action)->with('message' , $message);
		}
	}

	public function getUpdatecost(){
		$cart   =    json_decode(Input::get('cart'),true);
		$sum = 0;
		try{
		foreach ($cart as $key => $value) 
			$sum +=  Product::find($value['productId'])->unitPrice*$value['quantity'];
		}catch(Exception $e){}
		return $sum;
	}
	public function getCustomreturn($model, $id , $singleRecord){
		if($model=="Employeeorder"){
			$order      = Employeeorder::find($id);
			$orderData  = Employeeorder::find($id)->orderDetails;
			$ordDat     = array();
			foreach ($orderData as $key => $value) {
				array_push($ordDat, $value->getAttributes());
			}
			$arrayName = array('order' =>  $order->getAttributes(), 'orderData' =>$ordDat );
			return Response::json($arrayName);
		}
		
	}
	

}