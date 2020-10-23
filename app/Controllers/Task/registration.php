<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use CodeIgniter\Model;
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
             $db= \Config\Database::connect();
       // return  $db;
        $builder=$db->table('users');
      
        $res=$builder->insert($data);
        
        print_r($res);
     //  print_r($data);
            if($res->connID->effected_rows==1)
            {
               print_r("true");
                   
            }
            else
            {
                 print_r("false");
                
            }
           
    }
}
