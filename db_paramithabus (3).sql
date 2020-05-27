-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 25, 2019 at 08:06 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_paramithabus`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id_about` int(1) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_po` varchar(225) NOT NULL,
  `about` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fb` varchar(20) NOT NULL,
  `ig` varchar(20) NOT NULL,
  `twitter` varchar(20) NOT NULL,
  `layanan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id_about`, `gambar`, `nama_po`, `about`, `alamat`, `phone`, `fb`, `ig`, `twitter`, `layanan`) VALUES
(17, '35ecda652e145d1e717a1b762590832a.png', 'PO. Paramitha BUS 2', 'PO.Paramitha adalah perusahaan otobus puworejo jawa Tengah yang bergerak dalam layanan persewaan bus pariwisata untk jalur seluruh Indonesia khususnya wilayah pulau Jawa, Sumatera, Bali dan Lombok dengan mengedepankan pelayanan yang prima sebagai prioritas utama serta melayani trip wisata reguler, wisata religi, kunjungan industri dan atau menyesuaikan kebutuhan pelanggan.', 'Banjarnegara', '087767666765', 'https://facebook.com', 'http://instagram.com', 'http://twitter.com', '1. Bus Paramitha melayani sewa bus untuk trip Jawa-Bali.\r\n2. Melayani perjalanan wisata religi seperti ziarah wali, kunjungan pondok pesantren, dan lainnya\r\n3. Melayani perjalanan wisata baik umum atau dari Biro wisata\r\n4. Melayani perjalanan gathering perusahaan\r\n5. Melayani perjalanan rombongan kondangan\r\n6. Melayani perjalanan kunjungan industri');

-- --------------------------------------------------------

--
-- Table structure for table `album_photos`
--

CREATE TABLE `album_photos` (
  `id_album` int(11) NOT NULL,
  `nama_album` varchar(50) DEFAULT NULL,
  `tanggal_album` timestamp NULL DEFAULT current_timestamp(),
  `nik` int(11) DEFAULT NULL,
  `author` varchar(60) DEFAULT NULL,
  `count` int(11) DEFAULT 0,
  `cover_album` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `url`) VALUES
(1, 'b1.jpg'),
(2, 'b2.png'),
(3, 'b3.jpg'),
(4, 'b4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(200) DEFAULT NULL,
  `isi_berita` text DEFAULT NULL,
  `tanggal_berita` timestamp NULL DEFAULT current_timestamp(),
  `kategori_id_berita` int(11) DEFAULT NULL,
  `kategori_nama_berita` varchar(30) DEFAULT NULL,
  `views_berita` int(11) DEFAULT 0,
  `gambar_berita` varchar(40) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `author_berita` varchar(40) DEFAULT NULL,
  `img_slider_berita` int(2) NOT NULL DEFAULT 0,
  `slug_berita` varchar(250) DEFAULT NULL,
  `rating_berita` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `kode_bus` varchar(10) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `jenis_bus` varchar(50) NOT NULL,
  `no_uji` varchar(50) NOT NULL,
  `tgl_akhir_uji` date NOT NULL,
  `no_kps` varchar(50) NOT NULL,
  `tgl_akhir_kps` date NOT NULL,
  `no_mesin` varchar(50) NOT NULL,
  `no_angka` varchar(50) NOT NULL,
  `merk_type` varchar(50) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `photo_bus` varchar(40) NOT NULL,
  `driver` varchar(20) NOT NULL,
  `co_driver` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`kode_bus`, `no_polisi`, `jumlah_kursi`, `jenis_bus`, `no_uji`, `tgl_akhir_uji`, `no_kps`, `tgl_akhir_kps`, `no_mesin`, `no_angka`, `merk_type`, `pemilik`, `photo_bus`, `driver`, `co_driver`) VALUES
