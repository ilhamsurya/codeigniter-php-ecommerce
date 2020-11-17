<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class m_user extends Model{
    protected $table = 'users';
    protected $allowedFields = ['user_name','user_password','user_created_at'];
}