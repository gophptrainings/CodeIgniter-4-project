<?php
//Load Model Class
use App\Models\UsersModel;
//Load Controller Class
use App\Controllers\Contact;
function getRandom($arr)
{
    shuffle($arr);
    return end($arr);
}
function usersList(){
    //calling a Model into a custom helper
    $obj = new UsersModel();
    $data = $obj->getUsersList();
    return $data;
}
function displayContactForm(){
    //calling a Controller class into a custom helper
    $obj = new Contact();
    return $obj->myFunction();
}



