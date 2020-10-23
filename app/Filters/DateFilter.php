<?php
namespace App\Filters;

use \CodeIgniter\Filters\FilterInterface;
use \CodeIgniter\HTTP\RequestInterface;
use \CodeIgniter\HTTP\ResponseInterface;

class DateFilter implements FilterInterface {
    public function before(RequestInterface $request) {
       echo date('Y-m-d h:i:s a');
    }
    public function after(RequestInterface $request, ResponseInterface $response) {
        echo 'Bye';
    }
}
