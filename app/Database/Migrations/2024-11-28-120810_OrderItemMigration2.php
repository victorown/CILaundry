<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderItemMigration2 extends Migration
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
                'null' => false,
            ],
            'service_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null' => false,
            ],
            'quantity' => [
                'type' => 'INT',
                'null' => false,
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('service_id', 'services', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('order_items');
    }

    public function down()
    {
        $this->forge->dropTable('order_items');
    }
}
