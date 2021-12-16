-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 08:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_scm`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `dataPemesan` varchar(1000) NOT NULL,
  `buktiPerjanjian` varchar(200) NOT NULL,
  `buktiPelunasan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `dataPemesan`, `buktiPerjanjian`, `buktiPelunasan`) VALUES
(1, 22, '2021-12-15 04:08:17', '', 'administrasi/Luxxy_New.png', ''),
(2, 24, '2021-12-15 04:09:57', 'sadasdaskdjljasdasd', 'administrasi/Ryzen_New.png', ''),
(3, 22, '2021-12-15 04:14:13', 'jlkajsdljasdjasd\r\nsalkdjlasjaskjasd', 'administrasi/Ryzen_New.png', 'administrasi/Zuxxy.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `namaPelanggan` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('developer','customer','material','pln','pdam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email`, `namaPelanggan`, `password`, `level`) VALUES
(3, 'hallo@gmail.com', '', '123456', 'developer'),
(4, 'abdil@gmail.com', 'abdil aziez', '202201', 'customer'),
(5, 'pln@gmail.com', '', '123456', 'pln'),
(6, 'pdam@gmail.com', '', '123456', 'pdam'),
(7, 'material@gmail.com', '', '123456', 'material'),
(8, 'halloguys@gmail.com', 'bagus', '0000', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `estimasi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `dokumentasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `iduser`, `tanggal`, `estimasi`, `status`, `dokumentasi`) VALUES
(28, 8, '2021-12-16 07:02:44', '10 Hari', 'Pembangunan drainase', 'barang/1605551034132-pelajar-internasional.jpg'),
(29, 8, '2021-12-16 07:04:07', '10 Hari', 'Instalasi listrik', 'barang/0-poster-6.jpg'),
(30, 8, '2021-12-16 07:04:36', '10 Hari', 'Instalasi pdam', 'barang/tipe-rumah-36.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `deskripsirumah` varchar(1000) NOT NULL,
  `deskripsimaterial` varchar(1000) NOT NULL,
  `deskripsipdam` varchar(1000) NOT NULL,
  `deskripsipln` varchar(1000) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idbarang`, `iduser`, `deskripsirumah`, `deskripsimaterial`, `deskripsipdam`, `deskripsipln`, `image`) VALUES
(22, 8, '1.Hallo\r\n2.Guys', '1.Hallo\r\n2.Guys', 'asajsahsa', 'listrik 500watt', 'barang/char (6).png'),
(23, 4, 'ajsajasj', 'asjjiajisjaja', 'iajisjaijsaj', 'jaijsiajsiaj', 'barang/0-poster-6.jpg'),
(24, 4, 'sadkasdasdsa\r\nsadasdlasd\r\n', 'sadknsakdksa\r\nsaldlasjdlsada\r\n', 'alsdlasjdklasd\r\nsaadalsdlkajs', 'slkdalkjdlasjlk', 'barang/Luxxy_New.png'),
(25, 8, 'askajlksjlakjs', 'lkajslajkljskla', 'akjsklajljkajkla', 'sajkljalkjskljalj', 'barang/char (5).png'),
(26, 4, 'klasjdlsad', 'dsakjaksjdklajs', 'lsdajlajlskjajs', 'ksajlkjkasjkjla', 'barang/char (4).png'),
(27, 3, 'sa;dk;lsakdlksalk;', ';skdaklaks;d;as;ldk;sal', 'asl;dks;alk;kasdkl;ask', 'lk;sakdkas;kdkaskd', 'barang/char.png'),
(28, 4, 'sajdhaskhdkajhsda', 'asdsadasdasda', 'asdasdasd', 'asdsadsada', 'barang/char (7).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `iduser` (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
