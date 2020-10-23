<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
use App\Models\UsersModel;

class Data extends Controller {

    public function index() {
        $userModel = new UsersModel();
        $data['subjects'] = $userModel->getData();
        return view('dataview', $data);
    }
    public function usersList()
    {
        $userModel = new UsersModel();
        $data['users']=$userModel->getUsersList();
        return view("userlist_view",$data);
    }
}
