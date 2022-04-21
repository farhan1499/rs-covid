<?php 

namespace App\Models;

use CodeIgniter\Model;
    
class PasienModel extends Model
{
    protected $table = 'patient';
    protected $useTimestamps = true;
    protected $primaryKey = 'code';
    protected $allowedFields = ['code','name','gender','born'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPasien() {
            return $this->findAll();
    }
}
?>