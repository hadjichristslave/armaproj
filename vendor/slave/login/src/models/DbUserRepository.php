<?php namespace Slave\Login;
use User;
class DbUserRepository implements UserRepositoryInterface {

	public function all()
	{
		return User::all();
	}
	public function getSomeOutput(){
		echo 'adsfaafsd';
	}
}