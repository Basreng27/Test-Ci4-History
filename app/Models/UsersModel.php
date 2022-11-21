<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'username';
    protected $useTimestamps = false;
    protected $allowedFields = ['name', 'password', 'level', 'stat'];
}
