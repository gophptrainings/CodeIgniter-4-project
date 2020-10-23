<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of Registration
 *
 * @author SNEHA
 */
class Registration extends \CodeIgniter\Model
{
    //put your code here
    public function createUser($data)
    {
            $builder=$this->db->table('users');
            print_r($data);
       $res=$builder->insert($data);
            if($this->db->effectedRows==1)
            {
                return true;
            }
            else
            {
                return false;
                
            }
           
    }
}
