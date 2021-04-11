<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelStokakhir extends Model
{
    protected $table = 'tb_stok_akhir';
    protected $primaryKey = 'id_stok_akhir';
    protected $allowedFields = ['id_kategori', 'nama_barang', 'merek_barang', 'jumlah', 'kondisi', 'posisi', 'foto', 'aktif'];
    protected $useTimestamps = true;

    public function getstokakhir()
    {
        return $this->db->table('tb_stok_akhir')->orderBy('id_stok_akhir', 'DESC')
            ->join('tb_kategori', 'tb_kategori.id_kategori=tb_stok_akhir.id_kategori')
            ->get()->getResultArray();
    }

    public function serach($keyword)
    {
        return $this->table('tb_stok_akhir')->like('nama_barang', $keyword)->orLike('merek_barang', $keyword);
    }
}
