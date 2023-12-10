-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2023 at 01:25 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webforumppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int NOT NULL,
  `id_pertanyaan` int DEFAULT NULL,
  `jawaban` text,
  `upvote` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `dijawab` varchar(100) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_pertanyaan`, `jawaban`, `upvote`, `id_user`, `dijawab`, `waktu`) VALUES
(7, 3, '<p>Tarik Diafragma mu sampai bawah!</p><p>Lalu hembuskan!</p>', 0, 1, '12345', '1687186315'),
(9, 3, '<p>Ingat Quotes ini!</p><p><strong>â€œTATAKAE!â€</strong></p>', 9, 1, 'anonymous', '1687273195'),
(10, 3, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quasi animi a? Impedit, alias corrupti! Placeat quae corrupti assumenda delectus id nihil labore suscipit dolore eos consequatur laborum, adipisci eius quo sint voluptatibus possimus ab recusandae, optio, et totam enim doloremque reiciendis. Commodi obcaecati perspiciatis facere ut atque quo cupiditate! Aspernatur consectetur officia pariatur corrupti earum, sapiente tempore distinctio aut? Possimus saepe placeat excepturi porro obcaecati eligendi tempora explicabo, fugiat nostrum, suscipit ipsa similique dolorem qui provident eveniet fugit, quibusdam accusamus doloribus. Ipsa, incidunt totam ea libero, accusamus a dolorum officiis itaque perspiciatis odio quas delectus aperiam voluptatibus id at!</p>', 0, 1, '12345', '1687273320');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int NOT NULL,
  `id_jawaban` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `komentar` text,
  `waktu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_jawaban`, `id_user`, `komentar`, `waktu`) VALUES
(4, 7, 1, 'Sakit Kak ditarik terus!', '1687186426');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `pertanyaan` text,
  `waktu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_user`, `pertanyaan`, `waktu`) VALUES
(3, 2, 'Tutorial bernafas kak!', '1687183411');

-- --------------------------------------------------------

--
-- Table structure for table `upvote_log`
--

CREATE TABLE `upvote_log` (
  `id_upvote` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_jawaban` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `upvote_log`
--

INSERT INTO `upvote_log` (`id_upvote`, `id_user`, `id_jawaban`) VALUES
(1, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` enum('admin','customer') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses`) VALUES
(1, '12345', '$2y$10$jdseWn24pQIuqWbAwkRpgeHPPPfALf8ZpRnRFjJDNdcbM38zweFOq', 'customer'),
(2, 'admin', '$2y$10$4NJKeO4EMA547IPwsFJl1OiNHJfTahKPGzrvU7.VTajHek2eIy95S', 'admin'),
(3, 'vreal', '$2y$10$AR9uYTH3gWbNe0uSwHhEyeO3LaFYge38KPueZcoV1A6ICLMbPol9W', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_jawaban` (`id_jawaban`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `upvote_log`
--
ALTER TABLE `upvote_log`
  ADD PRIMARY KEY (`id_upvote`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jawaban` (`id_jawaban`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `upvote_log`
--
ALTER TABLE `upvote_log`
  MODIFY `id_upvote` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_ibfk_3` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_jawaban`) REFERENCES `jawaban` (`id_jawaban`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upvote_log`
--
ALTER TABLE `upvote_log`
  ADD CONSTRAINT `upvote_log_ibfk_2` FOREIGN KEY (`id_jawaban`) REFERENCES `jawaban` (`id_jawaban`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upvote_log_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
