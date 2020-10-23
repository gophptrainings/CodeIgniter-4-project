<?php
namespace App\Controllers;
use \CodeIgniter\Controller;
use App\Models\AutoModel;

class Auto extends Controller {
    public $userModel;
    public function __construct() {
        $this->userModel = new AutoModel();
    }
    public function index(){
        $data['employees'] = $this->userModel->findAll();
        return view('empview',$data);
        //$data = $this->userModel->where('designation','developer')->findAll();
        //$data = $this->userModel->findAll(2,1);
        
    }
}