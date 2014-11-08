<?php

class Employeeorder extends Eloquent{
    public $rules = array();
	public function orderDetails()
    {
        return $this->hasMany('Order' , 'orderId' , 'id');
    }

    public  function employee()
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


    public static function getOrdersWithinDays($within , $model){
        $data = $model::whereRaw('`created_at` >= DATE_SUB(CURDATE(), INTERVAL '.$within.' DAY)')->get();
        return count($data);
    }

    public static function getDatediff($id){
        $date = date('Y-m-d h:i:s');
        $data =  Employeeorder::select(DB::raw("(UNIX_TIMESTAMP('$date')-UNIX_TIMESTAMP(created_at))/60 AS minutes"))->where('id' , '=', $id)->orderBy('minutes','desc')->first();
        if($data->minutes<5)
            return "Τώρα";
        else if($data->minutes<60)
            return "Πριν ". (int)($data->minutes). " λεπτά";
        else if($data->minutes<1440){
            $hours = (int)($data->minutes/60);
            return "Πριν ". $hours . " ώρες";
        }
        else if($data->minutes>=1440){
            $days = (int)($data->minutes/1440);
            return "Πριν " .$days . " μέρες";
        }
        
    }

    public static function getTotalOrderIncome(){
        $sum =0;
        foreach(Employeeorder::all() as $order){ 
            $sum += $order->stateId==2?$order->totalPrice:0;
        }
        return $sum;
    }

    public static function calculateTotalCost($array , $storeId){
        $sum = 0;
        foreach($array as $key=>$val){
            if (strpos($key,'productId') !== false) {
                $arrayz = explode('_' , $key);
                $prefix = "_".$arrayz[1];
                $productId = $array["productId" . $prefix];
                $quantity  = $array["quantity" . $prefix];
                $sum +=  $productId==0?0:Product::find($productId)->unitPrice*$quantity*Order::getDiscount($productId, $storeId);
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

    public function setEmployeeData($array){
        $this->employeeId         = Auth::user()->userId;
        $this->stateId            = 1;
        $this->storeId            = $array['storeId'];
        $this->totalPrice         = Employeeorder::calculateTotalCost($array , $this->storeId);
    }
    public function setEmployeeUpdData(){
        $this->stateId            = Input::get("stateId");
        $this->storeId            = Input::get("storeId");
        $this->expectedDelivery   = Employeeorder::getDate();
        $this->totalPrice         = Employeeorder::calculateTotalCost();
    }

}