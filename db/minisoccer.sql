-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2024 at 05:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minisoccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `harga`) VALUES
(1, 80000),
(2, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int NOT NULL,
  `jam` time NOT NULL,
  `id_harga` int NOT NULL,
  `jams` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jam`, `id_harga`, `jams`) VALUES
(1, '08:00:00', 1, '08.00-09.00'),
(2, '09:00:00', 1, '09.00-10.00'),
(3, '10:00:00', 1, '10.00-11.00'),
(4, '11:00:00', 1, '11.00-12.00'),
(5, '12:00:00', 1, '12.00-13.00'),
(6, '13:00:00', 1, '13.00-14.00'),
(7, '14:00:00', 1, '14.00-15.00'),
(8, '15:00:00', 1, '15.00-16.00'),
(9, '16:00:00', 1, '16.00-17.00'),
(10, '17:00:00', 1, '17.00-18.00'),
(11, '18:00:00', 2, '18.00-19.00'),
(12, '19:00:00', 2, '19.00-20.00'),
(13, '20:00:00', 2, '20.00-21.00'),
(14, '21:00:00', 2, '21.00-22.00'),
(15, '22:00:00', 2, '22.00-23.00'),
(16, '23:00:00', 2, '23.00-24.00');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `tanggal` date NOT NULL,
  `id_jadwal` int NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `tanggal`, `id_jadwal`, `bukti_bayar`, `status`) VALUES
(1, 2, '2024-05-20', 3, '', 'Finish'),
(2, 2, '2024-05-20', 4, '', 'Finish'),
(3, 2, '2024-05-20', 5, '', 'Booking'),
(7, 2, '2024-05-20', 1, 'Blank diagram.jpeg', 'Booking'),
(8, 2, '2024-05-20', 7, 'Blank diagram.jpeg', 'Booking'),
(9, 2, '2024-05-20', 2, 'Blank diagram.jpeg', 'Booking'),
(10, 2, '2024-05-21', 16, 'Bukti transfer.jpeg', 'Finish');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`) VALUES
(1, 'Jasa “Sport Photography” ', 200000),
(2, 'Sepatu Bola', 25000),
(3, 'Jasa Wasit Pertandingan', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int NOT NULL,
  `id_produk` int NOT NULL,
  `tanggal` date NOT NULL,
  `id_jadwal` int NOT NULL,
  `nama_penyewa` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_produk`, `tanggal`, `id_jadwal`, `nama_penyewa`, `status`) VALUES
(1, 2, '2024-05-22', 3, 'Dani', 'Finished'),
(2, 2, '2024-05-22', 4, 'Ivan', 'Finished'),
(3, 2, '2024-05-22', 3, 'Heru', 'Finished'),
(4, 3, '2024-05-23', 12, 'Heru', 'Finished');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nomor_hp` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `nomor_hp`, `email`, `password`, `level`) VALUES
(1, 'Admin', 0, 'admin@soccer.com', '7815696ecbf1c96e6894b779456d330e', 2),
(2, 'Dian Maulana', 123123, 'asd@asd.com', '7815696ecbf1c96e6894b779456d330e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
