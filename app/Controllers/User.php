<?php

namespace App\Controllers;

use App\Models\Modelaslab;
use App\Models\ModelComplain;
use App\Models\ModelDosen;
use App\Models\ModelInstansi;
use App\Models\ModelKode;
use App\Models\ModelLab;
use App\Models\ModelMhs;
use App\Models\ModelPeminjaman;
use App\Models\ModelPeminjamanlab;
use App\Models\ModelProses;
use App\Models\ModelStokakhir;
use App\Models\ModelUser;
use CodeIgniter\Controller;
use CodeIgniter\Debug\Toolbar\Collectors\Views;

class User extends BaseController
{
    protected $barang;
    protected $peminjaman;
    protected $dosen;
    protected $complain;
    protected $user;
    protected $instansi;
    protected $aslab;
    protected $kode;
    protected $lab;
    protected $peminjamanlab;
    protected $proses;
    protected $notifikasi;
    protected $mhs;

    public function __construct()
    {
        $this->barang = new ModelStokakhir();
        $this->peminjaman = new ModelPeminjaman();
        $this->dosen = new ModelDosen();
        $this->complain = new ModelComplain();
        $this->user = new ModelUser();
        $this->instansi = new ModelInstansi();
        $this->aslab = new Modelaslab();
        $this->kode = new ModelKode();
        $this->lab = new ModelLab();
        $this->peminjamanlab = new ModelPeminjamanlab();
        $this->proses = new ModelProses();
        $this->mhs = new ModelMhs();
    }
    public function index($pages = 'user', $page = 'index')
    {
        if (session()->get('level') !== 'user') {
            return redirect()->to('/login_user');
        }
        if (!is_file(APPPATH . '/Views/' . $pages . '/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman' . " " . $page . " " . 'tidak ada');
        }
        $user = session()->get('id_user');
        $data = [
            'title' => 'Dhasboard',
            'belumkembali' => $this->peminjaman->belumkembali($user),
            'sudahkembali' => $this->peminjaman->sudahkembali($user),
            'jumlahpinjam' => $this->peminjaman->jumlahpinjam($user),
            'user' => $this->user->user($user)
        ];
        return view('user/index', $data);
    }
    public function databarang()
    {
        if (session()->get('level') !== 'user') {
            return redirect()->to('/login_user');
        }
        $keyword  = $this->request->getVar('keyword');
        if ($keyword) {
            $barang = $this->barang->serach($keyword);
        } else {
            $barang = $this->barang;
        }
        $data = [
            'title' => 'Bata Barang',
            'barang' => $barang->paginate(12, 'tb_barang'),
            'pager' => $this->barang->pager
        ];

        return view('user/databarang', $data);
    }

    public function login_user()
    {
        // $txt = "sesorang telah mengunjungi aplikasi anda";
        // $this->visited($txt);
        $data = [
            'lab' => $this->lab->labget()
        ];

        return view('user/login_user', $data);
    }

