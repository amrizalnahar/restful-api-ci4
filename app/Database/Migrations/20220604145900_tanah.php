<?php 
namespace App\Database\Migrations;

class Tanah extends \CodeIgniter\Database\Migration{
    public function up(){
        $this->forge->addField([
            'id_tanah' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'panjang_tanah' => [
                'type' => 'INT',
                'constraint' => 255,
            ],
            'lebar_tanah' => [
                'type' => 'INT',
                'constraint' => 255,
            ],
            'harga_tanah' => [
                'type' => 'BIGINT',
                'constraint' => 255,
            ],
            'alamat_tanah' => [
                'type' => 'TEXT'
            ],
            'gambar_tanah' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'created_date' =>[
                'type' => 'DATETIME',
            ],
            'updated_date' =>[
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'created_by' =>[
                'type' => 'INT',
                'constraint' => 11,
            ],
            'updated_by' =>[
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ]
        ]);

        $this->forge->addKey('id_tanah', TRUE);
        $this->forge->createTable('tanah');
    }

    public function down()
    {
        $this->forge->dropTable('tanah');
    }

}

?>