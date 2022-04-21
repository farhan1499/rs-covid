<?php 

namespace App\Models;

use CodeIgniter\Model;
    
class ObatModel extends Model
{
    protected $table = 'drug';
    protected $useTimestamps = true;
    protected $primaryKey = 'code';
    protected $allowedFields = ['code','name','type','unit'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getObat($id = false) {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['code' => $id])->first();
    }
}
?>