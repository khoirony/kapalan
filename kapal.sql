-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 12:05 PM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `perusahaan_galangan` int(11) NOT NULL,
  `galangan` int(11) NOT NULL,
  `perusahaan_kapal` int(11) NOT NULL,
  `kapal` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `perusahaan_galangan`, `galangan`, `perusahaan_kapal`, `kapal`, `jenis`, `tgl_mulai`, `tgl_akhir`, `active`) VALUES
(1, 7, 4, 5, 3, 'tes', '2022-01-12', '2022-01-18', 2),
(2, 7, 4, 5, 1, 'tes', '2022-01-03', '2022-01-05', 2),
(6, 15, 12, 0, 0, '', '0000-00-00', '0000-00-00', 0),
(7, 15, 13, 0, 0, '', '0000-00-00', '0000-00-00', 0),
(8, 15, 11, 5, 1, 'tes', '2022-01-05', '2022-01-12', 2),
(12, 7, 5, 0, 0, '', '0000-00-00', '0000-00-00', 0),
(14, 7, 4, 0, 0, '', '0000-00-00', '0000-00-00', 0),
(15, 7, 17, 0, 0, '', '0000-00-00', '0000-00-00', 0),
(16, 7, 18, 0, 0, '', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `galangan`
--

CREATE TABLE `galangan` (
  `id_galangan` int(11) NOT NULL,
  `nama_galangan` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `panjang` float DEFAULT NULL,
  `lebar` float DEFAULT NULL,
  `draft` float DEFAULT NULL,
  `dwt` float DEFAULT NULL,
  `perusahaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galangan`
--

INSERT INTO `galangan` (`id_galangan`, `nama_galangan`, `tipe`, `panjang`, `lebar`, `draft`, `dwt`, `perusahaan`) VALUES
(4, 'Dok I', 'Floating Dock', 99.24, 22.4, 4.2, 3500, 7),
(5, 'Dok II', 'Floating Dock', 99.24, 22.4, 4.2, 3500, 7),
(11, 'JK V', 'Floating Dock', 106, 19, 0, 3500, 15),
(12, 'Citra', 'Graving Dock', 120, 22, 0, 5500, 15),
(13, 'Rampway', 'Rampway', 78, 30, 0, 750, 15),
(17, 'Dok IV', 'Floating Dock', 94.3, 27, 6.85, 4000, 7),
(18, 'Dok V', 'Floating Dock', 138.52, 26.4, 7.5, 6000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `id_kapal` int(11) NOT NULL,
  `nama_kapal` varchar(100) NOT NULL,
  `imo` varchar(100) NOT NULL,
  `perusahaan` int(11) NOT NULL,
  `tahun_pembuatan` varchar(5) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `material` varchar(250) NOT NULL,
  `loa` float DEFAULT NULL,
  `lpp` float DEFAULT NULL,
  `breadth` float NOT NULL,
  `draft` float DEFAULT NULL,
  `tinggi` float DEFAULT NULL,
  `dwt` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`id_kapal`, `nama_kapal`, `imo`, `perusahaan`, `tahun_pembuatan`, `tipe`, `material`, `loa`, `lpp`, `breadth`, `draft`, `tinggi`, `dwt`) VALUES
(1, 'Going Merry', '123', 5, '2000', 'Bajak Laut', 'Kayu', 99, 111, 800, 200, 100, 3500),
(3, 'Thousan Sunni', '111', 5, '2013', 'Bajak Laut', 'Kayu', 99, 111, 900, 200, 200, 3500);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id_maintenance` int(11) NOT NULL,
  `kapal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `komponen` varchar(100) NOT NULL,
  `pembuat` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id_maintenance`, `kapal`, `tanggal`, `komponen`, `pembuat`, `tipe`, `deskripsi`) VALUES
(1, 1, '2022-01-06', 'Layar9', 'Pak eko', 'Bajak Laut', 'Layare bolong'),
(4, 3, '2022-01-12', 'Tiang', 'Pak eko', 'Kayu', 'Masang Tiang');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `kapal` int(11) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `jenis` varchar(500) NOT NULL,
  `uraian` longtext NOT NULL,
  `repair` int(11) NOT NULL,
  `progress` int(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  `revisi` varchar(500) NOT NULL,
  `setujui_revisi` int(11) NOT NULL,
  `pl` int(11) NOT NULL,
  `qcqa` int(11) NOT NULL,
  `wo` int(11) NOT NULL,
  `hasil_pengerjaan` varchar(500) NOT NULL,
  `selesai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `kapal`, `tgl_awal`, `tgl_akhir`, `bidang`, `jenis`, `uraian`, `repair`, `progress`, `image`, `revisi`, `setujui_revisi`, `pl`, `qcqa`, `wo`, `hasil_pengerjaan`, `selesai`) VALUES
(4, 3, '2022-01-11', '2022-01-18', 'Pertukangan', 'Malu', 'Malu Maluin kapal', 1, 1, 'Frame_1_(3).png', 'Malu kok sama kapal', 1, 1, 1, 1, 'Masih Proses Guys', 1);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` varchar(254) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_fax` varchar(20) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `email_perusahaan` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `iso` varchar(100) NOT NULL,
  `ohsas` varchar(100) NOT NULL,
  `asuransi` varchar(100) NOT NULL,
  `role_id` int(1) NOT NULL,
  `deskripsi_perusahaan` longtext NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `kota`, `no_telp`, `no_fax`, `kode_pos`, `email_perusahaan`, `logo`, `website`, `iso`, `ohsas`, `asuransi`, `role_id`, `deskripsi_perusahaan`, `image1`, `image2`) VALUES
