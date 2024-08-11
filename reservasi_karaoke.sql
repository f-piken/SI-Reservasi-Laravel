-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2024 at 10:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi_karaoke`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `ID_Customer` int NOT NULL,
  `Nama_Customer` varchar(50) NOT NULL,
  `Jenis_Kelamin` varchar(50) NOT NULL,
  `Alamat_Rumah` varchar(50) NOT NULL,
  `No_Telp` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ID_User` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`ID_Customer`, `Nama_Customer`, `Jenis_Kelamin`, `Alamat_Rumah`, `No_Telp`, `Email`, `ID_User`, `created_at`, `updated_at`) VALUES
(3, 'Fiky', 'Laki-Laki', 'Malang', '09278728312', '1', 1, '2024-05-24 11:25:34', '2024-05-24 11:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `ID_Pembayaran` int NOT NULL,
  `ID_Reservasi` int NOT NULL,
  `ID_Customer` int NOT NULL,
  `Total` int NOT NULL,
  `Metode_Pembayaran` enum('CASH','TRANSFER','QIRIS','DEBIT') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`ID_Pembayaran`, `ID_Reservasi`, `ID_Customer`, `Total`, `Metode_Pembayaran`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 20000, 'QIRIS', '2024-05-24 13:07:04', '2024-05-24 13:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `ID_Reservasi` int NOT NULL,
  `ID_Customer` int NOT NULL,
  `ID_Room` int NOT NULL,
  `Tanggal_Reservasi` date NOT NULL,
  `Waktu_Reservasi` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`ID_Reservasi`, `ID_Customer`, `ID_Room`, `Tanggal_Reservasi`, `Waktu_Reservasi`, `created_at`, `updated_at`) VALUES
(2, 3, 3, '2024-05-30', '2024-05-24 19:10:20', '2024-05-24 12:09:40', '2024-05-24 12:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_room`
--

CREATE TABLE `tb_room` (
  `ID_Room` int NOT NULL,
  `No_Room` int NOT NULL,
  `Tipe_Room` varchar(50) NOT NULL,
  `Harga_Room` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_room`
--

INSERT INTO `tb_room` (`ID_Room`, `No_Room`, `Tipe_Room`, `Harga_Room`, `created_at`, `updated_at`) VALUES
(3, 55, 'Exclusive', 300000, '2024-05-24 11:56:52', '2024-05-24 11:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `ID_User` int NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`ID_User`, `Username`, `Password`, `Email`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '$2y$12$0YZlW5f1/fFAtb9pGZw.E.HbWIWMgsB0GMYwdF3TXnvmFYnACiNMm', 'admin@gmail.com', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`ID_Customer`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`ID_Pembayaran`),
  ADD KEY `ID_Reservasi` (`ID_Reservasi`),
  ADD KEY `ID_Customer` (`ID_Customer`);

--
-- Indexes for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`ID_Reservasi`),
  ADD KEY `ID_Customer` (`ID_Customer`),
  ADD KEY `ID_Room` (`ID_Room`);

--
-- Indexes for table `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`ID_Room`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `ID_Customer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `ID_Pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `ID_Reservasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `ID_Room` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `ID_User` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD CONSTRAINT `tb_customer_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `tb_user` (`ID_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`ID_Customer`) REFERENCES `tb_customer` (`ID_Customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`ID_Reservasi`) REFERENCES `tb_reservasi` (`ID_Reservasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD CONSTRAINT `tb_reservasi_ibfk_1` FOREIGN KEY (`ID_Customer`) REFERENCES `tb_customer` (`ID_Customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_reservasi_ibfk_2` FOREIGN KEY (`ID_Room`) REFERENCES `tb_room` (`ID_Room`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
