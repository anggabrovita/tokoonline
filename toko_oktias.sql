-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Okt 2019 pada 03.29
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_oktias`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) COLLATE utf8_bin NOT NULL,
  `email` varchar(128) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  `tanggal_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `tanggal_daftar`) VALUES
(6, 'Oktias Brasserie', 'oktias@example.com', '$2y$10$bukj6K8mCwxdgZy5Dl6kbefjfDDOvHnw3C2b4H9fvVv8zISIRZoe2', 1553403730),
(7, 'Angga Brovita', 'turunbrooo@gmail.com', '$2y$10$0bd38.vT5EMTfk03vjoWjutzYlkXYZhG5MigeHq/nFGjh/wCBPyge', 1553575025);

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_transaksi` varchar(128) COLLATE utf8_bin NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `alamat` text COLLATE utf8_bin NOT NULL,
  `telepon` varchar(30) COLLATE utf8_bin NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `status` varchar(30) COLLATE utf8_bin NOT NULL,
  `rekening_pembayaran` varchar(255) COLLATE utf8_bin NOT NULL,
  `rekening_pelanggan` varchar(255) COLLATE utf8_bin NOT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_pembelian`, `id_user`, `id_transaksi`, `nama`, `email`, `alamat`, `telepon`, `tanggal_transaksi`, `status`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `nama_bank`) VALUES
(1, 1, '25102019VC0P9ZEH', 'RINDU', 'rindu@example.com', 'Jl. in aja dulu, siapa tau jodoh', '08960001110', '2019-10-25', 'Konfirmasi', '1231', 'andoyo', 'art-artsy-close-up-414860.jpg', 5, 'BANK BCA'),
(2, 1, '15102019UQBOSXVW', 'RINDU', 'rindu@example.com', 'Jl. in aja dulu, siapa tau jodoh', '08960001110', '2019-10-15', 'Konfirmasi', '1234567890', 'Markoto', 'bg48.jpg', 2, 'BANK BCA'),
(3, 1, '15102019DWVRGKJI', 'RINDU', 'rindu@example.com', 'Jl. in aja dulu, siapa tau jodoh', '08960001110', '2019-10-15', 'Belum Konfirmasi', '', '', '', 0, ''),
(4, 3, '17102019DNP75VCF', 'Alexa Indriana', 'alexa@example.com', 'Jl. in aja dulu', '012831832', '2019-10-17', 'Belum Konfirmasi', '', '', '', 0, ''),
(5, 1, '20102019DVJEG3PL', 'RINDU', 'rindu@example.com', 'Jl. in aja dulu, siapa tau jodoh', '08960001110', '2019-10-20', 'Belum Konfirmasi', '', '', '', 0, ''),
(6, 1, '20102019BRUXEPGL', 'RINDU', 'rindu@example.com', 'Jl. in aja dulu, siapa tau jodoh', '08960001110', '2019-10-20', 'Belum Konfirmasi', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) COLLATE utf8_bin NOT NULL,
  `url` varchar(128) COLLATE utf8_bin NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `url`, `urutan`) VALUES
(4, 'Cake', 'cake', 1),
(5, 'Birthday Cake', 'birthday-cake', 2),
(6, 'Bread', 'bread', 3),
(7, 'Wedding', 'wedding', 4),
(8, 'Coklat', 'coklat', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `author` varchar(128) COLLATE utf8_bin NOT NULL,
  `keyword` varchar(128) COLLATE utf8_bin NOT NULL,
  `deskripsi` varchar(128) COLLATE utf8_bin NOT NULL,
  `icon` varchar(256) COLLATE utf8_bin NOT NULL,
  `logo` varchar(256) COLLATE utf8_bin NOT NULL,
  `banner` varchar(256) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `telepon` varchar(30) COLLATE utf8_bin NOT NULL,
  `facebook` varchar(50) COLLATE utf8_bin NOT NULL,
  `instagram` varchar(50) COLLATE utf8_bin NOT NULL,
  `alamat` text COLLATE utf8_bin NOT NULL,
  `tanggal_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `author`, `keyword`, `deskripsi`, `icon`, `logo`, `banner`, `email`, `telepon`, `facebook`, `instagram`, `alamat`, `tanggal_post`) VALUES
(2, 'Rindu', 'Toko Online Kue Joss', 'CI, Website, PHP, Toko Online, Kue, Bakery, PHP', 'Logo.png', 'Logo1.png', 'banner-111.jpg', 'rindu@example.com', '0896-1200-0111', 'http://facebook/rindu.com', 'http://instagram/rindu.com', 'Jl. Raya Bogor KM 43 7-8, Cibinong', '2019-10-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(128) COLLATE utf8_bin NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8_bin NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `ukuran` varchar(256) COLLATE utf8_bin NOT NULL,
  `berat` varchar(255) COLLATE utf8_bin NOT NULL,
  `gambar` varchar(255) COLLATE utf8_bin NOT NULL,
  `deskripsi` text COLLATE utf8_bin NOT NULL,
  `tanggal_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `kode_produk`, `nama_produk`, `harga`, `stok`, `ukuran`, `berat`, `gambar`, `deskripsi`, `tanggal_post`) VALUES
