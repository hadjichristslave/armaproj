<?php

class Storeproduct extends Eloquent{
public $rules = array();

	public function products()
    {
        return $this->hasMany('Product' , 'id' , 'productId');
    }


    public function products()
    {
        return $this->hasMany('Product' , 'id' , 'productId');
    }





}