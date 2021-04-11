<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelminjam extends Model
{
    protected $table = 'tb_peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $allowedFields = ['nama', 'id_instansi', 'id_stok_akhir', 'jumlah_minjam', 'no_hp', 'waktu_janji_pinjam', 'waktu_janji_kembali', 'status',  'konfir'];
    protected $useTimestamps = true;

    public function getpeminjaman()
    {
        return $this->db->table('tb_peminjaman')->orderBy('id_peminjaman', 'DESC')
            ->join('tb_stok_akhir', 'tb_stok_akhir.id_stok_akhir=tb_peminjaman.id_stok_akhir')
            ->get()->getResultArray();
    }
    public function getkembali($id = false)
    {
        return $this->where(['id_peminjaman' => $id])->first();
    }
}
