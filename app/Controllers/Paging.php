<?php

namespace App\Controllers;
use \CodeIgniter\Controller;
use \App\Models\EmployeeModel;

class Paging extends Controller {
    public $pager;
    public $empModel;
    public function __construct() {
        $this->pager = \Config\Services::pager();
        $this->empModel = new EmployeeModel();
    }
    public function index($page = 1){
        $data = [
            'users' => $this->empModel->paginate(3,'group',$page),
            //'users' => $this->empModel->paginate(4, 'page', $page),
            'pager' => $this->empModel->pager,
            'total' => $this->empModel->countAllResults(),
            'perpage' => 3,
            'page' => $page,
        ];
        
        return view("paging_view", $data);
    }
}
