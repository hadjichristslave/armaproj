<?php

class Area extends Eloquent{

	public function town()
    {
        return $this->hasOne('Town' , 'id' , 'townId');
    }









}