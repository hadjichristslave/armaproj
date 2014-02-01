<?php

class Order extends Eloquent{


	public function shop()
    {
        return $this->hasOne('Store' , 'id' , 'shopId');
    }
    public function product()
    {
        return $this->hasOne('Product' , 'id' , 'productId');
    }








}