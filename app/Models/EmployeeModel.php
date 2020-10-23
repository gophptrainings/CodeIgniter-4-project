<?php
namespace App\Models;
use \CodeIgniter\Model;

class EmployeeModel extends Model{
    
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email','salary','city','designation','mobile'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $returnType = 'array';
    
    protected $validationRules    = [
        'name'     => 'required|alpha_numeric_space|min_length[3]',
        'email'        => 'required|valid_email|is_unique[employees.email]',
        'salary'     => 'required|min_length[4]',
        'mobile'     => 'required|exact_length[10]|numeric',
        'city'     => 'required',
        'designation'     => 'required',
    ];
    protected $validationMessages = [
        'email'        => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
            'required' => 'Email is required',
            'valid_email' => 'Valid Email required',
        ]
    ];
}
