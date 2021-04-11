<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model
{
    protected $table = 'tb_barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['id_kategori', 'nama_barang',  'merek_barang', 'jumlah', 'kondisi', 'posisi', 'foto', 'date', 'keterangan'];
    protected $useTimestamps = true;

    public function getbarang()
    {
        return $this->db->table('tb_barang')->orderBy('id_barang', 'DESC')
            ->join('tb_kategori', 'tb_kategori.id_kategori=tb_barang.id_kategori')
            ->get()->getResultArray();
    }

    public function jumlahbarang()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT SUM(jumlah) AS jumlahbarang FROM tb_barang ");
        return $query->getRowArray();
    }

    public function barangbaik()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT SUM(jumlah) AS jumlahbarangbaik FROM tb_barang WHERE kondisi= 'baik' ");
        return $query->getRowArray();
    }

    public function barangrusak()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT SUM(jumlah) AS jumlahbarangrusak FROM tb_barang WHERE kondisi= 'rusak' ");
        return $query->getRowArray();
    }

    public function caribarang($tanggal)
    {
        return $this->table('tb_barang')->like('created_at', $tanggal);
    }
}
