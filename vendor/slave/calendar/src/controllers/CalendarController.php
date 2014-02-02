<?php namespace Slave\Calendar;

use Controller;
use Input;
use Validpack;
use Hash;
use View;
use Response;
use User;
use Mail;
use App;


class CalendarController extends Controller {
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
     protected $layout = 'layouts.master';

	public function __construct(){
		$this->beforeFilter('csrf', array('on' => 'post'));
	 	//$this->beforeFilter('auth'); 
	}
	public function getIndex(){
		return View::make('calendar::index');
	}
     public function getCalendar(){
          Calendar::getEmployeesClosingTimes();
        return View::make('calendar::calendar');
     }
	public function postCreate(){
		Calendar::customCreate();
	}
	public function postEdit(){
		Calendar::customEdit();
	}
	public function postDelete($id){
		Calendar::customDelete($id);
	}
	public function getCalreturn(){	
		return Calendar::returnCal();
	}
	public function missingMethod($parameters = Array()){
		echo 'no method found ';
	}


}