-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 03:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user1`
--

CREATE TABLE `tbl_user1` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user1`
--

INSERT INTO `tbl_user1` (`id`, `name`, `email`, `password`) VALUES
(1, 'Inosuke', 'inosuke10@gmail.com', '$2y$10$DAO14AB7SWO.nEdAXCyrOu.L0tYcaCxZvAoMOXmaTfqLnFWGYqd0y'),
(2, 'lily', 'lily@gmail.com', '$2y$10$DNsy/OkwY3.cgFSf8kATJ.Og9tilGf48MFvS7oLjB8g75VHvZLjA2'),
(3, 'bloom', 'bloom@gmail.com', '$2y$10$Io1Xu5jAm7xUL5mgD/P6MeQzrU.U/LHYiT7KOkW460voDLvMtCf6i'),
(4, 'helly', 'helly@gmail.com', '$2y$10$HBPcx14ub3fl3dQcOl3iduJN/T8U8M.Wbwk8yjXuKmXCA4P6jTCz.'),
(5, 'zoro', 'zoro@gmail.com', '$2y$10$xJVTfuUQA4Gdz7RdSP9xaubNkAs4GJa.TvhGJBOg5Ft7nFV8qf73S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user1`
--
ALTER TABLE `tbl_user1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user1`
--
ALTER TABLE `tbl_user1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