    public function loginprosesuser()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_user');
        $user = $builder->getWhere(['username' => $username])->getRowArray();
        // dosen
        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($user['level'] == 'user') {
                    session()->set('username', $user['username']);
                    session()->set('nama', $user['nama']);
                    session()->set('foto', $user['foto']);
                    session()->set('level', $user['level']);
                    session()->set('id_user', $user['id_user']);
                    session()->set('id_instansi', $user['id_instansi']);
                    // $this->sendmesseage("salah satu seseorang telah login sebagai user dengan USERNAME: $username");
                    if (session()->get('getlab') == true) {
                        $this->peminjamanlab->save([
                            'id_lab' => session()->get('id_lab'),
                            'id_user' => session()->get('id_user'),
                            'id_instansi' => session()->get('id_instansi'),
                            'tgl_minjam' => date('d-m-Y'),
                            'catatan' => session()->get('catatan'),
                            'status' => '1',
                            'waktu' => session()->get('waktu'),
                            'kebutuhan' => session()->get('kebutuhan'),
                            'kelas' => session()->get('kelas')
                        ]);
                        return redirect()->to('/user');
                    } else {
                        return redirect()->to('/user');
                    }
                }
            } else {
                session()->setFlashdata('pesan', 'password salah');
                return redirect()->to('/login_user');
            }
        } else {
            $this->sendmesseage("salah satu  seseorang mencoba login sebagai user dengan USERNAME: $username");
            session()->setFlashdata('pesan', 'username tidak terdaftar');
            return redirect()->to('/login_user');
        }
    }


    public function transaksi()
    {
        if (session()->get('level') !== 'user') {
            return redirect()->to('/login_user');
        }
        $id_user = session()->get('id_user');
        $data = [
            'title' => 'Transaksi',
            'peminjaman' => $this->peminjaman->getpeminjaman($id_user)
        ];
        return view('user/transaksi', $data);
    }

    public function tambahpeminjam($id)
    {

        $db = \Config\Database::connect();
        $jml = $db->query("SELECT * FROM tb_stok_akhir WHERE id_stok_akhir = '$id' ");
        $row = $jml->getRowArray();
        $jbarang = $row['jumlah'];
        $barang = $this->request->getVar('jumlah');
        $jmlbarang = $jbarang - $barang;
        $this->barang->save([
            'id_stok_akhir' => $id,
            'jumlah' => $jmlbarang
        ]);
        $data = [
            'id_user' => $this->request->getVar('id_user'),
            'id_stok_akhir' => $this->request->getVar('id'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_instansi' => $this->request->getVar('id_instansi'),
            'jumlah_minjam' => $this->request->getVar('jumlah'),
            'nama_peminjam' => $this->request->getVar('nama'),
            'no_hp' => $this->request->getVar('no_hp'),
            'waktu_janji_pinjam' => $this->request->getVar('waktupinjam'),
            'waktu_janji_kembali' => $this->request->getVar('waktukembali'),
            'keterangan' => $this->request->getVar('kondisi'),
            'date' => $this->request->getVar('tgl'),
            'status' => '1',
            'konfir' => '1'
        ];
        $mesege = 'Sesorang telah melakukan peminjaman barang, Menunggu untuk di konfirmasi';
        $this->sendmesseage($mesege);
        $this->peminjaman->insert($data);

        $this->barang->save([
            'id_stok_akhir' => $id,
            'aktif' => 1
        ]);
        session()->setFlashdata('pesan', 'peminjaman berhasil');
        return redirect()->to('/transaksi');
    }

    public function logout()
    {
        session()->destroy();
        session()->remove('username');
        session()->setFlashdata('keluar', 'anda berhasil logout');
        return redirect()->to('/login_user');
    }

    public function sendsms()
    {
        $email_api = urlencode("munifabdul603@gmail.com");
        $passkey_api = urlencode("Hm123123");
        $no_hp_tujuan = urlencode("085335650431");
        $isi_pesan = urlencode("assalamualaikum saya ingin meminjam barang");
        $url = "https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=" . $email_api . "&passkey=" . $passkey_api . "&no_tujuan=" . $no_hp_tujuan . "&pesan=" . $isi_pesan;
        return $url;
    }

    public function e_complain()
    {
        $data = [
            'title' => 'E-Complain',
            'dosen' => $this->dosen->getdosen(),
            'aslab' => $this->lab->viewlab(),
            'kode' => $this->kode->getkode(),
            'lab' => $this->lab->getlab()

        ];
        return view('user/complain', $data);
    }

    public function complainproses()
    {
        $nidn = $this->request->getVar('nidn');
        $email = $this->request->getVar('nidn');
        $nama = $this->request->getVar('nama');
        $kode = $this->request->getVar('kodelab');
        $ruangan = $this->request->getVar('namalab');
        $catatan = $this->request->getVar('catatan');
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_dosen');
        $user = $builder->getWhere(['nama' => $nama, 'nidn' => $nidn])->getRowArray();
        $user1 = $builder->getWhere(['email' => $email, 'nama' => $nama])->getRowArray();

        if ($user || $user1) {
            $nama = $this->request->getVar('nama');
            $ruangan = $this->request->getVar('namalab');
            $catatan = $this->request->getVar('catatan');
            $kode = $this->request->getVar('kodelab');
            $mesege = "Nama :$nama, Ruangan: $ruangan, Kode : $kode Catatan: $catatan";
            $this->sendmesseage($mesege);
            $this->complain->save([
                'nama_dosen' => $this->request->getVar('nama'),
                'nidn_nim' => $this->request->getVar('nidn'),
                'nama_lab' => $this->request->getVar('namalab'),
                'catatan' => $this->request->getVar('catatan'),
                'kode' => $this->request->getVar('kodelab'),
                'status' => 1,
                'date' => $this->request->getVar('date')
            ]);
            session()->setFlashdata('ok', ' data complain berhasil di rekam');
            return redirect()->to('/e_complain');
        } else {
            session()->setFlashdata('pesan', ' Nidn / Email  '  . $nidn . ' dan nama anda tidak Cocok');
            return redirect()->to('/e_complain');
        }
    }
    public function sendmesseage($textmsg)
    {
        $url = "https://api.telegram.org/bot1349295252:AAENu6ySZPuHOWwbCGWR8yOrO1AKD8MeqSg/sendMessage?chat_id=-1001354224422&text=$textmsg";
        $url = $url . "&text=" . urlencode($textmsg);
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        session()->setFlashdata('ok', 'berhasil di kirim');
        return redirect()->to('/e_complain');
    }
    public function visited($textmsg)
    {
        $url = "https://api.telegram.org/bot1349295252:AAENu6ySZPuHOWwbCGWR8yOrO1AKD8MeqSg/sendMessage?chat_id=-1001354224422&text=$textmsg";
        $url = $url . "&text=" . urlencode($textmsg);
        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        return redirect()->to('/login_user');
    }
    public function sendemail($to)
    {
        $pesan = 'L4BFT';
        $email = \Config\Services::email();
        $email->setFrom('munifabdul606@gmail.com', 'LAB FAKULTAS TEKNIK');
        $email->setTo($to);
        $email->setSubject('Verivikasi E-complain By LAB Fakultas Teknik UNUJA');
        $email->setMessage('Demi menjaga kemanan complain masukan kode verivikasi <strong>' . $pesan . '</strong> untuk melanjutkan complain');
        $email->send();
        if ($email) {
            return true;
        } else {
            return false;
        }
    }

    public function auth()
    {

        if (session()->get('auth') !== 'auth') {
            return redirect()->to('/login_user');
        }
        $data = [
            'title' => 'Authentikasi',
        ];
        return view('user/auth', $data);
    }
    public function redirectto()
    {
        $nama = $this->request->getVar('nama');
        $nim = $this->request->getVar('nidn');
        $prodi = $this->request->getVar('prodi');
        $ruangan = $this->request->getVar('namalab');
        $catatan = $this->request->getVar('catatan');
        $kode = $this->request->getVar('kodelab');
        $mesege = "Nama :$nama, nim : $nim Ruangan: $ruangan, Kode : $kode Catatan: $catatan";
        $this->sendmesseage($mesege);
        $this->complain->save([
            'nama_dosen' => $this->request->getVar('nama'),
            'nidn_nim' => $this->request->getVar('nidn'),
            'nama_lab' => $this->request->getVar('namalab'),
            'prodi' => $this->request->getVar('prodi'),
            'catatan' => $this->request->getVar('catatan'),
            'kode' => $this->request->getVar('kodelab'),
            'date' => $this->request->getVar('date'),
            'status' => '1'
        ]);
        session()->setFlashdata('ok', '  Complain anda berhasil di rekam');
        return redirect()->to('/e_complain_mahasiswa');
        // $db = \Config\Database::connect();
        // $builder = $db->table('tb_dosen');
        // $data = $builder->getWhere(['email' => $email])->getRowArray();
        // if ($data) {
        //     // set session
        //     session()->set('auth', 'auth');
        //     session()->set('email', $email);
        //     session()->set('nama', $nama);
        //     session()->set('nidn', $nidn);
        //     session()->set('namalab', $ruangan);
        //     session()->set('catatan', $catatan);
        //     session()->set('kode', $kode);
        //     // sendemail
        //     $this->sendemail($email);
        //     return redirect()->to('/auth');
        // } else {
        // session()->setFlashdata('pesan', ' email anda belum terdaftar');
        // return redirect()->to('/e_complain_dosen');
        // }
    }
    public function autentikasi()
    {
        $kode = 'L4BFT';
        if ($this->request->getVar('kode') == $kode) {
            $nama    = session()->get('nama');
            $ruangan = session()->get('namalab');
            $catatan = session()->get('catatan');
            $kode    = session()->get('kode');
            $this->complain->save([
                'nama_dosen' => session()->get('nama'),
                'nama_lab' => session()->get('namalab'),
                'catatan' => session()->get('catatan'),
                'kode' => session()->get('kode'),
                'status' => 1
            ]);
            $mesege = "Nama :$nama, Ruangan: $ruangan, kode: $kode  Catatan: $catatan";
            $this->sendmesseage($mesege);
            session()->setFlashdata('com', ' Complain berhasil di rekam');
            return redirect()->to('/login_user');
        } else {
            session()->setFlashdata('pesan', ' KODE TIDAK SESUAI');
            return redirect()->to('/auth');
        }
    }
    public function e_complain_mahasiswa()
    {
        $data = [
            'kode' => $this->kode->getkode(),
            'aslab' => $this->aslab->getaslab(),
            'lab' => $this->lab->getlab()
        ];
        return view('/user/ecomplain1', $data);
    }
    public function profile()
    {
        if (session()->get('level') !== 'user') {
            return redirect()->to('/login_user');
        }
        $username = session()->get('id_user');
        $data = [
            'title' => 'profil',
            'user' => $this->user->getuser($username),
            'instansi' => $this->instansi->getinstansi(),
        ];
        return view('user/profile', $data);
    }
    public function edituser($id)
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'pilih gambar terlbih dahulu',
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda masukan bukan gambar',
                    'mime_in' => 'yang anda masukan bukan gambar',
                ]
            ]
        ])) {
            $foto = $this->request->getFile('gambar');
            if ($foto->getError() == 4) {
                $namafoto = $this->request->getVar('gambarlama');
            } else {
                $namafoto = $foto->getRandomName();
                $foto->move('asset/file', $namafoto);
            }
            $this->user->save([
                'id_user' => $id,
                'id_instansi' => $this->request->getVar('instansi'),
                'jenis_kelamin' => $this->request->getVar('jk'),
                'username' => $this->request->getVar('username'),
                'nama' => $this->request->getVar('nama'),
                'foto' => $namafoto,
                'level' => 'user'
            ]);
            session()->setFlashdata('pesan', 'data berhasil di ubah');
            return redirect()->to('/profile');
        } else {
            $username = session()->get('id_user');
            $data = [
                'title' => 'profil',
                'user' => $this->user->getuser($username),
                'instansi' => $this->instansi->getinstansi(),
                'validation' => \Config\Services::validation(),
            ];
            return view('user/profile', $data);
        }
    }
    public function gantipassword()
    {
        if (session()->get('level') !== 'user') {
            return redirect()->to('/login_user');
        }
        $data = [
            'title' => 'ganti password'

        ];
        return view('user/gantipassword', $data);
    }

    public function gantipsw()
    {
        if ($this->request->getMethod() == 'post' && $this->validate([
            'passwordbaru' => [
                'rules' => 'matches[konfirmasi]',
                'errors' => [
                    'matches' => 'konfirmasi password tidak sama'
                ]
            ],
            'konfirmasi' => [
                'rules' => 'matches[passwordbaru]',
                'errors' => [
                    'matches' => 'konfirmasi password tidak sama'
                ]
            ]
        ])) {
            $db = \Config\Database::connect();
            $builder = $db->table('tb_user');
            $data = $builder->getWhere(['username' => session()->get('username')])->getRowArray();
            $passwordbaru = $this->request->getVar('passwordbaru');
            $passwordlama = $this->request->getVar('passwordlama');
            $passwordhash = password_hash($passwordbaru, PASSWORD_DEFAULT);

            if (!password_verify($passwordlama, $data['password'])) {
                session()->setFlashdata('pesan', 'paswordlama tidak sesuai');
                return redirect()->to('/gantipassword');
            } else {
                $data = [
                    'password' => $passwordhash
                ];
                $username = session()->get('username');
                $builder->where('username', $username);
                $builder->update($data);
                session()->setFlashdata('berhasil', 'pasword berhasil di ganti');
                return redirect()->to('/gantipassword');
            }
        } else {
            $valid = [
                'title' => 'ganti password',
                'validation' => \Config\Services::validation()
            ];
            return view('user/gantipassword', $valid);
        }
    }

    public function lab()
    {
        if (session()->get('level') !== 'user') {
            return redirect()->to('/login_user');
        }
        $user = session()->get('id_user');
        $data = [
            'title' => 'laboratorium',
            'lab' => $this->lab->getlab(),
            'peminjaman' => $this->peminjamanlab->getpinjamlab($user)
        ];
        return view('user/lab', $data);
    }
    public function pinjamlab()
    {
        $waktu = $this->request->getVar('waktu');
        $this->peminjamanlab->save([
            'id_lab' => $this->request->getVar('lab'),
            'id_user' => $this->request->getVar('id_user'),
            'id_instansi' => $this->request->getVar('id_instansi'),
            'tgl_minjam' => $this->request->getVar('tgl_minjam'),
            'catatan' => $this->request->getVar('catatan'),
            'status' => 1,
            'waktu' => $waktu . ' - ' . $waktu,
            'kebutuhan' => $this->request->getVar('kebutuhan'),
        ]);
        session()->setFlashdata('pesan', 'berhasil, tunggu validasi dari kepala laboratorium');
        return redirect()->to('/lab');
    }
    public function proses()
    {
        $this->proses->save([
            'id_stok_akhir' => $this->request->getVar('barang'),
            'notif' => 'proseslab',
            'status' => 1
        ]);
        $mesege = 'seseorang meminta untuk memproses peminjaman barang.';
        $this->sendmesseage($mesege);
        session()->setFlashdata('pesan', 'permintaan anda sedang di proses');
        return redirect()->to('/databarang');
    }

    public function mhs()
    {
        $nim = $this->request->getGet('nim');
        $result = $this->mhs->getmhs($nim);
        foreach ($result as $mhs) {
            $data = [
                'nim' => $mhs['nim_mhs'],
                'nama' => $mhs['nama_mhs']
            ];
            echo json_encode($data);
        }
    }
    public function getlab()
    {
        $lab = $this->request->getVar('id_lab');
        $kebutuhan = $this->request->getVar('kebutuhan');
        $kelas = $this->request->getVar('kelas');
        $waktu = $this->request->getVar('waktu');
        $catatan = $this->request->getVar('catatan');
        session()->set('id_lab', $lab);
        session()->set('kebutuhan', $kebutuhan);
        session()->set('kelas', $kelas);
        session()->set('waktu', $waktu);
        session()->set('catatan', $catatan);
        session()->setFlashdata('pesan', 'anda harus login terlebih dahulu, untuk melakukan proses peminjaman');
        session()->set('getlab', true);
        return redirect()->to('login_user');
    }
}
