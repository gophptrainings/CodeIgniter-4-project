<?php

namespace App\Controllers;
use \CodeIgniter\Controller;
use App\Models\EmployeeModel;

class Employee extends Controller {
    public $empModel;
    public function __construct() {
        helper("form");
        $this->empModel = new EmployeeModel();
    }
   public function addEmp(){
       if($this->request->getMethod() == 'post'){
           $data = [
               'name' => $this->request->getVar('name',FILTER_SANITIZE_STRING),
                'email' => $this->request->getVar('email',FILTER_SANITIZE_EMAIL),
                'salary' => $this->request->getVar('salary',FILTER_SANITIZE_STRING),
                'mobile' => $this->request->getVar('mobile'),
                'designation' => $this->request->getVar('designation',FILTER_SANITIZE_STRING),
                'city' => $this->request->getVar('city',FILTER_SANITIZE_STRING),
           ];
           if($this->empModel->save($data) === true){
               session()->setTempdata('success','Employee added successfully',2);
               return redirect()->to(current_url());
           }
       }
       return view('empadd_view',['errors' => $this->empModel->errors()]);
   }
   public function viewEmp(){
       $data['employees']=$this->empModel->findAll();
       return view("viewemp",$data);
   }
   public function editEmp($id=null){
       if($this->request->getMethod() == 'post'){
           $data = [
               'name' => $this->request->getVar('name',FILTER_SANITIZE_STRING),
                'salary' => $this->request->getVar('salary',FILTER_SANITIZE_STRING),
                'mobile' => $this->request->getVar('mobile'),
                'designation' => $this->request->getVar('designation',FILTER_SANITIZE_STRING),
                'city' => $this->request->getVar('city',FILTER_SANITIZE_STRING),
           ];
           
           if($this->empModel->update($id,$data) === true){
               session()->setTempdata('success','Employee updated successfully',2);
               return redirect()->to(current_url());
           }
       }
       return view("empedit_view",['emp'=>$this->empModel->find($id), 'errors' => $this->empModel->errors()]);
   }
   public function deleteEmp($id=null){
       if($this->empModel->where('id', $id)->delete()){
           session()->setTempdata('success','Employee deleted successfully',2);
            return redirect()->to(base_url()."/employee/viewemp");
       }
   }
   
}
