-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 26 Mei 2019 pada 14.57
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `pkkmb_poliwangi`
--
CREATE DATABASE IF NOT EXISTS `pkkmb_poliwangi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pkkmb_poliwangi`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_atribut_kelengkapan`
--

CREATE TABLE IF NOT EXISTS `tb_atribut_kelengkapan` (
  `id_atribut_kelengkapan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_atribut` varchar(20) NOT NULL,
  `poin` int(11) NOT NULL,
  PRIMARY KEY (`id_atribut_kelengkapan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_atribut_kelengkapan`
--

INSERT INTO `tb_atribut_kelengkapan` (`id_atribut_kelengkapan`, `nama_atribut`, `poin`) VALUES
(1, 'topi', 50),
(2, 'sepatu', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_camaba`
--

CREATE TABLE IF NOT EXISTS `tb_camaba` (
  `id_camaba` int(11) NOT NULL AUTO_INCREMENT,
  `nama_camaba` varchar(45) NOT NULL,
  `nim` int(11) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_pleton` int(11) NOT NULL,
  PRIMARY KEY (`id_camaba`),
  KEY `id_prodi` (`id_prodi`),
  KEY `id_pleton` (`id_pleton`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tb_camaba`
--

INSERT INTO `tb_camaba` (`id_camaba`, `nama_camaba`, `nim`, `no_hp`, `id_prodi`, `id_pleton`) VALUES
(1, 'putri', 190001, '085755555555', 1, 1),
(2, 'bagas', 190002, '089888765567', 1, 1),
(3, 'dimas', 190003, '081334433111', 1, 2),
(4, 'oliv', 190006, '085731436349', 1, 2),
(5, 'dewi', 190007, '085731436349', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_info_pkkmb`
--

CREATE TABLE IF NOT EXISTS `tb_info_pkkmb` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `informasi` varchar(20) NOT NULL,
  `waktu` date DEFAULT NULL,
  `keterangan` text NOT NULL,
  `id_panitia` int(11) NOT NULL,
  PRIMARY KEY (`id_info`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_info_pkkmb`
--

INSERT INTO `tb_info_pkkmb` (`id_info`, `informasi`, `waktu`, `keterangan`, `id_panitia`) VALUES
(1, 'Pakaian', '2019-04-20', 'Atasan : Kemeja Polos Putih, Bawahan : Celana Kain Hitam', 1),
(2, 'Pelaksanaan PKKMB', '2019-04-20', 'Dimulai hari Sabtu, 20 April 2018 pukul 07.00 di Lapangan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_keaktifan`
--

CREATE TABLE IF NOT EXISTS `tb_kategori_keaktifan` (
  `id_kategori_keaktifan` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_keaktifan` varchar(20) NOT NULL,
  `poin` int(11) NOT NULL,
  PRIMARY KEY (`id_kategori_keaktifan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_kategori_keaktifan`
--

INSERT INTO `tb_kategori_keaktifan` (`id_kategori_keaktifan`, `jenis_keaktifan`, `poin`) VALUES
(1, 'cakap', 50),
(2, 'kritis', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelengkapan`
--

CREATE TABLE IF NOT EXISTS `tb_kelengkapan` (
  `id_kelengkapan` int(11) NOT NULL AUTO_INCREMENT,
  `id_atribut_kelengkapan` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_camaba` int(11) NOT NULL,
  PRIMARY KEY (`id_kelengkapan`),
  KEY `id_atribut_kelengkapan` (`id_atribut_kelengkapan`),
  KEY `id_camaba` (`id_camaba`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `tb_kelengkapan`
--

INSERT INTO `tb_kelengkapan` (`id_kelengkapan`, `id_atribut_kelengkapan`, `waktu`, `id_camaba`) VALUES
(7, 1, '2019-05-10 15:42:05', 1),
(8, 2, '2019-05-10 15:42:05', 1),
(9, 1, '2019-05-12 15:19:14', 2),
(10, 1, '2019-05-14 22:40:25', 2),
(11, 1, '2019-05-14 22:50:17', 3),
(12, 2, '2019-05-14 22:50:17', 3),
(13, 2, '2019-05-14 22:59:15', 3),
(14, 1, '2019-05-15 00:00:23', 3),
(15, 1, '2019-05-15 03:08:43', 1),
(16, 2, '2019-05-15 03:08:43', 1),
(17, 1, '2019-05-20 15:53:00', 4),
(18, 2, '2019-05-20 15:53:00', 4),
(19, 2, '2019-05-20 15:53:19', 5),
(20, 2, '2019-05-21 16:21:53', 5),
(21, 1, '2019-05-21 16:22:15', 5),
(25, 1, '2019-05-22 16:45:41', 2),
(26, 2, '2019-05-22 16:45:41', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_panitia`
--

CREATE TABLE IF NOT EXISTS `tb_panitia` (
  `id_panitia` int(11) NOT NULL AUTO_INCREMENT,
  `nama_panitia` varchar(45) NOT NULL,
  `jabatan_panitia` varchar(45) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_panitia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_panitia`
--

INSERT INTO `tb_panitia` (`id_panitia`, `nama_panitia`, `jabatan_panitia`, `username`, `password`) VALUES
(1, 'harvey ashari', 'pembimbing', 'harvey', 'harvey'),
(2, 'oliv', 'pendamping', 'oliv', 'oliv');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian_keaktifan`
--

CREATE TABLE IF NOT EXISTS `tb_penilaian_keaktifan` (
  `id_penilaian_keaktifan` int(11) NOT NULL AUTO_INCREMENT,
  `id_camaba` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kategori_keaktifan` int(11) NOT NULL,
  PRIMARY KEY (`id_penilaian_keaktifan`),
  KEY `id_camaba` (`id_camaba`),
  KEY `id_kategori_keaktifan` (`id_kategori_keaktifan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `tb_penilaian_keaktifan`
--

INSERT INTO `tb_penilaian_keaktifan` (`id_penilaian_keaktifan`, `id_camaba`, `waktu`, `id_kategori_keaktifan`) VALUES
(1, 1, '2019-05-14 06:38:21', 1),
(2, 2, '2019-05-14 06:38:21', 1),
(4, 3, '2019-05-15 00:09:08', 1),
(5, 1, '2019-05-15 03:08:35', 1),
(6, 1, '2019-05-15 03:08:35', 2),
(7, 4, '2019-05-20 15:52:45', 1),
(8, 4, '2019-05-20 15:52:45', 2),
(9, 5, '2019-05-20 15:53:14', 1),
(10, 5, '2019-05-21 16:38:22', 1),
(11, 5, '2019-05-21 16:38:28', 2),
(12, 5, '2019-05-21 16:41:51', 1),
(25, 2, '2019-05-22 16:45:27', 1),
(26, 2, '2019-05-22 16:45:27', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pleton`
--

CREATE TABLE IF NOT EXISTS `tb_pleton` (
  `id_pleton` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pleton` varchar(45) NOT NULL,
  `id_panitia` int(11) NOT NULL,
  PRIMARY KEY (`id_pleton`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_pleton`
--

INSERT INTO `tb_pleton` (`id_pleton`, `nama_pleton`, `id_panitia`) VALUES
(1, 'pleton 1', 1),
(2, 'pleton 2', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presensi`
--

CREATE TABLE IF NOT EXISTS `tb_presensi` (
  `id_presensi` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_presensi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` varchar(20) DEFAULT NULL,
  `id_camaba` int(11) NOT NULL,
  PRIMARY KEY (`id_presensi`),
  KEY `id_camaba` (`id_camaba`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data untuk tabel `tb_presensi`
--

INSERT INTO `tb_presensi` (`id_presensi`, `waktu_presensi`, `keterangan`, `id_camaba`) VALUES
(1, '2019-05-17 16:13:06', '0', 1),
(2, '2019-05-17 16:13:07', '0', 1),
(3, '2019-05-17 16:13:08', '0', 1),
(4, '2019-05-17 16:15:34', '0', 3),
(5, '2019-05-17 16:15:35', '0', 3),
(12, '2019-05-21 15:51:10', '0', 2),
(13, '2019-05-21 15:59:03', '0', 5),
(16, '2019-05-22 16:45:16', '0', 2),
(30, '2019-05-25 05:43:35', '50', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE IF NOT EXISTS `tb_prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `prodi` varchar(45) NOT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `prodi`) VALUES
(1, 'manajemen informatika');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_camaba`
--
ALTER TABLE `tb_camaba`
  ADD CONSTRAINT `tb_camaba_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_camaba_ibfk_2` FOREIGN KEY (`id_pleton`) REFERENCES `tb_pleton` (`id_pleton`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_info_pkkmb`
--
ALTER TABLE `tb_info_pkkmb`
  ADD CONSTRAINT `tb_info_pkkmb_ibfk_1` FOREIGN KEY (`id_panitia`) REFERENCES `tb_panitia` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kelengkapan`
--
ALTER TABLE `tb_kelengkapan`
  ADD CONSTRAINT `tb_kelengkapan_ibfk_1` FOREIGN KEY (`id_atribut_kelengkapan`) REFERENCES `tb_atribut_kelengkapan` (`id_atribut_kelengkapan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kelengkapan_ibfk_2` FOREIGN KEY (`id_camaba`) REFERENCES `tb_camaba` (`id_camaba`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_penilaian_keaktifan`
--
ALTER TABLE `tb_penilaian_keaktifan`
  ADD CONSTRAINT `tb_penilaian_keaktifan_ibfk_1` FOREIGN KEY (`id_camaba`) REFERENCES `tb_camaba` (`id_camaba`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penilaian_keaktifan_ibfk_2` FOREIGN KEY (`id_kategori_keaktifan`) REFERENCES `tb_kategori_keaktifan` (`id_kategori_keaktifan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pleton`
--
ALTER TABLE `tb_pleton`
  ADD CONSTRAINT `tb_pleton_ibfk_1` FOREIGN KEY (`id_panitia`) REFERENCES `tb_panitia` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD CONSTRAINT `tb_presensi_ibfk_1` FOREIGN KEY (`id_camaba`) REFERENCES `tb_camaba` (`id_camaba`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
