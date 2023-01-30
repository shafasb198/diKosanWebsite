-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 04:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dikosan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kos`
--

CREATE TABLE `tb_kos` (
  `id_kos` int(10) NOT NULL,
  `id_pemilik` int(10) NOT NULL,
  `nama_kos` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tipe_kos` enum('Pria','Wanita','Campuran') NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `jangka` enum('Bulanan','Tahunan') NOT NULL,
  `luas` int(11) NOT NULL,
  `fasilitas` text NOT NULL,
  `harga` int(11) NOT NULL,
  `foto_kosan` text NOT NULL,
  `status_kosan` enum('Terdaftar','Diajukan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kos`
--

INSERT INTO `tb_kos` (`id_kos`, `id_pemilik`, `nama_kos`, `alamat`, `tipe_kos`, `kapasitas`, `jangka`, `luas`, `fasilitas`, `harga`, `foto_kosan`, `status_kosan`) VALUES
(1, 2, 'melati putih', 'geger arum', 'Campuran', 5, 'Tahunan', 33, 'kamar mandi dalam', 33000000, 'melati.jpeg', 'Diajukan'),
(2, 2, 'mawar', 'geger tengah', 'Campuran', 5, 'Tahunan', 45, 'dapur bersama', 45000000, 'giraffes.jfif', 'Diajukan'),
(3, 4, 'nyobaaaa', 'gegerr', 'Campuran', 1, 'Tahunan', 35, 'kamdi', 8000000, 'kosannyoba.jpg', 'Terdaftar'),
(4, 2, 'angrek', 'gerlong', '', 2, 'Tahunan', 30, 'kamarr', 300000, 'master_825WCM75ee_936_ghozali_everyday.jpg', 'Diajukan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemilik`
--

CREATE TABLE `tb_pemilik` (
  `id_pemilik` int(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('Terdaftar','Diajukan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemilik`
--

INSERT INTO `tb_pemilik` (`id_pemilik`, `id_pengguna`, `nik`, `nama`, `no_telp`, `alamat`, `status`) VALUES
(1, 19, '300045722', 'arivah', '088889999888', 'banten', 'Diajukan'),
(2, 18, '35245451425', 'Eka', '0811811573', 'Gegerkalong', 'Terdaftar'),
(4, 25, '3204687', 'Arivah', '08888291197', 'Lampung', 'Terdaftar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `level` enum('admin','pemilik','penghuni','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `username`, `password`, `foto`, `level`) VALUES
(12, 'Chintyaa', 'olivia', '12345', 'ani123.jpg', 'admin'),
(13, 'Fadgham', 'gham', '123', 'adit.jpg', 'admin'),
(18, 'Eka', 'ekatiara', '123', 'ekaaa.jpg', 'pemilik'),
(19, 'arivah', 'vah', '123', 'vah.jpg', 'pemilik'),
(20, 'arivah', 'arivah', '123', 'giraffe.jpg', 'pemilik'),
(21, 'Heni', 'heni', '123', 'fc655248c4af71a97020e29560b1f076.jpg', 'user'),
(22, 'Mia', 'mia', '123', 'giraffes.jpg', 'penghuni'),
(23, 'Dodi', 'dodi', '123', 'dodi.jpg', 'user'),
(24, 'Agung', 'agung123', '123', 'master_825WCM75ee_936_ghozali_everyday.jpg', 'pemilik'),
(25, 'Arivah', 'aripah', '123', '4d18802f316825f6b631afc7a60ccdde.jpg', 'pemilik'),
(26, 'Aldi', 'aldi', '123', '4d18802f316825f6b631afc7a60ccdde.jpg', 'admin'),
(27, 'Aldi', 'maul', '0000', '934fd31a923f456fc53d85f5625ebefb.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penghuni`
--

CREATE TABLE `tb_penghuni` (
  `id_penghuni` int(10) NOT NULL,
  `id_kos` int(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `kampus` varchar(50) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `jenkel` enum('P','L','','') NOT NULL,
  `status_penghuni` enum('Terdaftar','Diajukan','Tidak Terdaftar','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penghuni`
--

INSERT INTO `tb_penghuni` (`id_penghuni`, `id_kos`, `id_pengguna`, `nama`, `asal`, `tgl_lahir`, `no_telp`, `kampus`, `no_rek`, `nik`, `jenkel`, `status_penghuni`) VALUES
(1, 2, 21, 'Heni', 'Aceh', '2022-12-01', '088889999888', 'UPI', '12345678', '3000457', 'P', 'Diajukan'),
(2, 2, 22, 'Mia', 'Bengkulu', '2022-12-10', '088889999887', 'UPI', '12345678', '3000456444', 'P', 'Terdaftar'),
(3, 3, 23, 'Dodi', 'Lombok', '2022-12-01', '088889999555', 'UPI', '123455555', '300045611', 'L', 'Diajukan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_penghuni` int(10) NOT NULL,
  `id_pemilik` int(10) NOT NULL,
  `jenis_transaksi` enum('Tunai','Non Tunai','','') NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti_pembayaran` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penghuni`, `id_pemilik`, `jenis_transaksi`, `jumlah`, `tanggal`, `bukti_pembayaran`) VALUES
(1, 2, 2, 'Tunai', 2000000, '2022-12-02', 'buktimia.jpg'),
(2, 1, 2, 'Non Tunai', 3000000, '2022-12-17', 'heni1.jpg'),
(3, 2, 2, 'Tunai', 2000000, '2022-12-25', 'bayar.jpg'),
(4, 3, 1, 'Tunai', 3000000, '2022-12-26', 'buktidodi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kos`
--
ALTER TABLE `tb_kos`
  ADD PRIMARY KEY (`id_kos`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `tb_pemilik`
--
ALTER TABLE `tb_pemilik`
  ADD PRIMARY KEY (`id_pemilik`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_penghuni`
--
ALTER TABLE `tb_penghuni`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD KEY `id_kos` (`id_kos`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_penghuni` (`id_penghuni`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kos`
--
ALTER TABLE `tb_kos`
  MODIFY `id_kos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pemilik`
--
ALTER TABLE `tb_pemilik`
  MODIFY `id_pemilik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_penghuni`
--
ALTER TABLE `tb_penghuni`
  MODIFY `id_penghuni` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kos`
--
ALTER TABLE `tb_kos`
  ADD CONSTRAINT `tb_kos_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `tb_pemilik` (`id_pemilik`);

--
-- Constraints for table `tb_pemilik`
--
ALTER TABLE `tb_pemilik`
  ADD CONSTRAINT `tb_pemilik_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`);

--
-- Constraints for table `tb_penghuni`
--
ALTER TABLE `tb_penghuni`
  ADD CONSTRAINT `tb_penghuni_ibfk_1` FOREIGN KEY (`id_kos`) REFERENCES `tb_kos` (`id_kos`),
  ADD CONSTRAINT `tb_penghuni_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_penghuni`) REFERENCES `tb_penghuni` (`id_penghuni`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_pemilik`) REFERENCES `tb_pemilik` (`id_pemilik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
