<?php
namespace App\Controllers;

use \CodeIgniter\RESTful\ResourceController;
use App\Models\ProductsModel;

class Products extends ResourceController {

    private $productsModel;
    
    public function __construct() {
        $this->productsModel = new ProductsModel();
    }
    public function getProducts(){
        $data = $this->productsModel->getProducts();
        if($data){
            return $this->respond($data);
        }
        else{
            return $this->failNotFound('No Data Found');
        }
    }
}
