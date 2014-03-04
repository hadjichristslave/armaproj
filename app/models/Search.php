<?php

class Search{
	public $order;
	public $orderData;
	
	function __construct($order , $orderData){
		$this->order     = $order;
		$this->orderData = $orderData;
	}


	public function Jsonfy(){
		$respArr = array( json_encode($this->order), json_encode($this->orderData));
		return $respArr;
	}









}