-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2026 at 08:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1d_silviahanatasya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` varchar(10) NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` varchar(20) NOT NULL CHECK (`jalur_pendaftaran` in ('Reguler','Prestasi','Kedinasan')),
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(30) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
('KDN2026001', 'Naufal Rizqi', 'SMAN 1 Padang', 88.00, 500000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD/2026/001', 'Kementerian Keuangan'),
('KDN2026002', 'Olivia Olivia', 'SMAN 70 Jakarta', 86.15, 500000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD/2026/042', 'Kementerian Dalam Negeri'),
('KDN2026003', 'Pratama Yudha', 'SMAN 2 Balikpapan', 84.50, 500000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD/2026/109', 'Badan Siber dan Sandi Negara'),
('KDN2026004', 'Rania Salsa', 'MAN Insan Cendekia', 93.00, 500000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD/2026/005', 'Kementerian Keuangan'),
('KDN2026005', 'Sultan Bahtiar', 'SMAN 1 Manado', 81.90, 500000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD/2026/211', 'Kementerian Perhubungan'),
('KDN2026006', 'Tania Putri', 'SMAN 1 Palembang', 89.75, 500000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD/2026/077', 'Badan Pusat Statistik'),
('PRS2026001', 'Gilang Perkasa', 'SMAN 2 herlang', 92.00, 150000.00, 'Prestasi', 'Teknik Informatika', NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
('PRS2026002', 'Hany Handayani', 'SMA Al-Azhar Jakarta', 89.50, 150000.00, 'Prestasi', 'Hukum', NULL, 'Debat Bahasa Inggris', 'Internasional', NULL, NULL),
('PRS2026003', 'Indra Kusuma', 'SMAN 1 Denpasar', 85.00, 150000.00, 'Prestasi', 'Manajemen', NULL, 'Bulutangkis Tunggal Putra', 'Provinsi', NULL, NULL),
('PRS2026004', 'Joko Susilo', 'SMKN 4 Malang', 87.20, 150000.00, 'Prestasi', 'Sistem Informasi', NULL, 'Lomba Kompetensi Siswa (LKS)', 'Nasional', NULL, NULL),
('PRS2026005', 'Kartika Sari', 'SMAN 8 Makassar', 94.10, 150000.00, 'Prestasi', 'Kedokteran', NULL, 'Karya Ilmiah Remaja', 'Nasional', NULL, NULL),
('PRS2026006', 'Lutfi Hakim', 'MAN 1 Surakarta', 86.60, 150000.00, 'Prestasi', 'Sastra Arab', NULL, 'Tahfidz Al-Quran 20 Juz', 'Nasional', NULL, NULL),
('PRS2026007', 'Mega Utami', 'SMAN 3 Tarakan', 83.30, 150000.00, 'Prestasi', 'Akuntansi', NULL, 'Paduan Suara', 'Provinsi', NULL, NULL),
('REG2026001', 'Ahmad Hidayat', 'SMAN 1 Jakarta', 85.50, 300000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
('REG2026002', 'Siti Aminah', 'MAN 2 Bandung', 78.25, 300000.00, 'Reguler', 'Akuntansi', 'Kampus Utama', NULL, NULL, NULL, NULL),
('REG2026003', 'Budi Santoso', 'SMKN 1 Surabaya', 82.00, 300000.00, 'Reguler', 'Sistem Informasi', 'Kampus Batam', NULL, NULL, NULL, NULL),
('REG2026004', 'Citra Lestari', 'SMAN 3 Yogyakarta', 91.15, 300000.00, 'Reguler', 'Kedokteran', 'Kampus Utama', NULL, NULL, NULL, NULL),
('REG2026005', 'Dedi Wijaya', 'SMAN 5 Semarang', 74.80, 300000.00, 'Reguler', 'Ilmu Komunikasi', 'Kampus Bekasi', NULL, NULL, NULL, NULL),
('REG2026006', 'Eka Putri', 'SMA Kristen Petra', 88.40, 300000.00, 'Reguler', 'Psikologi', 'Kampus Utama', NULL, NULL, NULL, NULL),
('REG2026007', 'Fajar Ramadhan', 'SMAN 1 Medan', 80.10, 300000.00, 'Reguler', 'Teknik Sipil', 'Kampus Bekasi', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
