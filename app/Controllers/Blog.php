<?php

namespace App\Controllers;
use \CodeIgniter\Controller;
use App\Libraries\TestLibrary;

class Blog extends Controller {
    public $tl;
    public function __construct() {
        $this->tl = new TestLibrary();
    }
    public function index(){
        return $this->tl->getData();
    }
}
