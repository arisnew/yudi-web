-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Okt 2017 pada 04.48
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `new_elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
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
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_telp`, `email`, `foto`, `status_pegawai`, `username`, `password`, `level`, `status`) VALUES
('0001', 'Bayu Priatna', 'karawang', 'Karawang', '1986-05-01', 'Laki-laki', 'Islam', '12345678', 'bayu.p@gmail.com', 'Bebek_Petelur3.jpg', 'Tetap', 'bayu_p', '202cb962ac59075b964b07152d234b70', 'Guru', 'Aktif'),
('0002', 'Yuni Sulastri', 'Karawang', 'Karawang', '1991-08-01', 'Perempuan', 'Islam', '12345678', 'yuni.s@gmail.com', '12265868_762473120545849_109936360050780045_o1.jpg', 'Tetap', 'yuni_s', '202cb962ac59075b964b07152d234b70', 'Guru', 'Aktif'),
('0003', 'Agus Badrusalam', 'Karawang', 'Karawang', '1991-08-01', 'Laki-laki', 'Islam', '2222222', 'agus@gmail.com', '', 'Tetap', 'agus_b', '202cb962ac59075b964b07152d234b70', 'Guru', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
`id_jadwal` int(11) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kode_kelas` varchar(20) NOT NULL,
  `kode_jurusan` varchar(20) NOT NULL,
  `hari` int(1) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `jam` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `kode_mapel`, `nip`, `kode_kelas`, `kode_jurusan`, `hari`, `status`, `jam`) VALUES
(26, '1', '0001', '1', '1', 1, 'Aktif', '1'),
(27, '2', '0002', '1', '1', 1, 'Aktif', '2'),
(28, '4', '0001', '1', '1', 3, 'Aktif', '3'),
(29, '3', '0002', '1', '1', 4, 'Aktif', '5'),
(30, '2', '0003', '1', '1', 5, 'Aktif', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `kode_jurusan` varchar(20) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`, `status`) VALUES
('1', 'Teknik Komputer Jaringan', 'Aktif'),
('2', 'Teknik Sepeda Motor', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `kode_kelas` varchar(20) NOT NULL,
  `nama_kelas` varchar(200) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`, `status`) VALUES
('1', '10 TKJ', 'Aktif'),
('2', '11 TKJ', 'Aktif'),
('3', '12 TKJ', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`id_komentar` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `komentator` varchar(25) NOT NULL,
  `level_komentator` enum('siswa','guru') NOT NULL,
  `isi` text NOT NULL,
  `tgl_post` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_materi`, `komentator`, `level_komentator`, `isi`, `tgl_post`) VALUES
