<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'phone', 'address'];

    // Optional: jika ingin menggunakan timestamps otomatis
    protected $useTimestamps = true;
}