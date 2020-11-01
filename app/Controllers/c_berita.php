<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class c_berita extends Controller{
    public function tampil(){
        return view('v_berita');
    }
}
?>