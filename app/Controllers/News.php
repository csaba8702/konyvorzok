<?php

namespace App\Controllers;
use App\Controllers\MY_Controller;

class News extends MY_Controller
{
	public function index()
	{
		return view('welcome_message');
	}
}
