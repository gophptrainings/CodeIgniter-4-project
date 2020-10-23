<?php
namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model {

    public function getUsersList()
    {
        $query = $this->db->query('select id,username,email,mobile from users');
        $result = $query->getResult();
        if(count($result)>0)
        {
            return $query->getResult();
        }
        else
        {
            return false;
        }
    }
}
