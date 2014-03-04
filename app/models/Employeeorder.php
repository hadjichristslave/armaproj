<?php

class Employeeorder extends Eloquent{
    public $rules = array();
	public function orderDetails()
    {
        return $this->hasMany('Order' , 'orderId' , 'id');
    }

    public function employee()
    {
        return $this->hasOne('Employee' , 'id' , 'employeeId');
    }
    public function state()
    {
        return $this->hasOne('Orderstate' , 'id' , 'stateId');
    }
    public function store()
    {
        return $this->hasOne('Store' , 'id' , 'storeId');
    }


    public static function calculateTotalCost(){
        $sum = 0;
        foreach(Input::all() as $key=>$val){
            if (strpos($key,'productId') !== false) {
                $arrayz = explode('_' , $key);
                $prefix = count($arrayz)==1?"":"_".$arrayz[1];
                $productId = Input::get("productId" . $prefix);
                $quantity  = Input::get("quantity" . $prefix);
                $sum +=  $productId==0?0:Product::find($productId)->unitPrice*$quantity;
            }

        }
        return $sum;
    }
    public static function getDate(){

        $dateArr = explode('/' , Input::get("expectedDate"));
        if(count($dateArr)>1)
            $date = $dateArr[2] . '-' . $dateArr[0] . '-' . $dateArr[1];
        else
            return Input::get("expectedDate");
        return $date;
    }

    public function setEmployeeData(){
        $this->employeeId         = Auth::user()->userId;
        $this->stateId            = 1;
        $this->storeId            = Input::get("storeId");
        $this->expectedDelivery   = Employeeorder::getDate();
        $this->totalPrice         = Employeeorder::calculateTotalCost();
    }
    public function setEmployeeUpdData(){
        $this->stateId            = Input::get("stateId");
        $this->storeId            = Input::get("storeId");
        $this->expectedDelivery   = Employeeorder::getDate();
        $this->totalPrice         = Employeeorder::calculateTotalCost();
    }

}