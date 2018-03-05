-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2016 at 07:05 PM
-- Server version: 5.6.30-1+deb.sury.org~xenial+2
-- PHP Version: 7.0.9-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `id_marka` int(11) NOT NULL,
  `status` int(255) NOT NULL,
  `cover` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `nazwa`, `opis`, `id_marka`, `status`, `cover`) VALUES
(12, 'fadfgds', 'dasffdsa', 9, 1, ''),
(14, 'fad', 'dasf', 2, 2, ''),
(15, 'fad', 'dasf', 6, 1, ''),
(17, 'asfd', 'fasd', 2, 1, ''),
(19, 'fdsa', 'fasd', 2, 2, ''),
(21, 'fdsa', 'fasd', 2, 1, ''),
(28, 'fdas', 'fdas', 2, 1, ''),
(32, 'gfs', 'gfds', 2, 0, ''),
(33, 'gfs', 'gfds', 1, 0, ''),
(34, 'gfs', 'gfds', 2, 0, ''),
(35, 'dsa', 'fdsa', 1, 0, ''),
(36, 'dsa', 'fdsa', 2, 0, ''),
(39, 'dsa', 'fdsa', 1, 0, ''),
(40, 'fdas', 'gfs', 1, 0, ''),
(41, 'fdsaasgfagfds', 'fsdafsda', 8, 0, ''),
(43, 'fdas', 'sfgad', 1, 0, ''),
(44, 'fdas', 'sfgad', 1, 0, ''),
(45, 'fdsa', 'fdsa', 0, 0, ''),
(46, 'gasfd', 'fdsa', 3, 1, ''),
(47, 'gfads', 'fgasd', 0, 1, ''),
(48, 'fad', 'fagd', 0, 1, ''),
(49, 'fsda', 'gfsd', 0, 0, ''),
(50, 'fsda', 'gfsd', 0, 0, ''),
(51, 'gadf', 'gadf', 2, 1, ''),
(52, 'fdsa', 'fdas', 2, 1, ''),
(53, 'fdsa', 'asfd', 3, 1, ''),
(54, 'fdsa', 'fsda', 0, 0, ''),
(55, 'fdsa', 'fsda', 0, 0, ''),
(56, 'fsda', 'fdas', 2, 1, ''),
(57, 'gafd', 'fsda', 1, 0, ''),
(58, 'fdsa', 'fsda', 2, 2, ''),
(59, 'fsda', 'fdgsaf', 2, 0, ''),
(60, 'gfsa', 'dsaf', 3, 3, ''),
(61, 'wreqr', 'qrew', 1, 0, ''),
(62, 'asgf', 'gasf', 1, 2, ''),
(63, 'gfsd', 'gfsad', 2, 3, 'Array'),
(64, 'dfas', 'fdsa', 3, 0, 'Array'),
(65, '999999999999999999', '99999999999999999999999', 4, 0, 'Array'),
(66, 'fsda', 'gfdasfsdfa', 1, 4, 'Array'),
(67, '', '', 0, 0, 'Array'),
(68, '67', 'fdas', 1, 0, 'Array'),
(69, 'fdas', 'fdsa', 1, 1, 'Array'),
(70, 'fdas', 'fdsa', 1, 1, 'Array'),
(71, 'fdas', 'fdsa', 1, 1, 'Array'),
(72, '', '', 0, 0, 'Array'),
(73, 'sfds', 'fdsa', 0, 0, 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

CREATE TABLE `marka` (
  `id` int(11) NOT NULL,
  `marka` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marka`
--

INSERT INTO `marka` (`id`, `marka`) VALUES
(1, 'bmv'),
(2, 'audi'),
(3, 'citroen'),
(10, 'ladna'),
(11, 'nowa marka'),
(12, 'rover'),
(13, 'seat');

-- --------------------------------------------------------

--
-- Table structure for table `status1`
--

CREATE TABLE `status1` (
  `id` int(11) NOT NULL,
  `status1` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `status1`
--

INSERT INTO `status1` (`id`, `status1`) VALUES
(0, 'dostępny'),
(1, 'nie ma'),
(2, 'fajny'),
(3, 'nie będzie'),
(4, 'jest samochod\r\n'),
(5, 'nie wiem'),
(6, 'nie wiem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status1`
--
ALTER TABLE `status1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `marka`
--
ALTER TABLE `marka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `status1`
--
ALTER TABLE `status1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
