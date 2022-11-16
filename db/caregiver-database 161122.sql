-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 04:39 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caregiver-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_rawatan` int(11) NOT NULL,
  `no_transaksi` varchar(256) NOT NULL,
  `makan` double NOT NULL,
  `mandi` double NOT NULL,
  `kebersihan_diri` double NOT NULL,
  `berpakaian` double NOT NULL,
  `defekasi` double NOT NULL,
  `miksi` double NOT NULL,
  `penggunaan_toilet` double NOT NULL,
  `transfer` double NOT NULL,
  `mobilitas` double NOT NULL,
  `naik_tangga` double NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `id_pasien`, `id_rawatan`, `no_transaksi`, `makan`, `mandi`, `kebersihan_diri`, `berpakaian`, `defekasi`, `miksi`, `penggunaan_toilet`, `transfer`, `mobilitas`, `naik_tangga`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'AP221115092929', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99, '2022-11-15 15:30:28', '2022-11-15 15:30:28'),
(2, 1, 3, 'AP221115100713', 1, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, '2022-11-15 15:35:40', '2022-11-15 15:35:40'),
(3, 1, 3, 'AP221115103429', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 99, '2022-11-15 15:34:39', '2022-11-15 15:34:39'),
(4, 1, 3, 'AP221115103605', 2, 1, 1, 0, 2, 2, 2, 3, 3, 2, 1, '2022-11-15 15:36:05', NULL),
(5, 1, 3, 'AP221115103904', 2, 1, 1, 1, 2, 2, 2, 3, 3, 2, 1, '2022-11-15 15:39:04', NULL),
(6, 1, 3, 'AP221115104153', 2, 1, 1, 2, 2, 2, 2, 3, 3, 2, 1, '2022-11-15 15:41:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catatan_perkembangan`
--

CREATE TABLE `catatan_perkembangan` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_rawatan` int(11) NOT NULL,
  `no_transaksi` varchar(256) NOT NULL,
  `catatan` varchar(256) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catatan_perkembangan`
--

INSERT INTO `catatan_perkembangan` (`id`, `id_pasien`, `id_rawatan`, `no_transaksi`, `catatan`, `id_petugas`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'CP221116100929', 'TESS CATAATAN', 55, 1, '2022-11-16 15:09:29', '2022-11-16 15:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `nik` int(50) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `notelp1` int(13) NOT NULL,
  `notelp2` int(13) NOT NULL,
  `nama_pj` varchar(256) NOT NULL,
  `notelp3` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `nik`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `notelp1`, `notelp2`, `nama_pj`, `notelp3`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bebby Ilham Akbar Aresta', 17012006, 1, '1998-06-20', 'Jl. Gn. Sago No 14, Gunung Panggilun, Padang Utara.', 822, 822, 'Budi', 822, 1, '2022-11-13 08:53:56', '2022-11-16 14:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(256) NOT NULL,
  `gelar_depan` varchar(50) NOT NULL,
  `gelar_belakang` varchar(50) NOT NULL,
  `profesi` int(11) NOT NULL,
  `tempat_lahir` varchar(256) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `STR` varchar(50) NOT NULL,
  `SIP` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `hp_pegawai` varchar(256) NOT NULL,
  `ruangan` int(11) NOT NULL,
  `bidang` int(11) NOT NULL,
  `poli` int(11) NOT NULL,
  `foto_pegawai` varchar(256) NOT NULL,
  `status_pegawai` int(11) NOT NULL,
  `kode_dpjp` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `gelar_depan`, `gelar_belakang`, `profesi`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `STR`, `SIP`, `nip`, `nik`, `hp_pegawai`, `ruangan`, `bidang`, `poli`, `foto_pegawai`, `status_pegawai`, `kode_dpjp`) VALUES
