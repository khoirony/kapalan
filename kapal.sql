-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 11:05 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kapal`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kapal`
--

CREATE TABLE `data_kapal` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `imo` varchar(100) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `tahun_pembuatan` varchar(5) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `material` varchar(250) NOT NULL,
  `loa` varchar(100) NOT NULL,
  `lpp` varchar(100) NOT NULL,
  `luas` varchar(10) NOT NULL,
  `draft` varchar(100) NOT NULL,
  `tinggi` varchar(10) NOT NULL,
  `dwt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `galangan`
--

CREATE TABLE `galangan` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `draft` int(11) NOT NULL,
  `DWT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sewa_galangan`
--

CREATE TABLE `jadwal_sewa_galangan` (
  `id` int(11) NOT NULL,
  `nama_kapal` int(11) NOT NULL,
  `perusahaan` int(11) NOT NULL,
  `nama_dermaga` int(11) NOT NULL,
  `kelas_kapal` varchar(50) NOT NULL,
  `mulai_sewa` date NOT NULL,
  `selesai_sewa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_survey`
--

CREATE TABLE `jadwal_survey` (
  `id` int(11) NOT NULL,
  `data_kapal` int(11) NOT NULL,
  `jenis_survey` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `sertifikat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_galangan`
--

CREATE TABLE `pemilik_galangan` (
  `id` int(11) NOT NULL,
  `perusahaan` int(11) NOT NULL,
  `pengguna` int(11) NOT NULL,
  `galangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_kapal`
--

CREATE TABLE `pemilik_kapal` (
  `id` int(11) NOT NULL,
  `perusahaan` int(11) NOT NULL,
  `pengguna` int(11) NOT NULL,
  `kapal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(254) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_fax` varchar(20) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `iso` varchar(100) NOT NULL,
  `ohsas` varchar(100) NOT NULL,
  `asuransi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `alamat`, `no_telp`, `no_fax`, `kode_pos`, `email`, `logo`, `website`, `iso`, `ohsas`, `asuransi`) VALUES
