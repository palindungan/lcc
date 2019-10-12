-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Okt 2019 pada 07.03
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

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
,`nama` varchar(50)
,`tanggal` timestamp
,`barcode` varchar(30)
,`id_toko` char(2)
,`hrg_distributor` int(10)
,`qty` int(3)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_terdaftar`
--

CREATE TABLE `barang_terdaftar` (
  `kode` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `barcode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_terdaftar`
--

INSERT INTO `barang_terdaftar` (`kode`, `nama`, `barcode`) VALUES
('B00001', 'Lenovo Ideapad 330', 'kosong'),
('B00002', 'Asus Tuf', 'kosong'),
('B00003', 'Flashdisk toshiba 32 gb', 'CD-8874'),
('B00004', 'Keyboard Logitech X2', 'CD-7231'),
('B00005', 'Vivo 17 Pro', 'kosong'),
('B00006', 'Realme 3 Pro', 'kosong'),
('B00007', 'Acer Swift 3', 'kosong'),
('B00008', 'Asus Core i3', 'kosong'),
('B00009', 'OPPO f9', 'kosong'),
('B00010', 'Printer Epson Scan', 'kosong'),
('B00011', 'Flasdis Toshiba Ram 16', 'kosong');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_terdaftar_barcode`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_terdaftar_barcode` (
`kode` char(6)
,`nama` varchar(50)
,`barcode` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_terdaftar_bukan_barcode`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_terdaftar_bukan_barcode` (
`kode` char(6)
,`nama` varchar(50)
,`barcode` varchar(30)
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
,`barcode` varchar(30)
,`id_toko` char(2)
,`hrg_distributor` int(10)
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
('C1210190001', 'Adi', '08967585823');

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
(1, 'P1210190001', '4', 150000, 1, 150000);

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
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
('M1210190006', 'U06', 'D02', '2019-10-12 02:54:54', 7500000);

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
,`barcode` varchar(30)
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
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(10) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` char(12) NOT NULL,
  `id_user` char(3) NOT NULL,
  `id_customer` char(12) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(10) NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembalian` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_user`, `id_customer`, `tanggal`, `total`, `bayar`, `kembalian`) VALUES
