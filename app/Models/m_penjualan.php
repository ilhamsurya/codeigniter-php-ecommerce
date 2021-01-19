<?php namespace App\Models;

use CodeIgniter\Model;

	class m_penjualan extends Model{

		protected $table = 'tbl_penjualan';
		protected $primaryKey='id_penjualan';
		protected $allowedFields = ['nama', 'alamat', 'telp', 'tanggal'. 'kecamatan', 'kota_tujuan', 'total_ongkir', 'total'];
    	public $nama;
    	public $alamat;
    	public $telp;
        public $tanggal;


        
        public function getOrder($id = false)
        {
            if($id === false){
                $db = \Config\Database::connect();
                $sql = 'SELECT id_penjualan, nama,alamat,telp,tanggal,kecamatan,kota_tujuan,total_ongkir,total  FROM '.$this->table;
                $query = $db->query($sql);
                $results = $query->getResult();
                return $results;
            }else{
                return $this->asArray()->where(['id_penjualan' => $id])->get();
            }   
        }

        public function saveOrder($data)
        {
            $builder = $this->db->table($this->table);
            return $builder->insert($data);
        }
    
        public function editOrder($data,$id)
        {
            return $this->db->table($this->table)->update($data, ['id_penjualan' => $id]);
        }

     
        public function deleteOrder($id)
        {
            $builder = $this->db->table($this->table);
            return $builder->delete(['id_penjualan' => $id]);
        } 
    
      
	}