<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengeluaran extends Model
{
    protected $table = 'tb_pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $allowedFields = ['id_stok_akhir', 'id_barang', 'id_kategori', 'jumlah_pengeluaran', 'waktu_pengeluaran', 'keterangan_pengeluaran'];
    protected $useTimestamps = true;

    public function getpengeluaran()
    {
        return $this->db->table('tb_pengeluaran')->orderBy('id_pengeluaran', 'DESC')
            ->join('tb_stok_akhir', 'tb_stok_akhir.id_stok_akhir=tb_pengeluaran.id_stok_akhir')
            ->join('tb_kategori', 'tb_kategori.id_kategori=tb_pengeluaran.id_kategori')
            ->join('tb_barang', 'tb_barang.id_barang=tb_pengeluaran.id_barang')
            ->get()->getResultArray();
    }

    public function pengembalian($id)
    {
        $query = $this->db->query("SELECT * FROM tb_peminjaman WHERE id_peminjaman = '$id' ");
        $result = $query->getRowArray();
    }

    public function keluar($id = false)
    {
        return $this->where(['id_pengeluaran' => $id])->first();
    }
}
