<?php 

namespace App\Models;

use CodeIgniter\Model;
    
class ResepModel extends Model
{
    protected $table = 'recipe';
    protected $useTimestamps = true;
    protected $primaryKey = 'id_recipe';
    protected $allowedFields = ['id_recipe','code_drug','qty','name_recipe'];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // public function getRecipe(){
    //     return $this->findAll();
    // }

    public function getRecipe($id = false) {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_recipe' => $id]);
    }

}
?>