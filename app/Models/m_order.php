<?php namespace App\Models;

use CodeIgniter\Model;

	class m_order extends Model{

		protected $table = 'tbl_order';
		protected $primaryKey='id_order';
		protected $allowedFields = ['nama', 'alamat', 'telp', 'tanggal'];
    	public $nama;
    	public $alamat;
    	public $telp;
        public $tanggal;


        
        public function getOrder($id = false)
        {
            if($id === false){
                $db = \Config\Database::connect();
                $sql = 'SELECT id_order, nama,alamat,telp,tanggal FROM '.$this->table;
                $query = $db->query($sql);
                $results = $query->getResult();
                return $results;
            }else{
                return $this->asArray()->where(['id_order' => $id])->get();
            }   
        }

        public function saveOrder($data)
        {
            $builder = $this->db->table($this->table);
            return $builder->insert($data);
        }
    
        public function editOrder($data,$id)
        {
            return $this->db->table($this->table)->update($data, ['id_order' => $id]);
        }

     
        public function deleteOrder($id)
        {
            $builder = $this->db->table($this->table);
            return $builder->delete(['id_order' => $id]);
        } 
    
      
	}