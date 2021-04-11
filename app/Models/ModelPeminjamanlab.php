<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjamanlab extends Model
{
    protected $table = 'tb_peminjaman_lab';
    protected $primaryKey = 'id_peminjaman_lab';
    protected $allowedFields = ['id_peminjaman_lab', 'id_lab', 'id_user', 'id_instansi', 'tgl_minjam', 'catatan', 'status', 'waktu', 'kelas', 'kebutuhan'];
    protected $useTimestamps = true;
    public function getpinjamlab($id_user)
    {
        return $this->db->table('tb_peminjaman_lab')->orderBy('id_peminjaman_lab', 'DESC')
            ->where('tb_user.id_user', $id_user)
            ->join('tb_user', 'tb_user.id_user=tb_peminjaman_lab.id_user')
            ->join('tb_lab', 'tb_lab.id_lab=tb_peminjaman_lab.id_lab')
            ->join('tb_instansi', 'tb_instansi.id_instansi=tb_peminjaman_lab.id_instansi')
            ->get()->getResultArray();
    }
    public function getpinjam()
    {
        return $this->db->table('tb_peminjaman_lab')->orderBy('id_peminjaman_lab', 'DESC')
            ->join('tb_user', 'tb_user.id_user=tb_peminjaman_lab.id_user')
            ->join('tb_lab', 'tb_lab.id_lab=tb_peminjaman_lab.id_lab')
            ->join('tb_instansi', 'tb_instansi.id_instansi=tb_peminjaman_lab.id_instansi')
            ->get()->getResultArray();
    }

    public function getpinjamnotif()
    {
        return $this->db->table('tb_peminjaman_lab')->orderBy('id_peminjaman_lab', 'DESC')
            ->join('tb_user', 'tb_user.id_user=tb_peminjaman_lab.id_user')
            ->join('tb_lab', 'tb_lab.id_lab=tb_peminjaman_lab.id_lab')
            ->join('tb_instansi', 'tb_instansi.id_instansi=tb_peminjaman_lab.id_instansi')
            ->where('status', 1)
            ->get()->getResultArray();
    }
    public function countpinjam()
    {
        return $this->db->table('tb_peminjaman_lab')
            ->where('status', '1')
            ->countAllResults();
    }
}