(1, 'Yosrizal', 'dr.', '', 1, '', '', 1, '0100002ssss', '0210005ssss', '', '', '', 1, 1, 1, '', 1, ''),
(2, 'Evi Andriani', 'dr.', '', 1, '', '', 0, '1ss', '2ss', '', '', '', 1, 1, 1, '', 1, ''),
(3, 'Sinyo Apriano', '', 'Amd. MIK', 3, '', '', 1, '1111', '2222', '', '', '', 0, 0, 0, '', 1, ''),
(4, 'Deri Yantoni', '', 'Amd. Rad', 5, '', '', 1, '33333ssss', '223433333', '', '', '', 0, 0, 0, '', 1, ''),
(5, 'Minhatul Maula', '', 'Amd.RMIK', 3, '', '', 0, '112', '113', '', '', '', 0, 0, 0, '', 1, ''),
(6, 'Rozi Yuliandi', 'dr.', 'Sp.KJ', 1, '', '', 1, '-', '-', '', '', '', 1, 1, 1, '', 1, '425296'),
(7, 'Shinta Brisma', 'dr.', 'Sp.KJ', 1, '', '', 0, '-', '-', '', '', '', 1, 1, 1, '', 1, '36053'),
(8, 'Taufik Ashal', 'dr.', 'Sp.KJ', 1, '', '', 1, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(9, 'Dian Budianti', 'dr.', 'Sp.KJ', 1, '', '', 0, '', '', '', '', '', 1, 1, 2, 'd564c7535b7a23e984188ce2e287974e.png', 1, ''),
(10, 'Rizka Rosalinda', 'dr.', 'Sp.PD', 1, '', '', 0, 'asdasd', 'asdasdas', '', '', '', 1, 1, 1, '', 1, ''),
(11, 'I. Fadhilah', 'dr.', 'Sp.N', 1, '', '', 1, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(12, 'Betty Hijrah', 'dr.', 'Sp.A, M.Biomed', 1, '', '', 0, '', '', '', '', '', 1, 1, 1, 'dcd08353accfb5274bac424614f63008.png', 1, ''),
(13, 'Nadjmir', 'dr.', 'Sp.KJ', 1, '', '', 1, '-', '-', '', '', '', 1, 1, 1, 'de78de59fc8c2e682e6952253d3527bd.png', 1, '39505'),
(14, 'Wiwi Marma', 'dr.', '', 1, '', '', 0, '-', '-', '', '', '', 1, 1, 1, '', 1, '36102'),
(15, 'Rini Gusya Liza', 'dr.', 'Sp.KJ', 1, '', '', 0, 'asdasda', 'qweqweqweqwe', '', '', '', 1, 1, 1, '', 1, ''),
(16, 'Ade Yuli Amelia', 'dr.', 'Sp.KJ', 1, '', '', 0, '', '', '', '', '', 1, 1, 1, 'e22cf1ca2dc2a830a2e14ec5dbbdd4a7.png', 1, ''),
(17, 'Iryani Dian Rifana', 'dr.', 'Sp.Rad', 1, '', '', 0, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(18, 'Sylvia Rahman', 'dr.', 'Sp.Rad(K)', 1, '', '', 0, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(19, 'Novi Susanti Hasan', 'dr.', '', 1, '', '', 0, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(20, 'Nasramita', 'dr.', '', 1, '', '', 0, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(21, 'Cisillya Mykesturi', 'dr.', '', 1, '', '', 0, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(22, 'Ilhami Fithri', 'dr.', 'Sp.PK', 1, '', '', 0, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(23, 'Lisa Herman', 'drg.', '', 1, '', '', 0, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(24, 'Sri Mulyanti', 'dr.', '', 1, '', '', 0, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(25, 'Zulfaeda', 'drg.', '', 1, '', '', 0, '-', '-', '', '', '', 1, 1, 1, '', 1, '37428'),
(26, 'Kuswardani Susari Putri', '', 'S.Psi, M.Psi', 9, '', '', 0, '1111', '1111', '', '', '', 1, 1, 0, '06f77b1759c00cf5701bd5cdf9f75ee1.png', 1, ''),
(27, 'Rika Novita', '', 'S.Psi, M.Psi', 9, '', '', 0, '', '', '', '', '', 1, 1, 0, '', 1, ''),
(28, 'Neny Andriani', '', 'S.Psi, M.Psi', 9, '', '', 0, '', '', '', '', '', 1, 1, 0, '', 1, ''),
(29, 'Melly Sesaria', 'dr.', '', 1, '', '', 0, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(30, 'Rendra Sanjaya Yofa Zebua', 'dr.', 'Sp.KFR', 1, '', '', 1, '-', '-', '', '', '', 1, 1, 1, 'ec6ea0031a7aa5315f39016a2b693393.jpg', 1, '309508'),
(31, 'Hj. Rozetti', 'dr.', 'Sp.Rad', 1, '', '', 1, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(34, 'Mona Lisa', '', 'Amd. RM', 3, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(35, 'Yuza Sufra Yosepha', '', 'Amd. RM', 3, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(36, 'Reki Agus Saputra', '', 'Amd.RMIK', 3, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(37, 'Dian Pertiwi', '', '', 3, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(38, 'Teguh Eka Putra', '', '', 3, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(39, 'Sri Wahyuni', '', '', 3, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(40, 'Rizka Primaliza', '', '', 3, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(41, 'Afriandi', '', '', 7, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(42, 'Gina Widya A', '', '', 7, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(43, 'Bahri Putra L', '', '', 7, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(44, 'Destari', '', '', 7, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(45, 'Tri Satria', '', '', 4, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(46, 'Dafriyenti', '', '', 4, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(47, 'Fanny Febria', '', '', 4, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(48, 'Tuti Murni', '', '', 4, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(49, 'Yani Imelda', '', '', 4, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(50, 'Riski yudi', '', '', 4, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(51, 'Chintara Diva', '', '', 4, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(52, 'Novella Narulita', '', '', 4, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(53, 'Silvina Maivianti', '', 'Amd. Rad', 5, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(54, 'Rio Mutiara', 'dr.', 'S. Kom', 10, 'Batusangkar', '09-11-2021', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(55, 'Bebby Ilham', '', 'S. Kom', 10, 'Sungai Penuh', '09-11-2021', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(56, 'Tia Ayu Muliana', '', 'S. Kom', 10, 'Lampung', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(57, 'Rujukan Luar', 'dr.', '', 1, '-', '01-12-1990', 1, '', '', '-', '-', '', 1, 1, 1, '', 1, ''),
(58, 'Ikhsan', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 1, 1, 0, '6e605da7459928ff156d73beed417bd4.jpg', 1, ''),
(59, 'Arluna Masjon', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 1, 2, 0, '3f9dac21ecb05e5ce898caac4fd47d4e.png', 1, ''),
(60, 'Sarie Andika Putri', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 1, 2, 0, '840c4297c5a9b0e90debf0ed65a10d18.png', 1, ''),
(61, 'On Site', '', '', 10, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(62, 'Shinta Margaret', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 1, 2, 0, 'c60e03128511a39696ee5c2fdbc22599.png', 1, ''),
(63, 'Fitri Yulia', '', 'S.Farm, Apt', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(64, 'Ermawenti Ahmad', '', 'A.Md Farm', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(65, 'Elnit Tritamala ', '', 'A.Md. Farm', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(66, 'Lisa Okta Sari', '', 'S.Farm,Apt', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(67, 'Yelva Meirisa', '', 'S.Farm, Apt', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(68, 'Yuliar', '', 'A.Md Farm', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(69, 'Lusyandani Satria Putri', '', 'A.Md Farm', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(70, 'Gustia Devi ', '', '', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(71, 'Dian Suhery', '', 'S.Farm, Apt', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(72, 'Atikah Amatullah', '', 'S.Farm, Apt', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(73, 'Rieke Azhar', '', 'S.Farm, Apt', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(74, 'Sintia Indah Sari', '', 'S.Farm, Apt', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(75, 'Desi Ariani Putri', '', '', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(76, 'Ifri Yeni', '', 'A.Md Farm', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(77, 'Wahyuni Veradika', '', 'A.Md Farm', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(78, 'Wiwid Mairina', '', 'A.Md Farm', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(79, 'Rika Seprimaiyanti', '', 'A.Md Farm', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(80, 'Susweni Fatria ', '', 'A.Md Farm', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(81, 'Ria Resmana', '', '', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(82, 'Eviyana', '', '', 6, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(83, 'Basmanelly', 'Ns.', 'M,Kep, Sp,Kep.J', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(84, 'Netrida', 'Ns.', 'M,Kep, Sp,Kep.J', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(85, 'Firsty Andriani', 'Ns.', 'M.Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(86, 'Dwi Rahmi', 'Ns.', 'SKM, S,Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(87, 'Gusnita', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(88, 'Yusmaneli', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(89, 'Syafrida Yeni', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(90, 'Sri Surya Tenti', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(91, 'Sahrida Yani', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(92, 'Welri Adtivela', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(93, 'Ratna Devi', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(94, 'Dewi Aldriani', '', 'AMK', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(95, 'Evisah', '', 'AMKG', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(96, 'Nurzalina', '', '', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(97, 'Noverius', '', '', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(98, 'Ezzeddin ', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(99, 'Cendra Fitria', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(100, 'Ridwan Abadi', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(101, 'Stevani Ayutri', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(102, 'Diana Deyva', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(103, 'Widya Khrimuzah', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(104, 'Ridho Agusman', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(105, 'Sakinah Erizal', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(106, 'Dewi Rahmawati', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(107, 'Eli Murni', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(108, 'Febriyance', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(109, 'Risa Aderina', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(110, 'Renny Nilasari', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(111, 'Yenny Apriona', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(112, 'Silvia Roza', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(113, 'Khairani Latifa', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(114, 'Maila Andra Santi', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(115, 'Vicky Anggaria', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(116, 'Listya Nanda Utami', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(117, 'Muhammad Yanes', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(118, 'Muharmi Sinarthi', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(119, 'Rosi Sofialina ', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(120, 'Novariza Dwi Putri', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(121, 'Rise Andriani', '', 'AMK', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(122, 'Afrima Yani', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(123, 'Rani Murfika', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(124, 'Diana Rahman', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(125, 'Romi Rahmadhani', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(126, 'Gusvia Putri Sari', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(127, 'Irsyad  Alfian', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(128, 'Agustian', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(129, 'Isna Devita', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(130, 'Shinta Tarmizi', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(131, 'Roza Oktavia', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(132, 'Armutia Ruska', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(133, 'Lidia Yuhelfina', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(134, 'Rohanita', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(135, 'Aries Tomy Devisa', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(136, 'Habibi Abdilah', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(137, 'Nuriva Fradilla ', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(138, 'Elya Sespa', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(139, 'Anggelina Fitri', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(140, 'Putri Wulandari', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(141, 'Mira Susanti', '', 'AMK', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(142, 'Alfinia Yulita ', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(143, 'Gusra Fivti Sigit', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(144, 'Niko Yuliandra', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(145, 'Toni Candra', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(146, 'Risman Lubis', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(147, 'Fadly Agri Septian', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(148, 'Indusrianto Indra', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(149, 'Yessi Karmelia', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(150, 'Desi Liliana Putri', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(151, 'Mardianis', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(152, 'Werdiawati', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(153, 'Rani Dasra', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(154, 'Santi Harnani', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(155, 'Hotriris Anna N', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(156, 'Wilya Sari', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(157, 'Nina Mutiara', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(158, 'Yelan Putri', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(159, 'Lidya  Septriani', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(160, 'Rosita Fitri Yanti', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(161, 'Maileni', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(162, 'Asmara', '', '', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(163, 'Jeprianto', '', 'SST', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(164, 'Desmira Yani', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(165, 'Sri Fadila', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(166, 'Luthfi Naufal Yusar', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(167, 'Indah Permata Sari', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(168, 'Sherly Jones', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(169, 'Puji Andarima', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(170, 'Wisfi Desrianti', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(171, 'Melyanti', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(172, 'Yori Susmitra Basri', '', 'AMK', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(173, 'Putri Manik R', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(174, 'Fitra Mega', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(175, 'Sri Susilawati', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(176, 'Rizki Ramdoni', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(177, 'Dessy Febrianty', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(178, 'Revi Okta Sari', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(179, 'Yuli Putri Ani', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(180, 'Novita Bolin', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(181, 'Rukiyah Harahap', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 1, 1, 1, '5523a909aecd1afacae7d9c7bfa1bb32.png', 1, ''),
(182, 'Pel Erizon', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(183, 'Sujarwo', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(184, 'Arie Syahrini', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(185, 'Exti Sosila', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(186, 'Mish Fadhillah A', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(187, 'Zulmi Isna Fitri', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(188, 'Albahri', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(189, 'Marisa Primayeni', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(190, 'Yarmerita', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(191, 'Yuli Mardeni', '', 'AMK', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(192, 'Indah Suciati', '', 'AMK', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(193, 'Ranny Okta Vergina', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(194, 'Mira Desrayuti', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(195, 'Robbie Satria', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(196, 'Hendra Arianto', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(197, 'Ondo Berlianta', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(198, 'Juliadi Syaputra', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(199, 'Rahmi Syahri', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(200, 'Nisa Lestari', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(201, 'Evarina Wati', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(202, 'Okta Sukri Mulyani', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(203, 'Imra Yudi Pratama', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(204, 'Septie Wulandari', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(205, 'Randi Surya Dinata', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(206, 'Ilham Gunawan ', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(207, 'Sri Widya Agni', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(208, 'Aprisa Zahara', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(209, 'Fajrin AdhiYadma', '', 'A.Md. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(210, 'Sonia Gianini', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(211, 'Milfa Yeti', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(212, 'Marvita Zulfianis', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(213, 'Gusti Warni', '', 'AMK', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(214, 'Neldawati', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(215, 'Maiva Sri Putri', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(216, 'Lusi Refni', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(217, 'Dini Aprisupilha', 'Ns.', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(218, 'Jefi Hermanto', 'Ns.', 'S. Kep', 2, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(219, 'Rena Mustika', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(220, 'Ravika Rachmawati', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(221, 'Ellya Roza', '', 'S.Psi', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(222, 'Afrina', '', 'S. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(223, 'Khoiriatunnisa', '', 'A.Md. Kep', 2, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(224, 'Aplicare Ranap', '', '', 2, '', '', 0, '', '', '', '', '', 1, 2, 0, '', 1, ''),
(225, 'Yulia Kantisa Rahma', '', '', 3, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(226, 'Admission Rajal', '', '', 3, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(227, 'Admission Ranap', '', '', 3, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(228, 'Dokter Rajal', 'dr', 'Sp.KJ', 1, '', '', 1, '', '', '', '', '', 1, 1, 1, '', 1, ''),
(229, 'Dokter Ranap', 'dr.', 'Sp.KJ', 1, '', '', 0, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(230, 'Farmasi Rajal', '', '', 6, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(231, 'Farmasi Ranap', '', '', 6, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(232, 'Antrian Onsite', '', '', 3, '', '', 1, '', '', '', '', '', 0, 0, 0, '', 1, ''),
(233, 'Sefniwati', '', '', 7, 'Padang', '07-09-2016', 0, '', '', '', '', '', 0, 0, 0, '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `pemantauan_alat_medik`
--

CREATE TABLE `pemantauan_alat_medik` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_rawatan` int(11) NOT NULL,
  `no_transaksi` varchar(256) NOT NULL,
  `id_alat_medik` int(11) NOT NULL,
  `nm_alat_medik` varchar(256) NOT NULL,
  `ukuran` double NOT NULL,
  `tanggal_pemasangan` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemantauan_alat_medik`
--

INSERT INTO `pemantauan_alat_medik` (`id`, `id_pasien`, `id_rawatan`, `no_transaksi`, `id_alat_medik`, `nm_alat_medik`, `ukuran`, `tanggal_pemasangan`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'PA221116092728', 1, 'KANUL OKSIGEN', 11, '2022-11-16', 'OKE', 1, '2022-11-16 14:27:28', NULL),
(2, 1, 3, 'PA221116093558', 2, 'NGT', 22, '2022-11-16', 'TES', 1, '2022-11-16 14:35:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rawatan`
--

CREATE TABLE `rawatan` (
  `id` int(11) NOT NULL,
  `id_pasien` int(10) NOT NULL,
  `no_transaksi` varchar(256) NOT NULL,
  `tgl_awal_rawatan` date NOT NULL,
  `tgl_akhir_rawatan` int(11) DEFAULT NULL,
  `diagnosa_sakit` text NOT NULL,
  `alergi` text DEFAULT NULL,
  `barthel_index_score` double DEFAULT NULL,
  `barthel_index_score_date` date DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawatan`
--

INSERT INTO `rawatan` (`id`, `id_pasien`, `no_transaksi`, `tgl_awal_rawatan`, `tgl_akhir_rawatan`, `diagnosa_sakit`, `alergi`, `barthel_index_score`, `barthel_index_score_date`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'CG221114082143', '2022-11-14', NULL, 'stroke', 'kulit', 46, '2022-11-14', 1, '2022-11-14 13:21:43', NULL),
(4, 1, 'CG221114082319', '2022-11-14', NULL, 'stroke ringan', 'kulit', 46, '2022-11-14', 1, '2022-11-14 13:23:19', '2022-11-14 13:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `referensi_profesi`
--

CREATE TABLE `referensi_profesi` (
  `id_profesi` int(11) NOT NULL,
  `ket_profesi` varchar(256) NOT NULL,
  `status_profesi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referensi_profesi`
--

INSERT INTO `referensi_profesi` (`id_profesi`, `ket_profesi`, `status_profesi`) VALUES
(1, 'Dokter', 1),
(2, 'Perawat', 1),
(3, 'Petugas Admission', 1),
(4, 'Petugas Labor', 1),
(5, 'Petugas Radiologi', 1),
(6, 'Petugas Farmasi', 1),
(7, 'Petugas Kasir', 1),
(8, 'Pelaksana', 1),
(9, 'Psikolog', 1),
(10, 'Admin SIMRS', 1),
(11, 'Petugas Casemix', 1),
(12, 'Petugas Rekam Medis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tanda_vital`
--

CREATE TABLE `tanda_vital` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_rawatan` int(11) NOT NULL,
  `no_transaksi` varchar(256) NOT NULL,
  `sistolik` double NOT NULL,
  `diastolik` double NOT NULL,
  `suhu` double NOT NULL,
  `nadi` double NOT NULL,
  `pernapasan` double NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanda_vital`
--

INSERT INTO `tanda_vital` (`id`, `id_pasien`, `id_rawatan`, `no_transaksi`, `sistolik`, `diastolik`, `suhu`, `nadi`, `pernapasan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'TV221116081317', 90, 59, 37.5, 100, 19, 1, '2022-11-16 13:13:17', '2022-11-16 13:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `no_transaksi` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_pasien`, `no_transaksi`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 'CG221114082143', 1, '2022-11-14 13:21:43', NULL),
(4, 1, 'CG221114082319', 1, '2022-11-14 13:23:19', NULL),
(5, 1, 'AP221115092929', 99, '2022-11-15 14:29:29', '2022-11-15 15:30:28'),
(6, 1, 'AP221115100713', 1, '2022-11-15 15:07:13', NULL),
(7, 1, 'AP221115103429', 99, '2022-11-15 15:34:29', '2022-11-15 15:34:39'),
(8, 1, 'AP221115103605', 1, '2022-11-15 15:36:05', NULL),
(9, 1, 'AP221115103904', 1, '2022-11-15 15:39:04', NULL),
(10, 1, 'AP221115104153', 1, '2022-11-15 15:41:53', NULL),
(11, 1, 'TV221116081317', 99, '2022-11-16 13:13:17', '2022-11-16 13:35:09'),
(12, 1, 'PA221116092728', 1, '2022-11-16 14:27:28', NULL),
(13, 1, 'PA221116093558', 1, '2022-11-16 14:35:58', NULL),
(14, 1, 'CP221116100929', 1, '2022-11-16 15:09:29', '2022-11-16 15:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `nama_akun` varchar(256) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `role_id`, `pegawai_id`, `username`, `password`, `nama_akun`, `image`, `is_active`, `createdAt`) VALUES
(1, 1, 56, 'tia', '$2y$10$J/91fjFvkDVv0u8EE9HCv.ao9Kc1Uk6SdVY/7lt0G1o4urV.Qs9Mm', ' Tia Ayu Muliana S. Kom', 'default.png', 1, '2022-04-07 06:51:00'),
(13, 15, 4, 'deriyantoni', '$2y$10$dsQQ1YfFkFYp8GSUcVgVLOhQoC50yFtSuO9wUsgtAI65cuAXTaP3e', ' Deri Yantoni Amd. Rad', 'default.png', 1, '2021-12-13 02:56:42'),
(14, 1, 54, 'rio', '$2y$10$JTSXYCvoNRu5N..yqfYrCeFbD/ffmKDJpqsFpFJSVJ1AbK7mQ.Ay2', ' Rio Mutiara S. Kom', 'default.png', 1, '2021-11-10 08:52:37'),
(15, 1, 55, 'bebby', '$2y$10$dZYoj/1j642py6MjIBY7EeaejHhPFkj1FavDCjvLypn4zzqvFG0Da', 'Bebby Ilham S. Kom', 'default.png', 1, '2022-06-30 08:17:29'),
(16, 5, 3, 'sinyo', '$2y$10$nbAYJrpYq6zhmwVdLYRooONphnSeroMsvWeC3KVqb3wRoZh7jwl82', ' Sinyo Apriano Amd. MIK', 'default.png', 1, '2022-06-14 07:32:32'),
(17, 8, 37, 'dianpertiwi', '$2y$10$tY8FKLbDWFAaKElZRP.V0.TTKjYtGXfxG.DjTOqC1DkSCg.kBW5P6', ' Dian Pertiwi ', 'default.png', 1, '2022-04-06 07:57:11'),
(18, 10, 13, 'nadjmir', '$2y$10$iMMtLw8MdOM4GFQnFBDh9.MJXTDCI8j8sBfUGJkGViUOPh4zlc3y.', 'dr. Nadjmir Sp.KJ', 'default.png', 1, '2022-06-24 04:06:15'),
(19, 13, 45, 'trisatria', '$2y$10$BZWLm/n/.AKnBqThKi6JiOWEsY8zPl2eIS61zJvIoQJA5ADPd3YHW', ' Tri Satria ', 'default.png', 1, '2021-12-02 07:29:04'),
(20, 13, 22, 'ilhamifitri', '$2y$10$Zu5/QF9PKzbgmtKC.brXfe1OXrovK.BVJTVVLpdjaslX6Tbh4kk7e', 'dr. Ilhami Fithri Sp.PK', 'default.png', 1, '2022-01-19 04:28:04'),
(21, 14, 53, 'silvina', '$2y$10$GBKJ4Khx2NzdlXPRzsAmdOzzynp9mxEIEdrg5eUkj5o/FknMtHeUq', ' Silvina Maivianti Amd. Rad', 'default.png', 1, '2021-12-09 02:09:38'),
(22, 12, 47, 'fanny', '$2y$10$RNozrtpzrOHHKyg3ZXJItOLZE.4QqzZG2ELQhAMj4qh7jV/F9d0k2', ' Fanny Febria ', 'default.png', 1, '2022-01-19 04:29:08'),
(23, 12, 48, 'tutimurni', '$2y$10$c/dDoB5iYOyGBDeanTucYe13mr0FFFtr/xVirD2sDOvN.zQNXgGiu', ' Tuti Murni ', 'default.png', 1, '2021-12-15 01:35:37'),
(24, 30, 59, 'arlunamasjon', '$2y$10$y2Fnd..GtFYGiW7zOMEFLug24swEAQ2a77rGysEqq/O9oCFA/xTXK', 'Ns. Arluna Masjon S. Kep', 'default.png', 1, '2021-12-23 02:15:22'),
(25, 29, 58, 'ikhsan', '$2y$10$tbo61vPfzGK/xTnQ/W3Peurxl0Hw01hGKYHXzTfM.QcLnz8eqYFrq', 'Ns. Ikhsan S. Kep', 'default.png', 1, '2021-12-23 02:16:12'),
(26, 30, 60, 'sarieandikaputri', '$2y$10$6A/f0JVVjBmfPm8RIzCHv.I15U5X3BlyneMPFs5Yld6u3Th3KFcCq', ' Sarie Andika Putri ', 'default.png', 1, '2021-12-24 09:26:29'),
(27, 31, 61, 'onsite', '$2y$10$ycMR4mG9aCvJbxTYTzdbge5BMvUeNRw6c2vLEWmlDGCE1uWSboTDe', ' On Site ', 'default.png', 1, '2021-12-30 01:59:16'),
(28, 30, 62, 'shintamargaret', '$2y$10$6o12gorvW97W.Fd9SVvvbOkYb11KAJgkHuOZ.SfwBhVx2vTbkxi2W', 'Ns. Shinta Margaret S. Kep', 'default.png', 1, '2022-01-03 03:18:11'),
(29, 11, 49, 'yaniimelda', '$2y$10$LT5p58Cku6NbFOxtmlDfEetqWh1Q7yWAzZaqVPxq58aWZxKs5YUOC', ' Yani Imelda ', 'default.png', 1, '2022-01-19 04:29:59'),
(30, 11, 46, 'dafriyenti', '$2y$10$4C7PL2kg3YsaCuZahjFAc.u6xOBT/4sjDiXyu345P8JBdhQaQ1Via', ' Dafriyenti ', 'default.png', 1, '2022-01-31 08:20:33'),
(31, 20, 72, 'atikah', '$2y$10$BhEE6XQprHZgjnABETHrmO80skLF1.BbunZ951S5UpW2xkG7.NUXS', ' Atikah Amatullah S.Farm, Apt', 'default.png', 1, '2022-01-31 08:23:11'),
(32, 11, 50, 'riskiyudi', '$2y$10$h/6A6XRpOstV09MvIKHf2.rQSU5ulWaH7uA5DmLVxO1PS/JBY5xGG', ' Riski yudi ', 'default.png', 1, '2022-01-31 08:24:55'),
(33, 10, 9, 'dian', '$2y$10$ghYl0s1mf8E8I4Bd9C2WmOzzkLJ4rfxSZG8dgRdK45Thsn77N9LGW', 'dr. Dian Budianti Sp.KJ', 'default.png', 1, '2022-04-07 07:11:04'),
(34, 10, 7, 'shintabrisma', '$2y$10$YdbWrYZ9IhD9NHyNkPiioeiucWtj32If75SUK9Y5m0l8fJZNsJ3di', 'dr. Shinta Brisma Sp.KJ', 'default.png', 1, '2022-05-10 03:29:16'),
(35, 32, 224, 'aplicare', '$2y$10$wsEgT8T3uW.2nelkMbYYouMqIFPQEI1fDVjBVxfVfbVdZR65Xm1ve', ' Aplicare Ranap ', 'default.png', 1, '2022-04-18 03:09:54'),
(36, 37, 225, 'yuliakantisa', '$2y$10$QJpcQwIOYLVBss.ZBY1pKeeqdS7pJ7pLqwjRREzg.me9/16iGBhoO', ' Yulia Kantisa Rahma ', 'default.png', 1, '2022-06-29 02:59:21'),
(37, 8, 226, 'admission_rajal', '$2y$10$a716yqti4KKpKAkCqZThr.aI2EvFfR2CyGJp3S5UnyxWmBuHdZD3K', ' Admission ', 'default.png', 1, '2022-05-09 03:25:29'),
(38, 5, 227, 'admission_ranap', '$2y$10$GpHHIb0to4zWxemHpxdOreagZUa5bfwpZLpKWh6I5.Mfk3rmkbrGa', ' Admission Ranap ', 'default.png', 1, '2022-05-09 03:26:15'),
(39, 10, 228, 'dokter_rajal', '$2y$10$Kw75IqnPWrtBaROt0J/L5eEyYw63El1fS7jdzZZCP.dP2/8/FT0Uu', 'dr Dokter Rajal Sp.KJ', 'default.png', 1, '2022-05-09 03:29:00'),
(40, 10, 229, 'dokter_ranap', '$2y$10$L6qEKqLgqWnntIT.jCsEq.BaWQXKZg.fbF/Lfyu25/NB8/BFIo0oa', 'dr. Dokter Ranap Sp.KJ', 'default.png', 1, '2022-05-09 03:29:46'),
(41, 19, 230, 'farmasi_rajal', '$2y$10$0W8aJckqErsU1wD.F4edpOm/GpcF7MNxnq.1ky1/0RlP62Al8bTcG', ' Farmasi Rajal ', 'default.png', 1, '2022-05-09 03:32:09'),
(42, 20, 231, 'farmasi_ranap', '$2y$10$eUOgs1jS.QZiI8Z/UvybK.7W7.6ElKmexI4TFoE.Hygni4P7/aZz.', ' Farmasi Ranap ', 'default.png', 1, '2022-05-09 03:32:29'),
(43, 10, 6, 'roziyuliandi', '$2y$10$uXo.OmwTOEcn57LoRAP3SOhFFaBRyA1DyE.B1CiANn4kTaBTWp75W', 'dr. Rozi Yuliandi Sp.KJ', 'default.png', 1, '2022-05-10 03:31:01'),
(44, 10, 14, 'wiwimarma', '$2y$10$QZZ8fE3IfkPvkA1vRYQCluvbG9zN.P.nReLCgX9NSwsB4gWsgAoWq', 'dr. Wiwi Marma ', 'default.png', 1, '2022-05-10 03:33:06'),
(45, 10, 1, 'yosrizal', '$2y$10$mow2ZbgiNUjTJnw8NZrHH.1tICgIlLHxSPdXhV34ie4ETwUQrQIlK', 'dr. Yosrizal ', 'default.png', 1, '2022-05-10 03:33:50'),
(46, 5, 38, 'teguhekaputra', '$2y$10$vSiFzmfZat5J/WprIGKPT.ySbht5Wh8sR4l3Qo1FexgLWDsHKulbe', ' Teguh Eka Putra ', 'default.png', 1, '2022-05-17 03:55:30'),
(47, 19, 67, 'yelvameirisa', '$2y$10$v6ii7pXr/PLBFZG2Vus/fO3LEfKRvUbmXSoTxOs3QYFMvT7N5DVJ6', ' Yelva Meirisa S.Farm, Apt', 'default.png', 1, '2022-05-10 03:44:39'),
(48, 20, 71, 'diansuhery', '$2y$10$O5HNywebZ0y8mnZG2aUVSeJ8MgJtsMwsoezJ/QOaVCnN30fbJlPYO', ' Dian Suhery S.Farm, Apt', 'default.png', 1, '2022-05-10 03:47:19'),
(49, 21, 64, 'ermawenti', '$2y$10$PTw5VBcf.j4aYbHBijDYfuRHmGz9QOIYDdg5kdDNsHzs3Pxrz8kK6', ' Ermawenti Ahmad A.Md Farm', 'default.png', 1, '2022-05-10 05:15:03'),
(50, 23, 68, 'yuliar', '$2y$10$C44Ru6rl813mLl2PZ2RSo.sW32YeCpViGqWP4hk52eVb.xLgWTMBe', ' Yuliar A.Md Farm', 'default.png', 1, '2022-05-19 04:19:13'),
(51, 24, 73, 'riekeazhar', '$2y$10$XFHBJOYmJKwc5WUCycIZV.6a/x8rIHNkD8UqOMNqGaARWS1MsXqH2', ' Rieke Azhar S.Farm, Apt', 'default.png', 1, '2022-05-10 05:17:46'),
(52, 18, 63, 'fitriyulia', '$2y$10$uFlMvR5z930MOvCoyuINkOtVwD1dzjRWksoh6RcI4Wspy90s8BpEK', ' Fitri Yulia S.Farm, Apt', 'default.png', 1, '2022-05-10 05:22:02'),
(53, 23, 74, 'sintiaindah', '$2y$10$oK9CG8xLnkGBZK/YOlF0WeeVY.fYHxbLIz2E2YOsIUXthazkEIfZq', ' Sintia Indah Sari S.Farm, Apt', 'default.png', 1, '2022-05-13 02:44:48'),
(54, 31, 232, 'antrianonsite', '$2y$10$RzNwE8iauXUTpuG5nme/2u8NTtmbZNQWIzHH.P4BsB.kgSCIhzIwu', ' Antrian Onsite ', 'default.png', 1, '2022-05-18 01:46:30'),
(55, 10, 30, 'rendrasanjaya', '$2y$10$RESRtrUL.dDG/lnc/5b.eeZNXxqS1.hENrKhNCWXBjBNDWj4mcwGS', 'dr. Rendra Sanjaya Yofa Zebua Sp.KFR', 'default.png', 1, '2022-05-24 02:04:46'),
(56, 17, 233, 'sefniwati', '$2y$10$BXazTmBD6QydwaIFhem1MuIN5bor9qME7B5oqAUBhFOmJRCcCHh.W', ' Sefniwati ', 'default.png', 1, '2022-06-07 14:11:26'),
(57, 36, 26, 'kuswardani', '$2y$10$isLXrGpBmATcB/T0w7BWkOEXiuRVhZdc8tO4ouRV/KitOkzCKiybO', ' Kuswardani Susari Putri S.Psi, M.Psi', 'default.png', 1, '2022-06-03 03:20:59'),
(58, 29, 90, 'tenti', '$2y$10$X4A.q06965gzX3lgIxoUKu79/CCGVj.blSwbas2GWWjAD4LMevrOm', 'Ns. Sri Surya Tenti S. Kep', 'default.png', 1, '2022-06-14 07:55:18'),
(59, 16, 42, 'ginawidya', '$2y$10$g7fcKMpsdLHYf4fdaaVQI.kpu2ZJ17MUtpZuwwKS7.azy.GAbVJw6', ' Gina Widya A ', 'default.png', 1, '2022-06-24 07:36:26'),
(60, 37, 235, 'yulizadarwis', '$2y$10$HbWUgINcDU6.vG6lvk3vzuE36Nr9ExrW/nX.x7u3DGUcgGKsGwNhC', ' Yuliza Darwis ', 'default.png', 1, '2022-06-27 07:16:26'),
(61, 27, 237, 'nofriyanti', '$2y$10$qH7aGHRX3eNFAmBRzbwJreQOHVhk4amSdYJpfHTjCdvFyqSIp/Nl.', ' Nofriyanti Amd.RMIK', 'default.png', 1, '2022-06-29 03:02:19'),
(62, 26, 238, 'dwimutia', '$2y$10$J4DTUgq58ZvlPTabu/5Gr.p38bKMRGcW53/wGtmw63HggyWOqqIKK', ' Dwi Mutia Amd.RMIK', 'default.png', 1, '2022-06-29 03:04:05'),
(63, 38, 11, 'fadhil', '$2y$10$XNnpPQJpERoO/JINdnUgm.Ex2pCGOA2bdoqsGK9cJQ/nUZUSV7AVa', 'dr. I. Fadhilah Sp.N', 'default.png', 1, '2022-07-06 04:45:37'),
(64, 10, 23, 'lisaherman', '$2y$10$WeKNvd6Tr6oJ3.aMEGmE7utrzt0l7hA.Gzj3xvgVcIljgkFNfwjy.', 'drg. Lisa Herman ', 'default.png', 1, '2022-07-26 02:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(201, 1, 2),
(204, 1, 43),
(205, 1, 42);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `deskripsi`) VALUES
(1, 'User', 'Profile'),
(2, 'Admin', 'Admin SIMRS'),
(42, 'Blog', 'Blog'),
(43, 'Pasien', 'Pasien');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(256) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `createdAt`) VALUES
(1, 'Admin', '2021-09-21 02:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT 0,
  `title` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `is_active` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Dashboard', 'admin', 'nav-icon fas fa-tachometer-alt', 1),
(2, 2, 'Role', 'admin/role', 'nav-icon fas fa-user-tie', 1),
(3, 2, 'Menu', 'admin/menu', 'nav-icon fas fa-indent', 1),
(4, 2, 'Sub Menu', 'admin/submenu', 'nav-icon fas fa-outdent', 1),
(7, 3, 'Pendaftaran Rawat Jalan', 'rajal/pendaftaranPasien', 'nav-icon fas fa-walking', 1),
(9, 6, 'Pasien Baru', 'pendaftaran', 'nav-icon fas fa-user-plus', 1),
(10, 3, 'Monitoring Kunjungan', 'rajal/monitoringKunjungan', 'nav-icon fas fa-desktop', 1),
(12, 7, 'Monitoring', 'bpjs/monitoring', 'nav-icon fas fa-desktop', 1),
(13, 7, 'Peserta', 'bpjs/peserta', 'nav-icon fas fa-users', 1),
(14, 7, 'PRB', 'bpjs/rujukbalik', 'nav-icon far fa-handshake', 1),
(15, 7, 'Referensi', 'bpjs/referensi', 'nav-icon fas fa-book', 1),
(16, 2, 'Referensi', 'admin/referensi', 'nav-icon fas fa-book', 1),
(17, 8, 'Pelayanan', 'ruangan', 'nav-icon fas fa-home', 1),
(18, 9, 'Keperawatan', 'keperawatan', 'nav-icon fas fa-home', 1),
(19, 8, 'Setting Ruangan', 'ruangan/setting', 'nav-icon fas fa-cog', 1),
(20, 9, 'Ketersediaan TT', 'keperawatan/setting', 'nav-icon fas fa-bed', 1),
(21, 8, 'Dokter Poli', 'ruangan/dokter', 'nav-icon fas fa-user-md', 1),
(22, 9, 'Perawat Ruangan', 'keperawatan/perawat', 'nav-icon fas fa-user-nurse', 1),
(23, 2, 'Pegawai', 'admin/pegawai', 'nav-icon fas fa-user-plus', 1),
(24, 3, 'Penjamin', 'rajal/penjamin', 'nav-icon fas fa-user-shield', 1),
(25, 8, 'Dokter Ruangan', 'ruangan/dokterRuangan', 'nav-icon fas fa-user-md', 0),
(26, 10, 'Riwayat Pelayanan', 'infobpjs/riwayatPelayanan', 'nav-icon fas fa-info-circle', 1),
(27, 10, 'Tanggal Pulang', 'informasi/tanggalPulang', 'nav-icon fas fa-user-tie', 1),
(28, 10, 'Tempat Tidur', 'informasi/tempatTidur', 'nav-icon fas fa-info-circle', 1),
(29, 4, 'Pendaftaran Rawat Inap', 'ranap/pendaftaranPasien', 'nav-icon fas fa-bed', 1),
(30, 5, 'Pendaftaran Kunjungan', 'igd/pendaftaranPasien', 'nav-icon fas fa-info-circle', 1),
(31, 11, 'Order Rawat Jalan', 'laboratoriumrajal/order', 'nav-icon fas fa-clipboard', 1),
(33, 12, 'Antrian', 'antrian', 'nav-icon fas fa-info-circle', 1),
(34, 12, 'Antrian Pendaftaran', 'antrian/antrianPendaftaran', 'nav-icon fas fa-info-circle', 0),
(35, 13, 'Dashboard', 'keuangan', 'nav-icon fas fa-home', 1),
(36, 13, 'Tarif Tindakan', 'keuangan/tarif', 'nav-icon fas fa-money-bill-alt', 1),
(38, 11, 'Arsip', 'laboratorium/arsipRajal', 'nav-icon fas fa-box', 0),
(40, 14, 'Order Radiologi', 'radiologi/order', 'nav-icon fab fa-odnoklassniki', 1),
(41, 15, 'Order Rawat Inap', 'laboratoriumranap/order', 'nav-icon fas fa-clipboard', 1),
(42, 15, 'Arsip', 'laboratorium/arsipRanap', 'nav-icon fas fa-box', 0),
(43, 16, 'Dashboard', 'instalasilabor', 'nav-icon fas fa-home', 0),
(44, 16, 'Parameter', 'instalasilabor/parameter', 'nav-icon fas fa-flask', 1),
(45, 17, 'Dashboard', 'Instalasifarmasi', 'nav-icon fas fa-home', 1),
(46, 17, 'Master Barang', 'instalasifarmasi/barang', 'nav-icon fas fa-capsules', 1),
(47, 17, 'Referensi Farmasi', 'Instalasifarmasi/referensi', 'nav-icon fas fa-book', 1),
(48, 19, 'Barang Masuk', 'gudangfarmasi/barangMasuk', 'nav-icon fas fa-home', 1),
(49, 19, 'Monitoring Stok', 'gudangfarmasi/monitoringStok', 'nav-icon fas fa-chart-area', 1),
(50, 19, 'Mutasi Barang', 'gudangfarmasi/mutasiBarang', 'nav-icon fas fa-dolly', 1),
(51, 21, 'Order Barang', 'depofarmasirajal/orderBarang', 'nav-icon fas fa-clipboard', 1),
(52, 14, 'Laporan', 'radiologi/laporan', 'nav-icon fas fa-clipboard-check', 1),
(53, 16, 'Laporan', 'instalasilabor/laporan', 'nav-icon fas fa-book', 1),
(54, 23, 'Check In', 'reservasiruangan/checkin', 'nav-icon fas fa-user-plus', 1),
(55, 4, 'Monitoring Kunjungan', 'ranap/monitoringKunjungan', 'nav-icon fas fa-desktop', 1),
(56, 12, 'Antrian Poli', 'antrian/antrianPoli', 'nav-icon fas fa-info-circle', 0),
(57, 12, 'Antrian Farmasi', 'antrian/antrianFarmasi', 'nav-icon fas fa-info-circle', 0),
(58, 8, 'Perawat Poli', 'ruangan/perawat', 'nav-icon fas fa-user-nurse', 1),
(59, 24, 'Antrian Pendaftaran', 'displayantrian/pendaftaran', 'nav-icon fas fa-desktop', 1),
(60, 24, 'Antrian Poli', 'displayantrian/poli', 'nav-icon fas fa-desktop', 1),
(61, 24, 'Antrian Farmasi', 'displayantrian/farmasi', 'nav-icon fas fa-desktop', 1),
(62, 8, 'Atur Jadwal Dokter', 'ruangan/jadwaldokter', 'nav-icon fas fa-calendar-day', 1),
(63, 10, 'Jadwal Dokter', 'informasi/jadwalDokter', 'nav-icon fas fa-info-circle', 1),
(68, 8, 'Psikolog', 'ruangan/psikolog', 'nav-icon fas fa-user', 1),
(1002, 4, 'Reservasi', 'ranap/reservasi', 'nav-icon fas fa-restroom', 0),
(1003, 23, 'Check Out', 'reservasiruangan/checkout', 'nav-icon fas fa-user-minus', 0),
(1004, 23, 'Mutasi Ruangan', 'reservasiruangan/mutasiruangan', 'nav-icon fas fa-exchange-alt', 0),
(1005, 25, 'Antrian Loket', 'onsite/antrianLoket', 'nav-icon fas fa-restroom', 1),
(1006, 23, 'Pasien Ruangan', 'reservasiruangan/pasienruangan', 'nav-icon fas fa-procedures', 1),
(1007, 25, 'Antrian Farmasi', 'onsite/antrianFarmasi', 'nav-icon fas fa-restroom', 0),
(1008, 23, 'Pasien Mutasi', 'reservasiruangan/pasienmutasi', 'nav-icon fas fa-walking', 1),
(1009, 26, 'Approval Order', 'instalasiradiologi/approval', 'nav-icon fas fa-handshake', 1),
(1010, 23, 'Laporan', 'reservasiruangan/laporan', 'nav-icon fas fa-book', 1),
(1011, 16, 'Approval Order', 'instalasilabor/approval', 'nav-icon fas fa-handshake', 1),
(1012, 8, 'Referensi Dokter', 'ruangan/referensiDokter', 'nav-icon fas fa-book', 1),
(1013, 7, 'Rencana Kontrol', 'bpjs/rencanaKontrol', 'nav-icon fas fa-calendar-alt', 1),
(1014, 7, 'Rujukan', 'bpjs/rujukan', 'nav-icon fas fa-ambulance', 1),
(1015, 7, 'SEP', 'bpjs/sep', 'nav-icon fas fa-user-shield', 1),
(1016, 25, 'Antrian  Poli', 'onsite/antrianPoli', 'nav-icon fas fa-file-medical', 0),
(1017, 12, 'Waktu Antrian', 'antrian/waktuAntrian', 'nav-icon fas fa-info-circle', 1),
(1019, 12, 'Dashboard Per Tanggal', 'antrian/dashboardPerTanggal', 'nav-icon fas fa-calendar-day', 1),
(1020, 12, 'Dashboard Per Bulan', 'antrian/dashboardPerBulan', 'nav-icon fas fa-calendar', 1),
(1021, 9, 'Referensi Kamar BPJS', 'keperawatan/referensiKamarBpjs', 'nav-icon fas fa-file-medical', 1),
(1022, 9, 'Ketersediaan Kamar RS', 'keperawatan/ketersedianKamarRsBpjs', 'nav-icon fas fa-file-medical', 1),
(1023, 6, 'Approval Pasien', 'pendaftaran/approvalPasien', 'nav-icon fas fa-user-check', 0),
(1024, 6, 'Data Pasien', 'pendaftaran/dataPasien', 'nav-icon fas fa-user', 1),
(1025, 27, 'Permintaan Status', 'rekammedik/permintaanStatus', 'nav-icon fas fa-walking', 1),
(1026, 27, 'Antrian', 'rekammedik/antrian', 'nav-icon fas fa-file-medical', 1),
(1027, 17, 'Permintaan Barang', 'Instalasifarmasi/approval', 'nav-icon fas fa-check', 1),
(1028, 8, 'Referensi Poli', 'ruangan/referensiPoli', 'nav-icon fas fa-book', 1),
(1029, 22, 'Order Barang', 'depofarmasiranap/orderbarang', 'nav-icon fas fa-clipboard', 1),
(1030, 28, 'Pasien Rawat Jalan', 'dokter/rawatjalan', 'nav-icon fas fa-walking', 1),
(1031, 6, 'Approval Pasien', 'pendaftaran/approvalPasien', 'nav-icon fas fa-user-check', 1),
(1032, 30, 'Display Tempat Tidur', 'Displaytempattidur', 'nav-icon fas fa-bed', 1),
(1034, 31, 'Antrian Pendaftaran', 'antrianPendaftaran', 'nav-icon fas fa-info-circle', 1),
(1035, 32, 'Antrian Poli', 'antrianPoli', 'nav-icon fas fa-info-circle', 1),
(1036, 33, 'Antrian Farmasi', 'antrianFarmasi', 'nav-icon fas fa-info-circle', 1),
(1037, 28, 'Pasien Rawat Inap', 'dokter/rawatinap', 'nav-icon fas fa-bed', 1),
(1038, 18, 'Resep', 'farmasirajal/resep', 'nav-icon fas fa-receipt', 1),
(1039, 20, 'Resep', 'farmasiranap/resep', 'nav-icon fas fa-receipt', 1),
(1040, 21, 'Monitoring Stok', 'depofarmasirajal/monitoringStok', 'nav-icon fas fa-cube', 1),
(1041, 22, 'Monitoring Stok', 'depofarmasiranap/monitoringStok', 'nav-icon fas fa-cube', 1),
(1042, 4, 'Penjamin', 'ranap/penjamin', 'nav-icon fas fa-user-shield', 1),
(1043, 17, 'Laporan', 'Instalasifarmasi/laporan', 'nav-icon fas fa-book', 1),
(1046, 35, 'Pasien', 'psikologi/pasien', 'nav-icon fas fa-user-md', 1),
(1049, 34, 'Pembayaran', 'kasirrajal/pembayaran', 'nav-icon fas fa-cash-register', 1),
(1051, 36, 'Pembayaran', 'kasirranap/pembayaran	', 'nav-icon fas fa-cash-register', 1),
(1052, 28, 'Pasien Konsultasi', 'dokter/konsultasidokter', 'nav-icon fas fa-house-user', 1),
(1053, 19, 'Setting Harga', 'gudangfarmasi/settingHarga', 'nav-icon fas fa-calculator', 1),
(1054, 2, 'Database', 'admin/database', 'nav-icon fas fa-database', 1),
(1055, 24, 'Video', 'displayantrian/videoAntrean', 'nav-icon fas fa-video', 1),
(1056, 37, 'Pasien Rawat Jalan', 'casemix/pasienRajal', 'nav-icon fas fa-walking', 1),
(1057, 37, 'Pasien Rawat Inap', 'casemix/pasienRanap', 'nav-icon fas fa-bed', 1),
(1058, 18, 'Retur Obat', 'farmasirajal/retur', 'nav-icon fas fa-capsules', 1),
(1059, 1, 'Dashboard', 'user', 'nav-icon fas fa-tachometer-alt', 1),
(1060, 1, 'Ubah Password', 'user/ubahPassword', 'nav-icon fas fa-key', 1),
(1061, 20, 'Retur Obat', 'farmasiranap/retur', 'nav-icon fas fa-capsules', 1),
(1062, 18, 'Penjualan', 'farmasirajal/penjualan', 'nav-icon fas fa-briefcase-medical', 1),
(1063, 34, 'Penjualan', 'kasirrajal/penjualan', 'nav-icon fas fa-briefcase-medical', 1),
(1064, 27, 'Laporan', 'rekammedik/laporan', 'nav-icon fas fa-book', 1),
(1065, 38, 'Laporan Penjualan', 'farmasirajal/laporanpenjualan', 'nav-icon fas fa-book', 1),
(1066, 38, 'Laporan Retur', 'farmasirajal/laporanretur', 'nav-icon fas fa-book', 1),
(1068, 27, 'Task Antrian', 'rekammedik/taskAntrian', 'nav-icon fas fa-list', 1),
(1069, 39, 'Resep Rawat Jalan', 'resepmanual/rawatjalan', 'nav-icon fas fa-receipt', 1),
(1070, 39, 'Resep Rawat Inap', 'resepmanual/rawatinap', 'nav-icon fas fa-receipt', 1),
(1071, 27, 'Monitoring Kunjungan', 'rekammedik/monitoring', 'nav-icon fas fa-user-md', 1),
(1072, 40, 'Atur Loket', 'loket/aturloket', 'nav-icon fas fa-microphone', 1),
(1073, 41, 'Ambulance', 'ambulance', 'nav-icon fas fa-desktop', 1),
(1074, 41, 'Setup Ambulance', 'ambulance/setupAmbulance', 'nav-icon fas fa-desktop', 1),
(1075, 42, 'Blog', 'blog', 'nav-icon fas fa-newspaper', 1),
(1076, 43, 'Dashboard', 'pasien', 'nav-icon fas fa-tachometer-alt', 0),
(1077, 43, 'Registrasi Pasien', 'pasien/registrasi', 'nav-icon fas fa-user-plus', 1),
(1078, 43, 'Pasien Terdaftar', 'pasien/pasienterdaftar', 'nav-icon fas fa-users', 1),
(1079, 43, 'Pasien Rawatan', 'pasien/rawatan', 'nav-icon fas fa-bed', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catatan_perkembangan`
--
ALTER TABLE `catatan_perkembangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pemantauan_alat_medik`
--
ALTER TABLE `pemantauan_alat_medik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rawatan`
--
ALTER TABLE `rawatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referensi_profesi`
--
ALTER TABLE `referensi_profesi`
  ADD PRIMARY KEY (`id_profesi`);

--
-- Indexes for table `tanda_vital`
--
ALTER TABLE `tanda_vital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu+id` (`menu_id`) USING BTREE;

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catatan_perkembangan`
--
ALTER TABLE `catatan_perkembangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `pemantauan_alat_medik`
--
ALTER TABLE `pemantauan_alat_medik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rawatan`
--
ALTER TABLE `rawatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referensi_profesi`
--
ALTER TABLE `referensi_profesi`
  MODIFY `id_profesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tanda_vital`
--
ALTER TABLE `tanda_vital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1080;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