(5, 'PT Meratus Line', 'Jl in aja dulu', 'Lamongan', '0999999', '099999', '66666', 'efefe@gdg.com', 'Logo_Meratus.png', '', '', '', '', 2, 'PT Meratus Line is an Indonesian shipping company that provides “point-to-point” transportation solutions. The shipping route network for Meratus ships connects the main ports and inter-island trading ports in the archipelago, covering most of Indonesia\'s territory and is strengthened by the presence of branch offices at each port. <br/>\r\nIn carrying out its activities, Meratus prioritizes safety, quality, and focuses on customer needs (safety, quality and customer focus). Founded in 1957, Meratus has grown and now covers several business fields in the shipping and transportation industry. Currently Meratus has grown into the following sectors : <br/>Containers, Charter, Dry Bulk, Terminals, Logistics and LNG (JV).', 'Gambar_meratus.jpg', 'IMG-20200912-WA00491.jpg'),
(7, 'PT. Dok &amp; Perkapalan Surabaya', 'Jl. Perak Barat 433-435 ', 'Surabaya', '+62313291286', '+62313291286', '60167', 'marketing@dok-sby.id ', 'Logo_DPS.png', 'dkb.co.id', '2015', '2007', '', 1, 'Since being nationalized in 1961, PT. DPS has become a leading company in the field of ship repair with various types and sizes of ships ordered by Clients from various parts of the world. In shipbuilding & engineering, PT. DPS has been carrying out various orders overseas for several years. Since 1961 alone from the available database DPS has repaired and built more than 600 various types of ships, ordered by both local and foreign customers. We have a track record of achievements in ship conversion technology and non-ship services, including product design and engineering, offshore construction, crane fabrication and assembly, and any other structural steel fabrication that relates to our core competencies. DPS has a ship repair capacity of up to 10,000 DWT per year which is the same as a new shipbuilding capacity of up to 8000 DWT per year. <br>\r\nPT. DPS has 4 floating docks, which can accommodate ships up to 290 m in length and approx. 135 000 dwt. We also have the possibility of repairing ships up to 310 m long along the shipyard pier. Our pier is about 6000 m long, including 3500 m of pier equipped with basic infrastructure, electricity supply and technical gas supply. There are 24 cranes that can lift up to 300 t.\r\n', '3avila_3.jpg', 'galangan_kapal.jpg'),
(15, 'PT. DKB Galangan Jakarta II', 'Jl. Sindang Laut No.119, Tanjung Priok', 'Jakarta', '+62214301255', '+622143934488', '14110', 'jakarta2@dkb.co.id', '', '', '', '', '', 1, '', '', ''),
(16, 'PT. DKB Galangan Jakarta III', 'Jl. RE. Martadinata I/ 1 , Tanjung Priok', '', '+62214303003', '+622143935232', '14310', 'jakarta3@dkb.co.id', '', '', '', '', '', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pilihkapal`
--

CREATE TABLE `pilihkapal` (
  `id` int(11) NOT NULL,
  `kapal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pilihkapal`
--

INSERT INTO `pilihkapal` (`id`, `kapal`) VALUES
(19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `id_repair` int(11) NOT NULL,
  `kapal` int(11) NOT NULL,
  `perusahaan` int(11) NOT NULL,
  `galangan` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `active` int(1) NOT NULL,
  `booking` int(11) NOT NULL,
  `perusahaan_galangan` int(11) NOT NULL,
  `selesai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`id_repair`, `kapal`, `perusahaan`, `galangan`, `kelas`, `jenis`, `tgl_awal`, `tgl_akhir`, `active`, `booking`, `perusahaan_galangan`, `selesai`) VALUES
