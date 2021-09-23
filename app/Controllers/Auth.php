<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
	public function index()
	{
		//
	}

	public function register()
	{
		//
	}

	public function login()
	{
		//$this->aauth->login($identifier, $pass, $remember = FALSE, $totp_code = NULL)
		$this->aauth->login($identifier = 'Csaba', $pass = 'mucika', $remember = FALSE, $totp_code = NULL);
	}

	public function forgot_password()
	{
		//
	}

	public function reg_verify()
	{
		//
	}

	public function logout()
	{
		//
	}
}