('P0002', 'R1545CB', 45, 'PARIWISATA', 'CP-21643', '2019-11-25', 'SK.00141/AJ.202/6/DJPD/2019/100000622-00003', '2020-05-21', 'J08EUFJ91675', 'MJERK8JSKJJN20995', 'HINO/RK8', 'PT RODAMAS SARANA MANDIRI', 'bis2.jpg', '1234567890001', '1234567890003'),
('P0008', 'R1544CB', 45, 'PARIWISATA', 'CP-21642', '2019-11-25', 'SK.00141/AJ.202/6/DJPD/2019/100000622-00002', '2020-05-21', 'J08EUFJ91675', 'MJERK8JSKJJN20995', 'HINO/RK8', 'PT RODAMAS SARANA MANDIRI', 'bis.jpg', '1234567890001', '1234567890003'),
('P0009', 'R1544CB', 45, 'PARIWISATA', 'CP-21642', '2019-11-25', 'SK.00141/AJ.202/6/DJPD/2019/100000622-00002', '2020-05-21', 'J08EUFJ91675', 'MJERK8JSKJJN20995', 'HINO/RK8', 'PT RODAMAS SARANA MANDIRI', 'bis.jpg', '1234567890002', '1234567890004');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int(10) NOT NULL,
  `cabang` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `cabang`, `alamat`, `kontak`) VALUES
(5, 'Purbalingga', 'Jl. Soedirman, Purbalingga', '0873 3943 3434'),
(6, 'Cilacap', 'Jl. xxxx Cilacap', '0893 3949 3434');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesan`
--

CREATE TABLE `detail_pesan` (
  `id` int(11) NOT NULL,
  `id_pesan` varchar(5) NOT NULL,
  `kode_bus` varchar(10) NOT NULL,
  `id_driver` varchar(30) NOT NULL,
  `id_co_driver` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesan`
--

INSERT INTO `detail_pesan` (`id`, `id_pesan`, `kode_bus`, `id_driver`, `id_co_driver`) VALUES
(32, '453cr', 'P0002', '1234567890001', '1234567890003'),
(33, '453cr', 'P0009', '1234567890001', '1234567890004'),
(34, '453cr', 'P0008', '1234567890001', '1234567890003'),
(35, 'cgmxb', 'P0002', '1234567890001', '1234567890003'),
(36, 'cgmxb', 'P0009', '1234567890002', '1234567890004'),
(37, 'cujf5', 'P0009', '1234567890002', '1234567890004'),
(38, 'cujf5', 'P0008', '1234567890001', '1234567890003'),
(39, 'cujf5', 'P0002', '1234567890001', '1234567890003');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `judul` varchar(60) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp(),
  `gambar` varchar(40) DEFAULT NULL,
  `id_album_galeri` int(11) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `author` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `pass` varchar(35) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT 1,
  `karyawan_level` int(10) DEFAULT NULL,
  `id_cabang` varchar(20) NOT NULL,
  `register` timestamp NULL DEFAULT current_timestamp(),
  `photo` varchar(40) DEFAULT NULL,
  `status_login` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `jk`, `alamat`, `username`, `pass`, `email`, `nohp`, `status`, `karyawan_level`, `id_cabang`, `register`, `photo`, `status_login`) VALUES
