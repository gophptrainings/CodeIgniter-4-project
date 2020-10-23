<?php

namespace App\Controllers;

use \CodeIgniter\Controller;

class FileUpload extends Controller {
    public function __construct() {
        helper('form');
    }
    public function index() {
        $data = [];
        if($this->request->getMethod()=='post'){
            
            $rules = [
                'avatar' => 'uploaded[avatar]|max_size[avatar,1024]|ext_in[avatar,png,jpg,gif]',
            ];
            if($this->validate($rules)){
                $file = $this->request->getFile('avatar');
                if($file->isValid() && !$file->hasMoved()){
                    $newName = $file->getRandomName();
                    if($file->move(WRITEPATH.'uploads/',$newName)){
                        echo '<p>FIle Uploaded Successfully</p>';
                        //echo base_url().'public/uploads/'.$file->getName();
                    }
                    else
                    {
                        echo $file->getErrorString()." ".$file->getError();
                    }
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
            
        }
        return view('upload_view',$data);
    }

}
