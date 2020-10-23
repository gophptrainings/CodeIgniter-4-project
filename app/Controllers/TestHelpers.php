<?php

namespace App\Controllers;

use \CodeIgniter\Controller;

class TestHelpers extends Controller {

    public function index() {        
        helper(['form','html','cookie','array','test']);
        
        echo getRandom([10,20,30,40,50,60]);
        
        echo randomString();
        
        /*
        echo form_open();
        echo form_input("username",'gophp');
         * */
    
        /*
        echo base_url();
        echo current_url();
        */
    }

}
