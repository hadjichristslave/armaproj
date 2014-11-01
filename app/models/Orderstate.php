<?php

class Orderstate extends Eloquent{






	public static function getStateLabel($labelId){
		if($labelID==1||$labelID==4||$labelID==5)
			return "warning";
		else if($labelID==2)
			return "sucess";
		else
			return "danger";
	}




}