<?php namespace App\Controllers;

use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        $model = new \App\Models\EmployeeModel();

        $data = [
            'users' => $model->paginate(10),
            'pager' => $model->pager
        ];

        echo view('users/index', $data);
    }
}