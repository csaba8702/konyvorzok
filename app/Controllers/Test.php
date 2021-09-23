<?php
//https://stackoverflow.com/questions/58900176/codeigniter-4-autoload-library
namespace App\Controllers;
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;
//use App\Libraries\Mymailer;
//use App\Libraries\Mailer;


class Test extends BaseController
{
	public function index()
	{
		$this->session->setflashdata('name', 'Csaba');
		$this->mymailer->send();
		echo '<pre>';
		//var_dump($this->session);
		echo '</pre>';
		/*
		$mail = new Mymailer();
		$mail->send();
		var_dump($mail);
		*/
        //echo APPPATH.'../vendor/myth/auth/src';
		//return view('test');
	}

	public function database()
	{
		$query   = $this->db->query('SELECT * FROM users');
		$results = $query->getResult();

		

		echo '<pre>';
		var_dump($results);
		echo '</pre>';
		echo 'database';
	}
}
