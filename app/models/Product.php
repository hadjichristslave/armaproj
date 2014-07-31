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
	    			$newPr->lastImport     = Product::jsDateToSql($dataArray[3]);
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


    public static function createProductView($data){
    	$view = '';
    	$class="odd";
    	foreach($data as $key=>$value){
    		$view .= "<tr role='row' class='$class' rowId='$value->id'>
    			<td><input type='checkbox' class='group-checkable' checkbox='$value->id'></td>
				<td class='sorting_1'>$value->id</td>
				<td class='sorting_1'><img class='avatar productImage' alt='' src='/azadmin/myproject/public/pictures/$value->sku'></td>
				<td><b>$value->sku</b></td>
				<td>$value->barcode</td>
				<td>$value->title</td>
				<td>$value->brand</td>
				<td>$value->unitPrice €</td>
				<td>$value->availableStock</td>
				<td>$value->lastImport</td>
				<td><a class='btn btn-xs default btn-editable addSingleProduct' onClick='addToCart($value->id)' data-toggle='modal' href='#responsive' productId='$value->id' ><i class='fa fa-plus'></i> Add product</a></td>	
			</tr>";
			$class= $class=="odd"?"even":"odd";
    	}
    	return $view;
    }

    public static function sqlDateToJs($date){

    }
    public static function jsDateToSql($date){
    	$dateArray = explode('/' , $date);
    	if(sizeof($dateArray)<3) return '';
    	return $dateArray[2] . '-' . $dateArray[1]  . '-' .$dateArray[0];
    }
    public static function getSubtotal($id, $quantity){
    	$product = Product::find($id);
    	return $product->unitPrice*$quantity;
    }
}