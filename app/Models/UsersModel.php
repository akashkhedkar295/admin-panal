<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'uid';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['uid','f_name', 'email','Access_level'];
    public function getUsers(){
        $userData = $this->find();
        return $userData;
    }

    public function filer($userName , $email , $access){
        // if($userName){$query=  $this->like('f_name',$userName) ;}
        // if($email){$query=  $this->like('email',$email) ;}
        // if($access){$query=  $this->like('Access_level',$access) ;}
        // $data =[
        //     "users"=> $query->paginate(5),
        //     "pager" => $this->pager
        // ];
        $data['users'] = $this->like('f_name',$userName)->orLike('email',$email)->orwhere('Access_level',$access)->paginate(5);
        $data['pager'] = $this->pager;
        return $data;
    }
}