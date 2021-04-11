<?php

namespace App\Models;

use CodeIgniter\Model;



class ModelBaranglab extends Model
{
    protected $table = 'tb_baranglab';
    protected $primaryKey = 'id_baranglab';
    protected $allowedFields = ['id_lab', 'id_kategori', 'nama_barang', 'merek_barang', 'jumlah', 'status', 'gambar', 'keterangan'];
    protected $useTimestamps = true;

    public function getbaranglab($slug_lab)
    {
        return $this->db->table('tb_baranglab')
            ->join('tb_lab', 'tb_lab.id_lab=tb_baranglab.id_lab')
            ->join('tb_kategori', 'tb_kategori.id_kategori=tb_baranglab.id_kategori')
            ->where('slug_lab', $slug_lab)
            ->get()
            ->getResultArray();
    }
    public function viewdata()
    {
        return $this->db->table('tb_baranglab')
            ->join('tb_lab', 'tb_lab.id_lab=tb_baranglab.id_lab')
            ->join('tb_kategori', 'tb_kategori.id_kategori=tb_baranglab.id_kategori')
            ->get()
            ->getResultArray();
    }
}
