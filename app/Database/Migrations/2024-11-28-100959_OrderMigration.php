<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'order_date' => [
                'type'    => 'DATETIME',
                'null' => false,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'in_progress', 'completed', 'cancelled'],
                'default'    => 'pending',
                'null' => false
            ],
            'total_amount' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false,
            ],
            'payment_status' => [
                'type'       => 'ENUM',
                'constraint' => ['unpaid', 'paid'],
                'default'    => 'unpaid',
                'null' => false,
            ],
            'pickup_address' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'delivery_address' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'pickup_time' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'delivery_time' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
