<?php

class Geographcompartment extends Eloquent{

	public function counties()
    {
        return $this->hasMany('County' , 'compartId');
    }
    public function echothis(){
    	echo 'asdf';
    }
}
