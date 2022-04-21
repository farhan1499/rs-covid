<?php 

namespace App\Models;

use CodeIgniter\Model;
    
class PerawatModel extends Model
{
    protected $table = 'nurse';
    protected $useTimestamps = true;
    protected $primaryKey = 'code';
    protected $allowedFields = ['code','name'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPerawat(){
        return $this->findAll();
    }
}
?>