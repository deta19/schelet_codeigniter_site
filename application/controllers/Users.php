<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function index()
	{
		$this->render('home');
	}

	public function show($userId = 0)
	{
		$userId = (int)$userId;
		echo "This is show users!";
		if ($userId > 0) {
			echo "User ID: {$userId}";
		}
		
	}
	
	
}