(3, 8, 'KP001', 'Coklat', 190000, 12, '25x20', '210gram', 'gambar1563363967.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			consequat. Duis aute irure dolor in', '0000-00-00'),
(4, 5, 'KP002', 'Tiramisu', 210000, 9, '30x30', '1700gr', 'gambar1557230568.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n      . Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '0000-00-00'),
(5, 7, 'KP003', 'Kue Ulang Tahun', 210000, 12, '25x20', '1700gr', 'gambar1557230748.jpg', 'Ini Kue Ulang Tahun', '0000-00-00'),
(6, 7, 'KP004', 'Micky Mouse', 210000, 12, '30x30', '2100gr', 'gambar1557230661.jpg', 'Ini Kue Ulang Tahun', '0000-00-00'),
(7, 5, 'KP005', 'Shark Cake', 120000, 12, '20x20', '1300gr', 'gambar1557230406.jpg', 'Ini Kue Ulang Tahun', '0000-00-00'),
(8, 8, 'KP006', 'Stelete Cake', 130000, 12, '20x20', '1300gr', 'gambar15572306191.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n   ', '0000-00-00'),
(11, 8, 'KP007', 'Coklat manis manis nyoy', 160000, 100, '30x30', '1700gr', '1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '0000-00-00'),
(12, 6, 'KP008', 'Roti', 190000, 100000, '30x40', '1300gr', 'c21.jpg', 'kue', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(128) COLLATE utf8_bin NOT NULL,
  `nomor_rekening` varchar(128) COLLATE utf8_bin NOT NULL,
  `nama_pemilik` varchar(128) COLLATE utf8_bin NOT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `tanggal_post`) VALUES
(1, 'BANK BCA', '9218219211', 'Marwan Kiting', '2019-10-27 10:03:12'),
(2, 'Bank BRI', '9219192451', 'Ade Sumarwan', '2019-10-27 10:02:19'),
(5, 'BANK BRI cabang depok', '222489498498', 'Maryoto Surya', '2019-09-29 06:45:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(128) COLLATE utf8_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`) VALUES
('15102019DWVRGKJI', 1, 8, 130000, 1, 130000, '2019-10-15 00:00:00'),
('15102019UQBOSXVW', 1, 3, 190000, 1, 190000, '2019-10-15 00:00:00'),
('17102019DNP75VCF', 3, 5, 210000, 1, 210000, '2019-10-17 00:00:00'),
('20102019BRUXEPGL', 1, 8, 130000, 1, 130000, '2019-10-20 00:00:00'),
('20102019DVJEG3PL', 1, 8, 130000, 1, 130000, '2019-10-20 00:00:00'),
('25102019VC0P9ZEH', 1, 7, 120000, 1, 120000, '2019-10-25 17:08:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) COLLATE utf8_bin NOT NULL,
  `email` varchar(128) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  `alamat` text COLLATE utf8_bin NOT NULL,
  `telepon` varchar(30) COLLATE utf8_bin NOT NULL,
  `gambar` varchar(128) COLLATE utf8_bin NOT NULL,
  `tanggal_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `alamat`, `telepon`, `gambar`, `tanggal_daftar`) VALUES
(1, 'RINDU', 'rindu@example.com', '$2y$10$0U0N7AXDrVtF1BJZBaBFae4o/AC3caMFb2U/B4VGHOuKSGffaVuZi', 'Jl. in aja dulu, siapa tau jodoh', '08960001110', '', 1563020198),
(2, 'Yohan Triwasiwa', 'yohan@example.com', '$2y$10$vJ20WzZOXYB.m0yRoFrI3OoFIFuBWYuSc34Na30dgtYyOfrfQvA0C', 'Jl. nya sama aku, nikahnya sama dia', '08979900', '', 1563020311),
(3, 'Alexa Indriana', 'alexa@example.com', '$2y$10$CYQmAr4IgxTYr99JRX7YauF48yERpvstWJ5yyU0MUD3yPoApPHa22', 'Jl. in aja dulu', '012831832', '', 1563679828),
(4, 'Lea Alexandra', 'lea@example.com', '$2y$10$wqW5ivukl9ee2yo2vyeg8O4RuYu5XgsQgQuSswqY3NJgTjLlzwJPu', 'Jl. ini mengingatkan tentang dia', '0129999212', '', 1564731723);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
