<?php
namespace App\Models;
use \CodeIgniter\Model;

class LoginModel extends Model {
    public function verifyEmail($email){
       
        $builder = $this->db->table('users');
        $builder->select("uniid,status,username,password");
        $builder->where('email',$email);
        $result = $builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }
    public function saveLoginInfo($data)
    {
        $builder = $this->db->table('login_activity');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return $this->db->insertID();
        }
        else
        {
            return false;
        }
    }
    public function google_user_exists($id){
        $builder = $this->db->table('social_login');
        $builder->where('oauth_id', $id);
       if($builder->countAllResults()==1)
       {
           return true;
       }
        else {
            return false;
        }
    }
    public function updateGoogleUser($data,$id){
        $builder = $this->db->table('social_login');
        $builder->where('oauth_id', $id);
        $builder->update($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function createGoogleUser($data){
        $builder = $this->db->table('social_login');
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
    public function updatedAt($id){
        $builder = $this->db->table('users');
        $builder->where('uniid', $id);
        $builder->update(['updated_at'=>date('Y-m-d h:i:s')]);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function verifyToken($token){
        $builder = $this->db->table('users');
        $builder->select("uniid,username,updated_at");
        $builder->where('uniid',$token);
        $result = $builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }
    public function updatePassword($id,$pwd){
        $builder = $this->db->table('users');
        $builder->where('uniid', $id);
        $builder->update(['password'=>$pwd]);
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