(1, 'PT Khoirony', 'Lamongan', '083870461640', '0111111', '62263', 'khoironyarief08@gmail.com', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_maintenance`
--

CREATE TABLE `riwayat_maintenance` (
  `id` int(11) NOT NULL,
  `data_kapal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `komponen` varchar(100) NOT NULL,
  `pembuat` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` varchar(254) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `no_telp`, `email`, `jabatan`, `alamat`, `image`, `password`, `role_id`) VALUES
(4, 'admin', '083870461640', 'fiktif.belaka2@gmail.com', 'Dirut', 'Lamongan', '', '$2y$10$fcmxQhBvGuVXcNJRmXLWp.fgJm1b4xECrb/162QCWgF/xjm6Y6cMS', 1),
(5, 'Eko Prayudi', '08111111111', 'efefe@gdg.com', 'presma', 'rembang', '', '$2y$10$OhT5M0bse1M0/wPrYZQ5/.f8EoHwEYJpjBbhEN9wUxTpwjpKEAoHe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 0, 3),
(9, 0, 2),
(11, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Shipyard'),
(2, 'Owner'),
(3, 'Dock Space'),
(4, 'Dock Space');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Shipyard'),
(2, 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'shipyard', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Dashboard', 'owner', 'fas fa-fw fa-tachometer-alt', 1),
(3, 2, 'Data Kapal', 'data-kapal\r\n', 'fas fa-fw fa-plus-square', 1),
(4, 2, 'Riwayat Maintenance', 'maitenance', 'fas fa-fw fa-history', 1),
(5, 2, 'Jadwal Survey', 'survey', 'fas fa-fw fa-calendar-alt', 1),
(6, 3, 'List Galangan', 'galangan', 'fas fa-fw fa-ship', 1),
(7, 3, 'Docking Space', 'docking', 'fas fa-fw fa-search', 1),
(8, 3, 'Repair List', 'repair', 'fas fa-fw fa-tools', 1),
(9, 1, 'Profil Perusahaan', 'profilperusahaan', 'fas fa-fw fa-building', 1),
(10, 4, 'Tambah Dock Space', 'tambahdock', 'fas fa-fw fa-ship', 1),
(11, 4, 'Atur Jadwal', 'jadwal', 'fas fa-fw fa-calendar-alt', 1),
(12, 4, 'Repair List', 'shipyardrepair', 'fas fa-fw fa-tools', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kapal`
--
ALTER TABLE `data_kapal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galangan`
--
ALTER TABLE `galangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_sewa_galangan`
--
ALTER TABLE `jadwal_sewa_galangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_kapal` (`nama_kapal`),
  ADD KEY `perusahaan` (`perusahaan`),
  ADD KEY `nama_dermaga` (`nama_dermaga`);

--
-- Indexes for table `jadwal_survey`
--
ALTER TABLE `jadwal_survey`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_kapal` (`data_kapal`);

--
-- Indexes for table `pemilik_galangan`
--
ALTER TABLE `pemilik_galangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna` (`pengguna`),
  ADD KEY `perusahaan` (`perusahaan`),
  ADD KEY `galangan` (`galangan`);

--
-- Indexes for table `pemilik_kapal`
--
ALTER TABLE `pemilik_kapal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna` (`pengguna`),
  ADD KEY `perusahaan` (`perusahaan`),
  ADD KEY `kapal` (`kapal`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_maintenance`
--
ALTER TABLE `riwayat_maintenance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_kapal` (`data_kapal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kapal`
--
ALTER TABLE `data_kapal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galangan`
--
ALTER TABLE `galangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_sewa_galangan`
--
ALTER TABLE `jadwal_sewa_galangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_survey`
--
ALTER TABLE `jadwal_survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemilik_galangan`
--
ALTER TABLE `pemilik_galangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemilik_kapal`
--
ALTER TABLE `pemilik_kapal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `riwayat_maintenance`
--
ALTER TABLE `riwayat_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_sewa_galangan`
--
ALTER TABLE `jadwal_sewa_galangan`
  ADD CONSTRAINT `jadwal_sewa_galangan_ibfk_1` FOREIGN KEY (`nama_kapal`) REFERENCES `data_kapal` (`id`),
  ADD CONSTRAINT `jadwal_sewa_galangan_ibfk_2` FOREIGN KEY (`perusahaan`) REFERENCES `perusahaan` (`id`),
  ADD CONSTRAINT `jadwal_sewa_galangan_ibfk_3` FOREIGN KEY (`nama_dermaga`) REFERENCES `galangan` (`id`);

--
-- Constraints for table `jadwal_survey`
--
ALTER TABLE `jadwal_survey`
  ADD CONSTRAINT `jadwal_survey_ibfk_1` FOREIGN KEY (`data_kapal`) REFERENCES `data_kapal` (`id`);

--
-- Constraints for table `pemilik_galangan`
--
ALTER TABLE `pemilik_galangan`
  ADD CONSTRAINT `pemilik_galangan_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pemilik_galangan_ibfk_2` FOREIGN KEY (`perusahaan`) REFERENCES `perusahaan` (`id`),
  ADD CONSTRAINT `pemilik_galangan_ibfk_3` FOREIGN KEY (`galangan`) REFERENCES `galangan` (`id`);

--
-- Constraints for table `pemilik_kapal`
--
ALTER TABLE `pemilik_kapal`
  ADD CONSTRAINT `pemilik_kapal_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pemilik_kapal_ibfk_2` FOREIGN KEY (`perusahaan`) REFERENCES `perusahaan` (`id`),
  ADD CONSTRAINT `pemilik_kapal_ibfk_3` FOREIGN KEY (`kapal`) REFERENCES `data_kapal` (`id`);

--
-- Constraints for table `riwayat_maintenance`
--
ALTER TABLE `riwayat_maintenance`
  ADD CONSTRAINT `riwayat_maintenance_ibfk_1` FOREIGN KEY (`data_kapal`) REFERENCES `data_kapal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
