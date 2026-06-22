-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 07:47 AM
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
-- Database: `db_uas_pbo_alyadhitinurizdihar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` int NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(12,2) NOT NULL,
  `jenis_karyawan` enum('Kontrak','Tetap','Magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(12,2) DEFAULT NULL,
  `opsi_saham_id` varchar(50) DEFAULT NULL,
  `uang_saku_bulanan` decimal(12,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
(1, 'Budi Santoso', 'IT Support', 22, '150000.00', 'Kontrak', 12, 'PT Mitra Sumber Daya', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', 'Human Resources', 20, '160000.00', 'Kontrak', 6, 'PT Global Talent', NULL, NULL, NULL, NULL),
(3, 'Andi Wijaya', 'Marketing', 21, '155000.00', 'Kontrak', 12, 'PT Mitra Sumber Daya', NULL, NULL, NULL, NULL),
(4, 'Rina Lestari', 'Operations', 23, '150000.00', 'Kontrak', 24, 'PT Talent Indonesia', NULL, NULL, NULL, NULL),
(5, 'Fajar Nugroho', 'IT Support', 19, '150000.00', 'Kontrak', 6, 'PT Global Talent', NULL, NULL, NULL, NULL),
(6, 'Sari Dewi', 'Procurement', 22, '165000.00', 'Kontrak', 12, 'PT Mitra Sumber Daya', NULL, NULL, NULL, NULL),
(7, 'Hendra Wijaya', 'Logistics', 21, '140000.00', 'Kontrak', 6, 'PT Talent Indonesia', NULL, NULL, NULL, NULL),
(8, 'Ahmad Fauzi', 'Software Engineering', 21, '250000.00', 'Tetap', NULL, NULL, '500000.00', 'ESOP-102', NULL, NULL),
(9, 'Dewi Lestari', 'Finance', 22, '230000.00', 'Tetap', NULL, NULL, '450000.00', 'ESOP-105', NULL, NULL),
(10, 'Eko Prasetyo', 'Software Engineering', 22, '270000.00', 'Tetap', NULL, NULL, '600000.00', 'ESOP-101', NULL, NULL),
(11, 'Siti Badriah', 'Legal', 20, '240000.00', 'Tetap', NULL, NULL, '500000.00', 'ESOP-108', NULL, NULL),
(12, 'Bambang Utomo', 'Quality Assurance', 21, '220000.00', 'Tetap', NULL, NULL, '400000.00', 'ESOP-110', NULL, NULL),
(13, 'Mega Utami', 'Product Management', 22, '280000.00', 'Tetap', NULL, NULL, '550000.00', 'ESOP-103', NULL, NULL),
(14, 'Adi Sukarno', 'Security', 23, '180000.00', 'Tetap', NULL, NULL, '350000.00', 'ESOP-115', NULL, NULL),
(15, 'Rian Hidayat', 'Data Analytics', 18, '80000.00', 'Magang', NULL, NULL, NULL, NULL, '1500000.00', 'Sertifikat MSIB - Ruangguru'),
(16, 'Putri Utami', 'UI/UX Design', 19, '80000.00', 'Magang', NULL, NULL, NULL, NULL, '1500000.00', 'Sertifikat MSIB - Telkom'),
(17, 'Rizky Ramadhan', 'Software Engineering', 20, '85000.00', 'Magang', NULL, NULL, NULL, NULL, '1600000.00', 'Sertifikat MSIB - Dicoding'),
(18, 'Anisa Fitri', 'Content Writer', 17, '75000.00', 'Magang', NULL, NULL, NULL, NULL, '1400000.00', 'Sertifikat Kampus Merdeka - GoTo'),
(19, 'Daffa Alamsyah', 'Data Analytics', 21, '80000.00', 'Magang', NULL, NULL, NULL, NULL, '1500000.00', 'Sertifikat MSIB - Grab'),
(20, 'Zahra Aurelia', 'Graphic Design', 18, '75000.00', 'Magang', NULL, NULL, NULL, NULL, '1400000.00', 'Sertifikat MSIB - Shopee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
