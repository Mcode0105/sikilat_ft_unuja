<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelProses extends Model
{
    protected $table = 'tb_proses_peminjaman';
    protected $primaryKey = 'id_proses_peminjaman';
    protected $allowedFields = ['id_proses_peminjaman', 'id_stok_akhir', 'status'];
    protected $useTimestamps = true;

    public function getproses()
    {
        return $this->db->table('tb_proses_peminjaman')
            ->join('tb_stok_akhir', 'tb_stok_akhir.id_stok_akhir=tb_proses_peminjaman.id_stok_akhir')
            ->get()->getResultArray();
    }
    public function getproseson()
    {
        return $this->db->table('tb_proses_peminjaman')
            ->join('tb_stok_akhir', 'tb_stok_akhir.id_stok_akhir=tb_proses_peminjaman.id_stok_akhir')
            ->get()->getResultArray();
    }


    public function allproses()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_proses_peminjaman');
        return $builder->countAll();
    }
}
