<?php

class AppController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	public function getDashboard(){
		return View::make('dashboard');
	}

	public function getUser(){
		return View::make('user');
	}

}