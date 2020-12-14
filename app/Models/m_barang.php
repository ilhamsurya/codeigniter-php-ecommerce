<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class m_barang extends Model{
 
    protected $table = "barang";
    protected $primaryKey = "id";
 
     public function getBarang($id = false)
     {
        if($id === false){
        $db = \Config\Database::connect();
        $sql = 'SELECT id_barang,nama_barang,kategori,deskripsi,harga,stok,gambar,berat FROM '.$this->table;
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
        }else{
        return $this->getWhere(['id_barang' => $id]);
     }
     }
     public function saveBarang($data)
     {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
     }
  

       
 
}