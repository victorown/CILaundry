<?php

namespace App\Models;

use CodeIgniter\Model;

class LaundryModel extends Model
{
    protected $table = 'services';  // Nama tabel
    protected $primaryKey = 'id';   // Primary key
    protected $allowedFields = ['service_name', 'description', 'price_per_kg', 'created_at', 'updated_at'];  // Field yang bisa diisi

    // Menggunakan timestamps secara otomatis
    protected $useTimestamps = true;
}
