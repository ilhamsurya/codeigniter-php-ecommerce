-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 03:42 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(120) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kategori` int(8) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` float NOT NULL,
  `stok` int(8) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi`, `kategori`, `harga`, `berat`, `stok`, `gambar`) VALUES
(15, 'Coca Cola 1 Liter', 'Coca Cola Biasa', 1, 7000, 1.6, 7, 'coke zero_2.png'),
(16, 'Sprite 4 Liter', 'Sprite Segar', 1, 5000, 4.1, 7, 'sprite_PNG8920_2.png'),
(17, 'Tropical Fruit Drink', 'Minuman Buah', 1, 100000, 1, 10, 'tropical fruit.png');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `nama`, `gambar`, `deskripsi`, `tanggal`) VALUES
(10, 'Anjing & Kucing', 'index.jpg', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et nisi enim. Phasellus finibus sodales lacus, eget porta neque tincidunt non. Morbi condimentum tellus nunc, non gravida nunc aliquet sed. Curabitur hendrerit orci ac tristique lobortis.', '2020-12-09'),
(11, 'Kucing Terbang', 'kucing terbang.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla commodo, nunc id mattis rutrum, felis orci convallis augue, at vestibulum lorem lectus eget nunc. Proin est tortor, consequat et rutrum a, porta eget arcu. Nam eu justo suscipit arcu blandit e', '2020-12-24'),
(12, 'Marmut', 'guinea pig.jpg', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ligula sem, convallis vitae elementum sit amet, vehicula a ante. Mauris libero nisi, condimentum a tortor ut, vulputate mollis felis. Phasellus placerat bibendum lectus, ac convallis urna. Nu', '2020-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` char(1) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `tinggi` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `umur`, `tinggi`, `foto`) VALUES
('101', 'ILHAM', NULL, 12, 168, ''),
('102', 'Indra Kusuma Tedjo', NULL, 14, 145, ''),
('103', 'Bima Bambang Gunardi', NULL, 16, 171, ''),
('104', 'Hartanoe Wenyan', NULL, 18, 191, ''),
('105', 'Basirun Honghui', NULL, 20, 200, '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-10-025105', 'App\\Database\\Migrations\\Products', 'default', 'App', 1607568699, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE `tbl_jual` (
  `id` int(11) NOT NULL,
  `id_penjualan` int(10) NOT NULL,
  `id_ongkir` int(10) NOT NULL,
  `id_brg` int(10) DEFAULT NULL,
  `nama_brg` varchar(32) DEFAULT NULL,
  `jml_jual` int(10) DEFAULT NULL,
  `biaya_ongkir` int(32) NOT NULL,
  `total_ongkir` int(16) NOT NULL,
  `total` varchar(20) DEFAULT NULL,
  `subberat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jual`
--

INSERT INTO `tbl_jual` (`id`, `id_penjualan`, `id_ongkir`, `id_brg`, `nama_brg`, `jml_jual`, `biaya_ongkir`, `total_ongkir`, `total`, `subberat`) VALUES
(74, 62, 2, 15, 'Coca Cola 1 Liter', 2, 66500, 0, '19000', 3),
(75, 62, 2, 16, 'Sprite 4 Liter', 1, 66500, 0, '19000', 4),
(76, 63, 1, 16, 'Sprite 4 Liter', 4, 120000, 0, '34000', 16),
(77, 63, 1, 15, 'Coca Cola 1 Liter', 2, 120000, 0, '34000', 3),
(78, 64, 1, 15, 'Coca Cola 1 Liter', 2, 72000, 0, '24000', 3),
(79, 64, 1, 16, 'Sprite 4 Liter', 2, 72000, 0, '24000', 8),
(80, 65, 1, 15, 'Coca Cola 1 Liter', 2, 72000, 0, '24000', 3),
(81, 65, 1, 16, 'Sprite 4 Liter', 2, 72000, 0, '24000', 8),
(82, 66, 1, 16, 'Sprite 4 Liter', 2, 60000, 0, '210000', 8),
(83, 66, 1, 17, 'Tropical Fruit Drink', 2, 60000, 0, '210000', 2),
(84, 67, 2, 15, 'Coca Cola 1 Liter', 1, 57000, 0, '12000', 2),
(85, 67, 2, 16, 'Sprite 4 Liter', 1, 57000, 0, '12000', 4),
(86, 68, 1, 15, 'Coca Cola 1 Liter', 2, 42000, 0, '19000', 3),
(87, 68, 1, 16, 'Sprite 4 Liter', 1, 42000, 0, '19000', 4),
(88, 69, 1, 15, 'Coca Cola 1 Liter', 2, 42000, 0, '19000', 3),
(89, 69, 1, 16, 'Sprite 4 Liter', 1, 42000, 0, '19000', 4),
(90, 70, 2, 16, 'Sprite 4 Liter', 1, 57000, 0, '12000', 4),
(91, 70, 2, 15, 'Coca Cola 1 Liter', 1, 57000, 0, '12000', 2),
(92, 71, 1, 16, 'Sprite 4 Liter', 1, 36000, 0, '12000', 4),
(93, 71, 1, 15, 'Coca Cola 1 Liter', 1, 36000, 0, '12000', 2),
(94, 72, 1, 15, 'Coca Cola 1 Liter', 2, 42000, 0, '19000', 3),
(95, 72, 1, 16, 'Sprite 4 Liter', 1, 42000, 0, '19000', 4),
(96, 73, 1, 16, 'Sprite 4 Liter', 1, 24000, 0, '5000', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ongkir`
--

CREATE TABLE `tbl_ongkir` (
  `id_ongkir` int(8) NOT NULL,
  `kecamatan_pengiriman` varchar(64) NOT NULL,
  `kecamatan_tujuan` varchar(64) NOT NULL,
  `ongkir_per_kg` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ongkir`
--

INSERT INTO `tbl_ongkir` (`id_ongkir`, `kecamatan_pengiriman`, `kecamatan_tujuan`, `ongkir_per_kg`) VALUES
(1, 'Cibeunying Kidul', 'Buahbatu', 6000),
(2, 'Gambir', 'Kramat Jati', 9500),
(3, 'Coblong', 'Menteng', 12000),
(4, 'Kelapa Gading', 'Regol', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(10) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `kecamatan` varchar(64) NOT NULL,
  `kota_tujuan` varchar(64) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `total_ongkir` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `nama`, `alamat`, `telp`, `kecamatan`, `kota_tujuan`, `tanggal`, `total_ongkir`, `total`) VALUES
(62, 'ILHAM', 'APAJA', 'AAA', 'GAMBIR', 'KRAMATJATI', '2021-01-12 00:05:18', 0, 0),
(63, 'BEBAS', 'BEBAS', 'BEBAS', 'BEBAS', 'BEBAS', '2021-01-12 00:20:16', 120000, 0),
(64, 'ILHAM', 'AAA', 'AAA', 'AA', 'AA', '2021-01-12 00:22:43', 72000, 0),
(65, 'ILHAM', 'AAA', 'AAA', 'AA', 'AA', '2021-01-12 00:24:09', 72000, 24000),
(66, 'AJI', 'CILILN', '0888888', 'CIBEUNYING KIDUL', 'BUAH BATU', '2021-01-12 00:28:42', 60000, 210000),
(67, 'AJI2', 'CLILIN2', '000000', 'GAMBIR', 'KRAMATJATI', '2021-01-12 00:31:49', 57000, 12000),
(68, 'QQ', 'QQ', 'QQ', 'QQ', 'QQ', '2021-01-12 00:35:38', 42000, 19000),
(69, 'Ali Shaleh Sekali', 'tdtdtd', 'tftftft', 'CIBEUNYING KIDUL', 'BUAH BATU', '2021-01-12 00:38:31', 42000, 19000),
(70, 'TEST', 'TEST', 'TEST', 'test', 'TEST', '2021-01-18 20:13:00', 57000, 12000),
(71, 'ILHAM SURYA', 'BANDUNG', '0895332717102', 'CIBEUNYING KIDUL', 'JAKARTA', '2021-01-18 20:54:52', 36000, 12000),
(72, 'ABDUL', 'GARUT', '4224', 'MALAMBONG', 'BANDUNG', '2021-01-18 22:44:25', 42000, 19000),
(73, 'afe', 'sef', 'sef', 'ewf', 'wef', '2021-01-25 07:15:49', 24000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `user_level` int(11) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_level`, `user_created_at`) VALUES
(4, 'ilham', '$2y$10$P1YKKdC6LTif6zIFsaFCcONsntKRDEHj3RtxRkGMrjfIZyJwNA3hi', 0, '2020-11-10 03:54:46'),
(5, 'admin', '$2y$10$vEk2tB7XuugwpiRzvF7lG.z7AviSnPn6Ml/e4PH5ALwMTfFxx3QFW', 1, '2020-12-01 06:12:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbl_ongkir`
--
ALTER TABLE `tbl_ongkir`
  MODIFY `id_ongkir` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
