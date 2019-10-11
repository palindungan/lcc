-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Okt 2019 pada 10.16
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
`kode_unik` varchar(30)
,`barcode` varchar(30)
,`nama` varchar(50)
,`tanggal` timestamp
,`hrg_distributor` int(10)
,`qty` int(3)
,`id_toko` char(2)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_habis_toko`  AS  select `barang_terdaftar`.`nama` AS `nama`,sum(`stok_barang`.`qty`) AS `stok`,`user`.`id_toko` AS `id_toko` from ((((`stok_barang` join `barang_terdaftar` on((`stok_barang`.`kode` = `barang_terdaftar`.`kode`))) join `pemasokan` on((`stok_barang`.`id_pemasokan` = `pemasokan`.`id_pemasokan`))) join `user` on((`pemasokan`.`id_user` = `user`.`id_user`))) join `toko` on((`user`.`id_toko` = `toko`.`id_toko`))) group by `stok_barang`.`kode` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_kasir`
--
DROP TABLE IF EXISTS `barang_kasir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_kasir`  AS  select `stok_barang`.`id_stok_b` AS `id_stok_b`,`stok_barang`.`kode_unik` AS `kode_unik`,`barang_terdaftar`.`nama` AS `nama`,`pemasokan`.`tanggal` AS `tanggal`,`barang_terdaftar`.`barcode` AS `barcode`,`user`.`id_toko` AS `id_toko`,`stok_barang`.`qty` AS `qty` from ((((`stok_barang` join `barang_terdaftar` on((`stok_barang`.`kode` = `barang_terdaftar`.`kode`))) join `pemasokan` on((`stok_barang`.`id_pemasokan` = `pemasokan`.`id_pemasokan`))) join `user` on((`pemasokan`.`id_user` = `user`.`id_user`))) join `toko` on((`user`.`id_toko` = `toko`.`id_toko`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_terdaftar_barcode`
--
DROP TABLE IF EXISTS `barang_terdaftar_barcode`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terdaftar_barcode`  AS  select `bt`.`kode` AS `kode`,`bt`.`nama` AS `nama`,`bt`.`barcode` AS `barcode` from `barang_terdaftar` `bt` where (`bt`.`barcode` <> 'kosong') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_terdaftar_bukan_barcode`
--
DROP TABLE IF EXISTS `barang_terdaftar_bukan_barcode`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terdaftar_bukan_barcode`  AS  select `bt`.`kode` AS `kode`,`bt`.`nama` AS `nama`,`bt`.`barcode` AS `barcode` from `barang_terdaftar` `bt` where (`bt`.`barcode` = 'kosong') ;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_toko`  AS  select `stok_barang`.`kode_unik` AS `kode_unik`,`barang_terdaftar`.`barcode` AS `barcode`,`barang_terdaftar`.`nama` AS `nama`,`pemasokan`.`tanggal` AS `tanggal`,`stok_barang`.`hrg_distributor` AS `hrg_distributor`,`stok_barang`.`qty` AS `qty`,`user`.`id_toko` AS `id_toko` from ((((`stok_barang` join `barang_terdaftar` on((`stok_barang`.`kode` = `barang_terdaftar`.`kode`))) join `pemasokan` on((`stok_barang`.`id_pemasokan` = `pemasokan`.`id_pemasokan`))) join `user` on((`pemasokan`.`id_user` = `user`.`id_user`))) join `toko` on((`user`.`id_toko` = `toko`.`id_toko`))) ;

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
  MODIFY `id_detail_pj` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id_user_p` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_stok_b` int(7) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
