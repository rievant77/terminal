-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2019 at 03:51 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `terminal`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkutan`
--

CREATE TABLE `angkutan` (
  `id` int(11) NOT NULL,
  `noken` varchar(32) NOT NULL,
  `po` varchar(50) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `kp` varchar(50) NOT NULL,
  `uji` varchar(32) NOT NULL,
  `naik` int(50) NOT NULL,
  `turun` int(50) NOT NULL,
  `jml` int(50) NOT NULL,
  `kel` varchar(500) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angkutan`
--

INSERT INTO `angkutan` (`id`, `noken`, `po`, `supir`, `kp`, `uji`, `naik`, `turun`, `jml`, `kel`, `tgl`) VALUES
(1, 'b3', 'MARITA', 'supri', 'wer3', '2019-07-22', 12, 4, 0, 'Ban Cadangan, Segitiga Pengaman', '0000-00-00'),
(2, 'cxx', 'MARITA', 'Dedi Rustandi', 'wer3', '2019-07-29', 1, 1, 2, 'Ban Cadangan, Segitiga Pengaman', '2019-07-29'),
(3, 'dddd', 'MARITA', 'Dedi Rustandi', 'wer3', '2019-07-29', 3, 34, 0, 'Ban Cadangan', '2019-07-29'),
(4, 'dss', 'MARITA', 'Dedi Rustandi', '3455fs', '2019-07-29', 1, 1, 0, 'Ban Cadangan', '0000-00-00'),
(5, 'gs5566', 'MARITA', 'ASEP', 'we32', '2019-07-22', 1, 1, 0, 'Ban Cadangan', '0000-00-00'),
(6, 'hh', 'MARITA', 'Dedi Rustandi', 'hh', '2019-07-23', 1, 1, 0, 'Dongkrak, Lampu Senter', '0000-00-00'),
(7, 'hh12', 'MARITA', 'qq', 'qqws', '2019-07-29', 2, 2, 0, 'Ban Cadangan, Segitiga Pengaman', '0000-00-00'),
(8, 'kllkj554', 'MARITA', 'UDIN', '33fcx', '2019-07-22', 1, 4, 0, 'Ban Cadangan, Segitiga Pengaman, Dongkrak, Pembuka Roda, Lampu Senter', '2019-07-29'),
(9, 'mmm', 'MARITA', 'UDIN', 'wer3', '2019-07-29', 1, 2, 0, 'Dongkrak, Pembuka Roda', '2019-07-29'),
(10, 'qq12', 'MARITA', 'UDIN', 'wer3', '2019-07-23', 3, 4, 0, 'Dongkrak, Pembuka Roda', '0000-00-00'),
(11, 'sssss', 'MARITA', 'Dedi Rustandi', 'wer3', '2019-07-29', 1, 1, 0, 'Ban Cadangan', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIP` varchar(50) NOT NULL,
  `Nama_Dosen` varchar(50) NOT NULL,
  `Tanggal_Lahir` varchar(32) NOT NULL,
  `JK` enum('L','P') NOT NULL,
  `No_Telp` varchar(50) NOT NULL,
  `Alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIP`, `Nama_Dosen`, `Tanggal_Lahir`, `JK`, `No_Telp`, `Alamat`) VALUES
('098980', 'Derry', '2017-03-15', 'L', '2324', 'aasdad'),
('3456356', 'sdfgs', '2019-07-17', 'P', '34q62', 'srfghrs'),
('DS003', 'Iksan Derry S', '2017-03-14', 'L', '0897761', 'Cimahi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_User` int(11) NOT NULL,
  `Id_Usergroup_User` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Foto` varchar(150) NOT NULL DEFAULT 'ids.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Id_Usergroup_User`, `nama`, `Username`, `Password`, `Foto`) VALUES
(1, 1, 'admin', 'admin', '$2y$10$V7zDd2Fz3QBmWFz3UnZBM.vjDK.AOTTjIdssUY8rhcBjEEJrxY7ma', 'ids.jpg'),
(27, 3, 'kadis', 'kadis', '$2y$10$LFQHeMNEgQdpqcAxUr8MmO7PscCBcWQiVtt8rgl0o8gXrwGwXmpTW', 'ids.jpg'),
(28, 2, 'user', 'user', '$2y$10$j6ELSBky1.S1AsgwVvFlAusqmAvyYf0Bm5Vg2AEyepnI.qYcDOZn2', 'ids.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `id` int(11) NOT NULL,
  `nm` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `lvl` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`id`, `nm`, `username`, `pwd`, `lvl`) VALUES
(1, '1', 'admin', 'admin', 'admin'),
(2, '2', 'user', 'user', 'user'),
(3, '3', 'kadis', 'kadis', 'kadis');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `Id_Usergroup` int(11) NOT NULL,
  `Nama_Usergroup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`Id_Usergroup`, `Nama_Usergroup`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'KADIS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angkutan`
--
ALTER TABLE `angkutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`),
  ADD KEY `FK_user_usergroup` (`Id_Usergroup_User`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`Id_Usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angkutan`
--
ALTER TABLE `angkutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `Id_Usergroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
