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
        $numberOfElements = (count(Input::all())-3)/3;
        $sum = 0;
        for ($i=0; $i <$numberOfElements ; $i++) {
            $currentElement = $i;
                $prefix = $i==0?"":"_".$currentElement;
                $employeeOrder = new EmployeeOrder();
                $productId = Input::get("productId" . $prefix);
                $quantity  = Input::get("quantity" . $prefix);
                if($productId>0)
                    $sum +=  Product::find($productId)->unitPrice*$quantity;

        }
        return $sum;
    }
    public static function getDate(){
        $dateArr = explode('/' , Input::get("expectedDate"));
        $date = $dateArr[2] . '-' . $dateArr[0] . '/-' . $dateArr[1];
        return $date;
    }

    public function setEmployeeData(){
        $this->employeeId         = Auth::user()->userId;
        $this->stateId            = 1;
        $this->storeId            = Input::get("storeId");
        $this->expectedDelivery   = Employeeorder::getDate();
        $this->totalPrice         = Employeeorder::calculateTotalCost();

    }








}