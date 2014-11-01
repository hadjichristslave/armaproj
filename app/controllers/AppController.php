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
        Auth::login(User::find(1));
        //$this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth');
        $this->beforeFilter('mail');
    }
    public function getPopulate(){
    	return Product::populate();	
    }
    public function getUpdateimages(){
    	return Product::updateImages();	
    }

	public function getDashboard(){
		return View::make('dashboard');
	}

	public function getUser(){
		return View::make('user');
	}
	public function getLock(){
		return View::make('lock');
	}

	public function postReauthenticate(){
		if (Auth::attempt(array('email' => Auth::user()->email, 'password' => Input::get('password'))))
		{
			return Redirect::intended('/app/user');
		}else{
			return Redirect::intended('/app/lock')->with('message', 'Λάθος κωδικός, παρακαλώ ξαναδοκιμάστε!');
		}
	}


	public function anyUpdate($model , $tablekey=null){
		$id = 0;
		$key = $tablekey==null?'id':$tablekey;
		if($model  == "Employee" || $model == "User")    $id = Auth::user()->userId;
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

	public function getSearch($model){
		$q    = Input::get("q");
		$temp = $model::where('sku' , 'LIKE' , "%$q%")->orWhere('title' , "LIKE", "%$q%")->get();
		$ans  = array();
		foreach($temp as $key)
			array_push($ans, array("id"=>$key->id, "text"=>$key->title));
		echo json_encode($ans);
	}	

	public function getData($model, $action, $id=null){
		return View::make($model."." . $action)->with('id' , $id);
	}

	public function getReturn($model, $id , $singleRecord, $isRelation= null, $relationFunction=null){
		echo json_encode(Dbtools::returnData($model, $id , $singleRecord));
	}
	public function getSelectify($model, $id , $singleRecord, $isRelation= null, $relationFunction=null){
		$ans  = "<input type='hidden' select id='' val='' class='select2_sample".$id." form-control select2' orderSelectInput='".$singleRecord."'>";
		return $ans;

	}

	public function getExport($id){
		$orderProducts = Order::where('orderId' , '=', $id)->get();
		$csv           = '';
		$csv = "'Παραγγελία κωδικός παραγγελίας','Κωδικός κωδικός είδους','Περιγραφή','Τεμάχια','Κωδικός πελάτη αποθέτη','Κωδικός Παραλήπτη','Κωδικος σημείου','Κωδικός σημείου παράδοσης' \n";//Column headers
		foreach($orderProducts as $ord){
			$csv .= $id       . ',';
			$csv .= $ord->id  . ',';
			$csv .= '"'.Product::find($ord->productId)->title  . '",';
			$csv .= $ord->quantity  . ',';
			$csv .= Store::find(Employeeorder::find($id)->storeId)->storeId  . ',';
			$csv .= Store::find(Employeeorder::find($id)->storeId)->receiverId  . ',';
			$csv .= Store::find(Employeeorder::find($id)->storeId)->deliveryId  . ',';
			$csv .= Store::find(Employeeorder::find($id)->storeId)->deliveryReceiverId  . ',';
			$csv .= "\n";
		}

			$csv_handler = fopen ('csvfile.csv','w');
			fwrite ($csv_handler,$csv);
			fclose ($csv_handler);
			return "/azadmin/myproject/public/csvfile.csv"; 

	}
	public function postData($model, $action, $id=null , $tablekey = null , $redirect = null){
		$tblkey = $tablekey==null?'id':$tablekey;
		$redir  = $redirect==null?true:false;

		if($action =='create'){
			$message = Dbtools::createFromModel($model);
			return $redir?Redirect::to('/app/data/'. $model. '/' . $action)->with('message' , $message):$message;
		}else if($action=='edit'){
			$message = Dbtools::updateFromModel($model ,Input::get('id') , $tblkey);
			return $redir?Redirect::to('/app/data/'. $model. '/' . $action)->with('message' , $message)->with('id' , $id):$message;
		}else if($action=='delete'){
			$message = Dbtools::deleteFromModel($model ,Input::get('id') , $tblkey);
			return $redir?Redirect::to('/app/data/'. $model. '/edit')->with('message' , $message)->with('id' , $id):$message;
		}
	}
	public function postCreateempty($model){
		$mod = new $model();
		$data = json_decode(Input::get('args'));
		if($data!='')
			foreach($data as  $key=>$val)
				$mod->$key = $val;
		$mod->save();
		return $mod;
	}
	public function postCustom($model, $action , $tablekey = null){
		if($model=="Store"){
			$storeAttributes = array('brand',
									 'area',
			 						 'postcode',
			 						 'address',
			 						 'employeeId',
			 						 'city',
			 						 'county',
			 						 'storeId',
									 'receiverId',
									 'deliveryId',
									 'deliveryReceiverId');
			if($action=='create'){
				$message = Dbtools::createFromModel($model, $storeAttributes);
				$store = Store::orderby('created_at', 'desc')->first();
				Storebrand::createStoreBrandsFromInput($store->id);
			}else if($action =='edit'){
				$message = Dbtools::updateFromModel($model, Input::get('id') , 'id' ,  $storeAttributes);
				Storebrand::where('storeId' , '=' , Input::get('id'))->delete();
				Storebrand::createStoreBrandsFromInput(Input::get('id'));
			}else if($action='delete'){
				Storebrand::where('storeId' , '=' , Input::get('id'))->delete();
				$message = Dbtools::deleteFromModel($model, Input::get('id') , 'id');
			}
				$action = $action=='delete'?'edit':$action;
				return Redirect::to('/app/data/'. $model. '/' . $action)->with('message' , $message);
		}
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
			$formData = (array) json_decode(Input::get('cart'));
			$numberOfElements = (count($formData)-2)/2;
			$message          = '';
			$employeeOrder = new Employeeorder();
			for ($i=0; $i <$numberOfElements ; $i++) {
				$currentElement = $i;
				$prefix = "_".$currentElement;
				$order = new Order();
				$order->setOrderData($prefix , $formData);
				$flag = Validpack::validateoperation($order);
				if($flag->passes() && $initial ==false){
					$initial = true;
					$employeeOrder->setEmployeeData($formData);
					$flag2 = Validpack::validateoperation($employeeOrder);
					if($flag2->passes()){
						$employeeOrder->save();
						$order->orderId = $employeeOrder->id;
						$order->save();
					}else{
						echo 'data problem';
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
			return '/azadmin/myproject/public/app/data/'. $model. '/display/'.$employeeOrder->id;
		}if($model=="Employeeorder" && $action=="delete"){
			$tblkey = $tablekey==null?'id':$tablekey;
			$message = "Employee message " . Dbtools::deleteFromModel($model ,Input::get('id') , $tblkey);
			Order::where('orderId' , '=' , Input::get("id"))->delete();
			return Redirect::to('/app/data/Order/edit')->with('message' , $message);
		}if($model=="Employeeorder" && $action=="edit"){
			$employeeOrder = Employeeorder::find(Input::get('id'));
			$employeeOrder->setEmployeeUpdData();
			$flag2 = Validpack::validateoperation($employeeOrder);
			if($flag2->passes()){
				$employeeOrder->save();
				Order::where('orderId' , '=' , $employeeOrder->id)->delete();
				foreach(Input::all() as $key=>$val){
					if (strpos($key,'productId') !== false) {
						    $arrayz = explode('_' , $key);
						    $prefix = count($arrayz)==1?"":"_".$arrayz[1];
					    	$order = new Order();
					    	$order->validateAndSaveOrder($prefix);
					}
				}
			}else
				return Redirect::to('/app/data/Order/edit')->with('message' , "Order Validation Error");
			return Redirect::to('/app/data/Order/edit')->with('message' , "Order Updated correctly");
		}	
	}

	public function getUpdatecost(){
		$cart   =    json_decode(Input::get('cart'),true);
		$storeId = Input::get('storeId');
		$sum = 0;
		try{
			foreach ($cart as $value){
				$unitPrice     =  Product::find($value['productId'])->unitPrice;
				$storeDiscount =  Order::getDiscount($value['productId'], $storeId);
				$sum +=  ($unitPrice * $value['quantity']) * $storeDiscount;
			}
		}catch(Exception $e){
			var_dump($e);
		}
		$sum = number_format($sum, 2, ',', '.');
		return $sum;
	}

	public function getDiscount($prodId, $orderId){
		return  Order::getDiscount($prodid, Employeeorder::find($orderId)->storeId);
	}
	
	public function getCustomreturn($model, $id=null , $singleRecord=null , $relationFunction = null){
		if($model=="Employeeorder"){
			$order      = Employeeorder::find($id);
			$orderData  = Employeeorder::find($id)->orderDetails;
			$ordDat     = array();
			foreach ($orderData as $key => $value) {
				array_push($ordDat, $value->getAttributes());
			}
			$arrayName = array('order' =>  $order->getAttributes(), 'orderData' =>$ordDat );
			return Response::json($arrayName);
		}if($relationFunction!=null){
			return Response::json($model::find($id)->$relationFunction);
		}if($model=="Storebrand"){
			return Response::json($model::where('storeId' , '=' , $id)->get());
		}if($model=="Filter"){
			$id = $id==null?0:$id;
			$filters = json_decode(Input::get('filtz'));
			$answer = Product::where(function($query) use ($filters) {
				foreach($filters as $key=>$val){
					if($val!='')
						if(sizeof(explode('-', $key))==1)
							$query->where($key, 'LIKE' , "%$val%");
						else if(sizeof(explode('-', $key))==2){
							$stocks = explode('-', $key);
							$price  = (int) $val;
							$relation = $stocks[1]=="From"?">=":"<=";
							$query->where("availableStock", $relation , "$price");
						}
						else if(sizeof(explode('-', $key))==3){
							$stocks = explode('-', $key);
							$date  = Product::jsDateToSql($val);
							$date  = new DateTime($date);
							$relation = $stocks[2]=="from"?">=":"<=";
							$query->where("lastImport", $relation , $date);
						}
						if(sizeof(explode('-', $key))==4 && $val!=0)
							$query->whereRaw('brand LIKE "%'.Brand::find($val)->title.'%"');
						
				}
            })->skip($id)->take(50)->get();
            return Product::createProductView($answer);
		}if($model=="orderFilter"){
			$filters = json_decode(Input::get('filtz'));
			$answer = Employeeorder::where('employeeId' , '=' , Auth::user()->userId)
					->where(function($query) use ($filters) {
				foreach($filters as $key=>$val){
					if($val!='')
						if(sizeof(explode('_', $key))==1)
							$query->where($key, 'LIKE' , "%$val%");
						else if(sizeof(explode('_', $key))==4){
							$stocks = explode('_', $key);
							$price  = (int) $val;
							$relation = $stocks[3]=="from"?">=":"<=";
							$query->where("totalPrice", $relation , "$price");
						}
						else if(sizeof(explode('_', $key))==3){
							$stocks = explode('_', $key);
							$date  = Product::jsDateToSql($val);
							$date  = new DateTime($date);
							$relation = $stocks[2]=="from"?">=":"<=";
							$query->where("created_at", $relation , $date);
						}
						else if(sizeof(explode('_', $key))==2){
							$query->whereExists(function($query2) use($val)
				            {
				                $query2->select(DB::raw('*'))
				                      ->from('stores')
									  ->where('brand', 'LIKE' , "%$val%");
				            });

						}
						
				}
            })->take(50)->get();
            return Order::createProductView($answer);
		}
		
	}
	public function getSubtotal(){
		echo Product::getSubtotal(Input::get('productId'), Input::get('quantity'));
	}
	public function getView($view){
		return View::make($view);
	}
	
}