('P1210190001', 'U01', 'C1210190001', '2019-10-12 04:43:19', 150000, 200000, 50000);

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
(1, 'pimpinan', 'pimpinan', '$2y$10$6C4s0s9NIaw.2OwbxT/9heJWuiSeECWOVkasFYBfKnvJKdwmF3Nwa', 'Pimpinan');

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
(4, 'M0310190001', 'B00003', 4, 100000, 500000, 'kosong'),
(5, 'M0310190001', 'B00004', 5, 200000, 1000000, 'kosong'),
(6, 'M0310190001', 'B00005', 1, 3000000, 3000000, '582135128236'),
(7, 'M0310190001', 'B00006', 1, 3000000, 3000000, '353682391692'),
(8, 'M0310190002', 'B00007', 1, 6000000, 6000000, 'LK99897MA'),
(9, 'M0310190002', 'B00002', 1, 4000000, 4000000, 'XM31298PX'),
(10, 'M0310190002', 'B00003', 5, 100000, 500000, 'kosong'),
(11, 'M0310190003', 'B00002', 1, 4000000, 4000000, 'LK9983123M'),
(12, 'M0310190003', 'B00001', 1, 5000000, 5000000, 'ZXC123981X'),
(13, 'M0310190003', 'B00003', 5, 100000, 500000, 'kosong'),
(14, 'M1210190004', 'B00002', 1, 3500000, 3500000, 'ZXC1000292M'),
(15, 'M1210190004', 'B00006', 1, 2500000, 2500000, '36482182698'),
(16, 'M1210190005', 'B00008', 1, 5000000, 5000000, 'MN123456'),
(17, 'M1210190005', 'B00009', 2, 4000000, 8000000, 'MH16789'),
(18, 'M1210190005', 'B00010', 1, 900000, 900000, 'NM2157'),
(19, 'M1210190005', 'B00011', 1, 80000, 80000, 'MI378267'),
(20, 'M1210190006', 'B00007', 1, 3500000, 3500000, 'PLX981286L'),
(21, 'M1210190006', 'B00001', 1, 4000000, 4000000, 'XPA12931P');

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
('U01', 'rizal', 'rizal', '$2y$10$6C4s0s9NIaw.2OwbxT/9heJWuiSeECWOVkasFYBfKnvJKdwmF3Nwa', 'Manager', 'T1'),
('U02', 'ari', 'ari', '$2y$10$Al.0835m/wPVdDRsoe4FX.4YqSRPnM1MqtlIRrxnSiJCDKaPzqquG', 'Manager', 'T1'),
('U03', 'ali', 'ali', '$2y$10$.jbQ4C5IOENSgud9wLmysuPH3FJozcAUSn9AykCCK1ybT7YjaKHiq', 'Kasir', 'T1'),
('U04', 'lcc', 'lcc', '$2y$10$I/jPGZBxFBBZLSi.cHy8vu6EyWiF6eMQTzm3Fr8/1TShu4BOfO7pW', 'Manager', 'T1'),
('U05', 'cmc', 'cmc', '$2y$10$TP/pbjztFeKtQ7TbK3HPkOxDT7NTXzdHuKGkYRo37UeOKx6e4fe5.', 'Manager', 'T2'),
('U06', 'probolinggo', 'probolinggo', '$2y$10$2rB0B0X.lVTbImG.lp2LFOv4JZnAehgKfM6jlDTSkDxv.w/2PVEFa', 'Manager', 'T3'),
('U07', 'kasir_lcc', 'kasir_lcc', '$2y$10$C.IbD1aPGJmM6Fr2StwLmej5PkrKOIl74nmmWBGEsyibiY8DEMzcq', 'Kasir', 'T1'),
('U08', 'kasir_cmc', 'kasir_cmc', '$2y$10$kU3oINfhVVIi/NPIRiQC3.bhLbO7di.GQDuq5J92dowEoKOJYbvjq', 'Kasir', 'T2'),
('U09', 'kasir_probolinggo', 'kasir_probolinggo', '$2y$10$qJpFja9mbKbMavlDx/t0BO74EU8ioS9hG/iVJTavPMfp2AnieUUi6', 'Kasir', 'T3');

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_habis_toko`
--
DROP TABLE IF EXISTS `barang_habis_toko`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_habis_toko`  AS  select `barang_terdaftar`.`nama` AS `nama`,sum(`stok_barang`.`qty`) AS `stok`,`user`.`id_toko` AS `id_toko` from ((((`stok_barang` join `barang_terdaftar` on(`stok_barang`.`kode` = `barang_terdaftar`.`kode`)) join `pemasokan` on(`stok_barang`.`id_pemasokan` = `pemasokan`.`id_pemasokan`)) join `user` on(`pemasokan`.`id_user` = `user`.`id_user`)) join `toko` on(`user`.`id_toko` = `toko`.`id_toko`)) group by `barang_terdaftar`.`nama`,`user`.`id_toko` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_kasir`
--
DROP TABLE IF EXISTS `barang_kasir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_kasir`  AS  select `stok_barang`.`id_stok_b` AS `id_stok_b`,`stok_barang`.`kode_unik` AS `kode_unik`,`barang_terdaftar`.`nama` AS `nama`,`pemasokan`.`tanggal` AS `tanggal`,`barang_terdaftar`.`barcode` AS `barcode`,`user`.`id_toko` AS `id_toko`,`stok_barang`.`hrg_distributor` AS `hrg_distributor`,`stok_barang`.`qty` AS `qty` from ((((`stok_barang` join `barang_terdaftar` on(`stok_barang`.`kode` = `barang_terdaftar`.`kode`)) join `pemasokan` on(`stok_barang`.`id_pemasokan` = `pemasokan`.`id_pemasokan`)) join `user` on(`pemasokan`.`id_user` = `user`.`id_user`)) join `toko` on(`user`.`id_toko` = `toko`.`id_toko`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_terdaftar_barcode`
--
DROP TABLE IF EXISTS `barang_terdaftar_barcode`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terdaftar_barcode`  AS  select `bt`.`kode` AS `kode`,`bt`.`nama` AS `nama`,`bt`.`barcode` AS `barcode` from `barang_terdaftar` `bt` where `bt`.`barcode` <> 'kosong' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_terdaftar_bukan_barcode`
--
DROP TABLE IF EXISTS `barang_terdaftar_bukan_barcode`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terdaftar_bukan_barcode`  AS  select `bt`.`kode` AS `kode`,`bt`.`nama` AS `nama`,`bt`.`barcode` AS `barcode` from `barang_terdaftar` `bt` where `bt`.`barcode` = 'kosong' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_terjual_bulan`
--
DROP TABLE IF EXISTS `barang_terjual_bulan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terjual_bulan`  AS  select `detail_penjualan`.`qty` AS `qty`,`barang_terdaftar`.`nama` AS `nama`,`penjualan`.`tanggal` AS `tanggal`,`stok_barang`.`kode` AS `kode`,`user`.`id_toko` AS `id_toko` from (((((`detail_penjualan` join `penjualan` on(`detail_penjualan`.`id_penjualan` = `penjualan`.`id_penjualan`)) join `stok_barang` on(`detail_penjualan`.`id_stok_b` = `stok_barang`.`id_stok_b`)) join `barang_terdaftar` on(`stok_barang`.`kode` = `barang_terdaftar`.`kode`)) join `user` on(`penjualan`.`id_user` = `user`.`id_user`)) join `toko` on(`user`.`id_toko` = `toko`.`id_toko`)) where month(`penjualan`.`tanggal`) = month(curdate()) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_terjual_minggu`
--
DROP TABLE IF EXISTS `barang_terjual_minggu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terjual_minggu`  AS  select `detail_penjualan`.`qty` AS `qty`,`barang_terdaftar`.`nama` AS `nama`,`penjualan`.`tanggal` AS `tanggal`,`stok_barang`.`kode` AS `kode`,`user`.`id_toko` AS `id_toko` from (((((`detail_penjualan` join `penjualan` on(`detail_penjualan`.`id_penjualan` = `penjualan`.`id_penjualan`)) join `stok_barang` on(`detail_penjualan`.`id_stok_b` = `stok_barang`.`id_stok_b`)) join `barang_terdaftar` on(`stok_barang`.`kode` = `barang_terdaftar`.`kode`)) join `user` on(`penjualan`.`id_user` = `user`.`id_user`)) join `toko` on(`user`.`id_toko` = `toko`.`id_toko`)) where `penjualan`.`tanggal` between current_timestamp() - interval 7 day and current_timestamp() ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_terjual_tahun`
--
DROP TABLE IF EXISTS `barang_terjual_tahun`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terjual_tahun`  AS  select `detail_penjualan`.`qty` AS `qty`,`barang_terdaftar`.`nama` AS `nama`,`penjualan`.`tanggal` AS `tanggal`,`stok_barang`.`kode` AS `kode`,`user`.`id_toko` AS `id_toko` from (((((`detail_penjualan` join `penjualan` on(`detail_penjualan`.`id_penjualan` = `penjualan`.`id_penjualan`)) join `stok_barang` on(`detail_penjualan`.`id_stok_b` = `stok_barang`.`id_stok_b`)) join `barang_terdaftar` on(`stok_barang`.`kode` = `barang_terdaftar`.`kode`)) join `user` on(`penjualan`.`id_user` = `user`.`id_user`)) join `toko` on(`user`.`id_toko` = `toko`.`id_toko`)) where year(`penjualan`.`tanggal`) = year(curdate()) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_toko`
--
DROP TABLE IF EXISTS `barang_toko`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_toko`  AS  select `stok_barang`.`kode` AS `kode`,`stok_barang`.`id_stok_b` AS `id_stok_b`,sum(`stok_barang`.`qty`) AS `stok`,`stok_barang`.`kode_unik` AS `kode_unik`,`barang_terdaftar`.`nama` AS `nama`,`barang_terdaftar`.`barcode` AS `barcode`,`user`.`id_toko` AS `id_toko`,`stok_barang`.`hrg_distributor` AS `hrg_distributor` from ((((`stok_barang` join `barang_terdaftar` on(`stok_barang`.`kode` = `barang_terdaftar`.`kode`)) join `pemasokan` on(`stok_barang`.`id_pemasokan` = `pemasokan`.`id_pemasokan`)) join `user` on(`pemasokan`.`id_user` = `user`.`id_user`)) join `toko` on(`user`.`id_toko` = `toko`.`id_toko`)) group by `barang_terdaftar`.`nama`,`user`.`id_toko` ;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemasokan_list`  AS  select `p`.`id_pemasokan` AS `id_pemasokan`,`p`.`tanggal` AS `tanggal`,`p`.`total` AS `total`,`d`.`id_distributor` AS `id_distributor`,`d`.`nama` AS `nama`,`u`.`id_user` AS `id_user`,`u`.`nama_user` AS `nama_user`,`t`.`id_toko` AS `id_toko` from (((`pemasokan` `p` join `user` `u`) join `distributor` `d`) join `toko` `t`) where `p`.`id_user` = `u`.`id_user` and `p`.`id_distributor` = `d`.`id_distributor` and `u`.`id_toko` = `t`.`id_toko` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `pemasokan_list_detail`
--
DROP TABLE IF EXISTS `pemasokan_list_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pemasokan_list_detail`  AS  select `p`.`id_pemasokan` AS `id_pemasokan`,`bt`.`nama` AS `nama`,`bt`.`barcode` AS `barcode`,`sb`.`qty` AS `qty`,`sb`.`hrg_distributor` AS `hrg_distributor`,`sb`.`total_hrg` AS `total_hrg`,`sb`.`kode_unik` AS `kode_unik` from ((`stok_barang` `sb` join `pemasokan` `p`) join `barang_terdaftar` `bt`) where `sb`.`id_pemasokan` = `p`.`id_pemasokan` and `sb`.`kode` = `bt`.`kode` ;

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
  MODIFY `id_detail_pj` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id_user_p` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_stok_b` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
