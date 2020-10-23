<?php
namespace App\Controllers;
use \CodeIgniter\Controller;

class Test extends Controller{
    
    public $parser;
    public function __construct() {
        $this->parser = \Config\Services::parser();
    }
    
    public function index() {

       $data = [
         'page_title'   => 'My Blog Title',
         'page_heading' => 'My Blog Heading', 
        'subjects_list' => [
             ['subject' => 'HTML', 'abbr' => 'Hyper Text Markup Language'],
             ['subject' => 'CSS', 'abbr' => 'Cascading Style Sheets'],
             ['subject' => 'JSON', 'abbr' => 'JavaScript Object Notation'],
             ['subject' => 'AJAX', 'abbr' => 'Asynchronous JavaScript and XML'],
             ['subject' => 'PHP', 'abbr' => 'Hypertext Preprocessor'],
            ],
           "status"=>false,

        ];
       return $this->parser->setData($data)->render("myview");
       //echo view("myview",$data);
    }
    public function viewFilters()
    {
        $data = [
         'page_title'   => 'My Blog Title',
         'page_heading' => 'My Blog Heading hello how are you?', 
         'date' => '25-05-2020', 
         'price' => '500', 
         'offer' => '10.53', 
         'mobile' => '8500669933', 
        ];
        return $this->parser->setData($data)->render("flterview");
    }
    public function doLogin(){
        helper('form');
        $data=[];
        $throttler = \Config\Services::throttler();
        $allow = $throttler->check("login",4,MINUTE);
        
        if($this->request->getMethod()=='post'){
            $rules = [
                'uname' => 'required',
                'pwd' => 'required',
            ];
            if($this->validate($rules)){
                $uname = $this->request->getVar('uname');
                $pwd = $this->request->getVar('pwd');
                $throttler = \Config\Services::throttler();
                $allow = $throttler->check("login",4,MINUTE);
                if($allow){
                    if($pwd == '123' && $uname == 'ram'){
                        echo "All Okay";
                    }
                    else{
                        $data['error'] = 'Wrong credentials';
                    }
                }
                else{
                    $data['block_error'] = 'Max no.of attempts. Try again after 1 Minute';
                }
            }
            else{
                $data['validation'] = $this->validator;
            }
        }
        
        return view('myform_view',$data);
    }
}
