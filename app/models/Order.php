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

    public function setOrderData($prefix , $array){
		$this->productId = $array["productId" . $prefix];
		$this->quantity  = $array["quantity" . $prefix];
    }


    public function validateAndSaveOrder($prefix){
        $this->setOrderData($prefix);
        $this->orderId = Input::get('id');
        $flag = Validpack::validateoperation($this);
        if($flag->passes())
            $this->save();
    }

    public static function createProductView($data){
        $view = '';
        $class="odd";
        foreach($data as $key=>$value){
            $view .= '<tr role="row" class='.$class.' rowId='.$value->id.'>
                                <td><input type="checkbox" class="group-checkable"></td>
                                <td>'.$value->id.'</td>
                                <td>'.$value->created_at.'</td>
                                <td>'.Store::find($value->storeId)->brand.'</td>
                                <td>'.$value->totalPrice.'€</td>
                                <td><span class="label label-sm label-success">'.Orderstate::find($value->stateId)->name.'</span></td>
                                <td>
                                <a href="/azadmin/myproject/public/app/data/Order/display/'.$value->id.'" class="btn btn-xs default btn-editable"><i class="fa fa-search"></i> Edit</a>
                                </td>
                                </tr>';
            $class= $class=="odd"?"even":"odd";
        }
        return $view;
    }

    public static function totalNumberOfPproducts($id){
        $totalProds = 0;
        foreach(Order::where('orderId' , '=' , $id)->get() as $ord){
            $totalProds +=$ord->quantity;
        }
        return $totalProds;
    }

}