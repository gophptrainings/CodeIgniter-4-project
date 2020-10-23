<?php
namespace App\Models;
use \CodeIgniter\Model;

class AutoModel extends Model{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
}
