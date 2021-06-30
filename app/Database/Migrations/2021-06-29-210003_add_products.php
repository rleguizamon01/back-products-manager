<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProducts extends Migration
{
	public function up()
        {
                $this->forge->addField([
                        'id' => [
							'type'           => 'INT',
							'constraint'     => 5,
							'unsigned'       => true,
							'auto_increment' => true,
                        ],
                        'name' => [
							'type'       => 'VARCHAR',
							'constraint' => '100',
							
                        ],
                        'price' => [
							'type' => 'BIGINT',
                        ],
						'created_at' => [
							'type' => 'TIMESTAMP',
							'null' => TRUE
						],
						'updated_at' => [
							'type' => 'TIMESTAMP',
							'null' => TRUE
						],
						'deleted_at' => [
							'type' => 'TIMESTAMP',
							'null' => TRUE
						],
						
                ]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('products');
        }

        public function down()
        {
                $this->forge->dropTable('products');
        }
}
