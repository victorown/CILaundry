<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            'password' => password_hash('admin170', PASSWORD_BCRYPT), // Enkripsi password
            'role'     => 'admin',
            'name'     => 'Administrator',
            'email'    => 'admin@example.com',
            'phone'    => '1234567890',
            'address'  => 'Admin Address',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Masukkan data ke tabel users
        $this->db->table('users')->insert($data);

        echo "Admin user has been seeded.\n";
    }
}
