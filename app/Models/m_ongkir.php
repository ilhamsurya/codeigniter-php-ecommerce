<?php namespace App\Models;

use CodeIgniter\Model;

	class m_ongkir extends Model{

		protected $table = 'tbl_ongkir';
		protected $primaryKey='id_ongkir';
	    protected $allowedFields = ['kecamatan_pengiriman','kecamatan_tujuan', 'ongkir_per_kg'];
    	public $kecamatan_pengiriman;
    	public $kecamatan_tujuan;
    	public $ongkir_per_kg;
 

        public function getOngkir()
        {
        return $this->findAll();
        }
        
        public function getOneOngkir($id)
        {
        return $this->find($id);
        }

        public function saveOngkir($data)
        {
            $builder = $this->db->table($this->table);
            return $builder->insert($data);
        }
    
        public function editOngkir($data,$id)
        {
            return $this->db->table($this->table)->update($data, ['id_ongkir' => $id]);
        }

     
        public function deleteOngkir($id)
        {
            $builder = $this->db->table($this->table);
            return $builder->delete(['id_ongkir' => $id]);
        } 

        
        
    
      
	}