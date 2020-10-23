<?php

namespace App\Controllers;
use App\Libraries\TestLibrary;

class Sample extends \CodeIgniter\Controller{
    
    public function index(){
        $obj = new TestLibrary();
        print_r($obj->testme());
    }
}
