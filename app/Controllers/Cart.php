<?php
namespace App\Controllers;


use App\Models\m_barang;
use App\Models\m_order;
use App\Models\m_detailorder;

class Cart extends BaseController{
	 

      public function keranjang()
      {
         $data = [
         'title' => 'Tugas Nomor 3',
         'cart' => \Config\Services::cart(),
         ];
         return view('v_keranjang',$data);
      }

      public function proses_order()
      {
            $model = new m_order();
            $model2 = new m_detailorder();
            $cart = \Config\Services::cart();
  
            //-------------------------Input data order------------------------------
            $data_pelanggan = array('nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'tanggal' => date('Y-m-d H:i:s'),
            'telp' => $this->request->getVar('telp'));
            $model->saveOrder($data_pelanggan);
            $order_id = $model->insertID();
            //-------------------------Input data detail order-----------------------
            if ($keranjang = $cart->contents())
            {
            foreach ($keranjang as $item)
            {
            $data_detail = array(
            'id_order' =>$order_id,
            'id_brg' => $item['id'],
            'nama_brg' => $item['name'],
            'qty' => $item['qty'],
            'harga' => $item['price']);
            $model2->saveInvoice($data_detail); 
            }
            }
            //-------------------------Hapus shopping cart--------------------------
            $cart->destroy();
            return redirect()->to(base_url('cart/invoice'));
      }

      public function checkout()
       {
         $data = [
         'title' => 'Tugas Nomor 3',
         'cart' => \Config\Services::cart(),
         ];
         return view('v_checkout', $data);

       }
      
       public function invoice()
       {
        $ModelBarang= new m_order();
         $data = [
            'title' => 'Invoice',
            'order' => $ModelBarang->getOrder(),
         ];
         return view('v_allinvoice.php', $data);

       }

      public function detail($id_order)
       {
         $model = new m_order();
         $model2 = new m_detailorder();
         $order = $model->getOrder($id_order)->getRow();
         $invoice = $model2->getInvoice($id_order)->getRow();
         $data = [
         'order' => $order,
         'invoice' => $invoice,
         ];


   
         return view('v_invoice.php', $data);

       }

      
      

	
	
}