('1212121212', 'Yazid', 'L', 'Banjarnegara', 'yazid', '202cb962ac59075b964b07152d234b70', 'notosetiyo8@gmail.com', '09889889877', 1, 1, '5', '2019-09-25 01:41:09', '10b5d441b82efbd6d01b358935a96f94.png', 0),
('12345678', 'Administrator', 'L', 'Banjernegara', 'admin', '202cb962ac59075b964b07152d234b70', 'notosetiyo8@gmail.com', '087781966766', 1, 2, '6', '2016-09-03 06:07:55', '73560d6669f8f3bec9109bd83c229a51.png', 0),
('1234567890001', 'Ridho', 'L', 'Banjarnegara', 'rido', '202cb962ac59075b964b07152d234b70', 'notosetiyo8@gmail.com', '09889889877', 1, 5, '5', '2019-09-25 01:41:09', '10b5d441b82efbd6d01b358935a96f94.png', 0),
('1234567890002', 'Minin', 'L', 'Banjarnegara', 'minin', '202cb962ac59075b964b07152d234b70', 'notosetiyo8@gmail.com', '09889889877', 1, 5, '5', '2019-09-25 01:41:09', '10b5d441b82efbd6d01b358935a96f94.png', 0),
('1234567890003', 'Oton', 'L', 'Purbalingga', 'oton', '202cb962ac59075b964b07152d234b70', 'notosetiyo8@gmail.com', '1212121212', 1, 6, '5', '2019-09-23 21:14:18', '46ac6356697ddb5a936e9b2f841251e1.jpg', 0),
('1234567890004', 'Muhem', 'L', 'Purbalingga', 'muhem', '202cb962ac59075b964b07152d234b70', 'notosetiyo8@gmail.com', '1212121212', 1, 6, '5', '2019-09-23 21:14:18', '46ac6356697ddb5a936e9b2f841251e1.jpg', 0),
('1234567890023', 'Ferdy', 'L', 'Purbalingga', 'ferdy', '202cb962ac59075b964b07152d234b70', 'ferdy@gmail.com', '1212121212', 1, 3, '5', '2019-09-23 21:14:18', '46ac6356697ddb5a936e9b2f841251e1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(30) DEFAULT NULL,
  `kategori_tanggal` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `levell`
--

CREATE TABLE `levell` (
  `id` int(10) NOT NULL,
  `levell` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levell`
--

INSERT INTO `levell` (`id`, `levell`) VALUES
(1, 'Owner'),
(2, 'Administrator'),
(3, 'Marketing'),
(4, 'Bendahara'),
(5, 'Driver'),
(6, 'Co-Driver');

-- --------------------------------------------------------

--
-- Table structure for table `operasional`
--

CREATE TABLE `operasional` (
  `id_opr` int(11) NOT NULL,
  `id_pesan` varchar(5) NOT NULL,
  `id_detail_pesan` int(11) NOT NULL,
  `total_sewa` int(11) NOT NULL,
  `cas_solar` int(11) NOT NULL,
  `cas_bongpas_jok` int(11) NOT NULL,
  `biaya_sewa_after_cas` int(11) NOT NULL,
  `fee_sewa` int(11) NOT NULL,
  `biaya_sewa_after_fee` int(11) NOT NULL,
  `ops_pros` int(11) NOT NULL,
  `total_ops` int(11) NOT NULL,
  `bbm` int(11) NOT NULL,
  `total_premi_crew` int(11) NOT NULL,
  `paguyuban` int(11) NOT NULL,
  `premi_diterima_crew` int(11) NOT NULL,
  `driver` int(11) NOT NULL,
  `co_driver` int(11) NOT NULL,
  `margin` int(11) NOT NULL,
  `is_accept` tinyint(1) NOT NULL DEFAULT 0,
  `accepted_by` varchar(30) DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `nik_user` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operasional`
--

INSERT INTO `operasional` (`id_opr`, `id_pesan`, `id_detail_pesan`, `total_sewa`, `cas_solar`, `cas_bongpas_jok`, `biaya_sewa_after_cas`, `fee_sewa`, `biaya_sewa_after_fee`, `ops_pros`, `total_ops`, `bbm`, `total_premi_crew`, `paguyuban`, `premi_diterima_crew`, `driver`, `co_driver`, `margin`, `is_accept`, `accepted_by`, `alasan`, `nik_user`) VALUES
(7, 'lswfu', 11, 7000000, 150000, 0, 6850000, 68500, 6781500, 35, 2373525, 1712500, 661025, 20000, 641025, 427350, 213675, 4407975, 0, NULL, NULL, '12345678'),
(8, 'lswfu', 10, 7000000, 150000, 100000, 6750000, 67500, 6682500, 35, 2338875, 1687500, 651375, 20000, 651375, 420916, 210458, 4343625, 0, NULL, NULL, '12345678'),
(9, '5phpl', 12, 6500000, 150000, 50000, 6300000, 63000, 6237000, 40, 2494800, 1575000, 919800, 20000, 919800, 599866, 299933, 3742200, 0, NULL, NULL, '12345678'),
(10, '453cr', 32, 120000, 0, 0, 120000, 1200, 118800, 35, 41580, 30000, 11580, 0, 11580, 7720, 3860, 77220, 0, NULL, NULL, '12345678'),
(11, '453cr', 33, 120000, 0, 0, 120000, 1200, 118800, 35, 41580, 30000, 11580, 0, 11580, 7720, 3860, 77220, 0, NULL, NULL, '12345678'),
(12, 'cgmxb', 35, 1500000, 0, 0, 1500000, 15000, 1485000, 35, 519750, 375000, 144750, 0, 144750, 96500, 48250, 965250, 0, NULL, NULL, '12345678'),
(13, 'cgmxb', 36, 1500000, 0, 0, 1500000, 15000, 1485000, 35, 519750, 375000, 144750, 0, 144750, 96500, 48250, 965250, 0, NULL, NULL, '12345678'),
(14, 'cujf5', 38, 1200000, 0, 0, 1200000, 12000, 1188000, 35, 415800, 300000, 115800, 0, 115800, 77200, 38600, 772200, 1, '1234567890001', '', '12345678'),
(15, 'cujf5', 39, 1200000, 0, 0, 1200000, 12000, 1188000, 35, 415800, 300000, 115800, 0, 115800, 77200, 38600, 772200, 1, '1234567890001', '', '12345678'),
(16, 'cujf5', 37, 1200000, 0, 0, 1200000, 12000, 1188000, 35, 415800, 300000, 115800, 0, 115800, 77200, 38600, 772200, 1, '1234567890002', '', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nik`, `nama`, `phone`, `email`, `alamat`) VALUES
(1, '033123', 'Dani ', '087837311151', 'd@gmail.com', 'Jl. KS Tubun, Gang masjid No. 45, Kedungbanteng, Karangsalam Kidul, Banyumas'),
(2, '083938', 'Via raunika', '085782320123', 'via@g.com', 'Jl. KS Tubun, Gang masjid No. 45, Kedungbanteng, Karangsalam Kidul, Banyumas'),
(3, '0331625456648', 'Anita Permatasari', '081202395555', 'anita@gmail.com', 'Jl. KS Tubun, Gang masjid No. 45, Kedungbanteng, Karangsalam Kidul, Banyumas'),
(4, '33031812965461', 'Nur Rahmat', '085645104', 'n@gmail.com', 'Jl. soedirman, Maos, Cilacap'),
(5, '330351655464', 'Titi wahyuni', '0854664546', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_pesan` varchar(5) NOT NULL,
  `tgl_bayar` timestamp NOT NULL DEFAULT current_timestamp(),
  `jumlah_bayar` int(11) NOT NULL,
  `metode_bayar` varchar(100) NOT NULL,
  `label` varchar(20) NOT NULL,
  `nik_user` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_pesan`, `tgl_bayar`, `jumlah_bayar`, `metode_bayar`, `label`, `nik_user`) VALUES
(1, '84na9', '2019-10-12 14:16:53', 500000, 'Transfer', 'DP', '12345678'),
(2, '84na9', '2019-10-12 14:20:27', 1200000, 'Tunai', 'Angsuran', '12345678'),
(3, '84na9', '2019-10-12 14:20:54', 800000, 'Transfer', 'Lunas', '12345678'),
(4, 'bauxu', '2019-10-12 14:21:59', 3500000, 'Tunai', 'DP', '12345678'),
(6, '03232', '2019-10-13 15:16:53', 400000, 'Tunai', 'DP', '12345678'),
(7, '03232', '2019-10-14 13:18:04', 500000, 'Tunai', 'Angsuran', '12345678'),
(8, '03232', '2019-10-14 13:21:03', 600000, 'Tunai', 'Angsuran', '12345678'),
(9, '03232', '2019-10-14 13:25:58', 500000, 'Tunai', 'Angsuran', '12345678'),
(10, '03232', '2019-10-14 13:26:52', 500000, 'Tunai', 'Angsuran', '12345678'),
(11, '03232', '2019-10-14 13:27:41', 500000, 'Transfer', 'Angsuran', '12345678'),
(12, '03232', '2019-10-14 13:30:12', 1000000, 'Tunai', 'Angsuran', '12345678'),
(13, '03232', '2019-10-14 13:50:02', 30000000, 'Tunai', 'Lunas', '12345678'),
(14, 'jctp3', '2019-10-14 14:18:26', 500000, 'Transfer', 'DP', '12345678'),
(15, 'jctp3', '2019-10-14 14:53:45', 1800000, 'Transfer', 'Lunas', '12345678'),
(16, 'e1g9x', '2019-10-18 13:34:48', 500000, 'Tunai', 'DP', '12345678'),
(17, 'e1g9x', '2019-10-19 15:54:22', 3000000, 'Tunai', 'Lunas', '12345678'),
(18, 'wqjhj', '2019-11-19 01:05:30', 500000, 'Tunai', 'Lunas', '12345678'),
(19, 'wqjhj', '2019-11-19 01:05:46', 500000, 'Tunai', 'DP', '12345678'),
(20, 'wqjhj', '2019-11-19 01:11:36', 1250000, 'Transfer', 'Lunas', '12345678'),
(21, 'ixsy9', '2019-11-19 11:51:39', 500000, 'Transfer', 'Lunas', '12345678'),
(22, 'ixsy9', '2019-11-19 11:52:00', 1000000, 'Tunai', 'Lunas', '12345678'),
(23, 'irmwx', '2019-11-19 12:05:08', 6000000, 'Tunai', 'Lunas', '12345678'),
(24, '9vy2z', '2019-11-19 12:13:17', 400000, 'Transfer', 'Lunas', '12345678'),
(25, '9vy2z', '2019-11-19 12:13:43', 1000000, 'Tunai', 'Lunas', '12345678'),
(26, '9vy2z', '2019-11-19 12:23:23', 500000, 'Tunai', 'Lunas', '12345678'),
(27, '9vy2z', '2019-11-19 12:23:44', 500000, 'Tunai', 'Lunas', '12345678'),
(28, '9t19n', '2019-11-19 12:31:44', 500000, 'Tunai', 'Lunas', '12345678'),
(29, '9t19n', '2019-11-19 13:49:46', 500000, 'Tunai', 'Lunas', '12345678'),
(30, '9t19n', '2019-11-19 13:50:22', 200000, 'Tunai', 'Lunas', '12345678'),
(31, '9t19n', '2019-11-19 13:52:01', 100000, 'Transfer', 'Lunas', '12345678'),
(32, '9t19n', '2019-11-19 13:54:08', 600000, 'Tunai', 'Lunas', '12345678'),
(33, '9t19n', '2019-11-19 13:54:22', 500000, 'Transfer', 'Lunas', '12345678'),
(34, 'leo0d', '2019-11-23 01:00:01', 1500000, 'Tunai', 'Lunas', '12345678'),
(35, 'leo0d', '2019-11-23 01:00:54', 3000000, 'Transfer', 'Lunas', '12345678'),
(36, 'lswfu', '2019-11-24 16:08:41', 14000000, 'Tunai', 'Lunas', '12345678'),
(37, '5phpl', '2019-11-24 16:16:13', 19500000, 'Tunai', 'Lunas', '12345678'),
(38, 'cgmxb', '2019-12-07 02:41:17', 3000000, 'Tunai', 'Lunas', '12345678'),
(39, 'cujf5', '2019-12-08 14:30:18', 3600000, 'Tunai', 'Lunas', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `pengunjung_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `pengunjung_ip` varchar(40) DEFAULT NULL,
  `pengunjung_perangkat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`pengunjung_id`, `pengunjung_tanggal`, `pengunjung_ip`, `pengunjung_perangkat`) VALUES
(1, '2019-09-08 16:52:20', '127.0.0.1', 'Chrome'),
(2, '2019-09-14 14:49:58', '::1', 'Chrome'),
(3, '2019-09-14 17:01:07', '::1', 'Chrome'),
(4, '2019-09-15 21:49:54', '::1', 'Chrome'),
(5, '2019-09-24 20:47:02', '::1', 'Chrome'),
(6, '2019-09-25 20:56:05', '::1', 'Chrome'),
(7, '2019-09-29 01:37:23', '::1', 'Chrome'),
(8, '2019-10-01 12:41:24', '::1', 'Chrome'),
(9, '2019-10-02 09:51:16', '::1', 'Chrome'),
(10, '2019-12-16 22:23:28', '::1', 'Chrome');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesan` varchar(5) NOT NULL,
  `no_pesan` varchar(5) NOT NULL,
  `id_pelanggan` varchar(30) NOT NULL,
  `acara` text NOT NULL,
  `penjemputan` text NOT NULL,
  `lokasi_tujuan` text NOT NULL,
  `order_dari` varchar(200) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `jam_penjemputan` time NOT NULL,
  `tgl_pulang` date NOT NULL,
  `jumlah_bus` int(2) NOT NULL,
  `lama_sewa` int(3) NOT NULL,
  `tarif_sewa` int(11) NOT NULL,
  `biaya_tambahan` int(11) NOT NULL DEFAULT 0,
  `fee_marketing` int(11) NOT NULL DEFAULT 0,
  `opr` int(11) NOT NULL DEFAULT 0,
  `nik_user` varchar(30) NOT NULL,
  `id_cabang` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesan`, `no_pesan`, `id_pelanggan`, `acara`, `penjemputan`, `lokasi_tujuan`, `order_dari`, `tgl_pesan`, `tgl_berangkat`, `jam_penjemputan`, `tgl_pulang`, `jumlah_bus`, `lama_sewa`, `tarif_sewa`, `biaya_tambahan`, `fee_marketing`, `opr`, `nik_user`, `id_cabang`) VALUES
('cujf5', '91884', '083938', 'Pernikahan', 'TEja', 'Buka', '', '2019-12-07', '2019-12-27', '06:30:00', '2019-12-14', 3, 1, 1200000, 0, 0, 0, '12345678', 6),
('cgmxb', '01426', '033123', 'Kunjungan industri', 'Amikom', 'Purbalingga', '', '2019-12-07', '2019-12-14', '06:30:00', '2019-12-07', 2, 1, 1500000, 0, 0, 0, '12345678', 6),
('453cr', '67992', '083938', 'Kunjungan industri', 'Depan Amikom', 'Industri purbalingga', '', '2019-12-03', '2019-12-31', '06:59:00', '2019-12-07', 3, 1, 120000, 0, 0, 0, '12345678', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_nama` varchar(40) DEFAULT NULL,
  `inbox_email` varchar(60) DEFAULT NULL,
  `inbox_kontak` varchar(20) DEFAULT NULL,
  `inbox_pesan` text DEFAULT NULL,
  `inbox_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `inbox_status` int(11) DEFAULT 1 COMMENT '1=Belum dilihat, 0=Telah dilihat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_rating`
--

CREATE TABLE `tbl_post_rating` (
  `rate_id` int(11) NOT NULL,
  `rate_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `rate_ip` varchar(40) DEFAULT NULL,
  `rate_point` int(11) DEFAULT NULL,
  `rate_id_berita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post_rating`
--

INSERT INTO `tbl_post_rating` (`rate_id`, `rate_tanggal`, `rate_ip`, `rate_point`, `rate_id_berita`) VALUES
(9, '2019-09-15 13:52:23', '::1', 1, 34),
(10, '2019-09-15 14:03:29', '::1', 2, 35);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_views`
--

CREATE TABLE `tbl_post_views` (
  `views_id` int(11) NOT NULL,
  `views_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `views_ip` varchar(40) DEFAULT NULL,
  `views_id_berita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post_views`
--

INSERT INTO `tbl_post_views` (`views_id`, `views_tanggal`, `views_ip`, `views_id_berita`) VALUES
(55, '2019-08-31 11:29:05', '::1', 30),
(56, '2019-08-31 11:29:06', '::1', 0),
(57, '2019-08-31 11:31:54', '::1', 32),
(63, '2019-09-14 15:50:39', '::1', 31),
(64, '2019-09-14 16:08:02', '::1', 30),
(65, '2019-09-14 16:14:24', '::1', 34),
(66, '2019-09-14 17:01:07', '::1', 31),
(67, '2019-09-15 02:45:43', '::1', 30),
(68, '2019-09-15 09:05:24', '::1', 34),
(69, '2019-09-15 12:30:13', '::1', 0),
(70, '2019-09-15 14:03:01', '::1', 35),
(71, '2019-09-15 14:05:32', '::1', 36),
(72, '2019-09-16 01:13:52', '::1', 34),
(73, '2019-09-25 21:40:52', '::1', 0),
(74, '2019-09-25 21:42:50', '::1', 39),
(75, '2019-09-29 01:37:40', '::1', 0),
(76, '2019-09-29 07:21:55', '::1', 42),
(77, '2019-10-01 12:41:24', '::1', 39),
(78, '2019-10-01 13:00:59', '::1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `album_photos`
--
ALTER TABLE `album_photos`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `album_pengguna_id` (`nik`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`kode_bus`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `galeri_album_id` (`id_album_galeri`),
  ADD KEY `galeri_pengguna_id` (`nik`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `karyawan_level` (`karyawan_level`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `levell`
--
ALTER TABLE `levell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operasional`
--
ALTER TABLE `operasional`
  ADD PRIMARY KEY (`id_opr`),
  ADD UNIQUE KEY `id_detail_pesan` (`id_detail_pesan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `tbl_post_rating`
--
ALTER TABLE `tbl_post_rating`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `tbl_post_views`
--
ALTER TABLE `tbl_post_views`
  ADD PRIMARY KEY (`views_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `album_photos`
--
ALTER TABLE `album_photos`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `levell`
--
ALTER TABLE `levell`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `operasional`
--
ALTER TABLE `operasional`
  MODIFY `id_opr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_post_rating`
--
ALTER TABLE `tbl_post_rating`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_post_views`
--
ALTER TABLE `tbl_post_views`
  MODIFY `views_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
