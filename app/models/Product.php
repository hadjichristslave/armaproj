<?php
use Validpack as val;

Class Product extends Eloquent{
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
		    	if($counter<3) continue;

		    	$dataArray = explode(';' , $line);
		    	if(Product::where('sku', '=', $dataArray[0])->count()==0){
	    			$newPr = new Product();
	    			$newPr->sku            = $dataArray[0];
	    			$newPr->title          = $dataArray[1];
	    			$newPr->unitPrice      = Product::priceFormat($dataArray[2]);
	    			$newPr->lastImport     = $dataArray[3];
	    			$newPr->barcode        = $dataArray[4];
	    			$newPr->brand          = $dataArray[5];
	    			$newPr->availableStock = $dataArray[6];
	    			$newPr->totalStock     = $dataArray[7];
	    			$flag = val::validateoperation($newPr);
            		if($flag->passes()){
            			$newPr->save();
            			echo 'saved smth '.$counter.'<br>';
            		}
		    	}else{
		    		$newPr = Product::where('sku', '=', $dataArray[0])->first();
	    			$newPr->sku            = $dataArray[0];
	    			$newPr->title          = $dataArray[1];
	    			$newPr->unitPrice      = Product::priceFormat($dataArray[2]);
	    			$newPr->lastImport     = $dataArray[3];
	    			$newPr->barcode        = $dataArray[4];
	    			$newPr->brand          = $dataArray[5];
	    			$newPr->availableStock = $dataArray[6];
	    			$newPr->totalStock     = $dataArray[7];
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

      public static function updateImages(){
		$handle = fopen("photos-prices.csv", "r");
		$counter = 0;
		if ($handle) {
		    while (($line = fgets($handle)) !== false) {
		    	// Skip one line
		    	$counter++;
		    	if($counter==1) continue;

		    	$dataArray = explode(',' , $line);

		    	if(Product::where('sku', '=', (int)$dataArray[1])->count()>0){
		    		$newPr = Product::where('sku', '=', (int)$dataArray[1])->first();
	    			$newPr->imageURI            = $dataArray[0];
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


    public static function priceFormat($number){
		$result = preg_replace(strrev("/,/"),strrev("."),strrev($number),1);
		return floatval(strrev($result));
    }




}