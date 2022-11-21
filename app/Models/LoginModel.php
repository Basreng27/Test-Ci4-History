<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'username';
    protected $allowedFields = ['name', 'password', 'level', 'stat'];

    public function getUser($username, $password)
    {
        return $this->where(['username' => $username, 'password' => $password])->first(); //yang pertama ditemukan
    }

    
}
