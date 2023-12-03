<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
    protected $table = 'tb_admin';
    protected $allowedFields = ['username', 'email', 'password', 'created_at'];
}
