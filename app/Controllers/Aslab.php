<?php

namespace App\Controllers;

use App\Models\Modelaslab;
use App\Models\ModelPeminjamanlab;
use App\Models\ModelProses;

class Aslab extends BaseController
{
    protected $aslab;
    protected $proses;
    protected $peminjamanlab;

    public function __construct()
    {
        $this->aslab =  new Modelaslab();
        $this->proses = new ModelProses();
        $this->peminjamanlab =  new ModelPeminjamanlab();
    }
    public function index()
    {
        if (session()->get('level') !== 'admin') {
            return redirect()->to('/login_user');
        }
        $data = [
            'title' => 'Aslab',
            'aslab' => $this->aslab->getaslab(),
            'notifproses' => $this->proses->getproses(),
            'notivvew' => $this->proses->allproses(),
            'notiflab' => $this->peminjamanlab->countpinjam(),
            'labnotif' => $this->peminjamanlab->getpinjamnotif()
        ];
        return view('pages/aslab', $data);
    }

    public function tambahaslab()
    {
        $filegambar = $this->request->getFile('foto');
        $namagambar = $filegambar->getRandomName();
        $filegambar->move('asset/fotoaslab', $namagambar);
        $this->aslab->save([
            'nama' => $this->request->getVar('nama'),
            'jurusan' => $this->request->getVar('jurusan'),
            'nohp' => $this->request->getVar('nohp'),
            'foto' => $namagambar
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di tambahkan');
        return redirect()->to('/Aslab');
    }

    public function delaslab($id)
    {
        session()->setFlashdata('pesan', 'data berhasil di hapus');
        $this->aslab->delete($id);
        return redirect()->to('/Aslab');
    }

    public function editaslab()
    {
        $filegambar = $this->request->getFile('foto');
        if ($filegambar->getError() == 4) {
            $namagambar = $this->request->getVar('fotolama');
        } else {
            $namagambar = $filegambar->getRandomName();
            $filegambar->move('asset/fotoaslab', $namagambar);
        }
        $this->aslab->save([
            'id_aslab' => $this->request->getVar('id_aslab'),
            'nama' => $this->request->getVar('nama'),
            'jurusan' => $this->request->getVar('jurusan'),
            'nohp' => $this->request->getVar('nohp'),
            'foto' => $namagambar
        ]);
        session()->setFlashdata('pesan', 'data berhasil di edit');
        return redirect()->to('/Aslab');
    }
}
