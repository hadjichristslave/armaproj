<?php

class Employeeorder extends Eloquent{

	public function orderDetails()
    {
        return $this->hasMany('Order' , 'id' , 'orderId');
    }

    public function employee()
    {
        return $this->hasOne('Employee' , 'id' , 'employeeId');
    }
    public function state()
    {
        return $this->hasOne('Orderstate' , 'id' , 'stateId');
    }









}