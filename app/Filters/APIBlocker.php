<?php

namespace App\Filters;

use \CodeIgniter\Filters\FilterInterface;
use \CodeIgniter\HTTP\RequestInterface;
use \CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class APIBlocker implements FilterInterface{
    public function before(RequestInterface $request) {
       $throttler = Services::throttler();
       if($throttler->check('testapi', 4, MINUTE) === false){
           return Services::response()->setStatusCode(429)->setBody(json_encode(['message'=>'Too many hits to server. please try after some time']));
       }
    }
    public function after(RequestInterface $request, ResponseInterface $response) {
        ;
    }
}
