<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\m_user;

class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('v_login');
    } 

    public function auth()
    {
        $session = session();
        $model = new m_user();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('user_name', $username)->first();
        if($data){
            $pass = $data['user_password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['user_id'],
                    'user_name'     => $data['user_name'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/mahasiswa');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
} 