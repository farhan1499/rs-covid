<?php 

namespace App\Models;

use CodeIgniter\Model;
    
class PeriksaModel extends Model
{
    protected $table = 'checkup';
    protected $useTimestamps = true;
    protected $primaryKey = 'code';
    protected $allowedFields = ['code','code_patient','name','doctor','complaint','tension','pulse','temperature','breathing','diagnosis','radio','lab'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPeriksa() {
            return $this->findAll();
    }
}
?>