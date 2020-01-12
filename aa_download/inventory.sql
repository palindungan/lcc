-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2020 pada 14.59
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_garansi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_garansi` (
`id_penjualan` char(12)
,`id_toko` char(2)
,`nama_customer` varchar(50)
,`nama_barang` varchar(50)
,`tanggal` timestamp
,`kode_unik` varchar(30)
,`garansi_berjalan` int(7)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_habis_toko`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_habis_toko` (
`nama` varchar(50)
,`stok` decimal(32,0)
,`id_toko` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_kasir`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_kasir` (
`id_stok_b` int(7)
,`kode_unik` varchar(30)
,`nama_barang` varchar(50)
,`tanggal` timestamp
,`id_toko` char(2)
,`hrg_distributor` int(10)
,`qty` int(3)
,`nama_distributor` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_terdaftar`
--

CREATE TABLE `barang_terdaftar` (
  `kode` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_terdaftar`
--

INSERT INTO `barang_terdaftar` (`kode`, `nama`) VALUES
('B00001', 'Lenovo Ideapad 330'),
('B00002', 'Asus Tuf'),
('B00003', 'Flashdisk toshiba 32 gb'),
('B00004', 'Keyboard Logitech X2'),
('B00005', 'Vivo 17 Pro'),
('B00006', 'Realme 3 Pro'),
('B00007', 'Acer Swift 3'),
('B00008', 'Asus Core i3'),
('B00009', 'OPPO f9'),
('B00010', 'Printer Epson Scan'),
('B00011', 'Flasdis Toshiba Ram 16'),
('B00012', 'ROG Strix 512'),
('B00013', 'Acer Aspire 3'),
('B00014', 'Sandisk 32 gb'),
('B00015', 'Asus Core 15'),
('B00016', 'Keyboard Alcatroz'),
('B00017', 'Hardisk Baracuda'),
('B00018', 'Keyboard Mechanical'),
('B00019', 'Flashdisk toshiba 64 gb '),
('B00020', 'Acer Swift 5 '),
('B00021', 'Mouse Toshiba U20'),
('B00022', 'Mousepad'),
('B00023', 'Usb Printer 1.5m'),
('B00024', 'Tinta BP K'),
('B00025', 'Epson L31110'),
('B00026', 'Tas Ultimate 12\"'),
('B00027', 'SPK Simbadda cst 500N+'),
('B00028', 'Mouse Crown'),
('B00029', 'NTB Asus X441MA-GA011T'),
('B00030', 'NTB Asus E402YA-BA202T'),
('B00031', 'Lcd Pro+Key Pro'),
('B00032', 'VGA Splitter 4port NYK');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_terdaftar_semua`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_terdaftar_semua` (
`kode` char(6)
,`nama` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_terjual_bulan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_terjual_bulan` (
`qty` int(3)
,`nama` varchar(50)
,`tanggal` timestamp
,`kode` char(6)
,`id_toko` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_terjual_minggu`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_terjual_minggu` (
`qty` int(3)
,`nama` varchar(50)
,`tanggal` timestamp
,`kode` char(6)
,`id_toko` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_terjual_tahun`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_terjual_tahun` (
`qty` int(3)
,`nama` varchar(50)
,`tanggal` timestamp
,`kode` char(6)
,`id_toko` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_toko`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_toko` (
`kode` char(6)
,`id_stok_b` int(7)
,`stok` decimal(32,0)
,`kode_unik` varchar(30)
,`nama` varchar(50)
,`id_toko` char(2)
,`hrg_distributor` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_toko_barcode`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_toko_barcode` (
`id_stok_b` int(7)
,`kode_unik` varchar(30)
,`nama_barang` varchar(50)
,`tanggal` timestamp
,`id_toko` char(2)
,`hrg_distributor` int(10)
,`qty` int(3)
,`nama_distributor` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `best_sell_bulan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `best_sell_bulan` (
`jumlah_terjual` decimal(32,0)
,`nama` varchar(50)
,`id_toko` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `best_sell_minggu`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `best_sell_minggu` (
`jumlah_terjual` decimal(32,0)
,`nama` varchar(50)
,`id_toko` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `best_sell_tahun`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `best_sell_tahun` (
`jumlah_terjual` decimal(32,0)
,`nama` varchar(50)
,`id_toko` char(2)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` char(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `no_hp`) VALUES
('C1210190001', 'Adi', '08967585823'),
('C1210190002', 'Ali ', '0872142712'),
('C1410190003', 'safri', '0896876875'),
('C1510190004', 'Hambali', '0899123686'),
('C1510190005', 'Afrilian', '08978712351'),
('C1710190006', 'rahmat', '0878135161'),
('C1710190007', 'aisyah', '089162812551'),
('C1810190008', 'kika', '08746238152'),
('C1911020001', 'ali', '08772347'),
('C1911030001', 'dani', '089791528'),
('C1911030002', 'zeus', '099696123'),
('C1911100001', 'adi', '098567342'),
('C1911100002', 'asd', '73412313213'),
('C1911180001', 'asd', '122213'),
('C2001110001', 'ali rahmat', '082213123123'),
('C2001110002', 'Rizkika', '08212213123'),
('C2001120001', 'Ali', '089995425676');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_pj` int(7) NOT NULL,
  `id_penjualan` char(12) NOT NULL,
  `id_stok_b` char(7) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `total_hrg` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_pj`, `id_penjualan`, `id_stok_b`, `harga_jual`, `qty`, `total_hrg`) VALUES
(1, 'P1210190001', '4', 150000, 1, 150000),
(2, 'P1210190002', '24', 100000, 1, 100000),
(3, 'P1410190003', '24', 100000, 1, 100000),
(4, 'P1510190004', '24', 1000000, 1, 1000000),
(5, 'P1510190005', '6', 3500000, 1, 3500000),
(6, 'P1710190006', '4', 150000, 1, 150000),
(7, 'P1710190007', '5', 250000, 1, 250000),
(8, 'P1810190008', '15', 3000000, 1, 3000000),
(9, 'P1911020001', '4', 120000, 1, 120000),
(10, 'P1911030001', '33', 100000, 2, 200000),
(11, 'P1911030002', '4', 150000, 1, 150000),
(12, 'P1911100001', '31', 850000, 1, 850000),
(13, 'P1911100002', '31', 850000, 1, 850000),
(14, 'P1911180001', '31', 850000, 1, 850000),
(15, 'P2001110001', '37', 150000, 1, 150000),
(16, 'P2001110002', '31', 900000, 1, 900000),
(17, 'P2001110002', '37', 200000, 1, 200000),
(18, 'P2001120001', '41', 30000, 2, 60000);

--
-- Trigger `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `update_stok_pengurangan` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
    UPDATE stok_barang SET stok_barang.qty = stok_barang.qty - new.qty WHERE id_stok_b=new.id_stok_b; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` char(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama`, `alamat`, `no_hp`) VALUES
('D01', 'PT surya jaya', 'jember', '089821312'),
('D02', 'PT Cemerlang Jaya', 'Probolinggo', '089682135'),
('D03', 'PT Hitech', 'Suarabaya', '0872312312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasokan`
--

CREATE TABLE `pemasokan` (
  `id_pemasokan` char(11) NOT NULL,
  `id_user` char(3) NOT NULL,
  `id_distributor` char(3) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasokan`
--

INSERT INTO `pemasokan` (`id_pemasokan`, `id_user`, `id_distributor`, `tanggal`, `total`) VALUES
('M0310190001', 'U04', 'D02', '2019-10-03 01:53:09', 21500000),
('M0310190002', 'U05', 'D02', '2019-10-03 02:15:22', 10500000),
('M0310190003', 'U06', 'D01', '2019-10-03 02:18:45', 9500000),
('M1210190004', 'U04', 'D01', '2019-10-12 02:38:06', 6000000),
('M1210190005', 'U05', 'D02', '2019-10-12 02:49:09', 13980000),
('M1210190006', 'U06', 'D02', '2019-10-12 02:54:54', 7500000),
('M1210190007', 'U04', 'D01', '2019-10-12 06:29:45', 23050000),
('M1910190001', 'U04', 'D03', '2019-10-19 01:29:38', 6100000),
('M1910190002', 'U05', 'D02', '2019-10-19 01:42:45', 8000000),
('M1910190003', 'U04', 'D02', '2019-10-19 01:47:41', 6000000),
('M1910190004', 'U06', 'D01', '2019-10-19 01:49:01', 5000000),
('M1911020001', 'U04', 'D01', '2020-01-12 13:57:49', 1650000),
('M1911020002', 'U04', 'D02', '2019-11-02 06:34:57', 450000),
('M1911030001', 'U04', 'D02', '2019-11-03 12:20:03', 850000),
('M1911030002', 'U04', 'D01', '2019-11-03 13:47:43', 5100000),
('M1911180001', 'U04', 'D01', '2019-11-18 04:59:02', 250000),
('M2001110001', 'U04', 'D01', '2020-01-11 06:00:31', 5150000),
('M2001120001', 'U04', 'D03', '2020-01-12 13:32:58', 12885000),
('M2001120002', 'U04', 'D01', '2020-01-12 13:51:48', 17000000);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `pemasokan_list`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `pemasokan_list` (
`id_pemasokan` char(11)
,`tanggal` timestamp
,`total` int(10)
,`id_distributor` char(3)
,`nama` varchar(50)
,`id_user` char(3)
,`nama_user` varchar(50)
,`id_toko` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `pemasokan_list_detail`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `pemasokan_list_detail` (
`id_pemasokan` char(11)
,`nama` varchar(50)
,`qty` int(3)
,`hrg_distributor` int(10)
,`total_hrg` int(10)
,`kode_unik` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_lain`
--

CREATE TABLE `pengeluaran_lain` (
  `id_pengeluaran_l` char(11) NOT NULL,
  `id_user` char(3) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total` int(10) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran_lain`
--

INSERT INTO `pengeluaran_lain` (`id_pengeluaran_l`, `id_user`, `tanggal`, `total`, `deskripsi`) VALUES
('L1210190001', 'U04', '2019-10-11 18:51:42', 200000, 'Pembayaran WIFI'),
('L1410190002', 'U04', '2019-10-14 13:50:35', 100000, 'Pembayaran Listrik'),
('L1510190003', 'U04', '2019-10-15 14:14:23', 300000, 'Pembayaran Listrik'),
('L1510190004', 'U04', '2019-10-15 15:17:01', 200000, 'Pembelian alat sholat'),
('L1710190005', 'U04', '2019-10-16 18:38:36', 100000, 'pembayaran PDAM'),
('L1911020001', 'U04', '2019-11-02 06:34:01', 50000, 'Ongkos Kirim Pemasokan Kode : M1911020001'),
('L1911020002', 'U04', '2019-11-02 06:34:57', 50000, 'Ongkos Kirim Pemasokan Kode : M1911020002'),
('L1911030001', 'U04', '2019-11-03 12:20:03', 50000, 'Ongkos Kirim Pemasokan Kode : M1911030001'),
('L1911030002', 'U04', '2019-11-03 13:47:43', 100000, 'Ongkos Kirim PT surya jaya'),
('L1911180001', 'U04', '2019-11-18 04:59:02', 50000, 'Ongkos Kirim PT surya jaya'),
('L1911180002', 'U04', '2019-11-18 05:02:02', 50000, 'Beli Rokok dan makan'),
('L2001110001', 'U04', '2020-01-11 06:00:31', 50000, 'Ongkos Kirim PT surya jaya'),
('L2001120001', 'U04', '2020-01-12 13:32:58', 100000, 'Ongkos Kirim PT Hitech'),
('L2001120002', 'U04', '2020-01-12 13:51:48', 100000, 'Ongkos Kirim PT surya jaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` char(12) NOT NULL,
  `id_user` char(3) NOT NULL,
  `id_customer` char(12) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total` int(10) NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembalian` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_user`, `id_customer`, `tanggal`, `total`, `bayar`, `kembalian`) VALUES
('P1210190001', 'U01', 'C1210190001', '2019-10-12 04:43:19', 150000, 200000, 50000),
('P1210190002', 'U01', 'C1210190002', '2019-10-11 18:35:54', 100000, 100000, 0),
('P1410190003', 'U01', 'C1410190003', '2019-10-14 14:01:08', 100000, 200000, 100000),
('P1510190004', 'U01', 'C1510190004', '2019-10-15 13:42:36', 1000000, 1000000, 0),
('P1510190005', 'U01', 'C1510190005', '2019-10-15 13:58:39', 3500000, 4000000, 500000),
('P1710190006', 'U01', 'C1710190006', '2019-10-16 17:36:02', 150000, 150000, 0),
('P1710190007', 'U01', 'C1710190007', '2019-10-16 18:41:12', 250000, 250000, 0),
('P1810190008', 'U01', 'C1810190008', '2019-10-17 17:16:37', 3000000, 3000000, 0),
('P1911020001', 'U01', 'C1911020001', '2019-11-02 06:40:58', 120000, 150000, 30000),
('P1911030001', 'U01', 'C1911030001', '2019-11-03 12:56:28', 200000, 200000, 0),
('P1911030002', 'U01', 'C1911030002', '2019-11-03 13:37:37', 150000, 150000, 0),
('P1911100001', 'U01', 'C1911100001', '2019-11-10 13:22:17', 850000, 850000, 0),
('P1911100002', 'U01', 'C1911100002', '2019-11-10 13:23:11', 850000, 850000, 0),
('P1911180001', 'U01', 'C1911180001', '2019-11-18 14:23:09', 850000, 900000, 50000),
('P2001110001', 'U01', 'C2001110001', '2020-01-11 07:00:15', 150000, 200000, 50000),
('P2001110002', 'U01', 'C2001110002', '2020-01-11 07:01:49', 1100000, 1500000, 400000),
('P2001120001', 'U01', 'C2001120001', '2020-01-12 13:35:25', 60000, 100000, 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id_user_p` int(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `jenis_akses` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pimpinan`
--

INSERT INTO `pimpinan` (`id_user_p`, `nama`, `username`, `password`, `jenis_akses`) VALUES
(1, 'kika', 'kika', '$2y$10$d5oemiM1PTCpefGgJb/ys.F3mtftDILSfnsgR9S13Ek6aU4qRmlyu', 'Pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_stok_b` int(7) NOT NULL,
  `id_pemasokan` char(11) NOT NULL,
  `kode` char(6) NOT NULL,
  `qty` int(3) NOT NULL,
  `hrg_distributor` int(10) NOT NULL,
  `total_hrg` int(10) NOT NULL,
  `kode_unik` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_barang`
--

INSERT INTO `stok_barang` (`id_stok_b`, `id_pemasokan`, `kode`, `qty`, `hrg_distributor`, `total_hrg`, `kode_unik`) VALUES
(1, 'M0310190001', 'B00001', 1, 5000000, 5000000, 'LKM11000KA'),
(2, 'M0310190001', 'B00002', 1, 4000000, 4000000, 'ZXC100912M'),
(3, 'M0310190001', 'B00001', 1, 5000000, 5000000, 'MKL100MA1'),
(4, 'M0310190001', 'B00003', 1, 100000, 500000, 'LCC0310190001'),
(5, 'M0310190001', 'B00004', 4, 200000, 1000000, 'LCC0310190002'),
(6, 'M0310190001', 'B00005', 0, 3000000, 3000000, '582135128236'),
(7, 'M0310190001', 'B00006', 1, 3000000, 3000000, '353682391692'),
(8, 'M0310190002', 'B00007', 1, 6000000, 6000000, 'LK99897MA'),
(9, 'M0310190002', 'B00002', 1, 4000000, 4000000, 'XM31298PX'),
(10, 'M0310190002', 'B00003', 5, 100000, 500000, 'CMC0310190001'),
(11, 'M0310190003', 'B00002', 1, 4000000, 4000000, 'LK9983123M'),
(12, 'M0310190003', 'B00001', 1, 5000000, 5000000, 'ZXC123981X'),
(13, 'M0310190003', 'B00003', 5, 100000, 500000, 'PBL0310190001'),
(14, 'M1210190004', 'B00002', 1, 3500000, 3500000, 'ZXC1000292M'),
(15, 'M1210190004', 'B00006', 0, 2500000, 2500000, '36482182698'),
(16, 'M1210190005', 'B00008', 1, 5000000, 5000000, 'MN123456'),
(17, 'M1210190005', 'B00009', 2, 4000000, 8000000, 'MH16789'),
(18, 'M1210190005', 'B00010', 1, 900000, 900000, 'NM2157'),
(19, 'M1210190005', 'B00011', 1, 80000, 80000, 'MI378267'),
(20, 'M1210190006', 'B00007', 1, 3500000, 3500000, 'PLX981286L'),
(21, 'M1210190006', 'B00001', 1, 4000000, 4000000, 'XPA12931P'),
(22, 'M1210190007', 'B00001', 1, 3000000, 3000000, 'ZXBA1000MN'),
(23, 'M1210190007', 'B00012', 1, 20000000, 20000000, 'ZXF9821826'),
(24, 'M1210190007', 'B00003', 0, 50000, 150000, 'LCC1210190001'),
(25, 'M1910190001', 'B00013', 1, 6000000, 6000000, 'DKL100010LX'),
(26, 'M1910190001', 'B00014', 5, 100000, 500000, 'LCC1910190001'),
(27, 'M1910190002', 'B00015', 1, 7000000, 7000000, 'JGK1001298'),
(28, 'M1910190002', 'B00016', 5, 200000, 1000000, 'CMC1910190001'),
(29, 'M1910190003', 'B00017', 3, 2000000, 6000000, 'LCC1910190002'),
(30, 'M1910190004', 'B00018', 5, 1000000, 5000000, 'PBL1910190001'),
(31, 'M1911020001', 'B00019', 6, 150000, 1500000, 'LCC1911020001'),
(32, 'M1911020002', 'B00019', 5, 400000, 2000000, 'LCC1911020002'),
(33, 'M1911030001', 'B00019', 8, 80000, 800000, 'LCC1911030001'),
(34, 'M1911030002', 'B00020', 1, 5000000, 5000000, 'DFL00120281KL'),
(35, 'M1911180001', 'B00003', 2, 100000, 200000, 'LCC1911180001'),
(36, 'M2001110001', 'B00001', 1, 5000000, 5000000, 'E9121X1213'),
(37, 'M2001110001', 'B00003', 18, 100000, 2000000, 'LCC2001110001'),
(38, 'M2001120001', 'B00021', 10, 60000, 600000, 'LCC2001120001'),
(39, 'M2001120001', 'B00022', 5, 10000, 50000, 'LCC2001120002'),
(40, 'M2001120001', 'B00023', 5, 7000, 35000, 'LCC2001120003'),
(41, 'M2001120001', 'B00024', 3, 30000, 150000, 'LCC2001120004'),
(42, 'M2001120001', 'B00025', 5, 2250000, 11250000, 'ED4D44DAFAR5'),
(43, 'M2001120001', 'B00026', 5, 100000, 500000, 'LCC2001120005'),
(44, 'M2001120001', 'B00027', 10, 30000, 300000, 'EDHFIAHFEHFFH'),
(45, 'M2001120002', 'B00028', 20, 40000, 800000, 'LCC2001120006'),
(46, 'M2001120002', 'B00029', 1, 5000000, 5000000, 'HSGDA62G323G'),
(47, 'M2001120002', 'B00024', 5, 60000, 300000, 'LCC2001120007'),
(48, 'M2001120002', 'B00030', 1, 5000000, 5000000, 'JA932U3HH3H3F'),
(49, 'M2001120002', 'B00031', 8, 400000, 3200000, 'LCC2001120008'),
(50, 'M2001120002', 'B00032', 9, 300000, 2700000, 'LCC2001120009');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `stok_toko_cmc`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `stok_toko_cmc` (
`id_stok_b` int(7)
,`kode_unik` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `stok_toko_lcc`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `stok_toko_lcc` (
`id_stok_b` int(7)
,`kode_unik` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `stok_toko_pbl`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `stok_toko_pbl` (
`id_stok_b` int(7)
,`kode_unik` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` char(2) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat`) VALUES
('T1', 'LCC Komputer', 'Jln Alun alun selatan'),
('T2', 'CMC Komputer', 'Jln PB Sudirman '),
('T3', 'Toko Probolinggo', 'Jln raya Probolinggo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` char(3) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `jenis_akses` enum('Manager','Kasir') NOT NULL,
  `id_toko` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `jenis_akses`, `id_toko`) VALUES
('U01', 'rizalx', 'rizalx', '', 'Manager', 'T1'),
('U02', 'ari', 'ari', '$2y$10$Al.0835m/wPVdDRsoe4FX.4YqSRPnM1MqtlIRrxnSiJCDKaPzqquG', 'Manager', 'T1'),
('U03', 'ali', 'ali', '$2y$10$.jbQ4C5IOENSgud9wLmysuPH3FJozcAUSn9AykCCK1ybT7YjaKHiq', 'Kasir', 'T1'),
('U04', 'lcc', 'lcc', '$2y$10$I/jPGZBxFBBZLSi.cHy8vu6EyWiF6eMQTzm3Fr8/1TShu4BOfO7pW', 'Manager', 'T1'),
('U05', 'cmc', 'cmc', '$2y$10$TP/pbjztFeKtQ7TbK3HPkOxDT7NTXzdHuKGkYRo37UeOKx6e4fe5.', 'Manager', 'T2'),
('U06', 'probolinggo', 'probolinggo', '$2y$10$2rB0B0X.lVTbImG.lp2LFOv4JZnAehgKfM6jlDTSkDxv.w/2PVEFa', 'Manager', 'T3'),
('U07', 'kasir_lcc', 'kasir_lcc', '$2y$10$C.IbD1aPGJmM6Fr2StwLmej5PkrKOIl74nmmWBGEsyibiY8DEMzcq', 'Kasir', 'T1'),
('U08', 'kasir_cmc', 'kasir_cmc', '$2y$10$kU3oINfhVVIi/NPIRiQC3.bhLbO7di.GQDuq5J92dowEoKOJYbvjq', 'Kasir', 'T2'),
('U09', 'kasir_probolinggo', 'kasir_probolinggo', '$2y$10$qJpFja9mbKbMavlDx/t0BO74EU8ioS9hG/iVJTavPMfp2AnieUUi6', 'Kasir', 'T3'),
('U10', 'ali_lcc', 'ali_lcc', '$2y$10$UNbOL2uvkowM6w2VrofIcOdD5hYu4FQc4bNG.GuHSuJFzJgujJX0S', 'Kasir', 'T1'),
('U11', 'asdx', 'asdp12', '', 'Kasir', 'T1');

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_garansi`
--
DROP TABLE IF EXISTS `barang_garansi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_garansi`  AS  select `p`.`id_penjualan` AS `id_penjualan`,`t`.`id_toko` AS `id_toko`,`c`.`nama` AS `nama_customer`,`bt`.`nama` AS `nama_barang`,`p`.`tanggal` AS `tanggal`,`sb`.`kode_unik` AS `kode_unik`,(to_days(now()) - to_days(`p`.`tanggal`)) AS `garansi_berjalan` from ((((((`detail_penjualan` `dp` join `stok_barang` `sb` on((`dp`.`id_stok_b` = `sb`.`id_stok_b`))) join `barang_terdaftar` `bt` on((`sb`.`kode` = `bt`.`kode`))) join `penjualan` `p` on((`dp`.`id_penjualan` = `p`.`id_penjualan`))) join `customer` `c` on((`p`.`id_customer` = `c`.`id_customer`))) join `user` `u` on((`p`.`id_user` = `u`.`id_user`))) join `toko` `t` on((`u`.`id_toko` = `t`.`id_toko`))) where ((substr(`sb`.`kode_unik`,1,3) <> 'LCC') and (substr(`sb`.`kode_unik`,1,3) <> 'CMC') and (substr(`sb`.`kode_unik`,1,3) <> 'PBL')) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_habis_toko`
--
DROP TABLE IF EXISTS `barang_habis_toko`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_habis_toko`  AS  select `barang_terdaftar`.`nama` AS `nama`,sum(`stok_barang`.`qty`) AS `stok`,`user`.`id_toko` AS `id_toko` from ((((`stok_barang` join `barang_terdaftar` on((`stok_barang`.`kode` = `barang_terdaftar`.`kode`))) join `pemasokan` on((`stok_barang`.`id_pemasokan` = `pemasokan`.`id_pemasokan`))) join `user` on((`pemasokan`.`id_user` = `user`.`id_user`))) join `toko` on((`user`.`id_toko` = `toko`.`id_toko`))) group by `barang_terdaftar`.`nama`,`user`.`id_toko` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_kasir`
--
DROP TABLE IF EXISTS `barang_kasir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_kasir`  AS  select `stok_barang`.`id_stok_b` AS `id_stok_b`,`stok_barang`.`kode_unik` AS `kode_unik`,`barang_terdaftar`.`nama` AS `nama_barang`,`pemasokan`.`tanggal` AS `tanggal`,`user`.`id_toko` AS `id_toko`,`stok_barang`.`hrg_distributor` AS `hrg_distributor`,`stok_barang`.`qty` AS `qty`,`distributor`.`nama` AS `nama_distributor` from (((((`stok_barang` join `barang_terdaftar` on((`stok_barang`.`kode` = `barang_terdaftar`.`kode`))) join `pemasokan` on((`stok_barang`.`id_pemasokan` = `pemasokan`.`id_pemasokan`))) join `distributor` on((`pemasokan`.`id_distributor` = `distributor`.`id_distributor`))) join `user` on((`pemasokan`.`id_user` = `user`.`id_user`))) join `toko` on((`user`.`id_toko` = `toko`.`id_toko`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_terdaftar_semua`
--
DROP TABLE IF EXISTS `barang_terdaftar_semua`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terdaftar_semua`  AS  select `bt`.`kode` AS `kode`,`bt`.`nama` AS `nama` from `barang_terdaftar` `bt` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_terjual_bulan`
--
DROP TABLE IF EXISTS `barang_terjual_bulan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terjual_bulan`  AS  select `detail_penjualan`.`qty` AS `qty`,`barang_terdaftar`.`nama` AS `nama`,`penjualan`.`tanggal` AS `tanggal`,`stok_barang`.`kode` AS `kode`,`user`.`id_toko` AS `id_toko` from (((((`detail_penjualan` join `penjualan` on((`detail_penjualan`.`id_penjualan` = `penjualan`.`id_penjualan`))) join `stok_barang` on((`detail_penjualan`.`id_stok_b` = `stok_barang`.`id_stok_b`))) join `barang_terdaftar` on((`stok_barang`.`kode` = `barang_terdaftar`.`kode`))) join `user` on((`penjualan`.`id_user` = `user`.`id_user`))) join `toko` on((`user`.`id_toko` = `toko`.`id_toko`))) where (month(`penjualan`.`tanggal`) = month(curdate())) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_terjual_minggu`
--
DROP TABLE IF EXISTS `barang_terjual_minggu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terjual_minggu`  AS  select `detail_penjualan`.`qty` AS `qty`,`barang_terdaftar`.`nama` AS `nama`,`penjualan`.`tanggal` AS `tanggal`,`stok_barang`.`kode` AS `kode`,`user`.`id_toko` AS `id_toko` from (((((`detail_penjualan` join `penjualan` on((`detail_penjualan`.`id_penjualan` = `penjualan`.`id_penjualan`))) join `stok_barang` on((`detail_penjualan`.`id_stok_b` = `stok_barang`.`id_stok_b`))) join `barang_terdaftar` on((`stok_barang`.`kode` = `barang_terdaftar`.`kode`))) join `user` on((`penjualan`.`id_user` = `user`.`id_user`))) join `toko` on((`user`.`id_toko` = `toko`.`id_toko`))) where (`penjualan`.`tanggal` between (now() - interval 7 day) and now()) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_terjual_tahun`
--
DROP TABLE IF EXISTS `barang_terjual_tahun`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terjual_tahun`  AS  select `detail_penjualan`.`qty` AS `qty`,`barang_terdaftar`.`nama` AS `nama`,`penjualan`.`tanggal` AS `tanggal`,`stok_barang`.`kode` AS `kode`,`user`.`id_toko` AS `id_toko` from (((((`detail_penjualan` join `penjualan` on((`detail_penjualan`.`id_penjualan` = `penjualan`.`id_penjualan`))) join `stok_barang` on((`detail_penjualan`.`id_stok_b` = `stok_barang`.`id_stok_b`))) join `barang_terdaftar` on((`stok_barang`.`kode` = `barang_terdaftar`.`kode`))) join `user` on((`penjualan`.`id_user` = `user`.`id_user`))) join `toko` on((`user`.`id_toko` = `toko`.`id_toko`))) where (year(`penjualan`.`tanggal`) = year(curdate())) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_toko`
--
DROP TABLE IF EXISTS `barang_toko`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_toko`  AS  select `stok_barang`.`kode` AS `kode`,`stok_barang`.`id_stok_b` AS `id_stok_b`,sum(`stok_barang`.`qty`) AS `stok`,`stok_barang`.`kode_unik` AS `kode_unik`,`barang_terdaftar`.`nama` AS `nama`,`user`.`id_toko` AS `id_toko`,`stok_barang`.`hrg_distributor` AS `hrg_distributor` from ((((`stok_barang` join `barang_terdaftar` on((`stok_barang`.`kode` = `barang_terdaftar`.`kode`))) join `pemasokan` on((`stok_barang`.`id_pemasokan` = `pemasokan`.`id_pemasokan`))) join `user` on((`pemasokan`.`id_user` = `user`.`id_user`))) join `toko` on((`user`.`id_toko` = `toko`.`id_toko`))) group by `barang_terdaftar`.`nama`,`user`.`id_toko` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_toko_barcode`
--
DROP TABLE IF EXISTS `barang_toko_barcode`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_toko_barcode`  AS  select `barang_kasir`.`id_stok_b` AS `id_stok_b`,`barang_kasir`.`kode_unik` AS `kode_unik`,`barang_kasir`.`nama_barang` AS `nama_barang`,`barang_kasir`.`tanggal` AS `tanggal`,`barang_kasir`.`id_toko` AS `id_toko`,`barang_kasir`.`hrg_distributor` AS `hrg_distributor`,`barang_kasir`.`qty` AS `qty`,`barang_kasir`.`nama_distributor` AS `nama_distributor` from `barang_kasir` where (((substr(`barang_kasir`.`kode_unik`,1,3) = 'LCC') or (substr(`barang_kasir`.`kode_unik`,1,3) = 'CMC') or (substr(`barang_kasir`.`kode_unik`,1,3) = 'PBL')) and (`barang_kasir`.`qty` > 0)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `best_sell_bulan`
--
DROP TABLE IF EXISTS `best_sell_bulan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `best_sell_bulan`  AS  select sum(`barang_terjual_bulan`.`qty`) AS `jumlah_terjual`,`barang_terjual_bulan`.`nama` AS `nama`,`barang_terjual_bulan`.`id_toko` AS `id_toko` from `barang_terjual_bulan` group by `barang_terjual_bulan`.`kode` order by `barang_terjual_bulan`.`qty` desc ;

-- --------------------------------------------------------

--
-- Struktur untuk view `best_sell_minggu`
--
DROP TABLE IF EXISTS `best_sell_minggu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `best_sell_minggu`  AS  select sum(`barang_terjual_minggu`.`qty`) AS `jumlah_terjual`,`barang_terjual_minggu`.`nama` AS `nama`,`barang_terjual_minggu`.`id_toko` AS `id_toko` from `barang_terjual_minggu` group by `barang_terjual_minggu`.`kode` order by `barang_terjual_minggu`.`qty` desc ;

-- --------------------------------------------------------

--
-- Struktur untuk view `best_sell_tahun`
--
DROP TABLE IF EXISTS `best_sell_tahun`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `best_sell_tahun`  AS  select sum(`barang_terjual_tahun`.`qty`) AS `jumlah_terjual`,`barang_terjual_tahun`.`nama` AS `nama`,`barang_terjual_tahun`.`id_toko` AS `id_toko` from `barang_terjual_tahun` group by `barang_terjual_tahun`.`kode` order by `barang_terjual_tahun`.`qty` desc ;

-- --------------------------------------------------------

--
-- Struktur untuk view `pemasokan_list`
--
DROP TABLE IF EXISTS `pemasokan_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemasokan_list`  AS  select `p`.`id_pemasokan` AS `id_pemasokan`,`p`.`tanggal` AS `tanggal`,`p`.`total` AS `total`,`d`.`id_distributor` AS `id_distributor`,`d`.`nama` AS `nama`,`u`.`id_user` AS `id_user`,`u`.`nama_user` AS `nama_user`,`t`.`id_toko` AS `id_toko` from (((`pemasokan` `p` join `user` `u` on((`p`.`id_user` = `u`.`id_user`))) join `distributor` `d` on((`p`.`id_distributor` = `d`.`id_distributor`))) join `toko` `t` on((`u`.`id_toko` = `t`.`id_toko`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `pemasokan_list_detail`
--
DROP TABLE IF EXISTS `pemasokan_list_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemasokan_list_detail`  AS  select `p`.`id_pemasokan` AS `id_pemasokan`,`bt`.`nama` AS `nama`,`sb`.`qty` AS `qty`,`sb`.`hrg_distributor` AS `hrg_distributor`,`sb`.`total_hrg` AS `total_hrg`,`sb`.`kode_unik` AS `kode_unik` from ((`stok_barang` `sb` join `pemasokan` `p` on((`sb`.`id_pemasokan` = `p`.`id_pemasokan`))) join `barang_terdaftar` `bt` on((`sb`.`kode` = `bt`.`kode`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `stok_toko_cmc`
--
DROP TABLE IF EXISTS `stok_toko_cmc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stok_toko_cmc`  AS  select `sb`.`id_stok_b` AS `id_stok_b`,`sb`.`kode_unik` AS `kode_unik` from `stok_barang` `sb` where (substr(`sb`.`kode_unik`,1,3) = 'CMC') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `stok_toko_lcc`
--
DROP TABLE IF EXISTS `stok_toko_lcc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stok_toko_lcc`  AS  select `sb`.`id_stok_b` AS `id_stok_b`,`sb`.`kode_unik` AS `kode_unik` from `stok_barang` `sb` where (substr(`sb`.`kode_unik`,1,3) = 'LCC') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `stok_toko_pbl`
--
DROP TABLE IF EXISTS `stok_toko_pbl`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stok_toko_pbl`  AS  select `sb`.`id_stok_b` AS `id_stok_b`,`sb`.`kode_unik` AS `kode_unik` from `stok_barang` `sb` where (substr(`sb`.`kode_unik`,1,3) = 'PBL') ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_terdaftar`
--
ALTER TABLE `barang_terdaftar`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_pj`);

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indeks untuk tabel `pemasokan`
--
ALTER TABLE `pemasokan`
  ADD PRIMARY KEY (`id_pemasokan`);

--
-- Indeks untuk tabel `pengeluaran_lain`
--
ALTER TABLE `pengeluaran_lain`
  ADD PRIMARY KEY (`id_pengeluaran_l`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id_user_p`);

--
-- Indeks untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_stok_b`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_pj` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id_user_p` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_stok_b` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
