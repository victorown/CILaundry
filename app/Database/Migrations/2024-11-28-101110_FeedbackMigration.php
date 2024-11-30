<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FeedbackMigration extends Migration
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
            'rating' => [
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => true,
            ],
            'review' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'feedback_date' => [
                'type'    => 'DATETIME',
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('feedback');
    }

    public function down()
    {
        $this->forge->dropTable('feedback');
    }
}
