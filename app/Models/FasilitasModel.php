<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    protected $table = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';
    protected $allowedFields = [
        'jumlah_KM', 'jumlah_KTDR', 'garasi', 'luas_bangunan', 'gambar_fasilitas', 'created_date', 'updated_date', 'created_by', 'updated_by'
    ];
    protected $returnType = 'App\Entities\fasilitas';
    protected $useTimestamps = false;

    public function findById($id_fasilitas)
    {
        $data = $this->find($id_fasilitas);
        if ($data) {
            return $data;
        }
        return false;
    }
}
