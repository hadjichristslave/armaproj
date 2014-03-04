<?php

class Order extends Eloquent{

	public $rules = array('quantity' =>'required|numeric|max:10');

	public function shop()
    {
        return $this->hasOne('Store' , 'id' , 'shopId');
    }
    public function product()
    {
        return $this->hasOne('Product' , 'id' , 'productId');
    }

    public function setOrderData($prefix){
		$this->productId = Input::get("productId" . $prefix);
		$this->quantity  = Input::get("quantity" . $prefix);
		$this->comments  = Input::get("comments" . $prefix);
    }






}