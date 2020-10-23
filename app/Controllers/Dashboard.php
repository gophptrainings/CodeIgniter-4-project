<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DashboardModel;

class Dashboard extends Controller {
    public $dModel;
    public function __construct() {
        $this->dModel = new DashboardModel();
        helper('form');
    }
    public function index() {
        $data=[];
        $uniid = session()->get('logged_user');

        $data['userdata'] = $this->dModel->getLoggedInUserData($uniid);
        return view('dashboard_view',$data);
    }

    public function logout() {
        
        if(session()->has('logged_info')){
            $la_id = session()->get('logged_info');
            $this->dModel->updateLogoutTime($la_id);
        }
        
        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url() . "/login");
    }
    public function login_activity(){
        $data['userdata'] = $this->dModel->getLoggedInUserData(session()->get('logged_user'));
        $data['login_info'] = $this->dModel->getLoginUserInfo(session()->get('logged_user'));
        return view('login_activity_view',$data);
    }
    public function avatar(){
        $data = [];
        $data['userdata'] = $this->dModel->getLoggedInUserData(session()->get('logged_user'));
        if($this->request->getMethod() == 'post'){
             $rules = [
                'avatar' => 'uploaded[avatar]|max_size[avatar,1024]|ext_in[avatar,png,jpg,gif]',
            ];
             if($this->validate($rules)){
                $file = $this->request->getFile('avatar');
                if($file->isValid() && !$file->hasMoved()){
                  if($file->move(FCPATH.'public\profiles', $file->getRandomName()))
                  {
                    $path = base_url().'/public/profiles/'.$file->getName();
                    $status = $this->dModel->updateAvatar($path,session()->get('logged_user'));
                    if($status == true){
                        session()->setTempdata('success','Avatar is uploaded successfully',3);
                      return redirect()->to(current_url());
                    }
                    else
                    {
                        session()->setTempdata('error','Sorry! Unable to upload Avatar',3);
                      return redirect()->to(current_url());
                    }
                  }
                  else
                  {
                      session()->setTempdata('error',$file->getErrorString(),3);
                      return redirect()->to(current_url());
                  }
                }
                else
                {
                    session()->setTempdata('error','You have uploaded in valid file',3);
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        return view("avatar_view",$data);
    }
    public function change_password(){
        $data = [];
        $data['userdata'] = $this->dModel->getLoggedInUserData(session()->get('logged_user'));
        
        if($this->request->getMethod() == 'post'){
            $rules = [
                'opwd' =>'required',
                'npwd' => 'required|min_length[6]|max_length[16]',
                'cnpwd' =>'required|matches[npwd]',
            ];
            if($this->validate($rules))
            {
                $opwd = $this->request->getVar('opwd');
                $npwd = $this->request->getVar('npwd');
               if(password_verify($opwd,$data['userdata']->password)) {
                   
                   $npwd = password_hash($this->request->getVar('npwd'),PASSWORD_DEFAULT);
                  
                   if($this->dModel->updatePassword($npwd,session()->get('logged_user')))
                   {
                       session()->setTempdata('success','Password Updated successfully',3);
                       return redirect()->to(current_url());
                   }
                   else
                   {
                       session()->setTempdata('error','Sorry! Unable to update the password, try again',3);
                       return redirect()->to(current_url());
                   }
               }else
               {
                   session()->setTempdata('error', 'Old Password does not matched with db password', 3);
                   return redirect()->to(current_url());
               }
                
                
            }
            else{
                $data['validation'] = $this->validator;
            }
        }
        
        return view('change_password_view',$data);
    }
    public function edit(){
        $data = [];
        $data['validation'] = null;
        $data['userdata'] = $this->dModel->getLoggedInUserData(session()->get('logged_user'));
        
        if($this->request->getMethod()=='post'){
            $rules=[
                'username' => 'required|min_length[4]|max_length[20]',
                'mobile' =>'required|exact_length[10]|numeric',
            ];
            if($this->validate($rules)){
                $userdata = [
                    'username' => $this->request->getVar('username',FILTER_SANITIZE_STRING),
                    'mobile' => $this->request->getVar('mobile',FILTER_SANITIZE_NUMBER_INT),
                ];
                if($this->dModel->updateUserInfo($userdata,session()->get('logged_user'))){
                    session()->setTempdata('success','Profile Updated successfully',3);
                       return redirect()->to(current_url());
                }
                else
                {
                   session()->setTempdata('error','Sorry! Unable to update Profile, try again',3);
                    return redirect()->to(current_url()); 
                }
            }
            else
            {
                $data['validation']=$this->validator;
            }
        }
        return view('edit_view',$data);
    }
    
}
