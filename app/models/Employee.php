<?php

class Employee extends Eloquent{
	public $rules = array();
	public function employOrders()
    {
        return $this->hasMany('Employeeorder' , 'employeeId' , 'id');
    }

    public function credentials()
    {
        return $this->hasMany('User' , 'userId' , 'id');
    }









}