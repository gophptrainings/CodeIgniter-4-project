<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Saveuserdata;
use App\Models\Registration;


class Homepage extends \CodeIgniter\Controller{
    public $saveuserdata,$registration,$email;
    public function __construct() {
        
        helper("form");
        $this->saveuserdata=new Saveuserdata();
        $this->registration=new Registration();
        $this->email= \Config\Services::email();
    }
    //put your code here
    public function index()
    {
        return view("homeview");
    }
    public function about()
    {
        return view("about");
    }
    public function savedata()
    {
        
        $data=[];
        $data['validation']=null;
      //  $session= session();
        $session= \Config\Services::session();
        $rules=['username'=>[
            'rules'=>'required',
            'errors'=>[
                    'required'=>'user name required'],
            ],
                
            'email'=>[
            'rules'=>'required|valid_email',
            'errors'=>[
                'required'=>'email is required',
              'valid_email'=>'enter valid email Id'],
                ],
            'mobile'=>'required|numeric|exact_length[10]'];
       if($this->request->getMethod()=='post')
       {
           
                if($this->validate($rules))
                       {
                         $data=[
                             'user_name'=>$this->request->getVar('username',FILTER_SANITIZE_STRING),
                             'email'=>$this->request->getVar('email',FILTER_SANITIZE_STRING),
                             'mobile'=> $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
                         ];

                        $status=$this->saveuserdata->saveData($data);
                         if($status)        //8341575143
                         {
                                 echo "success";
                                               
                         }
                         else
                         {
                                    echo "fail";  
                             
                         }
                    
                  //  print_r($data);
                        }
                else
                        {
                            $data['validation']= $this->validator;
                        }
               }
       
       
        echo view("savedata",$data);
    }
    public function registration()
    {
        $data=[];
           $session= \Config\Services::session();
        if($this->request->getMethod() == 'post')
        {
            $rules=[
              'username'=>'required|min_length[4]|max_length[40]',
              'email'=>'required|valid_email|is_unique[users_email]',
              'password'=>'required|min_length[4]|max_length[40]',
              'correct_password'=>'required|matches[password]',
              'mobile'=>'required|exact_length[10]|numeric',
            ];
            if($this->validate($rules))
            {
                $uniid= md5(str_shuffle("abcdefghijklmnopqrstuvwxyz".time()));
               $user_data=[
                   'username'=>$this->request->getVar('username',FILTER_SANITIZE_STRING),
                   'email'=>$this->request->getVar('email',FILTER_SANITIZE_STRING),
                   'password'=> password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                   'mobile'=>$this->request->getVar('mobile',FILTER_SANITIZE_STRING),
                   'uniid'=>$uniid,
                   'created_at'=>date("Y-m-d h:i:s"),
                   
               ];
            //   print_r($user_data);
       $status= $this->registration->createUser($user_data);
      // print_r($status);
               if($status)
               {
                   $to=$this->request->getVar('email');
                   $subject='Account activation link ';
                   $message='Hi,'.$this->request->getVar('username',FILTER_SANITIZE_STRING).'<br><br>'
                           . 'your account created succesfully..! please click the below link to activate your account.'
                           . '<a href="'.base_url()."/register/activate/".$uniid.'" target="__blank">Activate now';
                          
                            $this->email->setTo($to);
                            $this->email->setFrom("vikasraj054@gmail.com");
                            $this->email->setSubject($sub);
                            $this->email->setMessage($message);
                            if($email->send())
                            {
                                $session->setTempdata("success","Account created successfully. please activate youra",3);
                                 return redirect()->to(current_url());
                            }
                            else {
                               $session->setTempdata('error','Account creaated successfully, Sorry unable to sedn activation link',3);
                               
                               return redirect()->to(current_url());
                            }
               }
               else
               {
                  $session->setTempdata("error","sorry! unable to  create an account",3);
                   echo "failed to save the data";
                   print_r($status);
                   return redirect()->to(current_url());
               }
            }
            else
            {
                $data['validation']= $this->validator;
            }
        }
        
        return view('registration',$data);
    }
}
