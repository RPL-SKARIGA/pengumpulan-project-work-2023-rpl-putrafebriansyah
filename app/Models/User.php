<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'tb_user';
    protected $allowedFields = ['username','email','password','created_at'];
}
