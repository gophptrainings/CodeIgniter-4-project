<?php

namespace App\Filters;

use \CodeIgniter\Filters\FilterInterface;
use \CodeIgniter\HTTP\RequestInterface;
use \CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class IPBlocker implements FilterInterface{
    public function before(RequestInterface $request) {
       $throttler = Services::throttler();
       if($throttler->check($request->getIPAddress(), 4, MINUTE) === false){
           return Services::response()->setStatusCode(429)->setBody('Too many Hits');
       }
    }
    public function after(RequestInterface $request, ResponseInterface $response) {
        ;
    }
}
