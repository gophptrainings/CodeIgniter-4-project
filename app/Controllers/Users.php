<?php

namespace App\Controllers;

use \CodeIgniter\Controller;

class Users extends Controller {
    public $session;
    public function __construct() {
        helper("form");
        $this->session = \Config\Services::session();
    }
    public function index() {
        return view('users_view');
    }
    public function edit(){
        return 'Edit Profile';
    }
    public function logout()
    {
        $this->session->remove('userdata');
        $this->session->destroy();
        return redirect()->to(base_url().'/login');
    }
}
