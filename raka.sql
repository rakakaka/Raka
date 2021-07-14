-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 04:07 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `akses` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` date DEFAULT NULL,
  `tanggal_diupdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `username`, `password`, `akses`, `status`, `tanggal_dibuat`, `tanggal_diupdate`) VALUES
(1, 'Rafi', 'admin', '0192023a7bbd73250516f069df18b500', '1', 'aktif', '2021-06-04', '2021-06-04'),
(5, 'Raka Praditya', 'raka', '21232f297a57a5a743894a0e4a801fc3', '3', 'aktif', '2021-06-04', '2021-06-04'),
(6, 'Alby Syawal', 'alby', '21232f297a57a5a743894a0e4a801fc3', '4', 'aktif', '2021-06-04', '2021-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` enum('1','0') NOT NULL,
  `dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nik`, `nama`, `no_hp`, `email`, `tempat_lahir`, `tgl_lahir`, `username`, `password`, `token`, `dibuat`) VALUES
(3, '2018130054', 'Raka Kaka Praditya', '087723802268', 'rakakaka33@gmail.com', 'Jakarta', '2001-03-12', 'raka12', '0192023a7bbd73250516f069df18b500', '1', '2021-05-31'),
(6, '1374010805070001', 'Ilham', '08777749721', 'ilhamrafi44@gmail.com', 'Padang Panjang', '2021-06-01', 'ilhamrafi44', '0192023a7bbd73250516f069df18b500', '1', '2021-06-01'),
(9, '2580048863', 'Kaka', '5857224537867', 'rakakaka33@gmail.com', 'Cina', '2021-04-05', 'rkprdtya', '0192023a7bbd73250516f069df18b500', '1', '2021-06-04'),
(10, '1374010805070001', 'Maretha', '0880888088', 'amriananda@gmail.com', 'Bekasi', '2021-06-01', 'ara', '21232f297a57a5a743894a0e4a801fc3', '1', '2021-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(11) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `kursus_cust` varchar(255) DEFAULT NULL,
  `kursus_pilihan` varchar(255) DEFAULT NULL,
  `kursus_ptingkatan` varchar(255) DEFAULT NULL,
  `kursus_phari` varchar(255) DEFAULT NULL,
  `kursus_pjam` varchar(255) DEFAULT NULL,
  `kursus_harga` varchar(255) DEFAULT NULL,
  `kursus_bukti` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` date DEFAULT NULL,
  `tanggal_diupdate` date DEFAULT NULL,
  `kursus_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `id_cust`, `kursus_cust`, `kursus_pilihan`, `kursus_ptingkatan`, `kursus_phari`, `kursus_pjam`, `kursus_harga`, `kursus_bukti`, `tanggal_dibuat`, `tanggal_diupdate`, `kursus_status`) VALUES
(28, 3, 'Raka', 'bimbel', 'Smp', 'Selasa - Kamis', '17:00 - 18:30', ' 1500000', '2021-06-04_act login.png', '2021-06-04', '2021-06-04', 'aktif'),
(29, 3, 'Raka', 'kursus', 'basic1', 'Selasa - Kamis', '18:30 - 20:00', ' 2350000', '2021-06-04_act login.png', '2021-06-04', '2021-06-04', 'aktif'),
(30, 3, 'Raka', 'privat', 'Sd1', 'Senin - Rabu', '08:00 - 09:30', ' 1500000', '2021-06-04_act login.png', '2021-06-04', '2021-06-04', 'aktif'),
(32, 9, 'Kaka', 'privat', 'Sd1', 'Rabu - Jumat', '18:30 - 20:00', ' 2100000', '2021-06-04_IMG_20210604_161944_231.jpg', '2021-06-04', '2021-06-04', 'aktif'),
(33, 9, 'Kaka', 'bimbel', 'Sma', 'Senin - Rabu', '14:00 - 15:30', ' 3500000', '2021-06-04_IMG_20210604_161944_231.jpg', '2021-06-04', '2021-06-04', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
