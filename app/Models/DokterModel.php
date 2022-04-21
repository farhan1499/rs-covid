<?php 

namespace App\Models;

use CodeIgniter\Model;
    
class DokterModel extends Model
{
    protected $table = 'doctor';
    protected $useTimestamps = true;
    protected $primaryKey = 'code';
    protected $allowedFields = ['code','name','gender'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDokter(){
        return $this->findAll();
    }
}
?>