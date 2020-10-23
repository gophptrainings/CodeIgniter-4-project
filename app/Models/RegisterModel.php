<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;
use \CodeIgniter\Model;
/**
 * Description of RegisterModel
 *
 * @author ram
 */
class RegisterModel extends Model {
    public function createUser($data)
    {
        $builder = $this->db->table('users');
        $res = $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function verifyUniid($id)
    {
         $builder = $this->db->table('users');
         $builder->select('activation_date,uniid,status');
         $builder->where('uniid',$id);
         $result = $builder->get();
         //echo count($result->getResultArray());
         //echo $result->resultID->num_rows;
         if(count($result->getResultArray())==1)
         {
            return $result->getRow();
         }
         else
         {
             return false;
         }
    }
    public function updateStaus($uniid)
    {
        $builder = $this->db->table('users');
        $builder->where('uniid',$uniid);
        $builder->update(['status'=>'active']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
