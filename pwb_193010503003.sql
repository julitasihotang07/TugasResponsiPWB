-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 01:50 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwb_193010503003`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Produk_Terlaku` ()  BEGIN
	select nama_barang as 'Nama Barang', jumlah_beli as 'Produk Terlaku'
	From barang
	join siswa on barang.id_barang = siswa.id_barang
	where jumlah_beli=(select max(jumlah_beli) from siswa);

	END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `TampilkanNamaProduk` (`id_barang` VARCHAR(50)) RETURNS VARCHAR(50) CHARSET utf8mb4 BEGIN
    declare nama_barang varchar(50);
    select nama_barang from barang where id_barang=id_barang into nama_barang;
    return nama_barang;

    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(3) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `harga` int(12) DEFAULT NULL,
  `stok` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`) VALUES
(1, 'penghapus', 3000, 9),
(2, 'buku gambar', 5000, 14),
(3, 'pulpen', 2000, 30),
(4, 'pensil', 1500, 15),
(5, 'Penggaris', 3000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `no_bayar` int(3) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `id_siswa` int(3) DEFAULT NULL,
  `total_pembelian` int(12) DEFAULT NULL,
  `bayar` int(12) DEFAULT NULL,
  `sisa_bayar` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`no_bayar`, `tanggal_bayar`, `id_siswa`, `total_pembelian`, `bayar`, `sisa_bayar`) VALUES
(1, '2021-05-02', 1, 3000, 5000, 2000),
(2, '2021-05-08', 2, 5000, 5000, 0),
(3, '2021-05-09', 3, 6000, 6000, 0),
(4, '2021-05-10', 4, 7500, 10000, 2500),
(5, '2021-05-10', 5, 6000, 10000, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(3) NOT NULL,
  `id_barang` int(3) DEFAULT NULL,
  `jumlah_beli` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_barang`, `jumlah_beli`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 3),
(4, 4, 5),
(5, 5, 2);

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `Edit_Stok` AFTER INSERT ON `siswa` FOR EACH ROW BEGIN
		update barang set stok=stok-new.jumlah_beli
		where id_barang=new.id_barang;

    END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`no_bayar`),
  ADD KEY `fk_bayar` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `fk_siswa` (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `no_bayar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `fk_bayar` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
