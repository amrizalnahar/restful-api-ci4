<?php 
namespace App\Database\Migrations;

class Fasilitas extends \CodeIgniter\Database\Migration{
    public function up(){
        $this->forge->addField([
            'id_fasilitas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'jumlah_KM' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'jumlah_KTDR' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'garasi' => [
                'type' => 'ENUM',
                'constraint' => ['ada','tidak ada']
            ],
            'luas_bangunan' => [
                'type' => 'INT',
                'constraint' => 255,
            ],
            'gambar_fasilitas' => [
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

        $this->forge->addKey('id_fasilitas', TRUE);
        $this->forge->createTable('fasilitas');
    }

    public function down()
    {
        $this->forge->dropTable('fasilitas');
    }

}

?>