-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2019 at 10:20 AM
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
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `barang_habis_toko`
-- (See below for the actual view)
--
CREATE TABLE `barang_habis_toko` (
`nama` varchar(50)
,`stok` decimal(32,0)
,`id_toko` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `barang_kasir`
-- (See below for the actual view)
--
CREATE TABLE `barang_kasir` (
`id_stok_b` int(7)
,`kode_unik` varchar(30)
,`nama` varchar(50)
,`tanggal` timestamp
,`barcode` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `barang_terdaftar`
--

CREATE TABLE `barang_terdaftar` (
  `kode` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `barcode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_terdaftar`
--

INSERT INTO `barang_terdaftar` (`kode`, `nama`, `barcode`) VALUES
('B00001', 'Asus X453 MA', 'kosong'),
('B00002', 'Flashdisk Toshiba 32gb', '99876544367');

-- --------------------------------------------------------

--
-- Stand-in structure for view `barang_terjual_bulan`
-- (See below for the actual view)
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
-- Stand-in structure for view `barang_terjual_minggu`
-- (See below for the actual view)
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
-- Stand-in structure for view `barang_terjual_tahun`
-- (See below for the actual view)
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
-- Stand-in structure for view `barang_toko`
-- (See below for the actual view)
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
-- Stand-in structure for view `best_sell_bulan`
-- (See below for the actual view)
--
CREATE TABLE `best_sell_bulan` (
`jumlah_terjual` decimal(32,0)
,`nama` varchar(50)
,`id_toko` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `best_sell_minggu`
-- (See below for the actual view)
--
CREATE TABLE `best_sell_minggu` (
`jumlah_terjual` decimal(32,0)
,`nama` varchar(50)
,`id_toko` char(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `best_sell_tahun`
-- (See below for the actual view)
--
CREATE TABLE `best_sell_tahun` (
`jumlah_terjual` decimal(32,0)
,`nama` varchar(50)
,`id_toko` char(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` char(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `no_hp`) VALUES
('C20190930001', 'Ari', '0812963989'),
('C20191001001', 'Ali Nadzim', '089685746747'),
('C20191001002', 'Arixx', '0821112213123'),
('C20191001003', 'afri', '089123771235');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
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
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_pj`, `id_penjualan`, `id_stok_b`, `harga_jual`, `qty`, `total_hrg`) VALUES
(1, 'P20190930002', '1', 3000000, 3, 9000000),
(2, 'P20191001001', '1', 3000000, 2, 6000000),
(3, 'P20191001002', '1', 1000000, 2, 2000000),
(4, 'P20191001003', '1', 3000000, 1, 3000000),
(5, 'P20191002001', '1', 4000000, 1, 4000000),
(6, 'P20191002001', '3', 60000, 1, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` char(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemasokan`
--

CREATE TABLE `pemasokan` (
  `id_pemasokan` char(11) NOT NULL,
  `id_user` char(3) NOT NULL,
  `id_distributor` char(3) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasokan`
--

INSERT INTO `pemasokan` (`id_pemasokan`, `id_user`, `id_distributor`, `tanggal`, `total`) VALUES
('M2019093001', 'U01', 'D01', '2019-09-05 07:17:28', 3500000),
('M2019100101', 'U01', 'D01', '2019-10-01 03:23:11', 3500000);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_lain`
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
-- Table structure for table `penjualan`
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
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_user`, `id_customer`, `tanggal`, `total`, `bayar`, `kembalian`) VALUES
('P20190930002', 'U01', 'C20190930001', '2019-09-30 02:53:52', 9000000, 10000000, 1000000),
('P20191001001', 'U01', 'C20191001001', '2019-10-01 01:05:16', 9000000, 10000000, 1000000),
('P20191001002', 'U01', 'C20191001002', '2019-10-01 01:21:38', 2000000, 2000000, 0),
('P20191001003', 'U01', 'C20191001003', '2019-10-01 01:23:52', 3000000, 4000000, 1000000),
('P20191002001', 'U01', 'C20191001003', '2019-10-02 01:23:52', 4060000, 4060000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
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
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`id_stok_b`, `id_pemasokan`, `kode`, `qty`, `hrg_distributor`, `total_hrg`, `kode_unik`) VALUES
(1, 'M2019093001', 'B00001', 1, 3500000, 3500000, 'LXRH10C0101'),
(2, 'M2019100101', 'B00001', 1, 3600000, 3600000, 'ZXCBY98B0101'),
(3, 'M2019100101', 'B00002', 1, 55000, 55000, 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` char(2) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat`) VALUES
('T1', 'LCC Komputer', 'Jln Alun alun selatan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `jenis_akses`, `id_toko`) VALUES
('U01', 'Ari', 'ari', 'ari', 'Manager', 'T1');

-- --------------------------------------------------------

--
-- Structure for view `barang_habis_toko`
--
DROP TABLE IF EXISTS `barang_habis_toko`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_habis_toko`  AS  select `barang_terdaftar`.`nama` AS `nama`,sum(`stok_barang`.`qty`) AS `stok`,`user`.`id_toko` AS `id_toko` from ((((`stok_barang` join `barang_terdaftar` on(`stok_barang`.`kode` = `barang_terdaftar`.`kode`)) join `pemasokan` on(`stok_barang`.`id_pemasokan` = `pemasokan`.`id_pemasokan`)) join `user` on(`pemasokan`.`id_user` = `user`.`id_user`)) join `toko` on(`user`.`id_toko` = `toko`.`id_toko`)) group by `stok_barang`.`kode` ;

-- --------------------------------------------------------

--
-- Structure for view `barang_kasir`
--
DROP TABLE IF EXISTS `barang_kasir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_kasir`  AS  select `stok_barang`.`id_stok_b` AS `id_stok_b`,`stok_barang`.`kode_unik` AS `kode_unik`,`barang_terdaftar`.`nama` AS `nama`,`pemasokan`.`tanggal` AS `tanggal`,`barang_terdaftar`.`barcode` AS `barcode` from ((`stok_barang` join `pemasokan` on(`stok_barang`.`id_pemasokan` = `pemasokan`.`id_pemasokan`)) join `barang_terdaftar` on(`stok_barang`.`kode` = `barang_terdaftar`.`kode`)) ;

-- --------------------------------------------------------

--
-- Structure for view `barang_terjual_bulan`
--
DROP TABLE IF EXISTS `barang_terjual_bulan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terjual_bulan`  AS  select `detail_penjualan`.`qty` AS `qty`,`barang_terdaftar`.`nama` AS `nama`,`penjualan`.`tanggal` AS `tanggal`,`stok_barang`.`kode` AS `kode`,`user`.`id_toko` AS `id_toko` from (((((`detail_penjualan` join `penjualan` on(`detail_penjualan`.`id_penjualan` = `penjualan`.`id_penjualan`)) join `stok_barang` on(`detail_penjualan`.`id_stok_b` = `stok_barang`.`id_stok_b`)) join `barang_terdaftar` on(`stok_barang`.`kode` = `barang_terdaftar`.`kode`)) join `user` on(`penjualan`.`id_user` = `user`.`id_user`)) join `toko` on(`user`.`id_toko` = `toko`.`id_toko`)) where month(`penjualan`.`tanggal`) = month(curdate()) ;

-- --------------------------------------------------------

--
-- Structure for view `barang_terjual_minggu`
--
DROP TABLE IF EXISTS `barang_terjual_minggu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terjual_minggu`  AS  select `detail_penjualan`.`qty` AS `qty`,`barang_terdaftar`.`nama` AS `nama`,`penjualan`.`tanggal` AS `tanggal`,`stok_barang`.`kode` AS `kode`,`user`.`id_toko` AS `id_toko` from (((((`detail_penjualan` join `penjualan` on(`detail_penjualan`.`id_penjualan` = `penjualan`.`id_penjualan`)) join `stok_barang` on(`detail_penjualan`.`id_stok_b` = `stok_barang`.`id_stok_b`)) join `barang_terdaftar` on(`stok_barang`.`kode` = `barang_terdaftar`.`kode`)) join `user` on(`penjualan`.`id_user` = `user`.`id_user`)) join `toko` on(`user`.`id_toko` = `toko`.`id_toko`)) where `penjualan`.`tanggal` >= cast(current_timestamp() as date) - interval 7 day ;

-- --------------------------------------------------------

--
-- Structure for view `barang_terjual_tahun`
--
DROP TABLE IF EXISTS `barang_terjual_tahun`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_terjual_tahun`  AS  select `detail_penjualan`.`qty` AS `qty`,`barang_terdaftar`.`nama` AS `nama`,`penjualan`.`tanggal` AS `tanggal`,`stok_barang`.`kode` AS `kode`,`user`.`id_toko` AS `id_toko` from (((((`detail_penjualan` join `penjualan` on(`detail_penjualan`.`id_penjualan` = `penjualan`.`id_penjualan`)) join `stok_barang` on(`detail_penjualan`.`id_stok_b` = `stok_barang`.`id_stok_b`)) join `barang_terdaftar` on(`stok_barang`.`kode` = `barang_terdaftar`.`kode`)) join `user` on(`penjualan`.`id_user` = `user`.`id_user`)) join `toko` on(`user`.`id_toko` = `toko`.`id_toko`)) where year(`penjualan`.`tanggal`) = year(curdate()) ;

-- --------------------------------------------------------

--
-- Structure for view `barang_toko`
--
DROP TABLE IF EXISTS `barang_toko`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_toko`  AS  select `stok_barang`.`kode_unik` AS `kode_unik`,`barang_terdaftar`.`barcode` AS `barcode`,`barang_terdaftar`.`nama` AS `nama`,`pemasokan`.`tanggal` AS `tanggal`,`stok_barang`.`hrg_distributor` AS `hrg_distributor`,`stok_barang`.`qty` AS `qty`,`user`.`id_toko` AS `id_toko` from ((((`stok_barang` join `barang_terdaftar` on(`stok_barang`.`kode` = `barang_terdaftar`.`kode`)) join `pemasokan` on(`stok_barang`.`id_pemasokan` = `pemasokan`.`id_pemasokan`)) join `user` on(`pemasokan`.`id_user` = `user`.`id_user`)) join `toko` on(`user`.`id_toko` = `toko`.`id_toko`)) ;

-- --------------------------------------------------------

--
-- Structure for view `best_sell_bulan`
--
DROP TABLE IF EXISTS `best_sell_bulan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `best_sell_bulan`  AS  select sum(`barang_terjual_bulan`.`qty`) AS `jumlah_terjual`,`barang_terjual_bulan`.`nama` AS `nama`,`barang_terjual_bulan`.`id_toko` AS `id_toko` from `barang_terjual_bulan` group by `barang_terjual_bulan`.`kode` order by `barang_terjual_bulan`.`qty` desc ;

-- --------------------------------------------------------

--
-- Structure for view `best_sell_minggu`
--
DROP TABLE IF EXISTS `best_sell_minggu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `best_sell_minggu`  AS  select sum(`barang_terjual_minggu`.`qty`) AS `jumlah_terjual`,`barang_terjual_minggu`.`nama` AS `nama`,`barang_terjual_minggu`.`id_toko` AS `id_toko` from `barang_terjual_minggu` group by `barang_terjual_minggu`.`kode` order by `barang_terjual_minggu`.`qty` desc ;

-- --------------------------------------------------------

--
-- Structure for view `best_sell_tahun`
--
DROP TABLE IF EXISTS `best_sell_tahun`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `best_sell_tahun`  AS  select sum(`barang_terjual_tahun`.`qty`) AS `jumlah_terjual`,`barang_terjual_tahun`.`nama` AS `nama`,`barang_terjual_tahun`.`id_toko` AS `id_toko` from `barang_terjual_tahun` group by `barang_terjual_tahun`.`kode` order by `barang_terjual_tahun`.`qty` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_terdaftar`
--
ALTER TABLE `barang_terdaftar`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_pj`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `pemasokan`
--
ALTER TABLE `pemasokan`
  ADD PRIMARY KEY (`id_pemasokan`);

--
-- Indexes for table `pengeluaran_lain`
--
ALTER TABLE `pengeluaran_lain`
  ADD PRIMARY KEY (`id_pengeluaran_l`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_stok_b`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_pj` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_stok_b` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
