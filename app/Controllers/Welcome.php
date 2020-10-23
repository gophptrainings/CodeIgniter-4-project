<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;
use CodeIgniter\Controller;
//use CodeIgniter\Exceptions\PageNotFoundException;
/**
 * Description of Welcome
 *
 * @author ram
 */
class Welcome extends Controller{
	
    public function index()
    {
        echo "Welcome to CI4";
    }
    public function test($name)
    {
        echo "Welcome to ".$name;
    }
    public function address($city,$country)
    {
        echo "I am from ".$city." and ".$country;
    }
    public function _remap($method, $param1 = null, $param2 = null)
    {
        if(method_exists($this, $method))
        {
            return $this->$method($param1,$param2);
        }
        else
        {
            $this->index();
        }
       //throw PageNotFoundException::forPageNotFound();
    }
}
