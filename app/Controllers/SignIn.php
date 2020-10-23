<?php

namespace App\Controllers;

use CodeIgniter\Controller;
class SignIn extends Controller {
    public function index(){
        $data = [];
        helper('form');
        
        if($this->request->getMethod() == 'post')
        {
           $throttler = \Config\Services::throttler();
                /*if($throttler->check('login',4,MINUTE)===false){
                    session()->setFlashdata('error','Too many hits to server. try again');
                    return redirect()->to(current_url());
                }*/
                $rules = [
                    'uname' => 'required',
                    'pwd' => 'required',
                ];
                if($this->validate($rules)){
                    $uname = $this->request->getVar('uname');
                    $pwd = $this->request->getVar('pwd');
                    if($uname=='ram' && $pwd == '123'){
                        echo "OKay";
                    }
                    else{
                        $data['error']='Wrong Credentials';
                    }
                }
                else
                {
                    $data['validation'] = $this->validator;
                }
            
        }
        
        return view('myform_view',$data);
    }
}
