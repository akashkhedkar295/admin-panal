<?php

namespace App\Models;

use CodeIgniter\Model;
class CampaignModel extends Model{
    protected $table      = 'capmaign';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id','c_name', 'description','client','Supervisor'];
    function getCampaign(){
        return $this->findAll();
    }
}

