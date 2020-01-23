-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 10:09 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail_pesanan` int(11) NOT NULL,
  `id_pesanan` char(11) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status_detail_pesanan` varchar(30) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail_pesanan`, `id_pesanan`, `id_masakan`, `jumlah`, `keterangan`, `status_detail_pesanan`, `total_harga`) VALUES
(531, 'IDP73315', 154, 2, '', 'memilih menu', 20000),
(532, 'IDP98593', 123, 2, '', 'memilih menu', 8000),
(533, 'IDP92138', 156, 1, '', 'memilih menu', 10000),
(534, 'IDP46630', 125, 1, '', 'memilih menu', 4000),
(535, 'IDP45437', 123, 1, '', 'memilih menu', 4000),
(536, 'IDP72198', 122, 1, '', 'memilih menu', 4000),
(537, 'IDP82461', 126, 1, '', 'memilih menu', 4000),
(538, 'IDP40097', 122, 1, '', 'memilih menu', 4000),
(539, 'IDP92413', 121, 1, '', 'memilih menu', 4000),
(540, 'IDP24096', 123, 1, '', 'memilih menu', 4000),
(541, 'IDP26712', 123, 1, '', 'memilih menu', 4000),
(542, 'IDP13699', 126, 1, '', 'memilih menu', 4000),
(543, 'IDP77148', 123, 1, '', 'memilih menu', 4000),
(544, 'IDP64093', 123, 1, '', 'memilih menu', 4000),
(545, 'IDP64093', 126, 1, '', 'memilih menu', 4000),
(546, 'IDP23373', 156, 1, '', 'memilih menu', 10000),
(547, 'IDP5688', 123, 1, '', 'memilih menu', 4000),
(548, 'IDP3359', 122, 1, '', 'memilih menu', 4000),
(549, 'IDP38272', 122, 1, '', 'memilih menu', 4000),
(550, 'IDP95895', 122, 1, '', 'memilih menu', 4000),
(551, 'IDP6921', 122, 1, '', 'memilih menu', 4000),
(552, 'IDP6921', 125, 1, '', 'memilih menu', 4000),
(553, 'IDP6921', 126, 1, '', 'memilih menu', 4000),
(554, 'IDP6921', 124, 1, '', 'memilih menu', 4000),
(555, 'IDP6921', 126, 1, '', 'memilih menu', 4000),
(556, 'IDP6921', 154, 1, '', 'memilih menu', 10000),
(558, 'IDP6921', 157, 1, '', 'memilih menu', 10000),
(559, 'IDP6921', 159, 1, '', 'memilih menu', 10000),
(560, 'IDP6921', 170, 1, '', 'memilih menu', 14000),
(561, 'IDP6921', 169, 1, '', 'memilih menu', 12000),
(562, 'IDP53988', 122, 1, '', 'memilih menu', 4000),
(563, 'IDP53988', 123, 1, '', 'memilih menu', 4000),
(564, 'IDP53988', 152, 1, '', 'memilih menu', 10000),
(565, 'IDP20349', 126, 1, '', 'memilih menu', 4000),
(566, 'IDP20349', 154, 1, '', 'memilih menu', 10000),
(567, 'IDP20349', 169, 1, '', 'memilih menu', 12000),
(568, 'IDP84844', 123, 1, '', 'memilih menu', 4000),
(569, 'IDP84844', 154, 1, '', 'memilih menu', 10000),
(570, 'IDP84844', 122, 1, '', 'memilih menu', 4000),
(571, 'IDP56436', 123, 1, '', 'memilih menu', 4000),
(572, 'IDP31423', 123, 1, '', 'memilih menu', 4000),
(573, 'IDP31423', 158, 1, '', 'memilih menu', 10000),
(574, 'IDP68222', 121, 2, 'tidak pedas', 'memilih menu', 8000),
(575, 'IDP68222', 153, 1, '', 'memilih menu', 12000),
(576, 'IDP72482', 124, 1, '', 'memilih menu', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(30, 'SAMBAL'),
(31, 'MINUMAN'),
(32, 'MAKANAN');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'waiter'),
(3, 'kasir'),
(4, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jenis` varchar(7) NOT NULL COMMENT 'Drink Minuman, Foods Makanan',
  `harga` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status_masakan` varchar(1) NOT NULL DEFAULT 'N' COMMENT 'N Habis, Y Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `nama_masakan`, `id_kategori`, `jenis`, `harga`, `image`, `status_masakan`) VALUES
(121, 'sambalbajakm', 30, 'Makanan', 4000, 'menu_41714.jpg', 'Y'),
(122, 'sambalbawangbakar', 30, 'Makanan', 4000, 'menu_16707.jpg', 'Y'),
(123, 'sambalbawanggobalgabul', 30, 'Makanan', 4000, 'menu_73531.jpg', 'Y'),
(124, 'sambalbawanggoreng', 30, 'Makanan', 4000, 'menu_80467.jpg', 'Y'),
(125, 'sambalbawanglombokijo', 30, 'Makanan', 4000, 'menu_47502.jpg', 'Y'),
(126, 'sambalbawang', 30, 'Makanan', 4000, 'menu_46163.jpg', 'Y'),
(127, 'sambalbelut', 30, 'Makanan', 8000, 'menu_48570.jpg', 'Y'),
(128, 'sambalcumi', 30, 'Makanan', 10000, 'menu_90708.jpg', 'Y'),
(129, 'sambaldabudabu', 30, 'Makanan', 5000, 'menu_70095.jpg', 'Y'),
(130, 'sambalgobalgabul', 30, 'Makanan', 7000, 'menu_90287.jpg', 'Y'),
(131, 'sambalgorengrempeloati', 30, 'Makanan', 6000, 'menu_14821.jpg', 'Y'),
(132, 'sambaljamur', 30, 'Makanan', 7000, 'menu_42946.jpg', 'Y'),
(133, 'sambaljengkol', 30, 'Makanan', 6000, 'menu_69839.jpg', 'Y'),
(134, 'sambalkecap', 30, 'Makanan', 4000, 'menu_43600.jpg', 'Y'),
(135, 'sambalkorekbrambang', 30, 'Makanan', 4000, 'menu_81648.jpg', 'Y'),
(136, 'samballamongan', 30, 'Makanan', 5000, 'menu_59046.jpg', 'Y'),
(137, 'sambalmanggamuda', 30, 'Makanan', 5000, 'menu_31110.jpg', 'Y'),
(138, 'sambalnanas', 30, 'Makanan', 5000, 'menu_2966.jpg', 'Y'),
(139, 'sambalpete', 30, 'Makanan', 6000, 'menu_8450.jpg', 'Y'),
(140, 'sambalrempelohati', 30, 'Makanan', 4000, 'menu_10894.jpg', 'Y'),
(141, 'sambaltahu', 30, 'Makanan', 4000, 'menu_88270.jpg', 'Y'),
(142, 'sambaltempe', 30, 'Makanan', 4000, 'menu_15258.jpg', 'Y'),
(143, 'sambalterasibrambangtomat', 30, 'Makanan', 4000, 'menu_4581.jpg', 'Y'),
(144, 'sambalterasilombokijo', 30, 'Makanan', 4000, 'menu_20354.jpg', 'Y'),
(145, 'sambaltrasimatang', 30, 'Makanan', 4000, 'menu_25715.jpg', 'Y'),
(146, 'sambalteri', 30, 'Makanan', 7000, 'menu_29419.jpg', 'Y'),
(147, 'sambalterong', 30, 'Makanan', 6000, 'menu_59302.jpg', 'Y'),
(148, 'sambaltomat', 30, 'Makanan', 4000, 'menu_77797.jpg', 'Y'),
(149, 'sambaltrasitomatsegar', 30, 'Makanan', 4000, 'menu_36130.jpg', 'Y'),
(150, 'sambaltubruk', 30, 'Makanan', 4000, 'menu_92340.jpg', 'N'),
(151, 'sambaludangpedas', 30, 'Makanan', 10000, 'menu_49623.jpg', 'Y'),
(152, 'JuiceAlpukat', 31, 'Minuman', 10000, 'menu_88013.jpg', 'Y'),
(153, 'JuiceBuaNaga', 31, 'Minuman', 12000, 'menu_68560.png', 'Y'),
(154, 'JuiceJambuBiji', 31, 'Minuman', 10000, 'menu_71407.jpg', 'Y'),
(155, 'JuiceJeruk', 31, 'Minuman', 10000, 'menu_36453.jpg', 'Y'),
(156, 'JuiceMangga', 31, 'Minuman', 10000, 'menu_86976.jpg', 'Y'),
(157, 'JuiceMelon', 31, 'Minuman', 10000, 'menu_36715.jpg', 'Y'),
(158, 'JuiceNanas', 31, 'Minuman', 10000, 'menu_56211.jpg', 'Y'),
(159, 'JuiceSemangka', 31, 'Minuman', 10000, 'menu_11150.jpg', 'Y'),
(160, 'JuiceSirsak', 31, 'Minuman', 10000, 'menu_34967.jpg', 'Y'),
(161, 'JuiceTomat', 31, 'Minuman', 8000, 'menu_48421.jpg', 'Y'),
(162, 'KopiHitam', 31, 'Minuman', 5000, 'menu_88471.jpg', 'Y'),
(163, 'LemonTea', 31, 'Minuman', 7000, 'menu_59083.jpg', 'Y'),
(164, 'Mineral', 31, 'Minuman', 5000, 'menu_66348.jpg', 'Y'),
(165, 'SopBuah', 31, 'Minuman', 13000, 'menu_50557.jpg', 'Y'),
(166, 'AyamDada', 32, 'Makanan', 13000, 'menu_72436.jpg', 'Y'),
(167, 'AyamPaha', 32, 'Makanan', 13000, 'menu_84486.jpg', 'Y'),
(168, 'BelutGoreng', 32, 'Makanan', 11000, 'menu_40280.jpg', 'Y'),
(169, 'CumiTepung', 32, 'Makanan', 12000, 'menu_19740.jpg', 'Y'),
(170, 'DagingSapi', 32, 'Makanan', 14000, 'menu_28913.jpg', 'Y'),
(171, 'DagingSapi', 32, 'Makanan', 14000, 'menu_10418.jpg', 'Y'),
(172, 'ikanNilaGoreng', 32, 'Makanan', 11000, 'menu_88456.jpg', 'Y'),
(173, 'IkanLeleGoreng', 32, 'Makanan', 9000, 'menu_52732.jpg', 'Y'),
(174, 'IkanTeriBalado', 32, 'Minuman', 9000, 'menu_63184.jpg', 'Y'),
(175, 'Ikan Wader  Goreng', 32, 'Makanan', 9000, 'menu_13424.jpg', 'Y'),
(176, 'Jamur Crispy', 32, 'Makanan', 8000, 'menu_81218.jpg', 'Y'),
(177, 'Kentang Crispy', 32, 'Makanan', 7000, 'menu_19960.jpg', 'Y'),
(178, 'Tempe Crispy', 32, 'Makanan', 6000, 'menu_30133.jpg', 'Y'),
(179, 'Udang Tepung', 32, 'Makanan', 12000, 'menu_96512.jpg', 'Y'),
(180, 'Jamur Tumis', 32, 'Makanan', 8000, 'menu_65466.jpg', 'Y'),
(182, 'Kangkung Tumis', 32, 'Makanan', 8000, 'menu_43487.jpg', 'Y'),
(183, 'Karedok', 32, 'Makanan', 6000, 'menu_14660.jpg', 'Y'),
(184, 'Sayur Asem', 32, 'Makanan', 7000, 'menu_95624.jpg', 'Y'),
(185, 'Tauge Tumis', 32, 'Makanan', 8000, 'menu_76293.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `no_meja` varchar(25) NOT NULL,
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `no_meja`, `status`) VALUES
(32, 'A01', 'kosong'),
(33, 'A02', 'kosong'),
(34, 'A03', 'kosong'),
(35, 'B01', 'kosong'),
(36, 'B02', 'kosong'),
(37, 'B03', 'kosong'),
(38, 'C01', 'kosong'),
(39, 'C02', 'kosong'),
(40, 'C03', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`) VALUES
('IP123229', 'risa'),
('IP159332', 'rani'),
('IP181701', 'mike'),
('IP18798', 'siska'),
('IP201019', 'hadi'),
('IP268524', 'coni'),
('IP271209', 'faras'),
('IP301818', 'mohade'),
('IP35369', 'mike'),
('IP36254', 'finza'),
('IP411651', 'abbas'),
('IP411682', 'justin'),
('IP454223', 'intan'),
('IP49682', 'mohade'),
('IP507629', 'finza'),
('IP581512', 'andi'),
('IP660644', 'rara'),
('IP666839', 'surya'),
('IP705688', 'finza'),
('IP705993', 'eno'),
('IP714813', 'mike'),
('IP728668', 'hura'),
('IP780456', 'heru'),
('IP822692', 'fere'),
('IP884735', 'seno'),
('IP888122', 'tata'),
('IP972869', 'abel');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` char(11) NOT NULL,
  `no_meja` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_pelanggan` char(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `status_pesanan` varchar(30) NOT NULL,
  `total_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `no_meja`, `tanggal`, `id_user`, `id_pelanggan`, `keterangan`, `status_pesanan`, `total_pesanan`) VALUES
('IDP13699', '40', '2019-09-05', 33, 'IP660644', '', 'selesai', 4000),
('IDP20349', '39', '2019-09-12', 33, 'IP884735', '', 'selesai', 26000),
('IDP23373', '35', '2019-09-08', 33, 'IP35369', '', 'selesai', 10000),
('IDP24096', '38', '2019-09-05', 33, 'IP201019', '', 'selesai', 4000),
('IDP26712', '39', '2019-09-05', 33, 'IP581512', '', 'selesai', 4000),
('IDP31423', '35', '2019-09-13', 33, 'IP411651', '', 'selesai', 14000),
('IDP3359', '32', '2019-09-10', 33, 'IP268524', '', 'selesai', 4000),
('IDP38272', '35', '2019-09-11', 33, 'IP411682', '', 'selesai', 4000),
('IDP40097', '36', '2019-09-05', 33, 'IP181701', '', 'selesai', 4000),
('IDP45437', '35', '2019-09-05', 32, 'IP454223', '', 'selesai', 4000),
('IDP46630', '32', '2019-09-05', 32, 'IP271209', '', 'selesai', 4000),
('IDP53988', '33', '2019-09-12', 33, 'IP728668', '', 'selesai', 18000),
('IDP56436', '32', '2019-09-13', 33, 'IP18798', '', 'selesai', 4000),
('IDP5688', '38', '2019-09-08', 33, 'IP301818', '', 'selesai', 4000),
('IDP64093', '32', '2019-09-08', 33, 'IP705993', '', 'selesai', 8000),
('IDP68222', '32', '2019-09-14', 33, 'IP780456', 'tidak pedas', 'selesai', 20000),
('IDP6921', '33', '2019-09-12', 28, 'IP507629', '', 'selesai', 76000),
('IDP72198', '33', '2019-09-05', 33, 'IP888122', '', 'selesai', 4000),
('IDP72482', '32', '2019-09-29', 33, 'IP159332', '', 'selesai', 4000),
('IDP73315', '32', '2019-09-04', 32, 'IP36254', '', 'selesai', 20000),
('IDP77148', '32', '2019-09-08', 33, 'IP123229', '', 'selesai', 4000),
('IDP82461', '34', '2019-09-05', 33, 'IP822692', '', 'selesai', 4000),
('IDP84844', '34', '2019-09-12', 33, 'IP972869', '', 'selesai', 18000),
('IDP92138', '35', '2019-09-05', 33, 'IP49682', '', 'selesai', 10000),
('IDP92413', '37', '2019-09-05', 32, 'IP666839', '', 'selesai', 4000),
('IDP95895', '38', '2019-09-11', 33, 'IP705688', '', 'selesai', 4000),
('IDP98593', '32', '2019-09-05', 32, 'IP714813', '', 'selesai', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `recovery_keys`
--

CREATE TABLE `recovery_keys` (
  `rid` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recovery_keys`
--

INSERT INTO `recovery_keys` (`rid`, `userID`, `token`, `valid`) VALUES
(1, 28, '8a10c79517e3144f90345dfce3275a3b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pesanan` char(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(15) NOT NULL,
  `jumlah_uang` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pesanan`, `tanggal`, `total_bayar`, `jumlah_uang`) VALUES
(308, 32, 'IDP73315', '2019-09-04', 20000, 50000),
(309, 32, 'IDP98593', '2019-09-05', 8000, 10000),
(310, 33, 'IDP92138', '2019-09-05', 10000, 10000),
(311, 32, 'IDP45437', '2019-09-05', 4000, 5000),
(312, 32, 'IDP46630', '2019-09-05', 4000, 10000),
(313, 33, 'IDP13699', '2019-09-05', 4000, 6000),
(314, 33, 'IDP24096', '2019-09-05', 4000, 6000),
(315, 33, 'IDP26712', '2019-09-05', 4000, 6000),
(316, 33, 'IDP40097', '2019-09-05', 4000, 6000),
(317, 33, 'IDP72198', '2019-09-05', 4000, 6000),
(318, 33, 'IDP77148', '2019-09-08', 4000, 6000),
(319, 33, 'IDP82461', '2019-09-05', 4000, 6000),
(320, 32, 'IDP92413', '2019-09-05', 4000, 6000),
(321, 33, 'IDP64093', '2019-09-08', 8000, 10000),
(322, 33, 'IDP23373', '2019-09-08', 10000, 10000),
(323, 33, 'IDP5688', '2019-09-08', 4000, 5000),
(324, 28, 'IDP6921', '2019-09-12', 76000, 100000),
(325, 33, 'IDP20349', '2019-09-12', 26000, 30000),
(326, 33, 'IDP3359', '2019-09-10', 4000, 5000),
(327, 33, 'IDP38272', '2019-09-11', 4000, 5000),
(328, 33, 'IDP53988', '2019-09-12', 18000, 20000),
(329, 33, 'IDP84844', '2019-09-12', 18000, 20000),
(330, 33, 'IDP95895', '2019-09-11', 4000, 5000),
(331, 33, 'IDP31423', '2019-09-13', 14000, 15000),
(332, 33, 'IDP56436', '2019-09-13', 4000, 4000),
(333, 33, 'IDP68222', '2019-09-14', 20000, 20000),
(334, 33, 'IDP72482', '2019-09-29', 4000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'N' COMMENT 'N NonAktif, Y Aktif',
  `gambar_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `email`, `id_level`, `status`, `gambar_user`) VALUES
(25, 'kasir', '827ccb0eea8a706c4c34a16891f84e7b', 'Davi Perdiansyah', 'davi@gmail.com', 3, 'Y', 'user_31635.png'),
(28, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator', 'risapermatasari4@gmai.com', 1, 'Y', 'user_61264.png'),
(29, 'budi', '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator', 'budibuday05@gmail.com', 1, 'Y', 'user_74499.png'),
(30, 'harsa', '827ccb0eea8a706c4c34a16891f84e7b', 'Harsa Aditya', 'harsa@gmail.com', 2, 'Y', 'user_57099.png'),
(31, 'andi', '827ccb0eea8a706c4c34a16891f84e7b', 'andi', 'andi@gmail.com', 4, 'Y', 'user_24082.png'),
(32, 'waiter', '827ccb0eea8a706c4c34a16891f84e7b', 'eno', 'dwi_ts@hira-express.com', 2, 'Y', 'user_34473.ico'),
(33, 'dapur', '827ccb0eea8a706c4c34a16891f84e7b', 'eno', 'haziyoikhsan@gmail.com', 4, 'Y', 'user_41997.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`),
  ADD KEY `id_makanan` (`id_masakan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `recovery_keys`
--
ALTER TABLE `recovery_keys`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_order` (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=577;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `recovery_keys`
--
ALTER TABLE `recovery_keys`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
