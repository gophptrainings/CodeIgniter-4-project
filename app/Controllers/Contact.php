<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
use \App\Models\ContactModel;

class Contact extends Controller {
    public $contactModel;
    public function __construct() {
        helper('form');
        $this->contactModel = new ContactModel();
    }
    public function index()
    {
        $data=[];
        $data['validation'] = null;
        
        //$session = session();
        
        $session = \CodeIgniter\Config\Services::session();
        
        $rules = [
            'uname'=>'required|min_length[3]|max_length[20]',
            'email'=>'required|valid_email',
            'mobile'=>'required|exact_length[10]|numeric',
            'msg' =>'required',
        ];
        
        if($this->request->getMethod() == 'post')
        {
            if($this->validate($rules))
            {
                $cdata = [
                    'name'=>$this->request->getVar('uname',FILTER_SANITIZE_STRING),
                    'email'=>$this->request->getVar('email',FILTER_SANITIZE_STRING),
                    'mobile'=>$this->request->getVar('mobile',FILTER_SANITIZE_STRING),
                    'message'=>$this->request->getVar('msg',FILTER_SANITIZE_STRING),
                ];
                
                $status = $this->contactModel->saveData($cdata);
                var_dump($status);
                exit;
                if($status)
                {
                    $session->setTempdata('success','Thanks, We will get back you soon',3);
                    return redirect()->to(current_url());
                }
                else
                {
                    $session->setTempdata('error','Sorry! Try Agaian',3);
                    return redirect()->to(current_url());
                }
                
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        
        
        return view("contactview",$data);
    }
    public function myFunction(){
        return 'Welcome to Ci4';
    }
}
