<?php namespace Slave\Dbtools;
use DB;
use Input;
use Validpack;
use Hash;
use Auth;
use Redirect;
use Illuminate\Database\Eloquent\Model;

class Dbtools extends Model {

	public static function createFromModel($model){
		$input = Input::except('_token');
        $inputData = new $model();
        try{
            foreach ($input as $key => $value)
                    $inputData->$key = $value;

            $flag = Validpack::validateoperation($inputData);
            if($flag->passes()){
                foreach ($inputData->attributes as $key => $value)
                    if($key == "password")
                        $inputData->key = Hash::make($value);
                $inputData->save();
                return "database-1";
            }else{
                return "database-2";
            }
        }catch(Exception $e){
            echo 'Caught exception: '.  $e->getMessage(). "\n";
        }
	}
	public static function deleteFromModel($model, $id, $tablekey){
		try{
			if(!exists($model, $id, $tablekey))
				return "database-4";	
			else if($tablekey!='id'){
				$model::where($tablekey , '=' , $id)->delete();
				return "database-1";
			}else{
				$model::find($id)->delete();
				return "database-1";
			}
		}catch(Exception $e){
			echo 'Caught exception: '.  $e->getMessage(). "\n";	
		}
	}
	public static function updateFromModel($model , $id , $tablekey){
        $input = Input::except('_token' , 'rnewpassword' , 'newpassword');
        $inputData = $model::where($tablekey, '=' , $id)->first();
        try{
            if(!Dbtools::exists($model, $id, $tablekey))
                return "database-4";
            foreach ($input as $key => $value){
                if($key == "password" && Input::get('newpassword')!="")
                    $inputData->$key = Input::get('newpassword');
                else if($value!="" && $key != "password")
                    $inputData->$key = $value;
            }
            $flag = Validpack::validateoperation($inputData);
            if($flag->passes()){
                foreach ($inputData->attributes as $key => $value)
                    if($key == "password" && strlen(Input::get('newpassword'))>2)
                        $inputData->$key = Hash::make(Input::get('newpassword'));
                $inputData->save();
                $message = 'Succesful user ' . Auth::user()->username  . " update";
                return $message;

            }else{
                echo 'database 2';
                return "database-2";
            }
        }catch(Exception $e){
            echo 'Caught exception: '.  $e->getMessage(). "\n";
        }
	}
	public static function exists($model, $id, $tablekey){
		$counter = $model::where($tablekey , '=' , $id)->count();
		return $counter>0;
	}
	

}