(1, 3, 5, 4, '3', 'tes', '2022-01-11', '2022-01-18', 2, 1, 7, 1),
(8, 1, 5, 11, '3', 'tes', '2022-01-05', '2022-01-12', 0, 0, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `kapal` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `sertifikat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id_survey`, `kapal`, `jenis`, `tanggal`, `kelas`, `sertifikat`) VALUES
(1, 1, 'other1', '2022-02-05', 'TIF B', 'vaksin'),
(4, 1, 'Desain', '2022-01-21', '3', 'sas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `perusahaan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` varchar(254) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `perusahaan`, `nama`, `no_telp`, `email`, `jabatan`, `alamat`, `image`, `password`, `role_id`, `active`) VALUES
(1, 0, 'admin', '083870461640', 'admin@admin.com', 'Super-Admin', 'Lamongan', '', '$2y$10$fcmxQhBvGuVXcNJRmXLWp.fgJm1b4xECrb/162QCWgF/xjm6Y6cMS', 0, 1),
(5, 5, 'Eko Prayudi', '08111111111', 'efefe@gdg.com', 'Admin', 'rembang', '', '$2y$10$OhT5M0bse1M0/wPrYZQ5/.f8EoHwEYJpjBbhEN9wUxTpwjpKEAoHe', 2, 1),
(7, 7, 'PT. Dok & Perkapalan Surabaya', '+62313291286', 'marketing@dok-sby.id ', 'Admin', 'Jl. Perak Barat 433-435 Surabaya', '', '$2y$10$a9zUOX4M9o/8X7o27VQDWOGuXwomqNuIBS.KoRvZYWCGc3xYR8f7q', 1, 1),
(11, 5, 'supriyon', '9876432', 'supri@gmail.com', 'Ship Manager', 'jonggol', '', '$2y$10$YTmtLmYZNGCuEjiXpz5Elul1pStfYRdr82bgXBKljSWZ1spEUgdXi', 5, 1),
(12, 5, 'syaiton', '999', '666@gmail.com', 'Superintendent', 'neraka', '', '$2y$10$KbueeXv8Ji4nEcJqofHVcen548YtV3s6jUFSEXbLizHA14Y22ugCm', 3, 1),
(14, 7, 'Jangkep', '1230000', 'jany@gmail.com', 'Planning Department', 'Kediri', '', '$2y$10$dyjHgygbcI0UsP3RPNWzju6zjJuG67x8U.w0JYrB3CkJhc6aDHqo6', 9, 1),
(15, 7, 'Kemal', '6666666', 'kemal@gmail.com', 'Project Leader', 'konokene', '', '$2y$10$/2ZiyPA2lm0p25Z7rSYb9OUJQX2xR6.ixsue1Gv.ZTDgONgJYKHuq', 6, 1),
(16, 7, 'Arif khoiruddin', '876543', 'mbedet17@gmail.com', 'QC / QA', 'jonggol', '', '$2y$10$DzCoVVeoSAXwfXJYzZfi1umIq.VSJT0APk.D9a0vRLDaA4aL2Kg56', 7, 1),
(17, 7, 'yoga', '87867556578', 'yoga@gmail.com', 'Workshop Officer', 'Bojongsoang', '', '$2y$10$0g2XIJPUme8T6BZ0iMegneJQiwfU2NAnztiwcqWTT11nb0/aPHwTS', 8, 1),
(18, 5, 'ontong1', '7546788', 'ontong@gmail.com', 'Docking Monitoring', 'Lamongan', '', '$2y$10$P5id7Y9a65xA/Wm1X4vZP.XrOVWGPsCmyIG85aPX2HKq6/LYOwu5m', 4, 1),
(21, 15, 'PT. DKB Galangan Jakarta II', '+62214301255', 'jakarta2@dkb.co.id', 'Admin', 'Jl. Sindang Laut No.119, Tanjung Priok', '', '$2y$10$cfxZK5T8Fkl//mOFGFJYxO1JyFEfM2MLFBDNhdcq2U2A5GLbFJJXO', 1, 1),
(22, 16, 'PT. DKB Galangan Jakarta III', '+62214303003', 'jakarta3@dkb.co.id', 'Admin', 'Jl. RE. Martadinata I/ 1 , Tanjung Priok', '', '$2y$10$eV3VDMJNXozlECD3KAo74OV2HUDlFfXl/d30Oa0i2SJnBMypMfGJi', 1, 1),
(23, 15, 'saipul', '0000000', 'saipul@gmail.com', 'Planning Department', 'Lamongan', '', '$2y$10$hWoDSlh3RssWRvu8pniOte3Z0X96TcAARI6OZiGIkumFvOFIqgayK', 9, 1);

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
(3, 2, 3),
(12, 0, 0),
(13, 5, 4),
(14, 5, 5),
(15, 5, 6),
(16, 3, 5),
(17, 4, 6),
(18, 9, 2),
(19, 6, 7),
(20, 7, 8),
(21, 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `nama`) VALUES
(0, 'SuperAdmin', 'Super Admin'),
(1, 'Shipyard', 'Shipyard'),
(2, 'Planning', 'Planning Department'),
(3, 'AdminOwner', 'Admin'),
(4, 'ShipMan', 'Ship Manager'),
(5, 'Superintendent', 'Superintendent'),
(6, 'DockMon', 'Docking Monitoring'),
(7, 'ProjectLeader', 'Project Leader'),
(8, 'Qcqa', 'QC/QA'),
(9, 'WorkshopOfficer', 'Workshop Officer'),
(10, 'othershipman', 'Ship Manager'),
(11, 'othersi', 'Superintendent'),
(12, 'otherdockmon', 'Docking Monitoring'),
(13, 'otherplanning', 'Planning Department'),
(14, 'otherprolead', 'Project Leader');

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
(0, 'Super-Admin'),
(1, 'Admin Shipyard'),
(2, 'Admin Owner'),
(3, 'Superintendent'),
(4, 'Docking Monitoring'),
(5, 'Ship Manager'),
(6, 'Project Leader'),
(7, 'QC/QA'),
(8, 'Workshop Officer'),
(9, 'Planning Department'),
(10, 'Other Shipyard'),
(11, 'Other Owner');

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
(1, 1, 'Dashboard', 'Shipyard', 'fas fa-fw fa-tachometer-alt', 1),
(2, 1, 'Profil Perusahaan', 'Shipyard/perusahaan', 'fas fa-fw fa-building', 1),
(3, 2, 'Dock Space', 'Planning/dockspace', 'fas fa-fw fa-ship', 1),
(4, 2, 'Atur Jadwal', 'Planning/jadwal', 'fas fa-fw fa-calendar-alt', 1),
(11, 3, 'Dashboard', 'AdminOwner', 'fas fa-fw fa-tachometer-alt', 1),
(12, 3, 'Profil Perusahaan', 'AdminOwner/perusahaan', 'fas fa-fw fa-building', 1),
(13, 3, 'Data Pengguna', 'AdminOwner/user', 'fas fa-fw fa-user-plus', 1),
(14, 5, 'Data Kapal', 'Superintendent/kapal\r\n', 'fas fa-fw fa-plus-square', 1),
(15, 5, 'Riwayat Maintenance', 'Superintendent/maintenance', 'fas fa-fw fa-history', 1),
(16, 5, 'Jadwal Survey', 'Superintendent/survey', 'fas fa-fw fa-calendar-alt', 1),
(17, 6, 'List Galangan', 'DockMon/galangan', 'fas fa-fw fa-ship', 1),
(18, 6, 'Docking Space', 'DockMon/docking', 'fas fa-fw fa-search', 1),
(19, 6, 'Repair List', 'DockMon/repairlist', 'fas fa-fw fa-tools', 1),
(21, 0, 'Dashboard', 'SuperAdmin', 'fas fa-fw fa-tachometer-alt', 1),
(22, 0, 'Manage User', 'SuperAdmin/manage', 'fas fa-fw fa-user-cog', 1),
(23, 4, 'Dashboard', 'ShipMan', 'fas fa-fw fa-tachometer-alt', 1),
(24, 4, 'Profil Perusahaan', 'ShipMan/perusahaan', 'fas fa-fw fa-building', 1),
(25, 1, 'Data Pengguna', 'Shipyard/user', 'fas fa-fw fa-user-plus', 1),
(26, 7, 'Dashboard', 'ProjectLeader', 'fas fa-fw fa-tachometer-alt', 1),
(27, 7, 'Repair List', 'ProjectLeader/repair', 'fas fa-fw fa-tools', 1),
(28, 8, 'Dashboard', 'Qcqa', 'fas fa-fw fa-tachometer-alt', 1),
(29, 9, 'Dashboard', 'WorkshopOfficer', 'fas fa-fw fa-tachometer-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `galangan`
--
ALTER TABLE `galangan`
  ADD PRIMARY KEY (`id_galangan`);

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`id_kapal`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id_maintenance`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `pilihkapal`
--
ALTER TABLE `pilihkapal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`id_repair`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`),
  ADD KEY `data_kapal` (`kapal`);

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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `galangan`
--
ALTER TABLE `galangan`
  MODIFY `id_galangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kapal`
--
ALTER TABLE `kapal`
  MODIFY `id_kapal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id_maintenance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pilihkapal`
--
ALTER TABLE `pilihkapal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `id_repair` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `survey`
--
ALTER TABLE `survey`
  ADD CONSTRAINT `survey_ibfk_1` FOREIGN KEY (`kapal`) REFERENCES `kapal` (`id_kapal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
