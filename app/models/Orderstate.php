<?php

class Orderstate extends Eloquent{






	public static function getStateLabel($labelId){
		if($labelId==1||$labelId==4||$labelId==5)
			return "warning";
		else if($labelId==2)
			return "success";
		else
			return "danger";
	}




}