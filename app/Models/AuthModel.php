<?php
namespace App\Models;
use CodeIgniter\Model;
class AuthModel extends Model{
    protected $table      = 'employees';
    protected $primaryKey = 'emp_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['emp_id','fname', 'email','JobTitle','password'];
    public function record(){
        return "hallo world";
    }
}
?>