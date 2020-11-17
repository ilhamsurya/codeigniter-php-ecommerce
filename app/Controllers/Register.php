<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\m_user;

class Register extends Controller
{
	public function index()
	{
		//include helper form
		helper(['form']);
		$data = [];
		echo view('v_register', $data);
	}

	public function save()
	{
		//include helper form
		helper(['form']);
		//set rules validation form
		$rules = [
			'name' 			=> 'required|min_length[3]|max_length[20]',
			'password' 		=> 'required|min_length[6]|max_length[200]',
			'confpassword' 	=> 'matches[password]'
		];

		if($this->validate($rules)){
			$model = new m_user();
			$data = [
				'user_name' 	=> $this->request->getVar('name'),
				'user_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
			];
			$model->save($data);
			return redirect()->to('/login');
		}else{
			$data['validation'] = $this->validator;
			echo view('v_register', $data);
		}
		
	}

}