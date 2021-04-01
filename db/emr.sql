-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 03:52 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emr`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `pat_id` varchar(25) NOT NULL,
  `book_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`pat_id`, `book_time`, `status`) VALUES
('PT100031322', '2021-04-10 08:30:00', 0),
('PT100031322', '2021-03-31 06:27:00', 0),
('PT100031322', '2021-03-31 02:36:00', 0),
('PT100031322', '2021-03-31 06:34:00', 0),
('PT100031321', '2021-04-09 09:48:00', 0),
('PT100031321', '2021-05-01 10:00:00', 0),
('PT1000313957902', '2021-05-01 10:00:00', 1),
('PT10003131042621', '2021-03-31 00:42:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(30) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`) VALUES
(1, 'sasi', '81dc9bdb52d04dc20036dbd8313ed055', 'rahd006@gmail.com'),
(2, 'lokesh', '81dc9bdb52d04dc20036dbd8313ed055', 's.logeshkarthik@gmail.com'),
(5, 'Harish', '81dc9bdb52d04dc20036dbd8313ed055', 'hari@gmail.com'),
(6, 'santhosh', '81dc9bdb52d04dc20036dbd8313ed055', 'san@gmail.com'),
(7, 'saravana', '81dc9bdb52d04dc20036dbd8313ed055', 'sk@gmail.com'),
(8, 'Vignesh', '81dc9bdb52d04dc20036dbd8313ed055', 'viki@gmail.com'),
(9, 'Lokesh', '81dc9bdb52d04dc20036dbd8313ed055', 'loki@gmail.com'),
(10, 'Vigneshkumar', '81dc9bdb52d04dc20036dbd8313ed055', 'vignesh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient_det`
--

CREATE TABLE `patient_det` (
  `id` int(30) NOT NULL,
  `pat_id` varchar(25) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `age` int(30) NOT NULL,
  `gender` int(12) NOT NULL,
  `ph_number` varchar(300) NOT NULL DEFAULT '0',
  `height` float(10,2) NOT NULL,
  `weight` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_det`
--

INSERT INTO `patient_det` (`id`, `pat_id`, `name`, `email`, `password`, `age`, `gender`, `ph_number`, `height`, `weight`) VALUES
(1, 'PT100031321', 'demo', 'demo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 20, 1, '907947932', 4.50, 76),
(2, 'PT100031322', 'lokesh', 'loki@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 13, 1, '977492370', 7.50, 56),
(3, 'PT1000313957902', 'test', 'test@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, '0', 0.00, 0),
(4, 'PT10003131042621', 'Saravanan', 'sk18@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, '0', 0.00, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_det`
--
ALTER TABLE `patient_det`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient_det`
--
ALTER TABLE `patient_det`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
