<?php

namespace App\Controllers;
use App\Models\UsersModel;
class Home extends BaseController {

    public $model;
    public function __construct() {
        helper('form');
        $this->model = new UsersModel();
    }
    public function index() {
        $data = [
            'page_title' => 'CodeIgniter 4',
            'page_heading' => 'CodeIgniter 4 Training',
        ];
        echo view("homeview", $data);
    }

    public function about() {
        $data = [
            'page_title' => 'Welcome to CodeIgniter 4|about',
            'page_heading' => 'About Us',
        ];
        echo view("aboutview", $data);
    }

    public function training() {
        return view("trainingview");
    }

    public function online() {
        return view("onlineview");
    }
       
}