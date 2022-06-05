<?php

namespace App\Models;

use CodeIgniter\Model;

class TanahModel extends Model
{
    protected $table = 'Tanah';
    protected $primaryKey = 'id_tanah';
    protected $allowedFields = [
        'panjang_tanah', 'lebar_tanah', 'harga_tanah', 'alamat_tanah', 'gambar_tanah', 'created_date', 'updated_date', 'created_by', 'updated_by'
    ];
    protected $returnType = 'App\Entities\Tanah';
    protected $useTimestamps = false;

    public function findById($id_tanah)
    {
        $data = $this->find($id_tanah);
        if ($data) {
            return $data;
        }
        return false;
    }
}
