<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class m_barang extends Model{
 
    protected $table = "barang";
    protected $primaryKey = "id_barang";
    protected $allowedFields = ['nama_barang','deskripsi', 'kategori', 'harga', 'berat', 'stok'];
    public $nama_barang;
    public $deskripsi;
    public $kategori;
    public $harga;
    public $berat;
    public $stok;
 
     public function getBarang()
     {
        return $this->findAll();
     }
     
     public function saveBarang($data)
     {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
     }

     public function update_stock($data)
     {
        

     }

  
 
}