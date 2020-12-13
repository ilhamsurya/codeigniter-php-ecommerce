<?php
namespace App\Controllers;


use App\Models\m_mahasiswa;

	class Mahasiswa extends BaseController{
		public function __construct() {

		
			$this->model = new m_mahasiswa();
	
		}
		public function index()
		{
			$mhsModel= new m_mahasiswa();
			$data = [
            'title' => 'Tugas Nomor 3',
            'mahasiswa' => $mhsModel->paginate(2),
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