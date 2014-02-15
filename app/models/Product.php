<?php

class Product extends Eloquent{
public $rules = array();

	public function warehouse()
    {
        return $this->hasOne('Warehouse' , 'id' , 'warehouseId');
    }








}