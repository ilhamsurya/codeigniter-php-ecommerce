<?php namespace App\Models;

use CodeIgniter\Model;

	class m_jual extends Model{

		protected $table = 'tbl_jual';
		protected $primaryKey='id';
		protected $allowedFields = ['id_penjualan','id_brg', 'nama_brg', 'jml_jual', 'total'];
    	public $id_penjualan;
    	public $id_brg;
    	public $nama_brg;
        public $jml_jual;
        public $total;


        
        public function getInvoice($id = false)
        {
            if($id === false){
                $db = \Config\Database::connect();
                $sql = 'SELECT id_penjualan,id_brg,nama_brg,jml_jual,total FROM '.$this->table;
                $query = $db->query($sql);
                $results = $query->getResult();
                return $results;
            }else{
                return $this->asArray()->where(['id_penjualan' => $id])->get();
            }   
        }

        

        public function saveInvoice($data)
        {
            $builder = $this->db->table($this->table);
            return $builder->insert($data);
        }
    
        public function editInvoice($data,$id)
        {
            return $this->db->table($this->table)->update($data, ['id' => $id]);
        }

     
        public function deleteInvoice($id)
        {
            $builder = $this->db->table($this->table);
            return $builder->delete(['id' => $id]);
        } 

        
        
    
      
	}