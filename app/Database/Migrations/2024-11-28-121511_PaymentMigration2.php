<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentMigration2 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'order_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'payment_date' => [
                'type'    => 'DATETIME',
                'null' => false,
            ],
            'amount' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'payment_method' => [
                'type'       => 'ENUM',
                'constraint' => ['transfer', 'bayar_langsung'],
                'null'       => false,
            ],
            'receipt_img' => [
                'type'       => 'VARCHAR',
                'constraint' => 225,
            ],
            'payment_status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'confirmed', 'failed'],
                'default'    => 'pending',
            ],
        ]);

        // Menambahkan primary key
        $this->forge->addPrimaryKey('id');
        // Menambahkan foreign key
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        // Membuat tabel
        $this->forge->createTable('payments');
    }

    public function down()
    {
        // Menghapus tabel saat rollback
        $this->forge->dropTable('payments');
    }
}
