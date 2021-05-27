-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2021 at 09:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psbsditalfatih`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `no_induk` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `idu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no_induk`, `nama_admin`, `jk`, `agama`, `alamat`, `tmp_lahir`, `tgl_lahir`, `foto`, `idu`) VALUES
('12345678', 'Administrator', 'Laki-laki', 'Islam', 'Jl. Administrator', 'Indonesia', '1992-09-30', 'icon.png', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `buktitransfer`
--

CREATE TABLE `buktitransfer` (
  `nik` varchar(50) NOT NULL,
  `status_bayar` varchar(100) NOT NULL,
  `struk` varchar(100) NOT NULL,
  `tgl_bayar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `kuota` int(11) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar_siswa`
--

CREATE TABLE `pendaftar_siswa` (
  `no_daftar` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama2` varchar(100) NOT NULL,
  `jk` enum('Laki - laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `akte_lahir` varchar(50) NOT NULL,
  `tinggi` varchar(50) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `jml_saudara` int(11) NOT NULL,
  `penyakit` varchar(50) NOT NULL,
  `status_sekolah` varchar(50) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `nis_lama` varchar(50) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `tgl_pindah` varchar(20) NOT NULL DEFAULT '0000-00-00',
  `tingkat_kelas` varchar(50) NOT NULL,
  `alasan_pindah` text NOT NULL,
  `nomor_kk` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nik_ayah` varchar(50) NOT NULL,
  `pen_ayah` varchar(50) NOT NULL,
  `pek_ayah` varchar(50) NOT NULL,
  `jab_ayah` varchar(50) NOT NULL,
  `alkan_ayah` varchar(50) NOT NULL,
  `telp_ayah` varchar(50) NOT NULL,
  `gaji_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nik_ibu` varchar(50) NOT NULL,
  `pen_ibu` varchar(50) NOT NULL,
  `pek_ibu` varchar(50) NOT NULL,
  `jab_ibu` varchar(50) NOT NULL,
  `alkan_ibu` varchar(50) NOT NULL,
  `telp_ibu` varchar(50) NOT NULL,
  `gaji_ibu` varchar(50) NOT NULL,
  `jarak` varchar(50) NOT NULL,
  `status_rumah` varchar(50) NOT NULL,
  `kk` varchar(100) NOT NULL,
  `ak` varchar(100) NOT NULL,
  `ektp` varchar(100) NOT NULL,
  `skas` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `keterangan` enum('Belum Terverifikasi','Sudah Terverifikasi','Verifikasi Ditolak') NOT NULL,
  `arsip` enum('Ya','Tidak') NOT NULL,
  `id_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `nik` varchar(50) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pass_asli` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hak_akses` enum('Super Admin','Admin','Siswa') NOT NULL,
  `status_bayar` varchar(100) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`nik`, `nama_pengguna`, `password`, `pass_asli`, `email`, `hak_akses`, `status_bayar`, `tgl_daftar`) VALUES
('0000', 'Administrator', 'd68f9ebffd35e6f7e65c4a75ea34f137', '1234', 'adminsdit@gmail.com', 'Super Admin', 'Bukan Siswa', '2021-04-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no_induk`),
  ADD KEY `idu` (`idu`);

--
-- Indexes for table `buktitransfer`
--
ALTER TABLE `buktitransfer`
  ADD PRIMARY KEY (`nik`,`status_bayar`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `pendaftar_siswa`
--
ALTER TABLE `pendaftar_siswa`
  ADD PRIMARY KEY (`no_daftar`),
  ADD KEY `id_daftar` (`id_daftar`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `status_bayar` (`status_bayar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`idu`) REFERENCES `pengguna` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
