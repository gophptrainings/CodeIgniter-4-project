<?php

namespace App\Libraries;
use App\Models\AutoModel;
use CodeIgniter\HTTP\URI;

class TestLibrary {
    
    public $db;
    public $am;
    public $email;
    public $uri;
    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->email = \Config\Services::email();
        $this->am = new AutoModel();
        $this->uri = new URI(current_url());
        helper('form');
    }
    
    public function getData(){
        //return $this->db->query('select *from employees')->getResultArray();
        //return $this->am->find(1);
        return $this->uri->getHost();
    }
    public function displayData(){
        return $this->am->findAll();
    }
}
