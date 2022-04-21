<?php 

namespace App\Models;

use CodeIgniter\Model;
    
class RawatModel extends Model
{
    protected $table = 'inpatient';
    protected $useTimestamps = true;
    protected $primaryKey = 'code';
    protected $allowedFields = ['code','code_patient','patient','in','out','range','nurse','status','post'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getRawat(){
        return $this->findAll();
    }
}
?>