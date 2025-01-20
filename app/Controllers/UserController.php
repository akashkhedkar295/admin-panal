<?php

namespace App\Controllers;
use Models\UsersModel;

class UserController extends BaseController{
    private $UserModel;
    public $data;
    public function __constructor(){
        $this->UserModel = new UsersModel();
    }
    public function UserTable(){
        // $data=[];
        // $data['usersd']=$this->UserModel->findAll();
        // echo $data['usersd'];   
        // echo view('UserTable',$data);
    }
}
