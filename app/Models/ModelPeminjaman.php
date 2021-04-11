<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjaman extends Model
{
    protected $table = 'tb_peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $allowedFields = ['nama', 'id_stok_akhir', 'id_instansi', 'jumlah_minjam', 'no_hp', 'waktu_janji_pinjam', 'waktu_janji_kembali', 'status', 'konfir'];
    protected $useTimestamps = true;

    public function getpeminjaman()
    {
        return $this->db->table('tb_peminjaman')->orderBy('id_peminjaman', 'DESC')
            ->join('tb_stok_akhir', 'tb_stok_akhir.id_stok_akhir=tb_peminjaman.id_stok_akhir')
            ->get()->getResultArray();
    }
    public function pengembalian($id)
    {
        $query = $this->db->query("SELECT * FROM tb_peminjaman WHERE id_peminjaman = '$id' ");
        $result = $query->getRowArray();
    }
    public function getkembali($id = false)
    {
        return $this->where(['id_peminjaman' => $id])->first();
    }
    public function laporanpeminjaman()
    {
        return $this->db->table('tb_peminjaman')->orderBy('id_peminjaman', 'DESC')
            ->join('tb_stok_akhir', 'tb_stok_akhir.id_stok_akhir=tb_peminjaman.id_stok_akhir')
            ->join('tb_instansi', 'tb_instansi.id_instansi=tb_peminjaman.id_instansi')
            ->get()->getResultArray();
    }
    public function belumkembali($user)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_peminjaman');
        $builder->selectCount('status')
            ->where('status', '1')
            ->where('id_user', $user);
        return $builder->countAllResults();
    }
    public function sudahkembali($user)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_peminjaman');
        $builder->selectCount('status')
            ->where('status', '2')
            ->where('id_user', $user);
        return $builder->countAllResults();
    }
    public function jumlahpinjam($user)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_peminjaman');
        $builder->selectCount('status')
            ->where('id_user', $user);
        return $builder->countAllResults();
    }

    public function barangpinjam()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_peminjaman');
        $builder->selectCount('status')
            ->where('status', '2');
        return $builder->countAllResults();
    }
    public function barangbelum()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_peminjaman');
        $builder->selectCount('status')
            ->where('status', '1');
        return $builder->countAllResults();
    }
}
