<?php
namespace App\Controllers;

use App\Models\m_barang;
use App\Models\m_jual;
use App\Models\m_ongkir;
use App\Models\m_penjualan;

class Cart extends BaseController{
	 

      public function keranjang()
      {
         $this->load->database();
         $data = [
         'title' => 'Tugas Nomor 3',
         'cart' => \Config\Services::cart(),
         ];
         return view('v_keranjang',$data);
      }

      public function proses_order()
      {   
            $db = \Config\Database::connect();
            $model = new m_penjualan();
            $model2 = new m_jual();
            $cart = \Config\Services::cart();
  
            //-------------------------Input data order------------------------------
            $data_pelanggan = array('nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'tanggal' => date('Y-m-d H:i:s'),
            'telp' => $this->request->getVar('telp'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kota_tujuan' => $this->request->getVar('kota_tujuan'));
            $model->saveOrder($data_pelanggan);
            $order_id = $model->insertID();
            //-------------------------Input data detail order-----------------------
            $idOngkir = $this->request->getVar('id_ongkir');
            $ongkir = $db->table('tbl_ongkir')->where('id_ongkir', $idOngkir)->get()->getRowArray();
            $biaya_ongkir = $ongkir['ongkir_per_kg'];
            if ($keranjang = $cart->contents())
            {
            $tot_ongkir = 0;
            $tot_berat = 0;
            foreach ($keranjang as $item)
            {
            $productId = $item['id'];
            $productQty = $item['qty'];
            $tot_berat = $tot_berat + ($item['options']['berat'] * $item['qty']);
            $tot_ongkir = $tot_ongkir + (round($item['options']['berat'] * $item['qty']) * $biaya_ongkir);
            $data_detail = array(
            'id_penjualan' =>$order_id,
            'id_brg' => $item['id'],
            'id_ongkir'=> $this->request->getVar('id_ongkir'),
            'nama_brg' => $item['name'],
            'jml_jual' => $item['qty'],
            'biaya_ongkir' => $tot_ongkir,
            'total' => $cart->total(),
            'subberat' => $item['options']['berat'] * $item['qty'] );
            $model2->saveInvoice($data_detail); 
            
            //-------------------------Update Stok Barang-----------------------

            $productStock = $db->table('barang')->where('id_barang', $productId)->get()->getRowArray();
            $nowStock = $productStock['stok'] - $productQty;
            $db->query("UPDATE barang SET stok = '$nowStock' where id_barang = '$productId'");
            }
            $temp = fmod ( $tot_berat , 1.0 ) ;
            if ($temp<=0.3){
              $tot_berat = $tot_berat-$temp;
            }
            else{
              $tot_berat = $tot_berat-$temp;
              $tot_berat++;
            }
            $tot_ongkir = ($tot_berat * $biaya_ongkir);
            $db->query("UPDATE tbl_jual SET biaya_ongkir = '$tot_ongkir' where id_penjualan = '$order_id'");
            }
            //-------------------------Hapus shopping cart--------------------------
            $cart->destroy();
            return redirect()->to(base_url('cart/invoice'));
      }

      public function checkout()
       {
         $ModelOngkir= new m_ongkir();
         $data = [
         'title' => 'Tugas Nomor 3',
         'cart' => \Config\Services::cart(),
         'ongkir' => $ModelOngkir->getOngkir(),
         ];
         return view('v_checkout', $data);

       }

       public function invoice()
       {
        $ModelBarang= new m_penjualan();
         $data = [
            'title' => 'Invoice',
            'order' => $ModelBarang->getOrder(),
         ];
         return view('v_allinvoice.php', $data);

       }

      public function detail($id_order)
       {
         $model = new m_penjualan();
         $model2 = new m_jual();
          $model3 = new m_ongkir();
         $order = $model->getOrder($id_order)->getRow();
         $invoice = $model2->getInvoice($id_order)->getRow();
         $ongkir = $model3->getOneOngkir($id_order);
         $transaksi = $model2->select('*, tbl_jual.id AS id_jual')->join('barang',
         	'barang.id_barang=tbl_jual.id_brg')
         	->join('tbl_penjualan', 'tbl_penjualan.id_penjualan=tbl_jual.id_penjualan')
         	->where('tbl_jual.id_penjualan', $id_order)
           ->first();
        
         $data = [
         'order' => $order,
         'invoice' => $invoice,
         'transaksi' => $transaksi,
         'ongkir' => $ongkir
         ];

         return view('v_invoice.php', $data);

       }

      
      

	
	
}