-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2023 pada 09.09
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikomedi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `instagram`
--

CREATE TABLE `instagram` (
  `ID` int(11) NOT NULL,
  `URL` varchar(1500) DEFAULT NULL,
  `SOURCE` varchar(1500) DEFAULT NULL,
  `CAPTION` varchar(1500) DEFAULT NULL,
  `JUDULPOSTINGAN` varchar(100) NOT NULL,
  `IG` varchar(50) NOT NULL,
  `MEDIA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `instagram`
--

INSERT INTO `instagram` (`ID`, `URL`, `SOURCE`, `CAPTION`, `JUDULPOSTINGAN`, `IG`, `MEDIA`) VALUES
(1, 'https://www.instagram.com/p/Csh7uKCBL0v/', '1-fasilkom.jpg', '&quot;Research And Publication Collaboration For Reputable International Publications Based On Artificial Intelligence (AI) And The Internet.&quot;', 'Workshop on IoT 2023', 'fasilkom.upnvjatim', 'Fasilkom'),
(2, 'https://www.instagram.com/p/CP2i-gqNs7u/', '1-informatika.jpg', 'Seminar Nasional Informatika Bela Negara (SANTIKA) 2021.', 'Santika 2021', 'informatika.upnvjatim', 'Informatika'),
(3, 'https://www.instagram.com/p/Cf3cgbWpg86/', '1-sifo.jpeg', 'Seminar Nasional Teknologi dan Sistem Informasi (SITASI) 2022.', 'Sitasi 2021', 'sisfo_upnjatim', 'Sistem Informasi'),
(4, 'https://www.instagram.com/p/Cf3LZyZLvQl/', '1-sada.jpeg', 'Seminar Nasional Sains Data (SENADA) 2022.', 'Senada 2022', 'sada.upnjatim', 'Sains Data'),
(5, 'https://www.instagram.com/reel/CpGulo0tGnQ/', '1-bisnis digital.jpg', 'Kompetensi lulusan, profil lulusan, dan peluang kerja lulusan Sarjana Bisnis Digital.', 'Profil Lulusan Bisnis Digital', 'bisdi.upnvjatim', 'Bisnis Digital'),
(6, 'https://www.instagram.com/p/Cr20EGQRsoM/', '1-mti.jpg', 'Telah dibuka pendaftaran mahasiswa baru Magister Teknologi Informasi 15 Maret - 15 Mei 2023.', 'Pendaftaran Mahasiswa', 'mti.upnvjatim', 'M. Teknologi Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_konten`
--

CREATE TABLE `jenis_konten` (
  `ID` int(11) NOT NULL,
  `NAMA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_konten`
--

INSERT INTO `jenis_konten` (`ID`, `NAMA`) VALUES
(1, 'Feed'),
(2, 'Story'),
(3, 'Reels');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_user`
--

CREATE TABLE `jenis_user` (
  `ID` int(11) NOT NULL,
  `NAMA` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_user`
--

INSERT INTO `jenis_user` (`ID`, `NAMA`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten_history`
--

CREATE TABLE `konten_history` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL,
  `MEDIA_ID` int(11) DEFAULT NULL,
  `TANGGALPOSTING` date DEFAULT NULL,
  `JUDULPOSTING` varchar(50) DEFAULT NULL,
  `LINKKONTEN` varchar(200) DEFAULT NULL,
  `CAPTION` varchar(1000) DEFAULT NULL,
  `STATUS_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konten_history`
--

INSERT INTO `konten_history` (`ID`, `USER_ID`, `MEDIA_ID`, `TANGGALPOSTING`, `JUDULPOSTING`, `LINKKONTEN`, `CAPTION`, `STATUS_ID`) VALUES
(1, 1, 1, '2023-06-12', 'Testing 1', 'https://fasilkom.upnjatim.ac.id/polam/', '[Testing 1]', 2),
(2, 1, 3, '2023-07-06', 'Testing 2', 'https://fasilkom.upnjatim.ac.id/polam/', 'Testing 2', 3),
(4, 2, 5, '2023-06-15', 'Testing 3', 'https://fasilkom.upnjatim.ac.id/polam/', 'Testing\r\n1234', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `ID` int(11) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `LINK` varchar(200) DEFAULT NULL,
  `JENIS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`ID`, `NAMA`, `LINK`, `JENIS_ID`) VALUES
(1, 'FASILKOM', 'https://www.instagram.com/fasilkom.upnvjatim/', 1),
(2, 'TIFA', 'https://www.instagram.com/informatika.upnvjatim/', 1),
(3, 'SIFO', 'https://www.instagram.com/sisfo_upnjatim/', 1),
(4, 'SADA', 'https://www.instagram.com/sada.upnjatim/', 1),
(5, 'BISDI', 'https://www.instagram.com/bisdi.upnvjatim/', 1),
(6, 'MTI', 'https://www.instagram.com/mti.upnjatim/', 1),
(7, 'FASILKOM', 'https://www.instagram.com/fasilkom.upnvjatim/', 2),
(8, 'TIFA', 'https://www.instagram.com/informatika.upnvjatim/', 2),
(9, 'SIFO', 'https://www.instagram.com/sisfo_upnjatim/', 2),
(10, 'SADA', 'https://www.instagram.com/sada.upnjatim/', 2),
(11, 'BISDI', 'https://www.instagram.com/bisdi.upnvjatim/', 2),
(12, 'MTI', 'https://www.instagram.com/mti.upnjatim/', 2),
(13, 'FASILKOM', 'https://www.instagram.com/fasilkom.upnvjatim/', 3),
(14, 'TIFA', 'https://www.instagram.com/informatika.upnvjatim/', 3),
(15, 'SIFO', 'https://www.instagram.com/sisfo_upnjatim/', 3),
(16, 'SADA', 'https://www.instagram.com/sada.upnjatim/', 3),
(17, 'BISDI', 'https://www.instagram.com/bisdi.upnvjatim/', 3),
(18, 'MTI', 'https://www.instagram.com/mti.upnjatim/', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_konten`
--

CREATE TABLE `status_konten` (
  `ID` int(11) NOT NULL,
  `NAMA` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_konten`
--

INSERT INTO `status_konten` (`ID`, `NAMA`) VALUES
(1, 'In Queue'),
(2, 'Uploaded'),
(3, 'Rejected');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_user`
--

CREATE TABLE `status_user` (
  `ID` int(11) NOT NULL,
  `NAMA` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_user`
--

INSERT INTO `status_user` (`ID`, `NAMA`) VALUES
(1, 'Nonaktif'),
(2, 'Aktif'),
(3, 'In Queue');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NOHP` varchar(20) DEFAULT NULL,
  `JENIS_ID` int(11) DEFAULT NULL,
  `STATUS_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`ID`, `NAME`, `PASSWORD`, `EMAIL`, `NOHP`, `JENIS_ID`, `STATUS_ID`) VALUES
(1, 'Admin', '$2y$10$PjNN/0TjocEzf2RvbFMXBeaEu6VGETsZHXFhKrAeIws/fsis8zrku', 'admin@sikomedi.ac.id', '087788990077', 1, 1),
(2, 'syauqi', '$2y$10$PjNN/0TjocEzf2RvbFMXBeaEu6VGETsZHXFhKrAeIws/fsis8zrku', 'syauqi@member.sikomedi.ac.id', '087864947777', 2, 2),
(3, 'ahsa', '$2y$10$lLyYzTHSolAIVZwpoHjgfONdUL8fZ9fagAXcF.NdTaN9rjVgIc096', 'ahsa@member.ac.id', '087889654781', 2, 1),
(4, 'alya', '$2y$10$Z3Oh3nSfNp6F8g/sLFqdhOkSIqmYq.mvT9HKd4OTQCCftF2gsNrjS', 'alya@member.ac.id', '08898683762', 2, 2),
(5, 'syauqillah', '$2y$10$UCoyE8k45UQCgVDYpupKLui9RxqVwZ0wmoRPQBeU9gbUFyQtcLvma', 'syauqillah0908@gmail.com', '087864940209', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `instagram`
--
ALTER TABLE `instagram`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `jenis_konten`
--
ALTER TABLE `jenis_konten`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `jenis_user`
--
ALTER TABLE `jenis_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `konten_history`
--
ALTER TABLE `konten_history`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `status_konten`
--
ALTER TABLE `status_konten`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `status_user`
--
ALTER TABLE `status_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`,`NAME`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `instagram`
--
ALTER TABLE `instagram`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis_konten`
--
ALTER TABLE `jenis_konten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_user`
--
ALTER TABLE `jenis_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `konten_history`
--
ALTER TABLE `konten_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `status_konten`
--
ALTER TABLE `status_konten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status_user`
--
ALTER TABLE `status_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
