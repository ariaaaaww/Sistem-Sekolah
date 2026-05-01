-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2026 at 05:16 AM
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
-- Database: `panggung_kita`
--

-- --------------------------------------------------------

--
-- Table structure for table `karya`
--

CREATE TABLE `karya` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text,
  `kategori` varchar(100) DEFAULT NULL,
  `anggota` varchar(255) DEFAULT NULL,
  `jumlah_anggota` int DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `karya`
--

INSERT INTO `karya` (`id`, `judul`, `deskripsi`, `kategori`, `anggota`, `jumlah_anggota`, `gambar`, `tanggal_upload`) VALUES
(1, 'Manusia dan Sejarah', 'Manusia dan sejarah memiliki hubungan yang erat karena setiap peristiwa dalam kehidupan manusia menjadi bagian dari sejarah. Sejarah membantu manusia memahami masa lalu, perubahan, serta hubungan sebab-akibat agar dapat menjadi pelajaran untuk masa kini dan masa depan.', 'Sejarah', 'Frea Gisella - Chelsea Olivia', 10, 'image 1.png', NULL),
(2, 'Sistem Tata Surya', 'Sistem tata surya adalah kumpulan benda langit yang berpusat pada Matahari dan dikelilingi oleh planet-planet serta benda langit lainnya. Setiap planet bergerak mengelilingi Matahari pada orbitnya karena adanya gaya gravitasi. Melalui karya ini, diharapkan pembaca dapat memahami susunan dan karakteristik dasar dari tata surya.', 'Ilmu Pengetahuan', 'Dita Kayangan', 1, 'image 2.png', NULL),
(3, 'Ini Indonesia Ku Digital Illustration', 'This is a digital illustration on Photoshop. It shows about cultures in Indonesia. There are 3 points or cultures in this artwork, they are Okokan from Tabanan, Bali, Reog Ponorogo from East Java, and Wayang Kulit that thrive in Center Java (Jawa Tengah) and East Java (Jawa Timur). Semoga berkenan', 'Pendidikan Pancasila', 'WimsArt', 1, 'image 3.png', NULL),
(4, 'Dasar Pemrograman Python', 'Dasar pemrograman Python membahas pengenalan bahasa pemrograman Python yang digunakan untuk membuat berbagai jenis program dan aplikasi. Materi yang dipelajari meliputi konsep dasar seperti variabel, tipe data, percabangan, perulangan, dan fungsi. Karya ini bertujuan membantu pemula memahami logika pemrograman dan cara menulis kode Python secara sederhana.', 'Pemrograman', 'Development', 4, 'image 4.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int NOT NULL,
  `lampiran_id` int NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

CREATE TABLE `lampiran` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text,
  `kategori` varchar(100) DEFAULT NULL,
  `anggota` varchar(255) DEFAULT NULL,
  `jumlah_anggota` int DEFAULT '1',
  `gambar_lampiran1` varchar(255) DEFAULT NULL,
  `gambar_lampiran2` varchar(255) DEFAULT NULL,
  `gambar_lampiran3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lampiran`
--

INSERT INTO `lampiran` (`id`, `judul`, `deskripsi`, `kategori`, `anggota`, `jumlah_anggota`, `gambar_lampiran1`, `gambar_lampiran2`, `gambar_lampiran3`) VALUES
(1, 'Manusia dan Sejarah', 'Manusia dan sejarah memiliki hubungan yang erat karena setiap peristiwa dalam kehidupan manusia menjadi bagian dari sejarah...', 'Sejarah', 'Frea Gisella - Chelsea Olivia', 10, 'image 1.png', 'image 2.png', 'image 3.png'),
(2, 'Sistem Tata Surya', 'Sistem tata surya adalah kumpulan benda langit yang berpusat pada Matahari...', 'Ilmu Pengetahuan', 'Dita Kayangan', 1, 'image 1.png', 'image 2.png', 'image 3.png'),
(3, 'Ini Indonesia Ku Digital Illustration', 'This is a digital illustration on Photoshop. It shows about cultures in Indonesia...', 'Pendidikan Pancasila', 'WimsArt', 1, 'image 1.png', 'image 2.png', 'image 3.png'),
(4, 'Dasar Pemrograman Python', 'Dasar pemrograman Python membahas pengenalan bahasa pemrograman Python yang digunakan untuk membuat berbagai jenis program dan aplikasi...', 'Pemrograman', 'Development', 4, 'image 1.png', 'image 2.png', 'image 3.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karya`
--
ALTER TABLE `karya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_komentar_lampiran` (`lampiran_id`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karya`
--
ALTER TABLE `karya`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_komentar_lampiran` FOREIGN KEY (`lampiran_id`) REFERENCES `lampiran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
