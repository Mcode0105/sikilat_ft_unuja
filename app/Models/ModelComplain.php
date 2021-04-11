<?php

namespace App\Models;

use CodeIgniter\Model;



class ModelComplain extends Model
{
    protected $table = 'tb_complain';
    protected $primaryKey = 'id_complain';
    protected $allowedFields = ['nama_dosen', 'nama_lab', 'nama_barang', 'catatan', 'kode', 'date', 'nidn_nim', 'prodi', 'status', 'nama_aslab', 'foto'];
    protected $useTimestamps = true;

    public function getcomplain()
    {
        $db = \Config\Database::connect();
        return $db->table('tb_complain')
            ->orderBy('id_complain', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function complainon()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_complain');
        return $builder->where('status', 2)->countAllResults();
    }
    public function complainoff()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_complain');
        return $builder->where('status', 1)->countAllResults();
    }
    public function complainall()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tb_complain');
        return $builder->countAll();
    }

    public function caricomplain($lab, $date)
    {
        return $this->table('tb_complain')->like('nama_lab', $lab)->orLike('date', $date);
    }
}
