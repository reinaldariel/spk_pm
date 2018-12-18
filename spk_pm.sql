-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 12:06 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_pm`
--

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `k_nomor` varchar(5) NOT NULL,
  `C1CF1` int(1) NOT NULL,
  `C1CF2` int(1) NOT NULL,
  `C1CF3` int(1) NOT NULL,
  `C1CF4` int(1) NOT NULL,
  `C1CF5` int(1) NOT NULL,
  `C1CF6` int(1) NOT NULL,
  `C1SF1` int(1) NOT NULL,
  `C1SF2` int(1) NOT NULL,
  `C1SF3` int(1) NOT NULL,
  `C2CF1` int(1) NOT NULL,
  `C2CF2` int(1) NOT NULL,
  `C2CF3` int(1) NOT NULL,
  `C2SF1` int(1) NOT NULL,
  `C2SF2` int(1) NOT NULL,
  `C2SF3` int(1) NOT NULL,
  `C3CF1` int(1) NOT NULL,
  `C3CF2` int(1) NOT NULL,
  `C3CF3` int(1) NOT NULL,
  `C3SF1` int(1) NOT NULL,
  `k_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`k_nomor`, `C1CF1`, `C1CF2`, `C1CF3`, `C1CF4`, `C1CF5`, `C1CF6`, `C1SF1`, `C1SF2`, `C1SF3`, `C2CF1`, `C2CF2`, `C2CF3`, `C2SF1`, `C2SF2`, `C2SF3`, `C3CF1`, `C3CF2`, `C3CF3`, `C3SF1`, `k_nama`) VALUES
('k0001', 4, 6, 3, 2, 2, 5, 7, 9, 3, 8, 2, 5, 1, 6, 3, 2, 5, 7, 7, 'Kandida 1'),
('k0002', 4, 6, 3, 2, 2, 5, 5, 5, 3, 5, 3, 5, 4, 6, 3, 5, 5, 5, 5, 'Kandidat 2'),
('k0003', 1, 2, 3, 2, 2, 9, 7, 9, 3, 8, 2, 1, 1, 2, 3, 2, 1, 7, 9, 'Kt 3'),
('k0004', 3, 2, 6, 7, 5, 8, 5, 3, 6, 6, 7, 6, 7, 8, 5, 8, 5, 7, 3, 'moudy'),
('k0005', 3, 2, 6, 7, 5, 8, 5, 3, 6, 6, 7, 6, 7, 8, 5, 8, 5, 7, 3, 'moudy'),
('k0006', 8, 6, 5, 7, 4, 5, 6, 7, 4, 6, 8, 6, 8, 5, 3, 5, 7, 8, 5, 'moudy');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `k_nomor` varchar(5) NOT NULL,
  `k_kriteria` varchar(100) NOT NULL,
  `k_bobot` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`k_nomor`, `k_kriteria`, `k_bobot`) VALUES
('C1', 'Kapasitas Intelektual', 40),
('C2', 'Sikap Kerja', 35),
('C3', 'Perilaku', 25);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pgw_id` varchar(5) NOT NULL,
  `pgw_nama` varchar(50) NOT NULL,
  `pgw_password` varchar(20) NOT NULL,
  `pgw_jabatan` enum('tester','korektor','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pgw_id`, `pgw_nama`, `pgw_password`, `pgw_jabatan`) VALUES
('0', '0', '0', 'tester'),
('pgw01', '0', '0', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `selisih_nilai_gap`
--

CREATE TABLE `selisih_nilai_gap` (
  `selisih` int(2) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selisih_nilai_gap`
--

INSERT INTO `selisih_nilai_gap` (`selisih`, `bobot`) VALUES
(-5, 1),
(-4, 2),
(-3, 3),
(-2, 4),
(-1, 5),
(0, 6),
(1, 5.5),
(2, 4.5),
(3, 3.5),
(4, 2.5),
(5, 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `sk_nomor` varchar(5) NOT NULL,
  `sk_sub_kriteria` varchar(100) NOT NULL,
  `sk_kategori` enum('CF','SF') NOT NULL,
  `sk_bobot` int(2) NOT NULL,
  `sk_nilai_acuan` int(1) NOT NULL,
  `sk_no_kriteria` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`sk_nomor`, `sk_sub_kriteria`, `sk_kategori`, `sk_bobot`, `sk_nilai_acuan`, `sk_no_kriteria`) VALUES
('C1CF1', 'Common Sense', 'CF', 20, 5, 'C1'),
('C1CF2', 'Verbalisasi Ide', 'CF', 15, 5, 'C1'),
('C1CF3', 'Sistematika Berefikir', 'CF', 15, 3, 'C1'),
('C1CF4', 'Penalaran dan Solusi Real', 'CF', 10, 4, 'C1'),
('C1CF5', 'Konsentrasi', 'CF', 10, 3, 'C1'),
('C1CF6', 'Logika Praktis', 'CF', 10, 4, 'C1'),
('C1SF1', 'Fleksibilitas Berfikir', 'SF', 10, 2, 'C1'),
('C1SF2', 'Imajinasi Kreatif', 'SF', 5, 2, 'C1'),
('C1SF3', 'Antisipasi', 'SF', 5, 4, 'C1'),
('C2CF1', 'Energi Psikis', 'CF', 20, 4, 'C2'),
('C2CF2', 'Ketelitian dan Tanggung Jawab', 'CF', 20, 5, 'C2'),
('C2CF3', 'Kehati - hatian', 'CF', 20, 4, 'C2'),
('C2SF1', 'Pengendalian Perasaan', 'SF', 15, 3, 'C2'),
('C2SF2', 'Dorongan Berprestasi', 'SF', 15, 2, 'C2'),
('C2SF3', 'Vitalitas dan Perencana', 'SF', 10, 3, 'C2'),
('C3CF1', 'Dominance (Kekuasaan)', 'CF', 30, 4, 'C3'),
('C3CF2', 'Influence (Pengaruh)', 'CF', 30, 3, 'C3'),
('C3CF3', 'Steadiness (Keteguhan Hati)', 'CF', 25, 4, 'C3'),
('C3SF1', 'Compliance (Pemenuhan)', 'SF', 15, 3, 'C3');

-- --------------------------------------------------------

--
-- Table structure for table `tampung_hasil`
--

CREATE TABLE `tampung_hasil` (
  `th_no` varchar(5) NOT NULL,
  `th_nama` varchar(50) NOT NULL,
  `th_nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tampung_hasil`
--

INSERT INTO `tampung_hasil` (`th_no`, `th_nama`, `th_nilai`) VALUES
('k0001', 'Kandida 1', 4.150416666666667),
('k0002', 'Kandidat 2', 4.943333333333333),
('k0003', 'Kt 3', 3.5404166666666668),
('k0004', 'moudy', 3.7670833333333333),
('k0005', 'moudy', 3.7670833333333333),
('k0006', 'moudy', 4.060833333333333);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`k_nomor`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`k_nomor`),
  ADD KEY `k_nomor` (`k_nomor`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pgw_id`);

--
-- Indexes for table `selisih_nilai_gap`
--
ALTER TABLE `selisih_nilai_gap`
  ADD PRIMARY KEY (`selisih`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`sk_nomor`),
  ADD KEY `sk_nomor` (`sk_nomor`),
  ADD KEY `sk_no_kriteria` (`sk_no_kriteria`);

--
-- Indexes for table `tampung_hasil`
--
ALTER TABLE `tampung_hasil`
  ADD PRIMARY KEY (`th_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`sk_no_kriteria`) REFERENCES `kriteria` (`k_nomor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
