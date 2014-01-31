<?php namespace Slave\Validpack;

use Controller;

class ValidpackController extends Controller {

     /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    private $restfull = true;
    public function getFoofunction()
    {
        echo 'this';
        Validator::validate();
    } 
}