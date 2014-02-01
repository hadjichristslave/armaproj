<?php

class Store extends Eloquent{


	public function shop()
    {
        return $this->hasOne('Employee' , 'id' , 'employeeId');
    }
    public function products()
    {
        return $this->hasMany('Storeproduct' , 'shopId' , 'id');
    }









}