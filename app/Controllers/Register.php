<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
use App\Models\RegisterModel;

class Register extends Controller {
    
    public $registerModel;
    public $session;
    public $email;
    public function __construct() {
        helper('form');
        helper('date');
        $this->registerModel = new RegisterModel();
        $this->session = \Config\Services::session();
        $this->email =  \Config\Services::email();
    }
    public function index() {
        $data = [];
        $data['validation'] = null;
        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'username' => 'required|min_length[4]|max_length[20]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'pass' => 'required|min_length[6]|max_length[16]',
                'cpass' =>'required|matches[pass]',
                'mobile' =>'required|exact_length[10]|numeric',
            ];
            if($this->validate($rules))
            {
                $uniid = md5(str_shuffle('abcsefghijklmonpqrtuvwxyz'.time()));
                $userdata = [
                    'username' => $this->request->getVar('username',FILTER_SANITIZE_STRING),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('pass'),PASSWORD_DEFAULT),
                    'mobile' => $this->request->getVar('mobile'),
                    'uniid' => $uniid,
                    'activation_date' => date("Y-m-d h:i:s")
                ];
                if($this->registerModel->createUser($userdata))
                {
                    $to = $this->request->getVar('email');
                    $subject = 'Account Activation link - GoPHP';
                    $message = 'Hi '.$this->request->getVar('username',FILTER_SANITIZE_STRING).",<br><br>Thanks Your account created"
                            . "successfully. Please click the below llink to activate your account<br><br>"
                            . "<a href='". base_url()."/register/activate/".$uniid."' target='_blank'>Activate Now</a><br><br>Thanks<br>GoPHP";
                    
                    $this->email->setTo($to);
                    $this->email->setFrom('info@gophp.in','Info');
                    $this->email->setSubject($subject);
                    $this->email->setMessage($message);
                    $filepath = 'public/assets/images/logo.png';
                    $this->email->attach($filepath);
                    if($this->email->send())
                    {
                        $this->session->setTempdata('success','Account Created successfully. Please activate your account with in 1 hour',3);
                        return redirect()->to(current_url());
                    }
                    else
                    {
                        $this->session->setTempdata('error','Account Created successfully. Sorry! unable to send activation link. Contact Admin',3);
                        return redirect()->to(current_url());
                        //$data = $this->email->printDebugger(['headers']);
                        //print_r($data);
                    }
                }
                else
                {
                    $this->session->setTempdata('error','Sorry! Unable to create an account, Try again',3);
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        return view("register_view",$data);
    }
   
   public function activate($uniid=null)
   {
       $data=[];
       if(!empty($uniid))
       {
           $userdata = $this->registerModel->verifyUniid($uniid);
           if($userdata)
           {
               if($this->verifyExpiryTime($userdata->activation_date))
               {
                   if($userdata->status == 'inactive')
                   {
                       $status = $this->registerModel->updateStaus($uniid);
                       if($status == true)
                       {
                           $data['success'] = 'Account Activated successfully';
                       }
                   }
                   else
                   {
                        $data['success'] = 'Your account is already activated';
                   }
               }
               else
               {
                   $data['error'] = 'Sorry! Activation link was expired!';
               }
           }
           else
           {
               $data['error'] = 'Sorry! We are Unable to find your account';
           }
           
       }
       else
       {
           $data['error'] = 'Sorry! Unable to process your request';
       }
       return view("activate_view",$data);
   }
   public function verifyExpiryTime($regTime)
   {
       $currTime = now();
       $registerTime = strtotime($regTime);
       $diffTime = (int)$currTime - (int)$registerTime;
       if(3600 > $diffTime)
       {
           return true;
       }
       else
       {
           return false;
       }
   }

}
