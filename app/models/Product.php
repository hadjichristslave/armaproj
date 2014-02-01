<?php

class Product extends Eloquent{


	public function warehouse()
    {
        return $this->hasOne('Warehouse' , 'id' , 'warehouseId');
    }








}