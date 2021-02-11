-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2021 at 02:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer_solution`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Gejala'),
(4, 'Kerusakan'),
(5, 'Aturan'),
(6, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aturan`
--

CREATE TABLE `tbl_aturan` (
  `id` int(11) NOT NULL,
  `id_kerusakan` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `probabilitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aturan`
--

INSERT INTO `tbl_aturan` (`id`, `id_kerusakan`, `id_gejala`, `probabilitas`) VALUES
(2, 4, 10, 0.2),
(3, 5, 9, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` char(3) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`) VALUES
(7, 'G07', 'Cahaya pada layar laptop redup gelap,tetapi masih menampilkan unch'),
(8, 'G08', 'Layar kadang hidup-mati dalam menampilkan gambar'),
(9, 'G09', 'Terdapat garis-garis pada LCD laptop'),
(10, 'G10', 'Terdapat dot pixel pada laptop'),
(11, 'G11', 'Terdapat goresan/tidak dapat menampilkan sebagian gambar dari dalam LCD'),
(12, 'G12', 'Ada bagian/semua tombol keyboard yang tidak berfungsi'),
(13, 'G13', 'Ketika dinyalakan terdapat bunyi beep yang panjang dan terus menerus pada laptop'),
(28, 'G14', 'asdasda'),
(29, 'G15', 'indra'),
(30, 'G16', 'asdasd'),
(31, 'G17', 'asdasda'),
(32, 'G18', 'aku sayang kamu ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_diagnosa`
--

CREATE TABLE `tbl_hasil_diagnosa` (
  `id_hasil` int(11) NOT NULL,
  `hasil_probabilitas` float NOT NULL,
  `nama_kerusakan` varchar(100) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `solusi` text NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hasil_diagnosa`
--

INSERT INTO `tbl_hasil_diagnosa` (`id_hasil`, `hasil_probabilitas`, `nama_kerusakan`, `nama_user`, `solusi`, `waktu`) VALUES
(5, 100, 'Rusak pada IC Power', 'Member', 'Ganti dengan IC yang baruProses penggantian ini membutuhkan keahlian khusus,tidak disarankan untuk mengganti/memperbaikinya sendiri   ', 1576814169),
(6, 80, 'Rusak pada IC Power', 'Herdhani Eko', 'Ganti dengan IC yang baruProses penggantian ini membutuhkan keahlian khusus,tidak disarankan untuk mengganti/memperbaikinya sendiri   ', 1576814575),
(7, 66, 'Rusak pada Keyboard', 'Herdhani Eko', 'Bersihkan keyboard dari kotoran/debu.\r\nJika masih bermasalah,disarankan untuk mengganti dengan yang baru,namun jangan lupa untuk memilih Keyboard yang sejenis', 1577676233),
(8, 66, 'Rusak pada Keyboard', 'Member', 'Bersihkan keyboard dari kotoran/debu.\r\nJika masih bermasalah,disarankan untuk mengganti dengan yang baru,namun jangan lupa untuk memilih Keyboard yang sejenis', 1578761537),
(9, 66, 'Rusak pada Keyboard', 'Member', 'Bersihkan keyboard dari kotoran/debu.\r\nJika masih bermasalah,disarankan untuk mengganti dengan yang baru,namun jangan lupa untuk memilih Keyboard yang sejenis', 1579072194),
(10, 66, 'Rusak pada Keyboard', 'Member', 'Bersihkan keyboard dari kotoran/debu.\r\nJika masih bermasalah,disarankan untuk mengganti dengan yang baru,namun jangan lupa untuk memilih Keyboard yang sejenis', 1579357189),
(11, 66, 'Rusak pada Keyboard', 'Member', 'Bersihkan keyboard dari kotoran/debu.\r\nJika masih bermasalah,disarankan untuk mengganti dengan yang baru,namun jangan lupa untuk memilih Keyboard yang sejenis', 1579361910),
(12, 100, 'Rusak pada IC Vga', 'Member', 'Bongkar chasing komputer atau keluarkan motherboard dari chasing atau laptop Anda. Hati-hati ketika membongkar motherboard jangan sampai perangkatnya rusak;\r\nUntuk laptop lepaskan headsink serta kipas (fun) pendingin yang melindungi chipset VGA;\r\nJangan sampai salah, karena chipset VGA ini mirip dengan processor. Perhatikan lagi contoh gambar chipset VGA diatas;\r\nPanaskan chipset VGA menggunakan alat-alat yang sudah dipersiapkan tadi yaitu hot air gun, hair drayer, atau lilin. Untuk durasi memanaskannya kira-kira 5 menit. Kemudian pasang kembali dan coba apakah sekarang sudah ada perubahan pada layar monitor atau belum? Jika belum lakukan lagi kegiatan pemanasan hingga 10 menit durasinya. Gagal juga? Lakukan lagi hingga langkah pemanasan ini berhasil;\r\nUntuk pemanasan menggunakan hair drayer atur jaraknya kira-kira 5 cm, sedangkan jika menggunakan lilin kira-kira 10 cm. \r\nHati-hati pemanasan dengan lilin jangan sampai membakar perangkat pada motherboard.     ', 1579362117),
(13, 40, 'Rusak pada IC Power', 'Member', 'Ganti dengan IC yang baruProses penggantian ini membutuhkan keahlian khusus,tidak disarankan untuk mengganti/memperbaikinya sendiri   ', 1608116383);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kerusakan`
--

CREATE TABLE `tbl_kerusakan` (
  `id_kerusakan` int(11) NOT NULL,
  `kode_kerusakan` char(3) NOT NULL,
  `nama_kerusakan` varchar(100) NOT NULL,
  `solusi` text NOT NULL,
  `probabilitas` float NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kerusakan`
--

INSERT INTO `tbl_kerusakan` (`id_kerusakan`, `kode_kerusakan`, `nama_kerusakan`, `solusi`, `probabilitas`, `gambar`) VALUES
(4, 'K04', 'Rusak pada LCD', 'Cek konekektor atau socket yang berhubungan dengan monitor,jika masih bermasalah,disarankan untuk mengganti dengan yang baru,namun jangan lupa untuk memilih LCD yang sejenis        ', 0.3, 'lcd6.jpg'),
(5, 'K05', 'Rusak pada Keyboard', 'Bersihkan keyboard dari kotoran/debu.\r\nJika masih bermasalah,disarankan untuk mengganti dengan yang baru,namun jangan lupa untuk memilih Keyboard yang sejenis', 0.2, 'keyboard5.jpg'),
(25, 'K06', 'aku sayang kamu ', 'sadasd', 0.2, 'Kerusakan_aku_sayang_kamu_.jpg'),
(26, 'K07', 'indra', 'asdasd', 0.2, 'Kerusakan_indra.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `image` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `image`, `password`, `role_id`, `date_created`) VALUES
(1, 'indra', 'indra', 'default.jpg', '$2y$10$pIhFtcJLraDbyqjlpAra/uKNOWBPKNd4t6JyVa9Ds.xZVzE.wmBlC', 1, 1608119543),
(6, 'Alfonso Aryando S', 'alfonso', 'face-1.jpg', '$2y$10$RvVYgo42792Sni6uvIKSieQ79XnIC72pIfdGZWYRigpRON.tGjcRC', 1, 1573977778),
(7, 'Member', 'Member', 'default.jpg', '$2y$10$gam52naGqUaHYPkQ49WDn.NtUmAUqZ5jdoMwKGAkw8DW8daCdLmoW', 2, 1575266061),
(10, 'Herdhani Eko', 'herdhani', 'default.jpg', '$2y$10$9ZOtFTPipOtsZDWatw4RvuqbTtWIHo/ZSotuGaAsfL4MDkz4u/8cm', 2, 1576725354);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_final`
--

CREATE TABLE `tmp_final` (
  `id` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `id_kerusakan` int(11) NOT NULL,
  `probabilitas` float NOT NULL,
  `hasil_probabilitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_final`
--

INSERT INTO `tmp_final` (`id`, `id_gejala`, `id_kerusakan`, `probabilitas`, `hasil_probabilitas`) VALUES
(1, 1, 1, 1, 0.400802),
(2, 1, 2, 0.5, 0.200401),
(3, 1, 3, 1, 0.200401),
(4, 1, 4, 0.33, 0.198397),
(5, 1, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `id_user` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`id_user`, `id_gejala`) VALUES
(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(8, 1, 3),
(9, 1, 4),
(10, 1, 5),
(11, 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_gejala` (`id_gejala`),
  ADD KEY `id_kerusakan` (`id_kerusakan`);

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  ADD PRIMARY KEY (`id_kerusakan`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tmp_final`
--
ALTER TABLE `tmp_final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  MODIFY `id_kerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tmp_final`
--
ALTER TABLE `tmp_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  ADD CONSTRAINT `tbl_aturan_ibfk_1` FOREIGN KEY (`id_kerusakan`) REFERENCES `tbl_kerusakan` (`id_kerusakan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
