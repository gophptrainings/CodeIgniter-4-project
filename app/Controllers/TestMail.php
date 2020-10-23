<?php

namespace App\Controllers;

use \CodeIgniter\Controller;

class TestMail extends Controller {

    public function index() {
       
       $to = 'rambabburi@gmail.com';
       $subject = 'Account Activation-GoPHP';
       $message = 'Hi Ram,<br><br>Thanks Your account created successfully. Please click the beow link to activate your account<br>'
                . '<a href="'.base_url().'/testmail/verify" target="_blank">Activate Now</a><br><br>Thanks<br>Team';
       $email = \Config\Services::email();
       $email->setTo($to);
       $email->setFrom('info@gophp.in','Info');
       $email->setSubject($subject);
       $email->setMessage($message);
       $filepath = 'public/assets/images/logo.png';
       $email->attach($filepath);
       if($email->send())
       {
           echo "Account Created successfully. Please activate your account";
       }
       else
       {
           $data = $email->printDebugger(['headers']);
           print_r($data);
       }
        
    }
    public function verify()
    {
        echo "Account Verified";
    }
}
