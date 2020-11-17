<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class c_home extends Controller{
    public function tampil(){
        $session = session();
        echo "Welcome back, ".$session->get('user_name');
        
    }
}
?>