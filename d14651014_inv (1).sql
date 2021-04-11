-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2021 pada 03.32
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d14651014_inv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_lab`
--

CREATE TABLE `kode_lab` (
  `id_kode` int(11) NOT NULL,
  `kode_lab` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kode_lab`
--

INSERT INTO `kode_lab` (`id_kode`, `kode_lab`, `created_at`, `updated_at`) VALUES
(1, 'A-1', '2020-12-14 11:11:40', '2020-12-14 11:11:40'),
(2, 'A-2', '2020-12-14 11:11:40', '2020-12-14 11:11:40'),
(3, 'A-3', '2020-12-14 11:12:22', '2020-12-14 11:12:22'),
(4, 'A-4', '2020-12-14 11:12:22', '2020-12-14 11:12:22'),
(5, 'A-5', '2020-12-14 11:12:22', '2020-12-14 11:12:22'),
(6, 'A-6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'A-7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'A-8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'A-9', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'A-10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'A-11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'A-12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'A-13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'A-14', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'A-15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'B-16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'B-17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'B-18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'B-19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'B-20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'B-21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'B-22', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'B-23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'B-24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'B-25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'C-26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'C-27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'C-28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'C-29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'C-30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'C-31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'C-32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'C-34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'C-35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'C-36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'C-37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'C-38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'C-39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'C-40', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aslab`
--

CREATE TABLE `tb_aslab` (
  `id_aslab` int(11) NOT NULL,
  `nama` varchar(111) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_aslab`
--

INSERT INTO `tb_aslab` (`id_aslab`, `nama`, `jurusan`, `nohp`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Abdul Munif', 'INFORMATIKA', '085335650431', 'img.png', '2020-08-30 21:56:49', '2020-08-30 21:56:49'),
(2, 'Avin Abdurrohim', 'INFORMATIKA', '085738912652', 'img.png', '2020-08-30 21:57:07', '2020-08-30 21:57:07'),
(3, 'Lukmanul Hakim', 'TEKNIK ELEKTRO', '085961422848', 'img.png', '2020-08-30 21:57:07', '2020-12-13 21:13:31'),
(4, 'Juned Mustar Hakim', 'TEKNOLOGI INFORMASI', '085259012562', 'img.png', '2020-08-30 21:57:46', '2020-08-30 21:57:46'),
(5, 'Dj.Ibnu Jarir ', 'TEKNIK ELEKTRO', '082337977569', 'img.png', '2020-08-30 21:57:46', '2020-12-13 21:12:27'),
(6, 'Helman Zuhri', 'TEKNIK ELEKTRO', '085219580579', 'img.png', '2020-08-30 21:58:18', '2020-08-30 21:58:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(125) NOT NULL,
  `merek_barang` varchar(125) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_kategori`, `nama_barang`, `merek_barang`, `jumlah`, `kondisi`, `posisi`, `foto`, `date`, `keterangan`, `created_at`, `updated_at`) VALUES
(32, 10, 'keyboard', 'Eprazor', '12', 'baik', 'pojok barat', '1598149885_06b94514d02c6c2de361.jpeg', '23-08-2020', '', '2020-08-22 21:31:25', '2020-08-23 06:56:38'),
(33, 10, 'Monitor Acer', 'Acer', '3', 'baik', 'pojok timur', '1598153935_e24e0dcdf650263e8d42.jpeg', '23-08-2020', '', '2020-08-22 22:38:55', '2020-08-23 06:56:45'),
(34, 10, 'Monitor Samsung', 'Samsung', '7', 'baik', 'pojok timur', '1598154064_468442eca03f85d9db1a.jpeg', '24-08-2020', '1 mati', '2020-08-22 22:41:04', '2020-08-24 09:59:23'),
(35, 10, 'Monitor philips', 'Philips', '3', 'baik', 'pojok timur', '1598154147_8134c17a794ab8a1b3c7.jpeg', '24-08-2020', 'mati 1', '2020-08-22 22:42:27', '2020-08-24 00:19:23'),
(36, 10, 'Monitor Aoc', 'AOC', '1', 'baik', 'pojok timur', '1598154237_06c54df67970ef5e4844.jpeg', '23-08-2020', '', '2020-08-22 22:43:57', '2020-08-23 07:03:01'),
(37, 10, 'montior LG', 'LG', '3', 'baik', 'pojok timur', '1598154402_36f24e97867940e6c06e.jpeg', '23-08-2020', '', '2020-08-22 22:46:42', '2020-08-23 07:02:50'),
(38, 10, 'Sound Sharp', 'Sharp', '5', 'baik', 'pojok barat', '1598154574_738ff94c079da46a329b.jpeg', '23-08-2020', '', '2020-08-22 22:49:34', '2020-08-23 01:32:49'),
(39, 10, 'Sound Polythron', 'Polytrhon', '2', 'baik', 'pojok barat', '1598154669_99903bab588c87ade660.jpeg', '23-08-2020', '', '2020-08-22 22:51:09', '2020-08-23 06:56:10'),
(40, 15, 'Vakum', 'Sharp', '1', 'baik', 'sebelah timur', '1598154833_36a2eab38eb0d0b46a36.jpeg', '23-08-2020', '', '2020-08-22 22:53:53', '2020-08-23 06:56:03'),
(41, 15, 'Kompresor', 'Dongwa', '1', 'baik', 'sebalah timur', '1598154913_890523aef5cf0a39e7c6.jpeg', '23-08-2020', '', '2020-08-22 22:55:13', '2020-08-23 01:34:13'),
(42, 10, 'Printer ', 'HP', '1', 'baik', 'utara meja komputer', '1598154969_a7435c15e84681599ac5.jpeg', '23-08-2020', '', '2020-08-22 22:56:09', '2020-08-23 01:33:57'),
(43, 10, 'LCD Proyektor', 'Epson', '1', 'baik', 'bawah meja komputer', '1598155084_c70e16dac264f77c61fa.jpeg', '23-08-2020', '', '2020-08-22 22:58:04', '2020-08-23 01:33:50'),
(44, 10, 'LCD Proyektor infocus', 'Infocus', '1', 'baik', 'sebelah meja komputer', '1598155161_292cb04d3030f81fff1b.jpeg', '23-08-2020', '', '2020-08-22 22:59:21', '2020-08-23 01:30:38'),
(45, 10, 'Kabel Power', 'R-one', '16', 'baik', 'lemari8', '1598244349_819624e12b5b03f81067.jpeg', '24-08-2020', 'baik semua', '2020-08-23 23:45:49', '2020-08-24 10:09:55'),
(46, 10, 'Motherboard asus', 'Asus', '2', 'baik', 'lemari2', '1598244478_8436e7e3f133b9850413.jpeg', '24-08-2020', '', '2020-08-23 23:47:58', '2020-08-24 08:14:54'),
(47, 10, 'Vcd. Office', 'Office Home ', '6', 'baik', 'lemari2', '1598244565_5ed3cdd35fd875245ed6.jpeg', '24-08-2020', '', '2020-08-23 23:49:25', '2020-08-24 08:27:17'),
(48, 10, 'Vcd windows 7', 'Microsoft', '11', 'baik', 'Lemari2', '1598244616_aba1672227ab65f96790.jpeg', '24-08-2020', '', '2020-08-23 23:50:16', '2020-08-23 23:51:45'),
(49, 10, 'Mousepen i608X', 'Genius', '1', 'baik', 'lemari2', '1598244688_153c1372c8ef96ab8c1a.jpeg', '24-08-2020', '', '2020-08-23 23:51:28', '2020-08-23 23:51:28'),
(50, 10, 'Scannner canon', 'canon', '1', 'baik', 'Lemari2', '1598244828_e4c2fc8bbe4919154e04.jpeg', '24-08-2020', '', '2020-08-23 23:53:48', '2020-08-23 23:53:48'),
(51, 10, 'Vcd antivirus.. McAfee.', 'macfee', '3', 'baik', 'lemari2', '1598244889_d5c5f106c078c7e8d7bd.jpeg', '24-08-2020', '', '2020-08-23 23:54:49', '2020-08-23 23:54:49'),
(52, 10, 'Kabel VGA', 'Computer Cable', '30', 'baik', 'lemari8', '1598245095_e36ce5a4dd16cc25345e.jpeg', '24-08-2020', '', '2020-08-23 23:58:15', '2020-08-23 23:58:32'),
(53, 10, 'Router Rocket M5', 'Rocket M5', '5', 'baik', 'lemari1', '1598245428_ee8e9a116eeda6be66ed.jpeg', '25-08-2020', '', '2020-08-24 00:03:48', '2020-08-25 05:34:24'),
(54, 10, 'Thelepon swicth.', 'PABX PB08', '1', 'baik', 'lemari1', '1598245492_810b37d73a1b4336822c.jpeg', '25-08-2020', '', '2020-08-24 00:04:52', '2020-08-25 05:34:14'),
(55, 10, 'Router.. TRENDnet', 'TRENDnet', '1', 'baik', 'lemari1', '1598245590_26fc1107bdd7cd287b4b.jpeg', '25-08-2020', '', '2020-08-24 00:06:30', '2020-08-25 05:34:02'),
(56, 10, 'Router.. ', 'TRENDnet', '1', 'baik', 'lemari1', '1598245647_0039eddceada14f84c3d.jpeg', '25-08-2020', '', '2020-08-24 00:07:27', '2020-08-25 05:33:53'),
(65, 18, 'AC', 'asus', '1', 'baik', '', '1598751414_15511793a20f17f29f5f.jpg', '30-08-2020', 'rusak', '2020-08-29 20:36:54', '2020-08-29 20:36:54'),
(66, 18, 'AC', 'asus', '1', 'rusak', '', '1598751465_fa41d3439a976d3dd2a0.jpg', '30-08-2020', 'rusak', '2020-08-29 20:37:45', '2020-08-29 20:37:45'),
(67, 19, 'keyboard', 'asus', '1', 'rusak', '', '1598758733_98d35d8395dd0e71a6da.jpg', '30-08-2020', 'mati ', '2020-08-29 22:38:53', '2020-08-29 22:38:53'),
(68, 19, 'keyboard', 'asus', '1', 'rusak', '', '1598758835_75e00413c7c56f79169c.jpg', '30-08-2020', 'rusak', '2020-08-29 22:40:35', '2020-08-29 22:40:35'),
(69, 19, 'keyboard', 'asus', '1', 'rusak', '', '1599447799_b0fb429d2941d9b208e8.png', '07-09-2020', 'blm diganti', '2020-09-06 22:03:19', '2020-09-06 22:03:19'),
(70, 15, 'Riped', 'alanger', '1', 'baik', 'lemari3', '1599896777_4a52500ea951dbe554f7.jpg', '12-09-2020', 'baik', '2020-09-12 02:46:17', '2020-09-12 02:46:17'),
(71, 15, 'pemotong kabel', '-', '1', 'baik', 'lemari3', '1599896809_36ade1ecd3e7aba27165.jpg', '12-09-2020', 'baik', '2020-09-12 02:46:49', '2020-09-12 02:46:49'),
(72, 15, 'obeng', '-', '8', 'baik', 'lemari3', '1599896898_d89939a1aeec8bd3d76a.jpg', '12-09-2020', 'rusak 1', '2020-09-12 02:48:18', '2020-09-12 02:48:18'),
(73, 15, 'engkol', '-', '8', 'baik', 'lemari3', '1599897019_2c3ed17d9102d7302ec5.jpg', '12-09-2020', 'baik', '2020-09-12 02:50:19', '2020-09-12 02:50:19'),
(74, 15, 'tang', '-', '4', 'baik', 'lemari3', '1599897072_6c4c37b84d53c25bf344.jpg', '12-09-2020', 'baik', '2020-09-12 02:51:12', '2020-09-12 02:51:12'),
(75, 10, 'tang krimping', 'krimping', '8', 'baik', 'lemari6', '1599897155_ad124389e2a1714a7083.jpg', '12-09-2020', 'baik', '2020-09-12 02:52:35', '2020-09-12 02:58:14'),
(76, 10, 'rj45', 'balden', '2', 'baik', 'lemari6', '1599897280_91667d708a622af36e8d.jpg', '12-09-2020', '2 pack', '2020-09-12 02:54:40', '2020-09-12 03:06:25'),
(77, 15, 'paku', '-', '1 kresek', 'baik', 'lemari3', '1599897368_abdb7f5cc47de58c471b.jpg', '12-09-2020', 'baik', '2020-09-12 02:56:08', '2020-09-12 02:56:08'),
(78, 15, 'palu', '-', '1', 'baik', 'lemari3', '1599897421_635deb1661d1eb7c213d.jpg', '12-09-2020', 'baik', '2020-09-12 02:57:01', '2020-09-12 02:57:01'),
(79, 16, 'avo', 'avo', '1', 'baik', 'lemari6', '1599897573_438a57a7a44ae459dcd4.jpg', '12-09-2020', 'baik', '2020-09-12 02:59:33', '2020-09-12 02:59:33'),
(80, 15, 'atk', '-', 'Tak hingga', 'baik', 'lemari3', '1599897697_2acff3e4cf20886ea56b.jpg', '12-09-2020', 'baik', '2020-09-12 03:01:37', '2020-09-12 03:01:37'),
(81, 15, 'claim', 'claim', '3', 'baik', 'lemari3', '1599897765_5371219df45a5823e68d.jpg', '12-09-2020', 'baik', '2020-09-12 03:02:45', '2020-09-12 03:02:45'),
(82, 15, 'kabel tis', 'tis', '2', 'baik', 'lemari3', '1599897839_b675790fabc54d15e652.jpg', '12-09-2020', 'baik', '2020-09-12 03:03:59', '2020-09-12 03:03:59'),
(83, 15, 'baot', '-', 'Tak hingga', 'baik', 'lemari3', '1599897877_08cc7f6edba6c3357762.jpg', '12-09-2020', 'baik', '2020-09-12 03:04:37', '2020-09-12 03:04:37'),
(84, 15, 'piesher', 'pieser', '2', 'baik', 'lemari3', '1599897948_73f66f14a2f2310782c6.jpg', '12-09-2020', '2 pack baik', '2020-09-12 03:05:48', '2020-09-12 03:05:48'),
(85, 12, 'lan tester', 'master', '2', 'baik', 'lemari6', '1599898066_0279441ec79c24c9db6b.jpg', '12-09-2020', 'baik', '2020-09-12 03:07:46', '2020-09-12 03:07:46'),
(86, 15, 'solasi dan daoble tip', 'soalsi', '4', 'baik', 'lemari3', '1599898284_7fbc992d2e13675fbc8c.jpg', '12-09-2020', 'soalsi 3 double 1', '2020-09-12 03:11:24', '2020-09-12 03:11:24'),
(87, 10, 'HDMI', 'hdmi', '7', 'baik', 'lemari6', '1599898381_533fa2899370027200e2.jpg', '12-09-2020', 'baik', '2020-09-12 03:13:01', '2020-09-12 03:13:01'),
(88, 10, 'ram', 'asus', 'tak hingga', 'baik', 'lemari3', '1599898544_6f21df115111e1ca5fbd.jpg', '12-09-2020', 'rusak', '2020-09-12 03:15:44', '2020-09-12 03:15:44'),
(89, 16, 'penyedot tema', '-', '1', 'baik', 'lemari3', '1599898832_3c6b985ba065226bf4ca.jpg', '12-09-2020', 'baik', '2020-09-12 03:20:32', '2020-09-12 03:20:32'),
(90, 10, 'acces point', 'tp link', '1', 'baik', 'lemari1', '1599903168_1a4dad015c38da53a535.jpg', '15-12-2020', 'baik', '2020-09-12 04:32:48', '2020-12-15 09:37:26'),
(91, 24, 'laminating', 'canon', '3', 'baik', 'lemari1', '1603355706_6624a27dce894ade39d0.jpeg', '22-10-2020', '', '2020-10-22 03:35:06', '2020-10-22 03:35:06'),
(92, 17, 'PC', 'asus', '1', 'baik', '', '1608737525_bce4941fac545fec0290.jpg', '23-12-2020', 'rusak', '2020-12-23 09:32:05', '2020-12-23 09:32:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_baranglab`
--

CREATE TABLE `tb_baranglab` (
  `id_baranglab` int(11) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `merek_barang` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tb_baranglab`
--

INSERT INTO `tb_baranglab` (`id_baranglab`, `id_lab`, `id_kategori`, `nama_barang`, `merek_barang`, `jumlah`, `status`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 11, 0, 'AC', '', '323', 'baik', '1598370635_ad8a777f21f83bd57112.jpeg', 'baik semua', '2020-08-25 10:50:35', '2020-08-25 10:50:35'),
(7, 11, 17, 'PC', '', '39', 'baik', '1608737463_3383a5b9e45f2d52d014.png', 'baik', '2020-12-23 09:31:03', '2020-12-23 09:32:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_complain`
--

CREATE TABLE `tb_complain` (
  `id_complain` int(11) NOT NULL,
  `nama_dosen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nidn_nim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nama_lab` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `prodi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `catatan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `nama_aslab` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tb_complain`
--

INSERT INTO `tb_complain` (`id_complain`, `nama_dosen`, `nidn_nim`, `nama_lab`, `prodi`, `catatan`, `kode`, `status`, `nama_aslab`, `foto`, `date`, `created_at`, `updated_at`) VALUES
(69, 'abdul munif', 'munifabdul603@gmail.com', 'LAB 4', '', 'Keyboard & mouse Tidak Dikenali Oleh Komputer', 'A-4', 1, '', '', '01/01/2020', '2020-12-20 15:19:49', '2020-12-20 15:19:49'),
(70, 'Dewi kayyisa awdi ana', '0015057502', 'LAB 5', 'REKAYASA PERANGKAT LUNAK', 'Tampilan Tiba-Tiba Rusak Dan Komputer Manjadi Hang', 'A-4', 1, '', '', '10/10/2020', '2020-12-20 15:21:20', '2020-12-20 15:21:20'),
(71, 'Dewi kayyisa awdi ana', '0015057502', 'LAB 4', 'TEKNOLOGI INFOMRASI', 'Tampilan Tiba-Tiba Rusak Dan Komputer Manjadi Hang', 'A-4', 1, '', '', '01/01/2020', '2020-12-20 15:23:48', '2020-12-20 15:23:48'),
(76, 'munif abdillah', '1821500038', 'LAB 3', 'INFORMATIKA', 'Tampilan Tiba-Tiba Rusak Dan Komputer Manjadi Hang', 'A-4', 2, 'Abdul Munif Avin Abdurrohim Juned Mustar Hakim   ', '1608910150_8effa180c5608c406bef.jpg', '9', '2020-12-20 15:47:20', '2020-12-25 09:29:10'),
(77, 'Dewi kayyisa awdi ana', '0015057502', 'LAB 4', 'TEKNIK ELEKTRO', 'aplikasi error', 'A-5', 1, '', '', '20-12-2020', '2020-12-20 15:48:24', '2020-12-20 15:48:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nidn`, `email`, `nama`, `created_at`, `updated_at`) VALUES
(2, '0015057502', '', 'ABDUL KARIM', '0000-00-00 00:00:00', '2020-09-03 06:54:07'),
(3, '0015057502', '', 'ABU THOLIB', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '0722027002', '', 'AHMAD HUDAWI AS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '0718018902', '', 'AHMAD KHAIRI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '0023067801', '', 'ANIS YUSROTUN NADHIROH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '0708117701', '', 'CAHYUNI NOVIA', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '0730109002', '', 'GULPI QORIK OKTAGALU PRATAMASUNU', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '0711098104', '', 'HANUNAH NAFIIYAH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '0705058602', '', 'KAMIL MALIK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '0724078503', '', 'HONAINAH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '0713028303', '', 'M NOER FADLI HIDAYAT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '0708128702', '', 'MOH AINOL YAQIN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '0702078504', '', 'MATLUBUL KHAIRI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '0707088302', '', 'MOH FURQAN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '0728128503', '', 'RATRI ENGGAR PAWENING', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '0720087601', '', 'SYAIFUL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '0728089301', '', 'FATHUR RIZAL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '0726029101', '', 'NADIYAH', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '0705077609', '', 'MUAFI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '00150575028', 'munifabdul603@gmail.com', 'abdul munif', '2020-12-25 09:26:36', '2020-12-25 09:26:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_instansi`
--

CREATE TABLE `tb_instansi` (
  `id_instansi` int(11) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_instansi`
--

INSERT INTO `tb_instansi` (`id_instansi`, `instansi`, `created_at`, `updated_at`) VALUES
(2, 'UNUJA', '2020-08-20 22:28:58', '2020-08-20 22:28:58'),
(3, 'FAKULTAS TEKNIK', '2020-08-20 22:32:15', '2020-08-20 22:32:15'),
(4, 'FAKULTAS AGAMA ISLAM', '2020-08-20 22:32:33', '2020-08-20 22:32:33'),
(5, 'FAKULTAS SOSIAL HUMANIORA', '2020-08-20 22:32:50', '2020-08-20 22:32:50'),
(6, 'FAKULTAS KESEHATAN', '2020-08-20 22:33:11', '2020-08-20 22:33:11'),
(7, 'PASCASARJANA', '2020-08-20 22:33:23', '2020-08-20 22:33:23'),
(8, 'PODOK PESANTREN NURUL JADID', '2020-08-20 22:33:46', '2020-08-20 22:33:46'),
(9, 'SMK NURUL JADID', '2020-08-20 22:34:01', '2020-08-20 22:34:01'),
(10, 'SMA NURUL JADID', '2020-08-20 22:34:15', '2020-08-20 22:34:15'),
(11, 'MA NURUL JADID', '2020-08-20 22:34:27', '2020-08-20 22:34:27'),
(12, 'MTS NURUL JADID', '2020-08-20 22:34:42', '2020-08-20 22:34:42'),
(13, 'SMP NURUL JADID', '2020-08-20 22:34:59', '2020-08-20 22:34:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(125) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `created_at`, `updated_at`) VALUES
(10, 'Aksesoris komputer', '2020-08-16 19:23:40', '2020-08-22 22:36:00'),
(12, 'jaringan', '2020-08-17 01:13:42', '2020-08-17 01:13:42'),
(15, 'alat kerja', '2020-08-22 21:20:03', '2020-08-22 21:20:03'),
(16, 'alat kelistrikan', '2020-08-22 21:20:07', '2020-08-22 21:20:07'),
(17, 'Komputer', '2020-08-23 23:46:47', '2020-08-23 23:46:47'),
(18, 'AC', '2020-08-25 05:36:53', '2020-08-25 05:36:53'),
(19, 'keyboard', '2020-08-25 05:37:02', '2020-08-25 05:37:02'),
(20, 'kursi', '2020-08-25 05:37:11', '2020-08-25 05:37:11'),
(21, 'meja', '2020-08-25 05:37:17', '2020-08-25 05:37:17'),
(22, 'monitor', '2020-08-25 05:37:37', '2020-08-25 05:37:37'),
(23, 'mouse', '2020-08-25 05:37:49', '2020-08-25 05:37:49'),
(24, 'editing', '2020-10-22 03:33:42', '2020-10-22 03:33:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id_lab` int(11) NOT NULL,
  `slug_lab` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nama_lab` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `st` int(11) NOT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tb_lab`
--

INSERT INTO `tb_lab` (`id_lab`, `slug_lab`, `nama_lab`, `st`, `foto`, `created_at`, `updated_at`) VALUES
(11, 'LAB-1', 'LAB 1', 0, '1603093745_8c44abd977a326609385.jpeg', '2020-08-25 05:42:24', '2021-01-03 10:13:13'),
(12, 'LAB-2', 'LAB 2', 0, '1603093769_125586e1ab440a141c66.jpeg', '2020-08-25 05:42:42', '2021-01-03 10:13:21'),
(13, 'LAB-3', 'LAB 3', 1, '1603093784_8b0c7a453013c16154ff.jpeg', '2020-08-25 07:00:36', '2021-01-03 09:09:26'),
(14, 'LAB-4', 'LAB 4', 1, '1603093799_227ea5706a9779644e03.jpeg', '2020-08-25 08:05:53', '2021-01-03 09:43:48'),
(15, 'LAB-5', 'LAB 5', 1, '1603093822_bb41f4d180e77eb03642.jpeg', '2020-08-25 08:06:23', '2021-01-03 09:10:37'),
(16, 'LAB-ELEKTRO', 'LAB ELEKTRO', 1, '1603093837_fa2bd86921627bff5c75.jpeg', '2020-08-25 08:07:02', '2021-01-03 09:10:45'),
(17, 'LAB-PLC', 'LAB PLC', 1, '1603093852_ce47b63a97258deb7af4.jpeg', '2020-08-25 08:07:20', '2021-01-03 09:10:52'),
(20, 'LAB-JARINGA', 'LAB JARINGAN', 0, '1609688712_243fb0689c94c68fd15b.jpeg', '2021-01-03 09:45:12', '2021-01-03 10:58:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_stok_akhir` int(5) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `jumlah_minjam` varchar(125) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `waktu_janji_pinjam` varchar(125) NOT NULL,
  `waktu_janji_kembali` varchar(125) NOT NULL,
  `keterangan` varchar(125) NOT NULL,
  `status` int(2) NOT NULL,
  `konfir` int(2) NOT NULL,
  `date` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `id_stok_akhir`, `id_kategori`, `jumlah_minjam`, `id_user`, `id_instansi`, `no_hp`, `waktu_janji_pinjam`, `waktu_janji_kembali`, `keterangan`, `status`, `konfir`, `date`, `created_at`, `updated_at`) VALUES
(28, 67, 16, '1', 22, 8, '082338256459', '16-10-2020', '2020-10-16', 'baik', 2, 2, '16-10-2020', '2020-10-15 13:20:39', '2020-10-17 21:36:26'),
(29, 26, 15, '1', 22, 8, '087777777777', '16-10-2020', '2020-10-16', 'baik', 2, 2, '16-10-2020', '2020-10-15 14:46:25', '2020-10-15 16:06:14'),
(30, 19, 10, '1', 23, 3, '082338256459', '15-12-2020', '2020-12-15', 'baik', 2, 2, '15-12-2020', '2020-12-14 19:42:20', '2020-12-14 19:45:01'),
(31, 65, 10, '1', 23, 3, '082338256459', '15-12-2020', '2020-12-16', 'baik', 2, 2, '15-12-2020', '2020-12-15 09:52:25', '2020-12-15 09:55:54'),
(32, 65, 10, '1', 23, 3, '082338256459', '15-12-2020', '2020-12-16', 'baik', 2, 2, '15-12-2020', '2020-12-15 09:52:27', '2020-12-15 09:59:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman_lab`
--

CREATE TABLE `tb_peminjaman_lab` (
  `id_peminjaman_lab` int(11) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `tgl_minjam` varchar(100) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `kebutuhan` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_peminjaman_lab`
--

INSERT INTO `tb_peminjaman_lab` (`id_peminjaman_lab`, `id_lab`, `id_user`, `id_instansi`, `tgl_minjam`, `catatan`, `status`, `waktu`, `kebutuhan`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 13, 23, 3, '15-12-20', 'jjjj', '2', '', '', '', '2020-12-15 05:27:39', '2020-12-18 05:55:50'),
(2, 14, 23, 3, '16-12-20', 'qqq', '2', '', '', '', '2020-12-15 19:14:24', '2020-12-18 05:55:58'),
(3, 16, 23, 3, '16-12-20', 'xzcxzc', '2', '', '', '', '2020-12-15 19:39:51', '2020-12-17 06:40:30'),
(4, 16, 24, 3, '16-12-20', 'adasdasd', '2', '', '', '', '2020-12-15 20:24:34', '2020-12-17 06:40:22'),
(5, 17, 23, 3, '17-12-2020', 'akuuuu', '2', '', '', '', '2020-12-17 06:42:13', '2020-12-20 13:12:11'),
(6, 14, 21, 3, '18-12-2020', 'kebutuhahn praktikum', '2', '', '', '', '2020-12-18 06:15:35', '2020-12-23 09:40:18'),
(7, 13, 25, 6, '20-12-2020', 'pelatihan ngetik', '1', '', '', '', '2020-12-19 22:00:59', '2020-12-19 22:00:59'),
(8, 14, 23, 3, '23-12-2020', 'iii', '1', '', '', '', '2020-12-23 09:16:50', '2020-12-23 09:16:50'),
(9, 14, 21, 3, '25-12-2020', 'asasasas', '1', 'pinjamlab', '', '', '2020-12-25 06:59:27', '2020-12-25 06:59:27'),
(10, 16, 21, 3, '25-12-2020', 'asas', '2', 'pinjamlab', '', '', '2020-12-25 07:00:49', '2020-12-25 09:04:30'),
(11, 17, 21, 3, '25-12-2020', 'asas', '2', 'pinjamlab', '', '', '2020-12-25 07:02:21', '2020-12-25 09:05:37'),
(12, 11, 21, 3, '25-12-2020', 'akkakaka', '2', 'pinjamlab', '', '', '2020-12-25 07:06:17', '2020-12-25 09:19:48'),
(13, 15, 21, 3, '25-12-2020', 'lll', '1', 'pinjamlab', '', '', '2020-12-25 07:30:07', '2020-12-25 07:30:07'),
(16, 0, 23, 3, '07-01-2021', 'asad', '1', '11:47 - 11:47', 'PELATIHAN', '', '2021-01-06 22:47:44', '2021-01-06 22:47:44'),
(17, 12, 23, 3, '07-01-2021', 'asasdasdasd', '1', '11:52 - 11:52', 'PRAKTIKUM', '', '2021-01-06 22:53:33', '2021-01-06 22:53:33'),
(18, 14, 23, 3, '07-01-2021', 'dvfvcvc', '1', '12:59 - 12:59', 'PELATIHAN', '', '2021-01-06 22:59:18', '2021-01-06 22:59:18'),
(19, 11, 23, 3, '07-01-2021', 'sdsdsdsd', '1', '12:08 - 12:08', 'PELATIHAN', '', '2021-01-06 23:08:22', '2021-01-06 23:08:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_stok_akhir` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jumlah_pengeluaran` varchar(125) NOT NULL,
  `waktu_pengeluaran` varchar(125) NOT NULL,
  `keterangan_pengeluaran` varchar(125) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_proses_peminjaman`
--

CREATE TABLE `tb_proses_peminjaman` (
  `id_proses_peminjaman` int(11) NOT NULL,
  `id_stok_akhir` int(11) NOT NULL,
  `status` varchar(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_proses_peminjaman`
--

INSERT INTO `tb_proses_peminjaman` (`id_proses_peminjaman`, `id_stok_akhir`, `status`, `created_at`, `updated_at`) VALUES
(19, 18, '1', '2020-12-26 20:44:25', '2020-12-26 20:44:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok_akhir`
--

CREATE TABLE `tb_stok_akhir` (
  `id_stok_akhir` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(120) NOT NULL,
  `merek_barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kondisi` varchar(125) NOT NULL,
  `posisi` varchar(111) NOT NULL,
  `foto` varchar(212) NOT NULL,
  `aktif` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_stok_akhir`
--

INSERT INTO `tb_stok_akhir` (`id_stok_akhir`, `id_kategori`, `nama_barang`, `merek_barang`, `jumlah`, `kondisi`, `posisi`, `foto`, `aktif`, `created_at`, `updated_at`) VALUES
(18, 10, 'keyboard', 'Eprazor', 11, 'baik', 'pojok barat', '1598149885_06b94514d02c6c2de361.jpeg', 1, '2020-08-22 21:31:25', '2020-12-25 10:42:46'),
(19, 10, 'Monitor Acer', 'Acer', 3, 'baik', 'pojok timur', '1598153935_e24e0dcdf650263e8d42.jpeg', 1, '2020-08-22 22:38:55', '2020-12-14 19:44:33'),
(20, 10, 'Monitor Samsung', 'Samsung', 7, 'baik', 'pojok timur', '1598154064_468442eca03f85d9db1a.jpeg', 1, '2020-08-22 22:41:04', '2020-08-22 22:41:04'),
(21, 10, 'Monitor philips', 'Philips', 2, 'baik', 'pojok timur', '1598154147_8134c17a794ab8a1b3c7.jpeg', 1, '2020-08-22 22:42:27', '2020-12-17 06:02:18'),
(22, 10, 'Monitor Aoc', 'AOC', 1, 'baik', 'pojok timur', '1598154237_06c54df67970ef5e4844.jpeg', 1, '2020-08-22 22:43:57', '2020-12-25 10:42:04'),
(23, 10, 'montior LG', 'LG', 3, 'baik', 'pojok timur', '1598154402_36f24e97867940e6c06e.jpeg', 1, '2020-08-22 22:46:42', '2020-12-25 10:41:50'),
(24, 10, 'Sound Sharp', 'Sharp', 5, 'baik', 'pojok barat', '1598154574_738ff94c079da46a329b.jpeg', 1, '2020-08-22 22:49:34', '2020-08-22 22:49:34'),
(25, 10, 'Sound Polythron', 'Polytrhon', 2, 'baik', 'pojok barat', '1598154669_99903bab588c87ade660.jpeg', 1, '2020-08-22 22:51:09', '2020-12-18 05:52:37'),
(26, 15, 'Vakum', 'sharp', 1, 'baik', 'sebelah timur', '1598154833_36a2eab38eb0d0b46a36.jpeg', 1, '2020-08-22 22:53:53', '2020-12-18 05:52:25'),
(27, 15, 'kompresor', 'Dongwa', 1, 'baik', 'sebalah timur', '1598154913_890523aef5cf0a39e7c6.jpeg', 1, '2020-08-22 22:55:13', '2020-12-18 05:52:14'),
(28, 10, 'printer', 'Hp', 1, 'baik', 'utara meja komputer', '1598154969_a7435c15e84681599ac5.jpeg', 1, '2020-08-22 22:56:09', '2020-08-22 22:56:09'),
(29, 10, 'LCD Proyektor', 'Epson', 1, 'baik', 'bawah meja komputer', '1598155084_c70e16dac264f77c61fa.jpeg', 1, '2020-08-22 22:58:04', '2020-12-17 06:00:58'),
(30, 10, 'LCD Proyektor infocus', 'Infocus', 1, 'baik', 'sebelah meja komputer', '1598155161_292cb04d3030f81fff1b.jpeg', 1, '2020-08-22 22:59:21', '2020-08-23 13:32:48'),
(31, 10, 'Kabel Power', 'R-one', 16, 'baik', 'lemari 8', '1598244349_819624e12b5b03f81067.jpeg', 1, '2020-08-23 23:45:49', '2020-08-23 23:45:49'),
(32, 17, 'Motherboard asus', 'Asus', 2, 'baik', 'lemari 2', '1598244478_8436e7e3f133b9850413.jpeg', 1, '2020-08-23 23:47:58', '2020-08-23 23:47:58'),
(33, 10, 'Vcd. Office', 'Office Home', 6, 'baik', 'Lemari 2', '1598244565_5ed3cdd35fd875245ed6.jpeg', 1, '2020-08-23 23:49:25', '2020-08-23 23:49:25'),
(34, 10, 'Vcd windows 7\r\n', 'microsoft', 10, 'baik', 'Lemari 2', '1598244616_aba1672227ab65f96790.jpeg', 1, '2020-08-23 23:50:16', '2020-08-24 09:59:23'),
(35, 10, 'Mousepen i608X', 'Genius', 1, 'baik', 'Lemari 2', '1598244688_153c1372c8ef96ab8c1a.jpeg', 1, '2020-08-23 23:51:28', '2020-08-23 23:51:28'),
(36, 10, 'Scannner canon', 'Canon', 1, 'baik', 'Lemari 2', '1598244828_e4c2fc8bbe4919154e04.jpeg', 1, '2020-08-23 23:53:48', '2020-08-23 23:53:48'),
(37, 10, 'Vcd antivirus.. McAfee.', 'macfee', 3, 'baik', 'lemari 2', '1598244889_d5c5f106c078c7e8d7bd.jpeg', 1, '2020-08-23 23:54:50', '2020-08-23 23:54:50'),
(38, 10, 'Kabel VGA', 'Computer Cable', 30, 'baik', 'lemari 8', '1598245095_e36ce5a4dd16cc25345e.jpeg', 1, '2020-08-23 23:58:15', '2020-08-23 23:58:15'),
(39, 10, 'Router Rocket M5', 'Rocket M5', 5, 'baik', 'lemari 1', '1598245428_ee8e9a116eeda6be66ed.jpeg', 1, '2020-08-24 00:03:48', '2020-08-24 00:03:48'),
(40, 10, 'Thelepon swicth.', 'PABX PB08', 1, 'baik', 'lemari 1', '1598245492_810b37d73a1b4336822c.jpeg', 1, '2020-08-24 00:04:53', '2020-08-24 00:04:53'),
(41, 10, 'Router.. TRENDnet', 'TRENDnet', 1, 'baik', 'lemari 1', '1598245590_26fc1107bdd7cd287b4b.jpeg', 1, '2020-08-24 00:06:30', '2020-09-08 11:22:51'),
(42, 10, 'Router..', 'TRENDnet', 1, 'baik', 'lemari 1', '1598245647_0039eddceada14f84c3d.jpeg', 1, '2020-08-24 00:07:28', '2020-08-24 00:07:28'),
(48, 15, 'Riped', 'alanger', 1, 'baik', 'lemari3', '1599896777_4a52500ea951dbe554f7.jpg', 1, '2020-09-12 02:46:17', '2020-09-12 02:46:17'),
(49, 15, 'pemotong kabel', '-', 1, 'baik', 'lemari3', '1599896809_36ade1ecd3e7aba27165.jpg', 1, '2020-09-12 02:46:49', '2020-09-12 02:46:49'),
(50, 15, 'obeng', '-', 8, 'baik', 'lemari3', '1599896898_d89939a1aeec8bd3d76a.jpg', 1, '2020-09-12 02:48:18', '2020-09-12 02:48:18'),
(51, 15, 'engkol', '-', 8, 'baik', 'lemari3', '1599897019_2c3ed17d9102d7302ec5.jpg', 1, '2020-09-12 02:50:19', '2020-09-12 02:50:19'),
(52, 15, 'tang', '-', 4, 'baik', 'lemari3', '1599897072_6c4c37b84d53c25bf344.jpg', 1, '2020-09-12 02:51:12', '2020-09-12 02:51:12'),
(53, 15, 'tang krimping', 'krimping', 8, 'baik', 'lemari3', '1599897155_ad124389e2a1714a7083.jpg', 1, '2020-09-12 02:52:36', '2020-09-12 02:52:36'),
(54, 12, 'rj45', 'balden', 2, 'baik', 'lemari3', '1599897280_91667d708a622af36e8d.jpg', 1, '2020-09-12 02:54:40', '2020-09-12 02:54:40'),
(55, 15, 'paku', '-', 1, 'baik', 'lemari3', '1599897368_abdb7f5cc47de58c471b.jpg', 1, '2020-09-12 02:56:08', '2020-09-12 02:56:08'),
(56, 15, 'palu', '-', 1, 'baik', 'lemari3', '1599897421_635deb1661d1eb7c213d.jpg', 1, '2020-09-12 02:57:01', '2020-09-12 02:57:01'),
(57, 16, 'avo', 'avo', 1, 'baik', 'lemari6', '1599897573_438a57a7a44ae459dcd4.jpg', 1, '2020-09-12 02:59:33', '2020-09-12 02:59:33'),
(58, 15, 'atk', '-', 0, 'baik', 'lemari3', '1599897697_2acff3e4cf20886ea56b.jpg', 1, '2020-09-12 03:01:37', '2020-09-12 03:01:37'),
(59, 15, 'claim', 'claim', 3, 'baik', 'lemari3', '1599897765_5371219df45a5823e68d.jpg', 1, '2020-09-12 03:02:45', '2020-09-12 03:02:45'),
(60, 15, 'kabel tis', 'tis', 2, 'baik', 'lemari3', '1599897839_b675790fabc54d15e652.jpg', 1, '2020-09-12 03:03:59', '2020-09-12 03:03:59'),
(61, 15, 'baot', '-', 0, 'baik', 'lemari3', '1599897877_08cc7f6edba6c3357762.jpg', 1, '2020-09-12 03:04:37', '2020-09-12 03:04:37'),
(62, 15, 'piesher', 'pieser', 2, 'baik', 'lemari3', '1599897948_73f66f14a2f2310782c6.jpg', 1, '2020-09-12 03:05:48', '2020-09-12 03:05:48'),
(63, 12, 'lan tester', 'master', 2, 'baik', 'lemari6', '1599898066_0279441ec79c24c9db6b.jpg', 1, '2020-09-12 03:07:46', '2020-09-12 03:07:46'),
(64, 15, 'solasi dan daoble tip', 'soalsi', 4, 'baik', 'lemari3', '1599898284_7fbc992d2e13675fbc8c.jpg', 1, '2020-09-12 03:11:24', '2020-09-12 03:11:24'),
(65, 10, 'HDMI', 'hdmi', 7, 'baik', 'lemari6', '1599898381_533fa2899370027200e2.jpg', 1, '2020-09-12 03:13:01', '2020-12-15 09:59:00'),
(66, 10, 'ram', 'asus', 0, 'baik', 'lemari3', '1599898544_6f21df115111e1ca5fbd.jpg', 1, '2020-09-12 03:15:44', '2020-09-12 03:15:44'),
(67, 16, 'penyedot tema', '-', 1, 'baik', 'lemari3', '1599898832_3c6b985ba065226bf4ca.jpg', 1, '2020-09-12 03:20:32', '2020-10-15 13:20:40'),
(68, 12, 'acces point', 'tp link', 0, 'baik', 'lemari1', '1599903168_1a4dad015c38da53a535.jpg', 1, '2020-09-12 04:32:48', '2020-09-12 04:33:29'),
(69, 24, 'laminating', 'canon', 3, 'baik', 'lemari1', '1603355706_6624a27dce894ade39d0.jpeg', 1, '2020-10-22 03:35:06', '2020-12-17 05:37:40'),
(70, 17, 'PC', 'asus', 1, 'baik', 'gh', '1608737525_bce4941fac545fec0290.jpg', 1, '2020-12-23 09:32:05', '2020-12-23 09:32:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `jenis_kebutuhan` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `username` varchar(125) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `foto` varchar(125) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_instansi`, `jenis_kebutuhan`, `jenis_kelamin`, `username`, `nama`, `password`, `foto`, `level`, `created_at`, `updated_at`) VALUES
(6, 3, '', '', 'admin', 'admin', '$2y$10$.Na9rUxhSsK2XJ7al08A9O3mto.V02h/zh8RdHJsJA2m4v9dAMrGe', '1599180136_3098eaa2cde00d3eb683.png', 'admin', '2020-08-19 14:11:55', '2020-10-07 04:49:30'),
(21, 3, 'alat jaringan', 'Laki-laki', 'munifabdul603@gmail.com', 'Abdul Munif', '$2y$10$XEFMlRxbgewQbGUQ8CceR.91aj2QLidSSinXH5l5br76beLGOihQG', '1602784912_72eb232406c3a1436f9e.jpeg', 'user', '2020-10-15 13:01:52', '2020-12-18 06:13:49'),
(22, 3, 'bantu bantu pondok', 'Pilih jenis kelamin', 'avinavin', 'avin abdurrahim', '$2y$10$KiZwj0Mcv6TvMxC5nrs4cucapG2MlP76AQ6Ihn3mnFxnSpwJubSju', '1603048628_3905c0f5f05b78c94cc2.jpg', 'user', '2020-10-15 13:14:17', '2020-10-18 14:17:08'),
(23, 3, '', 'Laki-laki', 'helman zuhri', 'helman', '$2y$10$dbVOTHbI8JQNCSKFe7kp/e9urQJH83dHS/QMSApxiEKB.qiv.VKqS', 'avatar.png', 'user', '2020-12-13 20:15:14', '2020-12-13 20:15:14'),
(24, 3, '', 'Laki-laki', 'bbbbb', 'aaaaaaa', '$2y$10$ZOqQlYpJUiU2Z8Py75nRfeIjb462ahk/hDOkkIf9hEA7M4MC8tiBS', 'avatar.png', 'user', '2020-12-15 20:19:35', '2020-12-15 20:19:35'),
(25, 6, '', 'Laki-laki', 'abdillah', 'abdillah', '$2y$10$rAYr6pVRwLzuQ.gqQjm1fufmDX8mJ7BWgsnGMFKsOBUvvl2HQSUGS', 'avatar.png', 'user', '2020-12-19 21:55:43', '2020-12-19 21:55:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kode_lab`
--
ALTER TABLE `kode_lab`
  ADD PRIMARY KEY (`id_kode`);

--
-- Indeks untuk tabel `tb_aslab`
--
ALTER TABLE `tb_aslab`
  ADD PRIMARY KEY (`id_aslab`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_baranglab`
--
ALTER TABLE `tb_baranglab`
  ADD PRIMARY KEY (`id_baranglab`);

--
-- Indeks untuk tabel `tb_complain`
--
ALTER TABLE `tb_complain`
  ADD PRIMARY KEY (`id_complain`);

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `tb_instansi`
--
ALTER TABLE `tb_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indeks untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `tb_peminjaman_lab`
--
ALTER TABLE `tb_peminjaman_lab`
  ADD PRIMARY KEY (`id_peminjaman_lab`);

--
-- Indeks untuk tabel `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `tb_proses_peminjaman`
--
ALTER TABLE `tb_proses_peminjaman`
  ADD PRIMARY KEY (`id_proses_peminjaman`);

--
-- Indeks untuk tabel `tb_stok_akhir`
--
ALTER TABLE `tb_stok_akhir`
  ADD PRIMARY KEY (`id_stok_akhir`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kode_lab`
--
ALTER TABLE `kode_lab`
  MODIFY `id_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `tb_aslab`
--
ALTER TABLE `tb_aslab`
  MODIFY `id_aslab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `tb_baranglab`
--
ALTER TABLE `tb_baranglab`
  MODIFY `id_baranglab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_complain`
--
ALTER TABLE `tb_complain`
  MODIFY `id_complain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_instansi`
--
ALTER TABLE `tb_instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_lab`
--
ALTER TABLE `tb_lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjaman_lab`
--
ALTER TABLE `tb_peminjaman_lab`
  MODIFY `id_peminjaman_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_proses_peminjaman`
--
ALTER TABLE `tb_proses_peminjaman`
  MODIFY `id_proses_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_stok_akhir`
--
ALTER TABLE `tb_stok_akhir`
  MODIFY `id_stok_akhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
