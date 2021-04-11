<?php

namespace App\Controllers;

use App\Models\Modelaslab;
use App\Models\ModelBarang;
use App\Models\ModelBaranglab;
use App\Models\ModelComplain;
use App\Models\ModelDosen;
use App\Models\ModelInstansi;
use App\Models\ModelKategori;
use App\Models\ModelKode;
use App\Models\ModelLab;
use App\Models\Modelminjam;
use App\Models\ModelNotifikasi;
use App\Models\ModelPeminjaman;
use App\Models\ModelPeminjamanlab;
use App\Models\ModelPengeluaran;
use App\Models\ModelProfil;
use App\Models\ModelProses;
use App\Models\ModelStokakhir;
use App\Models\MOdelRegistrasi;
use App\Models\ModelUser;
use CodeIgniter\HTTP\Request;
use CodeIgniter\I18n\Time;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class Home extends BaseController
{
	protected $ModelKategori;
	protected $ModelBarang;
	protected $stokakhir;
	protected $peminjaman;
	protected $registrasi;
	protected $user;
	protected $pengeluaran;
	protected $instansi;
	protected $laporanpeminjaman;
	protected $waktu;
	protected $lab;
	protected $baranglab;
	protected $complain;
	protected $dosen;
	protected $profil;
	protected $kodelab;
	protected $proses;
	protected $peminjamanlab;
	protected $notifikasi;
	protected $aslab;
	public function __construct()
	{

		$this->ModelKategori = new ModelKategori();
		$this->ModelBarang = new ModelBarang();
		$this->stokakhir = new ModelStokakhir();
		$this->peminjaman = new Modelminjam();
		$this->registrasi = new MOdelRegistrasi();
		$this->user = new ModelUser();
		$this->pengeluaran = new ModelPengeluaran();
		$this->instansi = new ModelInstansi();
		$this->laporanpeminjaman = new ModelPeminjaman();
		$this->lab = new ModelLab();
		$this->baranglab = new ModelBaranglab();
		$this->complain = new ModelComplain();
		$this->dosen = new ModelDosen();
		$this->profil = new ModelProfil();
		$this->aslab = new Modelaslab();
		$this->kodelab = new ModelKode();
		$this->proses = new ModelProses();
		$this->peminjamanlab =  new ModelPeminjamanlab();
		$this->waktu = new Time('now', 'Asia/jakarta');
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
	}
	public function index()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$data = [
			'title' => 'Dhasboard',
			'jumlahbarang' => $this->ModelBarang->jumlahbarang(),
			'jumlahuser' => $this->user->jumlahuser(),
			'barangbaik' => $this->ModelBarang->barangbaik(),
			'barangrusak' => $this->ModelBarang->barangrusak(),
			'validation' => \Config\Services::validation(),
			'complainon' => $this->complain->complainon(),
			'complainoff' => $this->complain->complainoff(),
			'complainall' => $this->complain->complainall(),
			'barangpinjam' => $this->laporanpeminjaman->barangpinjam(),
			'barangbelum' => $this->laporanpeminjaman->barangbelum(),
			'proses' => $this->proses->allproses(),
			'pinjamlab' => $this->peminjamanlab->getpinjam(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()

		];
		return view('pages/index', $data);
	}

	public function barang()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$data = [
			'title' => 'Data Barang',
			'barang' => $this->ModelBarang->getbarang(),
			'kategori' => $this->ModelKategori->getkategori(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/databarang', $data);
	}
	public function stok_akhir()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$data = [
			'title' => 'Data Stok Akhir',
			'stokakhir' => $this->stokakhir->getstokakhir(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif(),
			'instansi' => $this->instansi->getinstansi()
		];
		return view('pages/stok_akhir', $data);
	}

	public function peminjaman()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$data = [
			'title' => 'peminjaman',
			'barang' => $this->stokakhir->getstokakhir(),
			'peminjaman' => $this->laporanpeminjaman->laporanpeminjaman(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/peminjaman', $data);
	}
	public function pengeluaran()
	{
		if (!session()->has('username')) {
			return redirect()->to('/login_user');
		}
		$data = [
			'title' => 'pengeluaran',
			'barang' => $this->ModelBarang->getbarang(),
			'kategori' => $this->ModelKategori->getkategori(),
			'pengeluaran' => $this->pengeluaran->getpengeluaran(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/pengeluaran', $data);
	}
	public function kategori()
	{

		if (!session()->has('username')) {
			return redirect()->to('/login_user');
		}
		$data = [
			'title' => 'kategori',
			'kategori' => $this->ModelKategori->getkategori(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/kategori', $data);
	}

	public function tambahkategori()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		if (!session()->has('username')) {
			return redirect()->to('/login_user');
		}
		$this->ModelKategori->save([
			'kategori' => $this->request->getVar('kategori')
		]);
		session()->setFlashdata('pesan', ' data berhasi di tambahkan');
		return redirect()->to('/kategori');
	}

	public function delkategori($id)
	{
		$this->ModelKategori->delete($id);
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return redirect()->to('/kategori');
	}
	public function editkategori($id)
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$this->ModelKategori->save([
			'id_kategori' => $id,
			'kategori' => $this->request->getVar('kategori')
		]);
		session()->setFlashdata('pesan', 'data berhasil di Edit');
		return redirect()->to('/kategori');
	}

	public function tambahbarang()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$data = [
			'title' => 'Data Barang',
			'barang' => $this->ModelBarang->getbarang(),
			'kategori' => $this->ModelKategori->getkategori(),
			'validation' => \Config\Services::validation(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		if ($this->request->getMethod() === 'post' && $this->validate([
			'nama_barang' => [
				'rules' => 'is_unique[tb_barang.nama_barang]',
				'errors' => [
					'is_unique' => 'Nama Barang Sudah ada'
				]
			],
			'gambar' => [
				'rules' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/png,image/jpeg]',
				'errors' => [
					'uploaded' => 'pilih gambar terlbih dahulu',
					'max_size' => 'ukuran gambar terlalu besar',
					'is_image' => 'yang anda masukan bukan gambar',
					'mime_in' => 'yang anda masukan bukan gambar',
				]
			]
		])) {
			$filegambar = $this->request->getFile('gambar');
			$namagambar = $filegambar->getRandomName();
			$filegambar->move('asset/file', $namagambar);
			$this->ModelBarang->save([
				'id_kategori' => $this->request->getVar('kategori'),
				'nama_barang' => $this->request->getVar('nama_barang'),
				'merek_barang' => $this->request->getVar('merek_barang'),
				'jumlah' => $this->request->getVar('jumlah'),
				'kondisi' => $this->request->getVar('kondisi'),
				'posisi' => $this->request->getVar('posisi'),
				'date' => $this->request->getVar('tgl'),
				'foto' => $namagambar,
				'keterangan' => $this->request->getVar('keterangan')
			]);
			$data = [
				'id_kategori' => $this->request->getVar('kategori'),
				'nama_barang' => $this->request->getVar('nama_barang'),
				'merek_barang' => $this->request->getVar('mer=ek_barang'),
				'jumlah' => $this->request->getVar('jumlah'),
				'kondisi' => $this->request->getVar('kondisi'),
				'posisi' => $this->request->getVar('posisi'),
				'foto' => $namagambar,
				'aktif' => 1
			];
			$this->stokakhir->insert($data);

			session()->setFlashdata('pesan', 'data berhasil di tambahkan');
			return redirect()->to('/barang');
		} else {
			return view('pages/databarang', $data);
		}
	}
	public function editbarang($id)
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}

		$data = [
			'title' => 'Data Barang',
			'barang' => $this->ModelBarang->getbarang(),
			'kategori' => $this->ModelKategori->getkategori(),
			'validation' => \Config\Services::validation(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		if ($this->request->getMethod() === 'post' && $this->validate([
			'gambar' => [
				'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/png,image/jpeg]',
				'errors' => [
					'max_size' => 'ukuran gambar terlalu besar',
					'is_image' => 'yang anda masukan bukan gambar',
					'mime_in' => 'yang anda masukan bukan gambar',
				]
			]
		])) {
			$filegambar = $this->request->getFile('gambar');

			if ($filegambar->getError() == 4) {
				$namagambar = $this->request->getVar('gambarlama');
			} else {
				$namagambar = $filegambar->getRandomName();
				$filegambar->move('asset/file', $namagambar);
			}

			$this->ModelBarang->save([
				'id_barang' => $id,
				'id_kategori' => $this->request->getVar('kategori'),
				'nama_barang' => $this->request->getVar('nama_barang'),
				'merek_barang' => $this->request->getVar('merek_barang'),
				'jumlah' => $this->request->getVar('jumlah'),
				'kondisi' => $this->request->getVar('kondisi'),
				'posisi' => $this->request->getVar('posisi'),
				'foto' => $namagambar,
				'date' => $this->request->getVar('tgl'),
				'keterangan' => $this->request->getVar('keterangan')
			]);

			$data = [
				'nama_barang' => $this->request->getVar('nama_barang'),
				'merek_barang' => $this->request->getVar('merek_barang')
			];
			$this->stokakhir->update($id, $data);
			session()->setFlashdata('pesan', 'data berhasil di edit');
			return redirect()->to('/barang');
		} else {
			return view('pages/databarang', $data);
		}
	}

	public function delbarang($id)
	{
		$this->ModelBarang->delete($id);
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return redirect()->to('/barang');
	}
	public function barangkembali($id)
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$db = \Config\Database::connect();
		$jml = $db->query("SELECT * FROM tb_stok_akhir WHERE id_stok_akhir = '$id' ");
		$row = $jml->getRowArray();
		$j1 = $row['jumlah'];
		$j2 = $this->request->getVar('jumlah');
		$barang = $j1 + $j2;
		$data = [
			'jumlah' => $barang
		];
		$this->stokakhir->update($id, $data);
		session()->setFlashdata('pesan', 'status sudah di kembalikan');
		return redirect()->to('/home/peminjaman');
	}
	public function konfirkembali($id)
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$db = \Config\Database::connect();
		$jml = $db->query("SELECT * FROM tb_peminjaman WHERE id_peminjaman = '$id' ");
		$row = $jml->getRowArray();
		$j1 = $row['jumlah_minjam'];
		$j2 = $this->request->getVar('jumlah');

		$data = [
			'status' => '2',
		];
		$this->peminjaman->update($id, $data);
		session()->setFlashdata('pesan', 'konfirmasi pengembalian berhasil');
		return redirect()->to('/home/peminjaman');
	}
	public function konfirminjam($id)
	{
		$data = [
			'konfir' => '2'
		];
		$this->peminjaman->update($id, $data);
		session()->setFlashdata('pesan', 'konfirmasi peminjaman berhasil');
		return redirect()->to('/home/peminjaman');
	}
	public function tambahpeminjaman($id)
	{
		$db = \Config\Database::connect();
		$jml = $db->query("SELECT * FROM tb_stok_akhir WHERE id_stok_akhir = '$id' ");
		$row = $jml->getRowArray();
		$jbarang = $row['jumlah'];
		$barang = $this->request->getVar('jumlah');
		$jmlbarang = $jbarang - $barang;
		$this->stokakhir->save([
			'id_stok_akhir' => $id,
			'jumlah' => $jmlbarang
		]);
		$data = [
			'nama' => $this->request->getVar('nama'),
			'id_instansi' => $this->request->getVar('id_instansi'),
			'id_stok_akhir' => $this->request->getVar('id'),
			'jumlah_minjam' => $this->request->getVar('jumlah'),
			'no_hp' => $this->request->getVar('no_hp'),
			'waktu_janji_pinjam' => $this->request->getVar('waktu_janji_pinjam'),
			'waktu_janji_kembali' => $this->request->getVar('waktu_janji_kembali'),
			'kondisi' => $this->request->getVar('kondisi'),
			'status' => '1',
			'konfir' => '1'
		];
		$this->peminjaman->insert($data);
		session()->setFlashdata('pesan', 'peminjaman berhasil');
		return redirect()->to('/home/peminjaman');
	}

	public function adminlab2020()
	{
		return view('pages/login');
	}
	public function registrasi()
	{
		session();
		$data = [
			'validation' => \Config\Services::validation(),
			'instansi' => $this->instansi->getinstansi()
		];
		return view('pages/register', $data);
	}
	public function daftar()
	{
		if ($this->request->getMethod() === 'post' && $this->validate([
			'username' => [
				'rules' => 'is_unique[tb_user.username]|min_length[5]',
				'errors' => [
					'is_unique' => 'username / email sudah terdaftar',
					'min_length' => 'username harus 5 karakter / lebih'
				]
			],
			'password' => [
				'rules' => 'matches[password2]|min_length[5]',
				'errors' => [
					'matches' => 'konfirmasi password tidak sama',
					'min_length' => 'passowrd harus lebih 5 karakter'
				]
			],
			'password2' => [
				'rules' => 'matches[password]',
				'errors' => [
					'matches' => 'konfirmasi password tidak sama'
				]
			]
		])) {
			$data = [
				'username' => htmlspecialchars($this->request->getVar('username')),
				'nama' => htmlspecialchars($this->request->getVar('nama')),
				'id_instansi' => htmlspecialchars($this->request->getVar('instansi')),
				'jenis_kelamin' => htmlspecialchars($this->request->getVar('jenis_kelamin')),
				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
				'foto' => 'avatar.png',
				'level' => 'user'
			];
			$this->registrasi->save($data);
			session()->setFlashdata('login', 'pendaftaran berhasil silahkan login..!!');
			return redirect()->to('/login_user');
		} else {
			return redirect()->to('/registrasi')->withInput();
		}
	}
	public function loginproses()
	{
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$db      = \Config\Database::connect();
		$builder = $db->table('tb_user');
		$user = $builder->getWhere(['username' => $username])->getRowArray();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				session()->set('username', $user['username']);
				session()->set('nama', $user['nama']);
				session()->set('foto', $user['foto']);
				session()->set('level', $user['level']);
				$this->sendfalse('sesesorang telah login ke aplikasi anda sebagai admin');
				return redirect()->to('/home');
			} else {
				$this->sendfalse("sesesorang yang tak di kenal mencoba login ke halaman admin dengan username $username ");
				session()->setFlashdata('pesan', 'password salah');
				return redirect()->to('/adminlab2020');
			}
		} else {
			$this->sendfalse("sesesorang yang tak di kenal mencoba login ke halaman admin dengan username $username ");
			session()->setFlashdata('pesan', 'username tidak terdaftar');
			return redirect()->to('/adminlab2020');
		}
	}
	public function logout()
	{
		session()->destroy();
		session()->remove('username');
		session()->setFlashdata('keluar', 'anda berhasil logout');
		return redirect()->to('/adminlab2020');
	}

	public function on($id)
	{
		$this->stokakhir->save([
			'id_stok_akhir' => $id,
			'aktif' => 2
		]);
		session()->setFlashdata('pesan', 'sukses');
		return redirect()->to('/home/stok_akhir');
	}
	public function off($id)
	{
		$this->stokakhir->save([
			'id_stok_akhir' => $id,
			'aktif' => 1
		]);
		session()->setFlashdata('pesan', 'sukses');
		return redirect()->to('/home/stok_akhir');
	}

	public function tambahpengeluaran($id)
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$db = \Config\Database::connect();
		$jml = $db->query("SELECT * FROM tb_stok_akhir WHERE id_stok_akhir = '$id' ");
		$row = $jml->getRowArray();
		$jbarang = $row['jumlah'];
		$barang = $this->request->getVar('jumlah');
		$jmlbarang = $jbarang - $barang;
		$this->stokakhir->save([
			'id_stok_akhir' => $id,
			'jumlah' => $jmlbarang
		]);
		$data = [
			'id_stok_akhir' => $this->request->getVar('id'),
			'id_barang' => $this->request->getVar('id_barang'),
			'id_kategori' => $this->request->getVar('id_kategori'),
			'jumlah_pengeluaran' => $this->request->getVar('jumlah'),
			'waktu_pengeluaran' => $this->request->getVar('waktu_pengeluaran'),
			'keterangan_pengeluaran' => $this->request->getVar('keterangan'),
		];
		$this->pengeluaran->insert($data);
		session()->setFlashdata('pesan', 'pengeluaran berhasil');
		return redirect()->to('/home/pengeluaran');
	}

	public function delkeluar($id)
	{
		$this->pengeluaran->delete($id);
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return redirect()->to('/home/pengeluaran');
	}

	public function instansi()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$data = [
			'title' => 'instansi',
			'instansi' => $this->instansi->getinstansi(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/instansi', $data);
	}
	public function tambahinstansi()
	{
		$this->instansi->save([
			'instansi' => $this->request->getVar('instansi')
		]);
		session()->setFlashdata('pesan', 'data berhasil di tambahkan');
		return	redirect()->to('/home/instansi');
	}

	public function editinstansi($id)
	{
		$this->instansi->save([
			'id_instansi' => $id,
			'instansi' => $this->request->getVar('instansi')
		]);
		session()->setFlashdata('pesan', 'data berhasil di edit');
		return	redirect()->to('/home/instansi');
	}

	public function delinstansi($id)
	{
		$this->instansi->delete($id);
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return	redirect()->to('/home/instansi');
	}
	public function sendsms()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$data = [
			'phone' => '15034365851', // Telepon penerima
			'body' => 'Hello, world!', // Pesan
		];
		$json = json_encode($data); // Enkode data ke JSON
		// URL for request POST /message
		$url = 'https://foo.chat-api.com/message?token=83763g87x';
		// Buat permintaan POST
		$options = stream_context_create(['http' => [
			'method'  => 'POST',
			'header'  => 'Content-type: application/json',
			'content' => $json
		]]);
		// Kirim permintaan
		return $result = file_get_contents($url, false, $options);
	}

	public function laporan_barang()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$tanggal = $this->request->getVar('tanggal');
		if ($tanggal) {
			$barang = $this->ModelBarang->caribarang($tanggal);
		} else {
			$barang = $this->ModelBarang->getbarang();
		}

		$data = [
			'barang' => $barang,
			'title' => 'data barang',
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/laporanbarang', $data);
	}


	public function laporan_peminjaman()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$data = [
			'title' => 'Data peminjaman',
			'peminjaman' => $this->laporanpeminjaman->laporanpeminjaman(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/laporanpeminjaman', $data);
	}

	public function laporan_pengeluaran()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}

		$data = [
			'title' => 'pengeluaran',
			'pengeluaran' => $this->pengeluaran->getpengeluaran(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/laporanpengeluaran', $data);
	}

	public function laboratorium()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$data = [
			'title' => 'laboratorium',
			'lab' => $this->lab->getlab(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif(),
			'aslab' => $this->aslab->getaslab()
		];
		return view('pages/laboratorium', $data);
	}
	public function tambahlab()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$filegambar = $this->request->getFile('gambar');
		$namagambar = $filegambar->getRandomName();
		$filegambar->move('asset/file', $namagambar);
		$sluglab = url_title($this->request->getVar('lab'));
		$this->lab->save([
			'slug_lab' => $sluglab,
			'nama_lab' => $this->request->getVar('lab'),
			'st' => 0,
			'id_aslab' => $this->request->getVar('aslab'),
			'foto' => $namagambar
		]);
		session()->setFlashdata('pesan', 'data berhasil di tambahkan');
		return redirect()->to('/laboratorium');
	}
	public function datalab($slug_lab)
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$data = [
			'title' => 'Barang Lab',
			'baranglab' => $this->baranglab->getbaranglab($slug_lab),
			'kategori' => $this->ModelKategori->getkategori(),
			'lab' => $this->lab->getlab(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/databaranglab', $data);
	}

	public function tambahbaranglab()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$validation = \Config\Services::validation();
		$data = [
			'title' => 'data lab',
			'validation' => $validation,
			'baranglab' => $this->baranglab->viewdata(),
			'lab' => $this->lab->getlab(),
			'kategori' => $this->ModelKategori->getkategori(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		if ($this->request->getMethod() === 'post' && $this->validate([
			'gambar' => [
				'rules' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/png,image/jpeg]',
				'errors' => [
					'uploaded' => 'pilih gambar terlbih dahulu',
					'max_size' => 'ukuran gambar terlalu besar',
					'is_image' => 'yang anda masukan bukan gambar',
					'mime_in' => 'yang anda masukan bukan gambar',
				]
			]
		])) {
			$filegambar = $this->request->getFile('gambar');
			$namagambar = $filegambar->getRandomName();
			$filegambar->move('asset/file', $namagambar);
			$this->baranglab->save([
				'id_kategori' => $this->request->getVar('kategori'),
				'id_lab' => $this->request->getVar('lab'),
				'nama_barang' => $this->request->getVar('nama_barang'),
				'jumlah' => $this->request->getVar('jumlah'),
				'status' => $this->request->getVar('kondisi'),
				'gambar' => $namagambar,
				'keterangan' => $this->request->getVar('keterangan')
			]);
			session()->setFlashdata('pesan', 'data berhasil di tambahkan');
			return redirect()->to('/home/laboratorium');
		} else {
			return view('pages/databaranglab', $data);
		}
	}

	public function delbaranglab($id)
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		$this->baranglab->delete($id);
		return redirect()->to('/laboratorium');
	}

	public function editbaranglab($id)
	{
		$validation = \Config\Services::validation();
		$data = [
			'title' => 'data lab',
			'validation' => $validation,
			'baranglab' => $this->baranglab->viewdata(),
			'lab' => $this->lab->getlab(),
			'kategori' => $this->ModelKategori->getkategori(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
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
			$filegambar = $this->request->getFile('gambar');
			if ($filegambar->getError() == 4) {
				$namagambar = $this->request->getVar('gambarlama');
			} else {
				$namagambar = $filegambar->getRandomName();
				$filegambar->move('asset/file', $namagambar);
			}
			$this->baranglab->save([
				'id_baranglab' => $id,
				'id_kategori' => $this->request->getVar('kategori'),
				'id_lab' => $this->request->getVar('lab'),
				'nama_barang' => $this->request->getVar('nama_barang'),
				'merek_barang' => $this->request->getVar('merek_barang'),
				'jumlah' => $this->request->getVar('jumlah'),
				'status' => $this->request->getVar('kondisi'),
				'gambar' => $namagambar,
				'keterangan' => $this->request->getVar('keterangan')
			]);
			session()->setFlashdata('pesan', 'data berhasil di edit');
			return redirect()->to('/home/laboratorium');
		} else {
			return view('pages/databaranglab', $data);
		}
	}

	public function baranglabkeluar($id)
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$db = \Config\Database::connect();
		$jml = $db->query("SELECT * FROM tb_baranglab WHERE id_baranglab = '$id' ");
		$row = $jml->getRowArray();
		$j1 = $row['jumlah'];
		$j2 = $this->request->getVar('jumlah');
		$barang = $j1 - $j2;
		$data = [
			'jumlah' => $barang
		];
		$this->baranglab->update($id, $data);
		$filegambar = $this->request->getFile('gambar');
		$namagambar = $filegambar->getRandomName();
		$filegambar->move('/asset/file', $namagambar);
		$this->ModelBarang->save([
			'id_kategori' => $this->request->getVar('kategori'),
			'nama_barang' => $this->request->getVar('nama_barang'),
			'merek_barang' => $this->request->getVar('merek_barang'),
			'jumlah' => $this->request->getVar('jumlah'),
			'kondisi' => $this->request->getVar('kondisi'),
			'posisi' => '',
			'foto' => $namagambar,
			'date' => $this->request->getVar('tgl'),
			'keterangan' => $this->request->getVar('keterangan')
		]);
		$this->stokakhir->save([
			'id_kategori' => $this->request->getVar('kategori'),
			'nama_barang' => $this->request->getVar('nama_barang'),
			'merek_barang' => $this->request->getVar('merek_barang'),
			'jumlah' => $this->request->getVar('jumlah'),
			'kondisi' => $this->request->getVar('kondisi'),
			'posisi' => $this->request->getVar('posisi'),
			'foto' => $namagambar,
			'aktif' => '1'
		]);
		session()->setFlashdata('pesan', 'berhasil,silahkan lakukan updatae posisi tempat barang yg di keluarkan');
		return redirect()->to('/barang');
	}
	public function ecomplain()
	{
		if (session()->get('level') !== 'admin') {
			return redirect()->to('/login_user');
		}
		$data = [
			'title' => 'e-complain',
			'com' => $this->complain->getcomplain(),
			'lab' => $this->lab->getlab(),
			'as' => $this->aslab->getaslab(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/complain', $data);
	}

	public function aksi($id)
	{
		$filegambar = $this->request->getFile('gambar');
		$namagambar = $filegambar->getRandomName();
		$filegambar->move('asset/fotoperbaikan', $namagambar);
		$munif = $this->request->getVar('munif');
		$avin = $this->request->getVar('avin');
		$juned = $this->request->getVar('juned');
		$dj = $this->request->getVar('dj');
		$lukman = $this->request->getVar('lm');
		$helman = $this->request->getVar('hl');
		$dosen = $this->request->getVar('nama_dosen');
		$ruangan = $this->request->getVar('ruangan');
		$mesage = "Complain dosen $dosen sudah di perbaiki di Ruangan $ruangan oleh $munif $avin $dj ";

		$this->sendmesseage($mesage);

		$this->complain->save([
			'id_complain' => $id,
			'status' => '2',
			'nama_aslab' => $munif . ' ' . $avin . ' ' . $juned . ' ' . $dj . ' ' . $lukman . ' ' . $helman,
			'foto' => $namagambar
		]);
		session()->setFlashdata('pesan', 'Complain berhasil di konfirmasi');
		return redirect()->to('/ecomplain');
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
		session()->setFlashdata('pesan', 'berhasil di kirim');
		return redirect()->to('/e_complain');
	}
	public function sendfalse($textmsg)
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
		return false;
	}

	public function dosen()
	{
		$data = [
			'title' => 'Dosen',
			'dosen' => $this->dosen->getdosen(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/dosen', $data);
	}

	public function tambahdosen()
	{
		$this->dosen->save([
			'nidn' => $this->request->getVar('nidn'),
			'email' => $this->request->getVar('email'),
			'nama' => $this->request->getVar('dosen')
		]);
		session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
		return redirect()->to('/dosen');
	}

	public function deldosen($id)
	{
		$this->dosen->delete($id);
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return redirect()->to('/dosen');
	}

	public function editdosen($id)
	{
		$this->dosen->save([
			'id_dosen' => $id,
			'nidn' => $this->request->getVar('nidn'),
			'nama' => $this->request->getVar('nama')
		]);
		session()->setFlashdata('pesan', 'data berhasil di Edit');
		return redirect()->to('/dosen');
	}

	public function profil()
	{
		$username  = session()->get('username');
		$level  = session()->get('level');
		$data = [
			'title' => 'Profil',
			'profil' => $this->profil->getprofil($username),
			'admin' => $this->profil->getadmin($level),
			'user' => $this->user->getregister(),
			'prof' => $this->user->paginate(6),
			'pager' => $this->user->pager,
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];

		return view('pages/profil', $data);
	}
	public function editprofil()
	{
		$filegambar = $this->request->getFile('gambar');
		if ($filegambar->getError() == 4) {
			$namagambar = $this->request->getVar('gambar_lama');
		} else {
			$namagambar = $filegambar->getRandomName();
			$filegambar->move('asset/file', $namagambar);
		}
		$this->profil->save([
			'id_user' => $this->request->getVar('id_user'),
			'username' => $this->request->getVar('username'),
			'nama' => $this->request->getVar('nama'),
			'foto' => $namagambar
		]);
		session()->setFlashdata('pesan', 'profil berhasil di updtae');
		return redirect()->to('/profil');
	}

	public function sendemail()
	{
		$email = \Config\Services::email();
		$email->setForm('munifabdul603@gmail.com', 'LAB FAKULTAS TEKNIK');
		$email->setTo();
		$email->setSubject('Email Test');
		$email->setMessage('Testing the email class.');
		$email->send();

		if ($email) {
			return true;
		} else {
			return false;
		}
	}
	public function delcomplain($id)
	{
		$this->complain->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil di hapus');
		return redirect()->to('/ecomplain');
	}
	public function gantipassword()
	{
		if ($this->request->getMethod() === 'post' &&  $this->validate([
			'paswordbaru' => [
				'rules' => 'matches[konfirmasi]',
				'errors' => [
					'matches' => 'konfirmasi pasword tidak sama'
				]
			],
			'konfirmasi' => [
				'rules' => 'matches[paswordbaru]',
				'errors' => [
					'matches' => 'konfirmasi password tidak sama'
				]
			]
		])) {
			$db = \Config\Database::connect();
			$builder = $db->table('tb_user');
			$data = $builder->getWhere(['username' => session()->get('username')])->getRowArray();
			$paswordlama = $this->request->getVar('paswordlama');
			$paswordbaru = $this->request->getVar('paswordbaru');
			$passwordhash = password_hash($paswordbaru, PASSWORD_DEFAULT);
			$konfirmasipasword = $this->request->getVar('konfirmasipasword');
			if (!password_verify($paswordlama, $data['password'])) {
				session()->setFlashdata('pesan', 'pasowrd lama tidak sesuai');
				return redirect()->to('/home');
			} else {
				$data = [
					'password' => $passwordhash
				];
				$username = session()->get('username');
				$builder->where('username', $username);
				$builder->update($data);
				session()->setFlashdata('berhasil', 'pasword berhasil di ganti');
				return redirect()->to('/home');
			}
		} else {
			$data = [
				'title' => 'Dhasboard',
				'jumlahbarang' => $this->ModelBarang->jumlahbarang(),
				'jumlahuser' => $this->user->jumlahuser(),
				'barangbaik' => $this->ModelBarang->barangbaik(),
				'barangrusak' => $this->ModelBarang->barangrusak(),
				'validation' => \Config\Services::validation(),
				'complainon' => $this->complain->complainon(),
				'complainoff' => $this->complain->complainoff(),
				'complainall' => $this->complain->complainall(),
				'barangpinjam' => $this->laporanpeminjaman->barangpinjam(),
				'barangbelum' => $this->laporanpeminjaman->barangbelum(),
				'proses' => $this->proses->allproses(),
				'pinjamlab' => $this->peminjamanlab->getpinjam(),
				'notifproses' => $this->proses->getproses(),
				'notivvew' => $this->proses->allproses(),
				'notiflab' => $this->peminjamanlab->countpinjam(),
				'labnotif' => $this->peminjamanlab->getpinjamnotif()
			];
			return view('pages/index', $data);
		}
	}
	public function editlab($id)
	{
		if ($this->request->getMethod() == 'post' && $this->validate([
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
				$namafoto = $this->request->getFile('gambarlama');
			} else {
				$namafoto = $foto->getRandomName();
				$foto->move('asset/file', $namafoto);
			}
			$sluglab = url_title($this->request->getVar('lab'));

			$this->lab->save([
				'id_lab' => $id,
				'slug_lab' => $sluglab,
				'nama_lab' => $this->request->getVar('lab'),
				'st' => 0,
				'id_aslab' => $this->request->getVar('aslab'),
				'foto' => $namafoto
			]);
			session()->setFlashdata('pesan', 'data berhasil di edit');
			return redirect()->to('/laboratorium');
		} else {
			$data = [
				'title' => 'laboratorium',
				'lab' => $this->lab->getlab(),
				'notifproses' => $this->proses->getproses(),
				'notivvew' => $this->proses->allproses(),
				'notiflab' => $this->peminjamanlab->countpinjam(),
				'labnotif' => $this->peminjamanlab->getpinjamnotif()
			];
			return view('user/laboratorium', $data);
		}
	}
	public function prosespeminjaman()
	{
		$data = [
			'title' => 'proses peminjaman',
			'proses' => $this->proses->getproseson(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/peorsespeminjaman', $data);
	}

	public function proseson($id_stok)
	{
		$this->stokakhir->save([
			'id_stok_akhir' => $id_stok,
			'aktif' => '2'
		]);
		$db      = \Config\Database::connect();
		$builder = $db->table('tb_proses_peminjaman');
		$builder->where('id_stok_akhir', $id_stok);
		$builder->delete();
		session()->setFlashdata('pesan', 'sukses');
		return redirect()->to('/prosespeminjaman');
	}

	public function peminjamanlab()
	{
		$data = [
			'title' => 'piminjaman lab',
			'pinjamlab' => $this->peminjamanlab->getpinjam(),
			'notifproses' => $this->proses->getproses(),
			'notivvew' => $this->proses->allproses(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif(),
			'notiflab' => $this->peminjamanlab->countpinjam(),
			'labnotif' => $this->peminjamanlab->getpinjamnotif()
		];
		return view('pages/peminjamanlab', $data);
	}
	public function validasilab()
	{
		$this->peminjamanlab->save([
			'id_peminjaman_lab' => $this->request->getVar('id_peminjaman'),
			'status' => 2
		]);
		session()->setFlashdata('pesan', 'Berhasil Di Validasi');
		return redirect()->to('/peminjamanlab');
	}


	public function ceklabon($id)
	{
		$this->lab->save([
			'id_lab' => $id,
			'st' => 1
		]);
		return redirect()->to('/laboratorium');
	}
	public function ceklaboff($id)
	{
		$this->lab->save([
			'id_lab' => $id,
			'st' => 0
		]);
		return redirect()->to('/laboratorium');
	}

	public function jadwal_lab()
	{
		$data = [
			'title' => 'Jadwal laboratorium',
			'lab' => $this->lab->labget(),
		];

		return view('/user/jadwal_lab', $data);
	}
}
