<?php namespace App\Models;

use CodeIgniter\Model;

	class m_detailorder extends Model{

		protected $table = 'tbl_detail_order';
		protected $primaryKey='id';
		protected $allowedFields = ['id_order','id_brg', 'nama_brg', 'qty', 'harga'];
    	public $id_brg;
    	public $nama_brg;
    	public $qty;
        public $harga;


        
        public function getInvoice($id = false)
        {
            if($id === false){
                $db = \Config\Database::connect();
                $sql = 'SELECT id_order,id_brg,nama_brg,telp,harga FROM '.$this->table;
                $query = $db->query($sql);
                $results = $query->getResult();
                return $results;
            }else{
                return $this->getWhere(['id_order' => $id]);
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