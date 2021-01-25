<?php
namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\m_mahasiswa;

	class Mahasiswa extends BaseController{
		 protected $helpers = [];
		public function __construct() {

		  helper(['form']);
			$this->model = new m_mahasiswa();
	
		}
		
    public function import()
    {

        echo view('v_import_mahasiswa');
	}
	public function grafik()
    {
    	$model = new m_mahasiswa;
		$chart['grafik'] = $model->getGrafik();
        echo view('v_lihat_grafik',$chart);
    }
public function proses_import()
{
	 	$model = new m_mahasiswa;
    $validation =  \Config\Services::validation();
 
    $file = $this->request->getFile('trx_file');
 
    $data = array(
        'trx_file'           => $file,
    );
 
    if($validation->run($data, 'mahasiswa') == FALSE){
 
        session()->setFlashdata('errors', $validation->getErrors());
        return redirect()->to(base_url('mahasiswa/import'));
     
    } else {
 
        // ambil extension dari file excel
        $extension = $file->getClientExtension();
         
        // format excel 2007 ke bawah
        if('xls' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        // format excel 2010 ke atas
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
         
        $spreadsheet = $reader->load($file);
        $data = $spreadsheet->getActiveSheet()->toArray();
 
        foreach($data as $idx => $row){
             
            // lewati baris ke 0 pada file excel
            // dalam kasus ini, array ke 0 adalahpara title
            if($idx == 0) {
                continue;
            }
             
            // get product_id from excel
            $nim     = $row[0];
            // get trx_date from excel
            $nama       = $row[1];
          	// get trx_date from excel
			  $umur = $row[2];
			  	// get trx_date from excel
         	 $tinggi = $row[3];
 
            $data = [
                "nim" => $nim,
                "nama" => $nama,
				"umur" => $umur,
				"tinggi" => $tinggi
            ];
   			 $simpan = 	$model->saveMahasiswa($data);
          
        }
      
      	if($simpan)
        {
            session()->setFlashdata('success', 'Imported mahasiswa successfully');
            return redirect()->to(base_url('mahasiswa')); 
        }
    }
}
	
		public function index()
		{
			$mhsModel= new m_mahasiswa();
			$data = [
            'title' => 'Tugas Nomor 3',
            'mahasiswa' => $mhsModel->paginate(10),
            'pager' => $mhsModel->pager
        ];
        return view('v_mahasiswa',$data);
		}
	 
		public function tambah()
		{
			return view('v_tambah_mahasiswa');
		}
		
		public function add()
		{
			$model = new m_mahasiswa;
			$data = array(
				'nama' => $this->request->getVar('nama'),
				'umur' => $this->request->getVar('umur'),
				'nim'  => $this->request->getVar('nim'),
		
			);
			$model->saveMahasiswa($data);
			echo '<script>
					alert("Sukses Tambah Data Mahasiswa");
					window.location="'.base_url('mahasiswa').'"
				</script>';
	
		}
			
		public function edit($id)
		{
			$model = new m_mahasiswa;
			$mahasiswa = $model->getMahasiswa($id)->getRow();
			if(isset($mahasiswa))
			{
				$data['mahasiswa'] = $mahasiswa;
				$data['title']  = 'Edit '.$mahasiswa->nim;
				echo view('v_edit_mahasiswa', $data);
			}else{

				echo '<script>
						alert("ID mahasiswa '.$id.' Tidak ditemukan");
						window.location="'.base_url('mahasiswa').'"
					</script>';
			}
		}

		public function detail($id)
		{
			$model = new m_mahasiswa;
			$mahasiswa = $model->getMahasiswa($id)->getRow();
			if(isset($mahasiswa))
			{
				$data['mahasiswa'] = $mahasiswa;
				$data['title']  = 'Detail '.$mahasiswa->nim;
				echo view('v_detail_mahasiswa', $data);
			}else{

				echo '<script>
						alert("ID mahasiswa '.$id.' Tidak ditemukan");
						window.location="'.base_url('mahasiswa').'"
					</script>';
			}
		}

		public function update()
		{
			$model = new m_mahasiswa;
			$id = $this->request->getVar('nim');
			$data = array(
				'nim'  => $this->request->getVar('nim'),
				'nama' => $this->request->getVar('nama'),
				'umur' => $this->request->getVar('umur'),
			
			);
			$model->editMahasiswa($data,$id);
			echo '<script>
					alert("Sukses Edit Data Mahasiswa");
					window.location="'.base_url('mahasiswa').'"
				</script>';
		}

		public function delete($id)
		{
		
			$model = new m_mahasiswa;
			$getMahasiswa = $model->getMahasiswa($id)->getRow();
			if(isset($getMahasiswa))
			{
				$model->deleteMahasiswa($id);
				echo '<script>
						alert("Hapus Data Mahasiswa Sukses");
						window.location="'.base_url('mahasiswa').'"
					</script>';
	
			}else{
	
				echo '<script>
						alert("Hapus Gagal !, NIM '.$id.' Tidak ditemukan");
						window.location="'.base_url('mahasiswa').'"
					</script>';
			}
		}

		
		public function search(){
			$mhsModel= new m_mahasiswa();
			$nama=$this->request->getVar('search');
			$data = [
            'title' => 'Tugas search',
            'mahasiswa' => $mhsModel->searchnama($nama),
        ];
        return view('v_mahasiswa',$data);
		}
	
	
}