-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2024 pada 08.01
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `gaji` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`id`, `nama`, `jenis_kelamin`, `alamat`, `jabatan`, `gaji`) VALUES
(1, 'Dadang', 'Laki-laki', 'Bojong Gede', 'Staf Gudang', 3000000),
(2, 'Hanni', 'Perempuan', 'Korea', 'Staf Kasir', 5000000),
(3, 'Sunjae', 'Laki-laki', 'Fiksi', 'Staf Gudang', 4200000),
(4, 'Dewi Nurhaliza', 'Perempuan', 'Bandar Lampung', 'Staf Kasir', 5200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_admin`
--

CREATE TABLE `login_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_admin`
--

INSERT INTO `login_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_karyawan`
--

CREATE TABLE `login_karyawan` (
  `id_logink` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_karyawan`
--

INSERT INTO `login_karyawan` (`id_logink`, `id_karyawan`, `username`, `password`) VALUES
(11, 1, 'dadang', 'dadang123'),
(12, 2, 'anonim', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_cuti`
--

CREATE TABLE `pengajuan_cuti` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `jenis_cuti` varchar(50) DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `id_pegawai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan_cuti`
--

INSERT INTO `pengajuan_cuti` (`id`, `nama`, `tanggal_mulai`, `tanggal_selesai`, `jenis_cuti`, `alasan`, `status`, `id_pegawai`) VALUES
(6, 'Jamal', '2024-05-22', '2024-05-22', 'Cuti Tahunan', 'Pengen liburan', 'Approved', NULL),
(7, 'Mark', '2024-05-23', '2024-05-24', 'Cuti Penting', 'Nikah', 'Approved', NULL),
(8, 'Minji', '2024-05-27', '2024-05-27', 'Cuti Sakit', 'Demam', 'Rejected', NULL),
(19, 'Belva', '2024-07-05', '2024-05-09', 'Cuti Tahunan', 'nikah', 'Rejected', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shift_pegawai`
--

CREATE TABLE `shift_pegawai` (
  `id` int(11) NOT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `shift_pagi` text DEFAULT NULL,
  `shift_sore` text DEFAULT NULL,
  `periode` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shift_pegawai`
--

INSERT INTO `shift_pegawai` (`id`, `hari`, `shift_pagi`, `shift_sore`, `periode`) VALUES
(1, 'Senin', 'Dewi, Sunjae, Mark', 'Belva, Eunwoo, Taesung', '2024-05-27'),
(2, 'Selasa', 'Indah, Suga, AgustD, Budi', 'Intan, Salah', '2024-05-27'),
(3, 'Rabu', 'Jamal, Haikal', 'Yudha, Taeyong', '2024-05-27'),
(4, 'Kamis', 'Jennie, Lisa', 'Rose, Jisoo', '2024-05-27'),
(5, 'Jumat', 'Hanni, Minji', 'Minju, Yujin', '2024-05-27'),
(6, 'Sabtu', 'Asa, Rora', 'Rami, Ruka', '2024-05-27'),
(7, 'Minggu', 'Rhita, Ahyeon', 'Hyein, Haerin', '2024-05-27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `login_karyawan`
--
ALTER TABLE `login_karyawan`
  ADD PRIMARY KEY (`id_logink`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `shift_pegawai`
--
ALTER TABLE `shift_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `login_karyawan`
--
ALTER TABLE `login_karyawan`
  MODIFY `id_logink` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `shift_pegawai`
--
ALTER TABLE `shift_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `login_karyawan`
--
ALTER TABLE `login_karyawan`
  ADD CONSTRAINT `login_karyawan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `data_pegawai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
