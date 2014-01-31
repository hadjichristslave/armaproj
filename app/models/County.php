<?php

class County extends Eloquent{

	public function compartment()
    {
        return $this->hasOne('Geographcompartment' , 'id' , 'compartId');
    }

    public function town()
    {
        return $this->hasMany('Town' , 'countyId');
    }







}