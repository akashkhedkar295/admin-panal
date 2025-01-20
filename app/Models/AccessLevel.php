<?php
namespace App\Models;
use CodeIgniter\Model;
class AccessLevel extends Model{
    protected $table      = 'access';
    protected $primaryKey = 'ac_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['ac_id','access'];
    public function record(){
        return "hallo world";
    }
}