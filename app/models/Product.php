<?php

use Validpack as val;

class Product extends Eloquent{
public $rules = array();

	public function warehouse()
    {
        return $this->hasOne('Warehouse' , 'id' , 'warehouseId');
    }



    public static function populate(){
		$handle = fopen("StockA.csv", "r");
		$counter = 0;
		if ($handle) {
		    while (($line = fgets($handle)) !== false) {
		    	// Skip one line
		    	$counter++;
		    	if($counter==1) continue;

		    	$dataArray = explode(',' , $line);
		    	if(Product::where('sku', '=', $dataArray[0])->count()==0){
	    			$newPr = new Product();
	    			$newPr->sku            = $dataArray[0];
	    			$newPr->barcode        = $dataArray[1];
	    			$newPr->brand          = $dataArray[2];
	    			$newPr->availableStock = $dataArray[3];
	    			$newPr->totalStock     = $dataArray[4];
	    			$newPr->unitPrice      = $dataArray[5];
	    			$newPr->title          = $dataArray[6];
	    			$flag = val::validateoperation($newPr);
            		if($flag->passes()){
            			$newPr->save();
            			echo 'saved smth '.$counter.'<br>';
            		}
		    	}else{
		    		$newPr = Product::where('sku', '=', $dataArray[0])->get();
	    			$newPr->barcode        = $dataArray[1];
	    			$newPr->brand          = $dataArray[2];
	    			$newPr->availableStock = $dataArray[3];
	    			$newPr->totalStock     = $dataArray[4];
	    			$newPr->unitPrice      = $dataArray[5];
	    			$newPr->title          = $dataArray[6];
	    			$flag = val::validateoperation($newPr);
            		if($flag->passes()){
            			$newPr->save();
            			echo 'saved smth '.$counter.'<br>';
            		}
		    	}
		        
		    }
		} else {
		    echo 'cannot open file';
		    die();
		} 
		fclose($handle);

    }




}