-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2020 pada 05.11
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_prodi`
--

CREATE TABLE `dt_prodi` (
  `idprodi` int(11) NOT NULL,
  `kdprodi` varchar(6) NOT NULL,
  `nmprodi` varchar(70) NOT NULL,
  `akreditasi` enum('A','B','C','-') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_prodi`
--

INSERT INTO `dt_prodi` (`idprodi`, `kdprodi`, `nmprodi`, `akreditasi`) VALUES
(1, '01', 'Manajement Informatika', 'B'),
(8, '02', 'Agribisnis', 'B'),
(9, '03', 'AKuntansi', 'A'),
(10, '04', 'Agribisnis Pangan', 'B'),
(11, '05', 'Pariwisata', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `idmhs` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `idprodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`idmhs`, `npm`, `nama`, `idprodi`) VALUES
(1, '18753008', 'Alifan Akbar Ikhsansah', 1),
(2, '18753010', 'Annisa Puji Lestari', 1),
(3, '18753015', 'Celline Pratiwi', 1),
(4, '18753016', 'Ahmad Dwi Kurnia', 1),
(5, '18753019', 'Dewa Ayu Putu Permoni', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenisuser` enum('0','1') NOT NULL,
  `level` enum('00','10','11') NOT NULL,
  `status` enum('F','T') NOT NULL,
  `idprodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `jenisuser`, `level`, `status`, `idprodi`) VALUES
(1, 'alifan', 'superadmin', '1', '10', 'F', 0),
(2, 'annisa', 'admin1', '1', '11', 'F', 1),
(3, 'celline', 'celline', '0', '00', 'F', 1),
(4, 'ayu', 'ayu', '0', '00', 'F', 1),
(5, 'dwi', 'dwi', '0', '00', 'F', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dt_prodi`
--
ALTER TABLE `dt_prodi`
  ADD PRIMARY KEY (`idprodi`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`idmhs`),
  ADD KEY `idprodi` (`idprodi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dt_prodi`
--
ALTER TABLE `dt_prodi`
  MODIFY `idprodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `idmhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
