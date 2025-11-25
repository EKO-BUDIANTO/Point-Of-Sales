-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Jan 2023 pada 01.47
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1APOS`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `harga_beli` decimal(18,2) NOT NULL,
  `jml_beli` int(11) NOT NULL,
  `harga_jual` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `stok`, `tgl_beli`, `harga_beli`, `jml_beli`, `harga_jual`) VALUES
('B0001', 'Bussines File A4', 'K0001', 105, '2017-07-10', '10000.00', 10, '17000.00'),
('B0002', 'Business File FC', 'K0001', 100, '0000-00-00', '10000.00', 0, '14000.00'),

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(5) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat`, `no_telepon`) VALUES
('C0001', 'CV. TITIEK BARAT', 'Jalan Ciputat Raya RT 01 / RW 01 No.24', '021123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_penjualan` varchar(12) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_penjualan`, `id_barang`, `jumlah`) VALUES
('201706130001', 'B0001', 5),
('201706140001', 'B0001', 5),
('201706140002', 'B0001', 50),
('201706150001', 'B0001', 1),
('201706150002', 'B0001', 1),
('201707030001', 'B0004', 2),
('201707030001', 'B0003', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('K0001', 'Business File'),
('K0002', 'Spring File'),
('K0004', 'Report File'),


-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(12) NOT NULL,
  `id_customer` varchar(5) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `bayar` decimal(18,2) NOT NULL,
  `kembali` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_customer`, `tanggal_jual`, `bayar`, `kembali`) VALUES
('201706130001', 'C0001', '2017-06-13', '80000.00', '5000.00'),
('201706140001', 'C0001', '2017-06-14', '80000.00', '5000.00'),
('201706140002', 'C0001', '2017-06-14', '1000000.00', '250000.00'),
('201706150001', 'C0001', '2017-06-15', '20000.00', '5000.00'),
('201706150002', 'C0001', '2017-06-15', '20000.00', '4000.00'),
('201707030001', 'C0001', '2017-07-03', '60000.00', '4000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `kota`, `no_telepon`) VALUES
('S0001', 'PT. Mekar Jaya Abadi', 'Kompleks Senen Blok A, Kramat Senen', 'Jakarta Pusat', '021234567'),
('S0002', 'PT. Abadi Selalu', 'Jalan Merdeka Raya ', 'Jakarta Pusat', '021345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` varchar(15) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `nama_user`, `password`) VALUES
('admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
