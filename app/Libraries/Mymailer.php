<?php

namespace App\Libraries;
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
*/

class Mymailer
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function send()
    {
        echo '<pre>';
        //var_dump($this->CI->session);
        ddd($this->CI->session->get('name'));
        echo '</pre>';
        echo 'sent mail';
    }

    public static function testmail()
    {
        echo 'test mail';
    }
}