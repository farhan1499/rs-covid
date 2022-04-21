<?php 

namespace App\Models;

use CodeIgniter\Model;
    
class RekamModel extends Model
{
    protected $table = 'record';
    protected $useTimestamps = true;
    protected $primaryKey = 'code';
    protected $allowedFields = ['code','code_inpatient','name','doctor','complaint','diagnosis'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getRekam(){
        return $this->findAll();
    }
}
?>