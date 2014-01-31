<?php

class Town extends Eloquent{

	public function county()
    {
        return $this->hasOne('County' , 'id' , 'countyId');
    }

    public function area()
    {
        return $this->hasMany('Area' , 'townId');
    }









}