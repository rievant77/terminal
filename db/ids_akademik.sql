-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 08:12 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ids_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkutan`
--

CREATE TABLE `angkutan` (
  `noken` varchar(32) NOT NULL,
  `po` varchar(50) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `kp` varchar(50) NOT NULL,
  `uji` varchar(32) NOT NULL,
  `naik` int(50) NOT NULL,
  `turun` int(50) NOT NULL,
  `kel` varchar(500) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angkutan`
--

INSERT INTO `angkutan` (`noken`, `po`, `supir`, `kp`, `uji`, `naik`, `turun`, `kel`, `tgl`) VALUES
('54fs', 'MARITA', 'Dedi Rustandi', '3455fs', '2019-07-22', 12, 1, 'Ban Cadangan, Segitiga Pengaman, Dongkrak', '2019-07-25'),
('87655', 'MARITA', 'UDIN', 'bfgb877', '2019-07-22', 3, 3, 'Segitiga Pengaman, Dongkrak, Lampu Senter', '2019-07-25'),
('b3', 'MARITA', 'cecep', 'wer3', '2019-07-22', 12, 4, 'Ban Cadangan', '0000-00-00'),
('gs5566', 'MARITA', 'ASEP', 'we32', '2019-07-22', 1, 1, 'Ban Cadangan', '0000-00-00'),
('hh', 'MARITA', 'Dedi Rustandi', 'hh', '2019-07-23', 1, 1, 'Dongkrak', '0000-00-00'),
('kllkj554', 'MARITA', 'UDIN', '33fcx', '2019-07-22', 1, 4, 'Ban Cadangan', '0000-00-00'),
('qq12', 'MARITA', 'UDIN', 'wer3', '2019-07-23', 3, 4, 'Pembuka Roda', '0000-00-00');

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
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Foto` varchar(150) NOT NULL DEFAULT 'ids.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Id_Usergroup_User`, `Username`, `Password`, `Foto`) VALUES
(1, 1, 'admin', '$2y$10$V7zDd2Fz3QBmWFz3UnZBM.vjDK.AOTTjIdssUY8rhcBjEEJrxY7ma', 'ids.jpg'),
(18, 2, '098980', '$2y$10$25GSpBPnHynFHGafwjdyUeuwy6kF/6/pKLBSVdxk61suyPf5Tsugu', 'ids.jpg'),
(19, 3, 'D980098', '$2y$10$EEvgrytjn7UkxTXtefDx0ux60r.6jGwmo3pYS.2VybRApkvm97rGi', 'ids.jpg');

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
(2, 'Dosen'),
(3, 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angkutan`
--
ALTER TABLE `angkutan`
  ADD PRIMARY KEY (`noken`);

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
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`Id_Usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `Id_Usergroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_usergroup` FOREIGN KEY (`Id_Usergroup_User`) REFERENCES `usergroup` (`Id_Usergroup`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
