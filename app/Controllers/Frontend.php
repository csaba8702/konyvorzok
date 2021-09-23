<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Frontend extends BaseController
{
	//index metódus az automatikusan lefut
	public function index()
	{
		$data = array(
			'name'	=> 'Csaba',
		);
		echo view('header', $data); //echo view('templates/header', $data); pl mappa/valami.php
		echo view('frontend', $data);
		echo view('footer', $data);
	}

	public function home(int $age = 0, string $name = '')
	{
		$data = array(
			'age'	=> $age,
			'name'	=> $name
		);
		echo view('header', $data); //echo view('templates/header', $data); pl mappa/valami.php
		echo view('frontend', $data);
		echo view('footer', $data);
	}
}
