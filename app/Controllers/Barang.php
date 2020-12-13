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
         $data = [
            'title' => 'Tugas Nomor 3',
            'barang' => $this->ModelBarang->getBarang(),
            'cart' => \Config\Services::cart(),
         ];
         return view('v_barang',$data);
      }
      
      public function keranjang()
      {
         $data = [
         'title' => 'Tugas Nomor 3',
         'barang' => $this->ModelBarang->getBarang(),
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
         'stok' => $this->request->getPost('stokbarang'),
         );
         $model->saveBarang($data);
         return view('v_tambah_barang');

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
          'options' => array('gambar' => $this->request->getPost('gambar'))
          ));
         session()->setFlashdata('pesan', 'Barang masuk ke keranjang');
         return redirect()->to(base_url('barang'));
      }
      function hapus()
      {

      $cart = \Config\Services::cart();
      $cart->destroy();
      redirect('barang');
      }

      public function tampil_cart()
   	{
      
      	return view('v_tampil_cart');

   	}
      

	
	
}