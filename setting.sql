-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 06:49 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `setting`
--

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Bio` varchar(300) NOT NULL,
  `PhoneNumber` varchar(11) DEFAULT NULL,
  `Birthday` date NOT NULL,
  `Address1` varchar(60) NOT NULL,
  `City` varchar(60) NOT NULL,
  `State1` varchar(60) NOT NULL,
  `Zip` varchar(5) NOT NULL,
  `Password1` varchar(60) NOT NULL,
  `images` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `FirstName`, `LastName`, `Username`, `Email`, `Bio`, `PhoneNumber`, `Birthday`, `Address1`, `City`, `State1`, `Zip`, `Password1`, `images`, `Gender`) VALUES
(1, 'Ong', 'Weng', 'ong2', 'ongwei12345@gmail.com', ':D Be happy :D', '011-8871238', '1995-04-26', 'Mile 3 1/2 Penampang Road', 'Kota Kinabalu', 'Sabah', '68100', '12345', 'user_image/fam2.jpg', 'Male'),
(3, 'Hafiz', 'Salem', 'salem', 'hafizsale56m@gmail.com', 'Be yourself:)', '019-8765432', '1992-08-07', '2239  Hart Country Lane', 'Columbus', 'Georgia', '31907', '12345', 'images/nanas.jpg', 'Male'),
(5, 'Mika', 'Kayla', 'mikayla', 'messybun@gmail.com', 'Shopping is an ART.', '012-3486958', '1994-09-04', 'Jalan Cenderasari', 'Kuala Lumpur', 'Wilayah Persekutuan', '50646', '12345', 'images/castle.jpg', 'Female'),
(7, 'Mila', 'Natasha', 'mila', 'milanatasha_99@yahoo.com', 'I love shopping :]', '012-2717783', '1999-02-05', 'No 4 Jalan Raja Laut,', 'Kuala Lumpur', 'Wilayah Persekutuan', '50350', 'stywm99', 'images/pink clloud.jpg', 'Other');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