(1, 46, 'yudi_sl', 'guru', 'tes', '2017-08-21 15:25:02'),
(2, 48, '0002', 'guru', 'TES', '2017-08-26 23:25:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lampiran`
--

CREATE TABLE IF NOT EXISTS `lampiran` (
`id_lampiran` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `nama_lampiran` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `lampiran`
--

INSERT INTO `lampiran` (`id_lampiran`, `id_materi`, `nama_lampiran`, `nama_file`) VALUES
(1, 46, '7407040053_m.pdf', '7407040053_m.pdf'),
(2, 46, 'konsep_dasar_OS.pdf', 'konsep_dasar_OS.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
  `kode_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(200) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mapel`, `nama_mapel`, `status`) VALUES
('1', 'Teknik Elektronika Analog dan Digital Dasar', 'Aktif'),
('2', 'K3LH', 'Aktif'),
('3', 'Sistem Operasi Dasar', 'Aktif'),
('4', 'Perakitan dan Perawatan PC', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
`id_materi` int(11) NOT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `publish` enum('Ya','Tidak') NOT NULL DEFAULT 'Tidak'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_jadwal`, `judul`, `isi`, `nip`, `tgl_posting`, `publish`) VALUES
(45, 28, 'TES BAYU', '<p>TES BAYU</p>\r\n', '0001', '2017-08-20 17:24:27', 'Ya'),
(46, 26, 'TES 2 BAYU', '<p>TES 2 BAYU</p>\r\n', '0001', '2017-08-20 17:24:59', 'Ya'),
(47, 27, 'TES 3 YUNI', '<p>TES 3 YUNI</p>\r\n', '0002', '2017-08-20 17:25:30', 'Ya'),
(48, 29, 'TES 4 YUNI', '<p>TES 4 YUNI</p>\r\n', '0002', '2017-08-20 17:26:04', 'Ya'),
(49, 30, 'ABCD', '<p>ABCD</p>\r\n', '0003', '2017-09-08 17:03:57', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_ujian`
--

CREATE TABLE IF NOT EXISTS `nilai_ujian` (
`id_nilai` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `jumlah_benar` int(5) NOT NULL,
  `jumlah_salah` int(5) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `id_materi` int(11) DEFAULT NULL,
  `nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`id_pesan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `dari` varchar(25) NOT NULL,
  `ke` varchar(25) NOT NULL,
  `type_pesan` enum('siswa-siswa','guru-guru','siswa-guru','guru-siswa') NOT NULL,
  `tgl_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
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
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `thn_masuk`, `email`, `no_telp`, `foto`, `username`, `password`, `level`, `kelas`, `jurusan`, `status`) VALUES
(12001, 'Yayan Suhendar', 'Karawang', 'Karawang', '1991-05-01', 'Laki-laki', 'Islam', 2014, 'yayan@gmail.com', '12345678', '18237979_1867937873231872_2443356029093134493_o1.jpg', 'yayan_s', '202cb962ac59075b964b07152d234b70', 'Siswa', '1', '1', 'Aktif'),
(12002, 'Gunawan', 'Karawang', 'Karawang', '1990-06-01', 'Laki-laki', 'Islam', 2014, 'gunawan@gmail.com', '12345678', '11696446_10205841904420948_269840450207694746_o1.jpg', 'gunawan', '202cb962ac59075b964b07152d234b70', 'Siswa', '1', '1', 'Aktif'),
(12003, 'Tapri Andi', 'Karawang', 'Karawang', '1991-04-01', 'Laki-laki', 'Islam', 2014, 'tapri_andi@gmail.com', '12345678', '', 'tapri', '202cb962ac59075b964b07152d234b70', 'Siswa', '1', '1', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
`id_soal` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `opsi_a` text NOT NULL,
  `opsi_b` text NOT NULL,
  `opsi_c` text NOT NULL,
  `opsi_d` text NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `id_materi` int(11) DEFAULT NULL,
  `nip` varchar(20) NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `durasi` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `pertanyaan`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `jawaban`, `id_materi`, `nip`, `tgl_posting`, `durasi`) VALUES
(1, '<p>TES 1</p>\r\n', 'TES', 'TES', 'TES', 'TES', 'B', 47, '0002', '2017-08-27 23:17:06', 60),
(2, '<p>ABCD</p>\r\n', 'A', 'B', 'C', 'D', 'A', 45, '0001', '2017-09-30 16:15:53', NULL),
(3, '<p>abcd</p>\r\n', 'a', 'b', 'c', 'd', 'B', 45, '0001', '2017-09-30 16:16:25', NULL),
(4, '<p>qwerty</p>\r\n', 'q', 'w', 'e', 'r', 'C', 45, '0001', '2017-09-30 16:16:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `level` enum('Admin') NOT NULL DEFAULT 'Admin',
  `password` varchar(32) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `foto` varchar(255) NOT NULL DEFAULT 'default-user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `nama`, `email`, `level`, `password`, `status`, `foto`) VALUES
('aris_p', 'Aris Priyanto', 'aris@gmail.com', 'Admin', '202cb962ac59075b964b07152d234b70', 'Aktif', 'default-user.png'),
('yudi_sl', 'yudi', 'yudi@gmail.com', 'Admin', '202cb962ac59075b964b07152d234b70', 'Aktif', 'default-user.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jadwal`
--
CREATE TABLE IF NOT EXISTS `v_jadwal` (
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
,`status` enum('Aktif','Nonaktif')
,`jam` varchar(15)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_komentar`
--
CREATE TABLE IF NOT EXISTS `v_komentar` (
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
CREATE TABLE IF NOT EXISTS `v_lampiran` (
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
CREATE TABLE IF NOT EXISTS `v_materi` (
`id_materi` int(11)
,`id_jadwal` int(11)
,`kode_mapel` varchar(20)
,`nama_mapel` varchar(200)
,`kode_kelas` varchar(20)
,`nama_kelas` varchar(200)
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
CREATE TABLE IF NOT EXISTS `v_nilai_ujian` (
`id_nilai` int(11)
,`nis` int(11)
,`jumlah_benar` int(5)
,`jumlah_salah` int(5)
,`tgl_ujian` date
,`id_materi` int(11)
,`nilai` varchar(5)
,`nama` varchar(200)
,`judul` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_siswa`
--
CREATE TABLE IF NOT EXISTS `v_siswa` (
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
CREATE TABLE IF NOT EXISTS `v_soal` (
`id_soal` int(11)
,`pertanyaan` text
,`opsi_a` text
,`opsi_b` text
,`opsi_c` text
,`opsi_d` text
,`jawaban` varchar(5)
,`id_materi` int(11)
,`kode_mapel` varchar(20)
,`nama_mapel` varchar(200)
,`nip` varchar(20)
,`nama` varchar(200)
,`tgl_posting` datetime
,`durasi` int(11)
);
-- --------------------------------------------------------

--
-- Struktur untuk view `v_jadwal`
--
DROP TABLE IF EXISTS `v_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwal` AS select `ja`.`id_jadwal` AS `id_jadwal`,`ja`.`kode_mapel` AS `kode_mapel`,`mp`.`nama_mapel` AS `nama_mapel`,`ja`.`nip` AS `nip`,`g`.`nama` AS `nama`,`ja`.`kode_kelas` AS `kode_kelas`,`ke`.`nama_kelas` AS `nama_kelas`,`ja`.`kode_jurusan` AS `kode_jurusan`,`ju`.`nama_jurusan` AS `nama_jurusan`,`ja`.`hari` AS `hari`,`ja`.`status` AS `status`,`ja`.`jam` AS `jam` from ((((`jadwal` `ja` join `mata_pelajaran` `mp` on((`ja`.`kode_mapel` = `mp`.`kode_mapel`))) join `guru` `g` on((`ja`.`nip` = `g`.`nip`))) join `kelas` `ke` on((`ja`.`kode_kelas` = `ke`.`kode_kelas`))) join `jurusan` `ju` on((`ja`.`kode_jurusan` = `ju`.`kode_jurusan`)));

-- --------------------------------------------------------

--
-- Struktur untuk view `v_komentar`
--
DROP TABLE IF EXISTS `v_komentar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_komentar` AS select `ko`.`id_komentar` AS `id_komentar`,`ko`.`id_materi` AS `id_materi`,`m`.`judul` AS `judul`,`ko`.`komentator` AS `komentator`,`ko`.`level_komentator` AS `level_komentator`,`ko`.`isi` AS `isi`,`ko`.`tgl_post` AS `tgl_post` from (`komentar` `ko` join `materi` `m` on((`ko`.`id_materi` = `m`.`id_materi`)));

-- --------------------------------------------------------

--
-- Struktur untuk view `v_lampiran`
--
DROP TABLE IF EXISTS `v_lampiran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lampiran` AS select `l`.`id_lampiran` AS `id_lampiran`,`l`.`id_materi` AS `id_materi`,`m`.`judul` AS `judul`,`l`.`nama_lampiran` AS `nama_lampiran`,`l`.`nama_file` AS `nama_file` from (`lampiran` `l` join `materi` `m` on((`l`.`id_materi` = `m`.`id_materi`)));

-- --------------------------------------------------------

--
-- Struktur untuk view `v_materi`
--
DROP TABLE IF EXISTS `v_materi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_materi` AS select `m`.`id_materi` AS `id_materi`,`m`.`id_jadwal` AS `id_jadwal`,`j`.`kode_mapel` AS `kode_mapel`,`j`.`nama_mapel` AS `nama_mapel`,`j`.`kode_kelas` AS `kode_kelas`,`j`.`nama_kelas` AS `nama_kelas`,`m`.`judul` AS `judul`,`m`.`isi` AS `isi`,`m`.`nip` AS `nip`,`g`.`nama` AS `nama`,`m`.`tgl_posting` AS `tgl_posting`,`m`.`publish` AS `publish` from ((`materi` `m` left join `guru` `g` on((`m`.`nip` = `g`.`nip`))) left join `v_jadwal` `j` on((`m`.`id_jadwal` = `j`.`id_jadwal`)));

-- --------------------------------------------------------

--
-- Struktur untuk view `v_nilai_ujian`
--
DROP TABLE IF EXISTS `v_nilai_ujian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_nilai_ujian` AS select `n`.`id_nilai` AS `id_nilai`,`n`.`nis` AS `nis`,`n`.`jumlah_benar` AS `jumlah_benar`,`n`.`jumlah_salah` AS `jumlah_salah`,`n`.`tgl_ujian` AS `tgl_ujian`,`n`.`id_materi` AS `id_materi`,`n`.`nilai` AS `nilai`,`s`.`nama` AS `nama`,`m`.`judul` AS `judul` from ((`nilai_ujian` `n` join `siswa` `s` on((`n`.`nis` = `s`.`nis`))) left join `materi` `m` on((`n`.`id_materi` = `m`.`id_materi`)));

-- --------------------------------------------------------

--
-- Struktur untuk view `v_siswa`
--
DROP TABLE IF EXISTS `v_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_siswa` AS select `si`.`nis` AS `nis`,`si`.`nama` AS `nama`,`si`.`alamat` AS `alamat`,`si`.`tempat_lahir` AS `tempat_lahir`,`si`.`tgl_lahir` AS `tgl_lahir`,`si`.`jenis_kelamin` AS `jenis_kelamin`,`si`.`agama` AS `agama`,`si`.`thn_masuk` AS `thn_masuk`,`si`.`email` AS `email`,`si`.`no_telp` AS `no_telp`,`si`.`foto` AS `foto`,`si`.`username` AS `username`,`si`.`password` AS `password`,`si`.`level` AS `level`,`si`.`kelas` AS `kelas`,`ke`.`nama_kelas` AS `nama_kelas`,`si`.`jurusan` AS `jurusan`,`ju`.`nama_jurusan` AS `nama_jurusan`,`si`.`status` AS `status` from ((`siswa` `si` join `kelas` `ke` on((`si`.`kelas` = `ke`.`kode_kelas`))) join `jurusan` `ju` on((`si`.`jurusan` = `ju`.`kode_jurusan`)));

-- --------------------------------------------------------

--
-- Struktur untuk view `v_soal`
--
DROP TABLE IF EXISTS `v_soal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_soal` AS select `so`.`id_soal` AS `id_soal`,`so`.`pertanyaan` AS `pertanyaan`,`so`.`opsi_a` AS `opsi_a`,`so`.`opsi_b` AS `opsi_b`,`so`.`opsi_c` AS `opsi_c`,`so`.`opsi_d` AS `opsi_d`,`so`.`jawaban` AS `jawaban`,`so`.`id_materi` AS `id_materi`,`j`.`kode_mapel` AS `kode_mapel`,`j`.`nama_mapel` AS `nama_mapel`,`so`.`nip` AS `nip`,`g`.`nama` AS `nama`,`so`.`tgl_posting` AS `tgl_posting`,`so`.`durasi` AS `durasi` from ((`soal` `so` left join `v_materi` `j` on((`so`.`id_materi` = `j`.`id_materi`))) left join `guru` `g` on((`so`.`nip` = `g`.`nip`)));

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
 ADD PRIMARY KEY (`id_jadwal`), ADD KEY `kode_mapel` (`kode_mapel`), ADD KEY `nip` (`nip`), ADD KEY `kode_kelas` (`kode_kelas`), ADD KEY `kode_jurusan` (`kode_jurusan`);

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
 ADD PRIMARY KEY (`id_komentar`), ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
 ADD PRIMARY KEY (`id_lampiran`), ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
 ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
 ADD PRIMARY KEY (`id_materi`), ADD KEY `id_jadwal` (`id_jadwal`), ADD KEY `nip` (`nip`);

--
-- Indexes for table `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
 ADD PRIMARY KEY (`id_nilai`), ADD KEY `nis` (`nis`), ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`nis`), ADD KEY `kelas` (`kelas`), ADD KEY `jurusan` (`jurusan`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
 ADD PRIMARY KEY (`id_soal`), ADD KEY `nip` (`nip`), ADD KEY `id_materi` (`id_materi`);

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
MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`) ON UPDATE CASCADE,
ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON UPDATE CASCADE,
ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON UPDATE CASCADE,
ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lampiran`
--
ALTER TABLE `lampiran`
ADD CONSTRAINT `lampiran_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON UPDATE CASCADE,
ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
ADD CONSTRAINT `nilai_ujian_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_ujian_ibfk_3` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`kode_jurusan`) ON UPDATE CASCADE,
ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`kode_kelas`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `soal`
--
ALTER TABLE `soal`
ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON UPDATE CASCADE,
ADD CONSTRAINT `soal_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
