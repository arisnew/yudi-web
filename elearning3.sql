-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2017 at 11:05 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_pegawai` enum('Tetap','Kontrak') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('Guru') NOT NULL DEFAULT 'Guru',
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_telp`, `email`, `foto`, `status_pegawai`, `username`, `password`, `level`, `status`) VALUES
('098765', 'oke', 'ok', 'jakarta', '1992-12-10', 'Laki-laki', 'Islam', '0987654321', 'sfhulyofuy', '', 'Tetap', 'rusruger', '75ca40df413da497c4c1d40706816e82', 'Guru', 'Aktif'),
('12345', 'udin', 'klari', 'sragen', '1991-10-13', 'Laki-laki', 'Islam', '7207207320273', 'yudi.gmail.co.id', '', 'Kontrak', 'yudisl', '202cb962ac59075b964b07152d234b70', 'Guru', 'Aktif'),
('123456', 'agus', 'karawang', 'sragen', '1992-10-01', 'Laki-laki', 'Islam', '7747453377775', 'agus.gmail.com', '', 'Tetap', 'aguscs', '202cb962ac59075b964b07152d234b70', 'Guru', 'Aktif'),
('123456789', 'Agus Badrusalam', 'Karawang', 'Karawang', '1992-10-01', 'Laki-laki', 'Islam', '08999999999', 'agus@gmail.com', '', 'Tetap', 'agus_bs', '202cb962ac59075b964b07152d234b70', 'Guru', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kode_kelas` varchar(20) NOT NULL,
  `kode_jurusan` varchar(20) NOT NULL,
  `hari` int(1) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `jam` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `kode_mapel`, `nip`, `kode_kelas`, `kode_jurusan`, `hari`, `status`, `jam`) VALUES
(1, '01', '098765', '1', '1', 1, 'Aktif', '1'),
(2, '02', '12345', '2', '2', 2, 'Aktif', '2'),
(3, '03', '123456', '1', '1', 1, 'Aktif', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(20) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`, `status`) VALUES
('1', 'TSM', 'Aktif'),
('2', 'TKJ', 'Aktif'),
('3', 'Akuntansi', 'Aktif'),
('4', 'Teknik Listrik', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(20) NOT NULL,
  `nama_kelas` varchar(200) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`, `status`) VALUES
('1', '10 TKJ', 'Aktif'),
('2', '10 TSM', 'Aktif'),
('3', '11 TKJ', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `komentator` varchar(25) NOT NULL,
  `level_komentator` enum('siswa','guru') NOT NULL,
  `isi` text NOT NULL,
  `tgl_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

CREATE TABLE `lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `nama_lampiran` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lampiran`
--

INSERT INTO `lampiran` (`id_lampiran`, `id_materi`, `nama_lampiran`, `nama_file`) VALUES
(1, 1, '1E_HTML1.pdf', '1E_HTML1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(200) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mapel`, `nama_mapel`, `status`) VALUES
('01', 'IPA', 'Aktif'),
('02', 'MTK', 'Aktif'),
('03', 'K3', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `publish` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `kode_mapel`, `judul`, `isi`, `nip`, `tgl_posting`, `publish`) VALUES
(1, '01', 'test-materi', 'isi', '098765', '0000-00-00 00:00:00', 'Ya'),
(3, '01', 'test-2', 'isi', '123456', '2016-12-17 11:16:38', 'Ya'),
(4, '01', 'chek', 'blabla', '098765', '2016-12-15 14:42:48', 'Ya'),
(5, '03', 'kesehatan Kerja', 'Tolong Dipahami', '123456789', '2017-01-31 03:56:21', 'Ya'),
(6, '01', 'tesss', 'tessss', '098765', '2017-01-31 15:32:19', 'Ya'),
(7, '02', 'tess', 'tes', '098765', '0000-00-00 00:00:00', 'Ya'),
(8, '01', 'tes', '', '098765', '0000-00-00 00:00:00', 'Ya'),
(9, '02', 'tess', 'tess', '12345', '2017-02-04 05:57:03', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ujian`
--

CREATE TABLE `nilai_ujian` (
  `id_nilai` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `jumlah_benar` int(5) NOT NULL,
  `jumlah_salah` int(5) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_ujian`
--

INSERT INTO `nilai_ujian` (`id_nilai`, `nis`, `jumlah_benar`, `jumlah_salah`, `tgl_ujian`, `kode_mapel`, `nilai`) VALUES
(1, 1234, 1, 9, '2016-12-15', '01', '10'),
(2, 12345, 9, 1, '2016-12-15', '01', '90'),
(3, 1234, 5, 5, '2017-02-04', '01', '50'),
(4, 98765, 5, 5, '2017-02-06', '02', '50');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `dari` varchar(25) NOT NULL,
  `ke` varchar(25) NOT NULL,
  `type_pesan` enum('siswa-siswa','guru-guru','siswa-guru','guru-siswa') NOT NULL,
  `tgl_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `judul`, `isi`, `dari`, `ke`, `type_pesan`, `tgl_post`) VALUES
(1, 'ok', 'ok', 'yudi', 'agus', 'siswa-siswa', '2016-12-20 00:00:00'),
(2, 'sisi datar', 'ok', 'agus', 'yudi', 'siswa-siswa', '2016-12-20 06:04:25'),
(3, 'tesss', 'tesss', 'tesss', 'tesss', 'siswa-siswa', '0000-00-00 00:00:00'),
(4, 'qwerty', 'qwety', 'qwerty', 'qwrty', 'siswa-siswa', '2016-12-16 15:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(30) NOT NULL,
  `thn_masuk` year(4) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `level` enum('Siswa') NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `thn_masuk`, `email`, `no_telp`, `foto`, `username`, `password`, `level`, `kelas`, `jurusan`, `status`) VALUES
(1234, 'yudi', 'karawang', 'sragen', '0000-00-00', 'Laki-laki', 'Islam', 2012, 'yufi.gmail.com', '5336666', '10887443_616344291803599_5395040108109895017_o.jpg', 'yudi123', '202cb962ac59075b964b07152d234b70', 'Siswa', '1', '2', 'Aktif'),
(12345, 'Agus', 'Rawamerta', 'Karawang', '0000-00-00', 'Laki-laki', 'Islam', 0000, '', '', '', '', NULL, 'Siswa', '1', '1', 'Aktif'),
(98765, 'Agus Ganteng', 'Rawamerta', 'Karawang', '0000-00-00', 'Laki-laki', 'Islam', 2014, 'agus@gmail.com', '01358390573', '', 'gus_a', '202cb962ac59075b964b07152d234b70', 'Siswa', '1', '1', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `opsi_a` text NOT NULL,
  `opsi_b` text NOT NULL,
  `opsi_c` text NOT NULL,
  `opsi_d` text NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tgl_posting` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `level` enum('Admin') NOT NULL DEFAULT 'Admin',
  `password` varchar(32) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `foto` varchar(255) NOT NULL DEFAULT 'default-user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `email`, `level`, `password`, `status`, `foto`) VALUES
('didin_05', 'Didin W', 'didin@gmail.com', 'Admin', '202cb962ac59075b964b07152d234b70', 'Aktif', ''),
('yd_sl', 'yudis', 'yudi.gmail.co.id', 'Admin', '202cb962ac59075b964b07152d234b70', 'Aktif', 'default-user.png'),
('yudi123', 'yudi sl', 'yudi123.gmail.com', 'Admin', '202cb962ac59075b964b07152d234b70', 'Aktif', 'default-user.png'),
('yudi_sl', 'yudi', 'yudi.gmail.com', 'Admin', '202cb962ac59075b964b07152d234b70', 'Aktif', 'default-user.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jadwal`
--
CREATE TABLE `v_jadwal` (
`id_jadwal` int(11)
,`kode_mapel` varchar(20)
,`nama_mapel` varchar(200)
,`nip` varchar(20)
,`nama` varchar(200)
,`kode_kelas` varchar(20)
,`nama_kelas` varchar(200)
,`kode_jurusan` varchar(20)
,`nama_jurusan` varchar(50)
,`hari` int(1)
,`jam` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_komentar`
--
CREATE TABLE `v_komentar` (
`id_komentar` int(11)
,`id_materi` int(11)
,`judul` varchar(255)
,`komentator` varchar(25)
,`level_komentator` enum('siswa','guru')
,`isi` text
,`tgl_post` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_lampiran`
--
CREATE TABLE `v_lampiran` (
`id_lampiran` int(11)
,`id_materi` int(11)
,`judul` varchar(255)
,`nama_lampiran` varchar(255)
,`nama_file` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_materi`
--
CREATE TABLE `v_materi` (
`id_materi` int(11)
,`kode_mapel` varchar(20)
,`nama_mapel` varchar(200)
,`judul` varchar(255)
,`isi` text
,`nip` varchar(20)
,`nama` varchar(200)
,`tgl_posting` datetime
,`publish` enum('Ya','Tidak')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_nilai_ujian`
--
CREATE TABLE `v_nilai_ujian` (
`id_nilai` int(11)
,`nis` int(11)
,`nama` varchar(200)
,`jumlah_benar` int(5)
,`jumlah_salah` int(5)
,`tgl_ujian` date
,`kode_mapel` varchar(20)
,`nama_mapel` varchar(200)
,`nilai` varchar(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_siswa`
--
CREATE TABLE `v_siswa` (
`nis` int(11)
,`nama` varchar(200)
,`alamat` varchar(255)
,`tempat_lahir` varchar(200)
,`tgl_lahir` date
,`jenis_kelamin` enum('Laki-laki','Perempuan')
,`agama` varchar(30)
,`thn_masuk` year(4)
,`email` varchar(200)
,`no_telp` varchar(15)
,`foto` varchar(255)
,`username` varchar(20)
,`password` varchar(32)
,`level` enum('Siswa')
,`kelas` varchar(20)
,`nama_kelas` varchar(200)
,`jurusan` varchar(20)
,`nama_jurusan` varchar(50)
,`status` enum('Aktif','Nonaktif')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_soal`
--
CREATE TABLE `v_soal` (
`id_soal` int(11)
,`pertanyaan` text
,`opsi_a` text
,`opsi_b` text
,`opsi_c` text
,`opsi_d` text
,`jawaban` varchar(5)
,`kode_mapel` varchar(20)
,`nama_mapel` varchar(200)
,`nip` varchar(20)
,`nama` varchar(200)
,`tgl_posting` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `v_jadwal`
--
DROP TABLE IF EXISTS `v_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwal`  AS  select `ja`.`id_jadwal` AS `id_jadwal`,`ja`.`kode_mapel` AS `kode_mapel`,`mp`.`nama_mapel` AS `nama_mapel`,`ja`.`nip` AS `nip`,`g`.`nama` AS `nama`,`ja`.`kode_kelas` AS `kode_kelas`,`ke`.`nama_kelas` AS `nama_kelas`,`ja`.`kode_jurusan` AS `kode_jurusan`,`ju`.`nama_jurusan` AS `nama_jurusan`,`ja`.`hari` AS `hari`,`ja`.`jam` AS `jam` from ((((`jadwal` `ja` join `mata_pelajaran` `mp` on((`ja`.`kode_mapel` = `mp`.`kode_mapel`))) join `guru` `g` on((`ja`.`nip` = `g`.`nip`))) join `kelas` `ke` on((`ja`.`kode_kelas` = `ke`.`kode_kelas`))) join `jurusan` `ju` on((`ja`.`kode_jurusan` = `ju`.`kode_jurusan`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_komentar`
--
DROP TABLE IF EXISTS `v_komentar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_komentar`  AS  select `ko`.`id_komentar` AS `id_komentar`,`ko`.`id_materi` AS `id_materi`,`m`.`judul` AS `judul`,`ko`.`komentator` AS `komentator`,`ko`.`level_komentator` AS `level_komentator`,`ko`.`isi` AS `isi`,`ko`.`tgl_post` AS `tgl_post` from (`komentar` `ko` join `materi` `m` on((`ko`.`id_materi` = `m`.`id_materi`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_lampiran`
--
DROP TABLE IF EXISTS `v_lampiran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lampiran`  AS  select `l`.`id_lampiran` AS `id_lampiran`,`l`.`id_materi` AS `id_materi`,`m`.`judul` AS `judul`,`l`.`nama_lampiran` AS `nama_lampiran`,`l`.`nama_file` AS `nama_file` from (`lampiran` `l` join `materi` `m` on((`l`.`id_materi` = `m`.`id_materi`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_materi`
--
DROP TABLE IF EXISTS `v_materi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_materi`  AS  select `m`.`id_materi` AS `id_materi`,`m`.`kode_mapel` AS `kode_mapel`,`mp`.`nama_mapel` AS `nama_mapel`,`m`.`judul` AS `judul`,`m`.`isi` AS `isi`,`m`.`nip` AS `nip`,`g`.`nama` AS `nama`,`m`.`tgl_posting` AS `tgl_posting`,`m`.`publish` AS `publish` from ((`materi` `m` join `guru` `g` on((`m`.`nip` = `g`.`nip`))) join `mata_pelajaran` `mp` on((`m`.`kode_mapel` = `mp`.`kode_mapel`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_nilai_ujian`
--
DROP TABLE IF EXISTS `v_nilai_ujian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_nilai_ujian`  AS  select `nu`.`id_nilai` AS `id_nilai`,`nu`.`nis` AS `nis`,`si`.`nama` AS `nama`,`nu`.`jumlah_benar` AS `jumlah_benar`,`nu`.`jumlah_salah` AS `jumlah_salah`,`nu`.`tgl_ujian` AS `tgl_ujian`,`nu`.`kode_mapel` AS `kode_mapel`,`mp`.`nama_mapel` AS `nama_mapel`,`nu`.`nilai` AS `nilai` from ((`nilai_ujian` `nu` join `siswa` `si` on((`nu`.`nis` = `si`.`nis`))) join `mata_pelajaran` `mp` on((`nu`.`kode_mapel` = `mp`.`kode_mapel`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_siswa`
--
DROP TABLE IF EXISTS `v_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_siswa`  AS  select `si`.`nis` AS `nis`,`si`.`nama` AS `nama`,`si`.`alamat` AS `alamat`,`si`.`tempat_lahir` AS `tempat_lahir`,`si`.`tgl_lahir` AS `tgl_lahir`,`si`.`jenis_kelamin` AS `jenis_kelamin`,`si`.`agama` AS `agama`,`si`.`thn_masuk` AS `thn_masuk`,`si`.`email` AS `email`,`si`.`no_telp` AS `no_telp`,`si`.`foto` AS `foto`,`si`.`username` AS `username`,`si`.`password` AS `password`,`si`.`level` AS `level`,`si`.`kelas` AS `kelas`,`ke`.`nama_kelas` AS `nama_kelas`,`si`.`jurusan` AS `jurusan`,`ju`.`nama_jurusan` AS `nama_jurusan`,`si`.`status` AS `status` from ((`siswa` `si` join `kelas` `ke` on((`si`.`kelas` = `ke`.`kode_kelas`))) join `jurusan` `ju` on((`si`.`jurusan` = `ju`.`kode_jurusan`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_soal`
--
DROP TABLE IF EXISTS `v_soal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_soal`  AS  select `so`.`id_soal` AS `id_soal`,`so`.`pertanyaan` AS `pertanyaan`,`so`.`opsi_a` AS `opsi_a`,`so`.`opsi_b` AS `opsi_b`,`so`.`opsi_c` AS `opsi_c`,`so`.`opsi_d` AS `opsi_d`,`so`.`jawaban` AS `jawaban`,`so`.`kode_mapel` AS `kode_mapel`,`mp`.`nama_mapel` AS `nama_mapel`,`so`.`nip` AS `nip`,`g`.`nama` AS `nama`,`so`.`tgl_posting` AS `tgl_posting` from ((`soal` `so` join `mata_pelajaran` `mp` on((`so`.`kode_mapel` = `mp`.`kode_mapel`))) join `guru` `g` on((`so`.`nip` = `g`.`nip`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id_lampiran`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nis` (`nis`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `jurusan` (`jurusan`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `kode_mapel` (`kode_mapel`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`) ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON UPDATE CASCADE;

--
-- Constraints for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD CONSTRAINT `lampiran_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON UPDATE CASCADE;

--
-- Constraints for table `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  ADD CONSTRAINT `nilai_ujian_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ujian_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`kode_jurusan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`kode_kelas`) ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `soal_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
