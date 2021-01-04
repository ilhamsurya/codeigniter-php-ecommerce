<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class m_barang extends Model{
 
    protected $table = "barang";
    protected $primaryKey = "id";
 
     public function getBarang()
     {
        return $this->findAll();
     }
     
     public function saveBarang($data)
     {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
     }
  

       
 
}