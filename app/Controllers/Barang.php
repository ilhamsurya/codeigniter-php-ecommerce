<?php
namespace App\Controllers;


use App\Models\m_barang;

	class Barang extends BaseController{
	   public function __construct() {
         $this->ModelBarang = new m_barang;
         helper(['url', 'form']);
	   }

	   public function index()
	   {
         $ModelBarang= new m_barang();
         $data = [
            'title' => 'Tugas Nomor 3',
            'barang' => $ModelBarang->getBarang(),
         ];
         return view('v_barang',$data);
      }
      
      public function keranjang()
      {
         $data = [
         'title' => 'Tugas Nomor 3',
         'cart' => \Config\Services::cart(),
         ];
         return view('v_keranjang',$data);
      }
      
      public function tambah()
      {
         return view('v_tambah_barang');
      }

       public function add()
       {
         $model = new m_barang();
         $upload = $this->request->getFile('file_upload');
         $upload->move(WRITEPATH . '../public/assets/images/');
         $data = array(
         'nama_barang' => $this->request->getPost('namabarang'),
         'gambar' => $upload->getName(),
         'deskripsi' => $this->request->getPost('deskripsibarang'),
         'kategori' => $this->request->getPost('kategoribarang'),
         'harga' => $this->request->getPost('hargabarang'),
         'berat' => $this->request->getPost('beratbarang'),
         'stok' => $this->request->getPost('stokbarang'),
         );
         $model->saveBarang($data);
         return view('v_barang');

       }

       public function cek()
       {
         $cart = \Config\Services::cart();
         $response = $cart->contents();
         echo '<pre>';
         print_r ($response);
         echo '</pre>';
       }

      function beli()
      {
         $cart = \Config\Services::cart();
        
          $cart->insert(array(
          'id' => $this->request->getPost('id'),
          'qty' => 1,
          'price' => $this->request->getPost('price'),
          'name' => $this->request->getPost('name'),
          'options' => array('gambar' => $this->request->getPost('gambar'),
          'berat' => $this->request->getPost('berat'), )
          ));
    
      }

      public function delete_all()
      {
         $cart = \Config\Services::cart();
         $cart->destroy();
         redirect('barang');
      }
      public function delete($id)
      {
         $cart = \Config\Services::cart();
         $cart->remove($id);
         session()->setFlashdata('pesan', 'Barang dihapus dari keranjang');
         return redirect()->to(base_url('barang/keranjang'));
      }

      public function update()
      {
           $cart = \Config\Services::cart();
           $i = 1;
           foreach($cart->contents() as $key => $value){
               $cart->update(array(
               'rowid' => $value['rowid'],
               'qty' => $this->request->getPost('qty' . $i++),
               ));
           }
              session()->setFlashdata('pesan', 'Barang berhasil diupdate');
              return redirect()->to(base_url('barang/keranjang'));
       
      }

      public function tampil_cart()
   	{
      
      	return view('v_tampil_cart');

   	}
      

	
	
}