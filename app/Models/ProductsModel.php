<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductsModel extends Model {
    public function getProducts(){
        $builder = $this->db->table('products');
        $builder->select("id,product_name,price,quantity,created_at");
        $result = $builder->get();
        if(count($result->getResultArray())>0)
        {
            return $result->getResult();
        }
        else
        {
            return false;
        }
    }
}
