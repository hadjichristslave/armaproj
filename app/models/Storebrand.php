<?php

class Storebrand extends Eloquent{

	private $date;
	public $rules = array();
	public function store()
    {
        
    }

    public function setDate($date){
    	$this->date = $date;
    }
    public function getDate(){
    	return $this->date;
    }
    public function validateDate(){
    	$tempDate = explode("-" , $this->date);
		return sizeof($tempDate)>1;
    }
    public function formatDate(){
    	$tempDate = explode("/" , $this->date);
    	$tempDate = $tempDate[2] . '-' . $tempDate[0] . '-' . $tempDate[1];
    	$this->setDate($tempDate);
    }
    public static function createStoreBrandsFromInput($storeId){

    	foreach(Input::all() as $key=>$val){
				$record = explode('___' , $key);
				if(sizeof($record)>1){
					$storeBrand = new Storebrand();
                    $storeBrand->storeId = $storeId;
                    $storeBrand->brandId = $record[1];
                    $storeBrand->setdate(Input::get("brandFrom__".$record[1]));
                    $storeBrand->formatDate();
                    $storeBrand->discount = Input::get("brandDiscount__".$record[1]);

                    if(!$storeBrand->validateDate()) continue;
                    $storeBrand->startingDate = $storeBrand->getdate();
                    $storeBrand->save();
				}
			}
    }








}