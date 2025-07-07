-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2025 pada 10.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(9) NOT NULL,
  `customer_name` varchar(55) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Yusuf Firdaus', '00112', 'Jakarta', '2024-11-14 08:16:16', '2024-11-14 08:16:16'),
(3, 'Firdaus Yusuf', '00556565', 'Kajarta', '2024-11-15 04:19:54', '2024-11-15 04:19:54'),
(4, 'Yusuf Muhammad Firdaus', '08212121', 'Jl. Dijalanan', '2024-12-03 02:36:39', '2024-12-03 02:36:39'),
(5, 'Yusuf Yusuf Aja', '0814022', 'Jl. Jalanan Aspal', '2024-12-03 06:11:54', '2024-12-03 06:11:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `nama_level`, `created_at`, `updated_at`) VALUES
(5, 'Administrator', '2024-11-15 02:02:02', '2024-11-15 02:02:02'),
(6, 'Operator', '2024-11-15 02:02:02', '2024-11-15 02:02:02'),
(7, 'Pimpinan', '2024-11-15 02:07:33', '2024-12-03 07:32:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `nama_paket`, `harga`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Hanya Gosok', 5000, 'Extra pewangi', '2024-11-15 06:41:16', '2024-12-02 04:25:07'),
(2, 'Cuci dan Gosok', 5000, 'Sudah termasuk cuci dan gosok serta extra pewangi', '2024-11-15 06:42:47', '2024-12-02 04:28:26'),
(3, 'Laundry Besar', 7000, 'Selimut, karpet, mantel dan sprei', '2024-11-15 06:43:25', '2024-12-02 04:27:57'),
(4, 'Hanya Cuci', 4500, 'Hanya cuci saja tidak termasuk gosok', '2024-12-02 04:24:05', '2024-12-02 04:24:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_laundry_pickup`
--

CREATE TABLE `trans_laundry_pickup` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `pickup_date` date NOT NULL,
  `pickup_pay` double(10,2) NOT NULL,
  `pickup_change` double(10,2) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_laundry_pickup`
--

INSERT INTO `trans_laundry_pickup` (`id`, `id_customer`, `id_order`, `pickup_date`, `pickup_pay`, `pickup_change`, `note`, `created_at`, `updated_at`) VALUES
(2, 3, 4, '2024-11-21', 20000.00, 10.00, '', '2024-11-21 06:04:32', '2024-11-21 06:04:32'),
(3, 1, 3, '2024-11-29', 10000.00, 6000.00, '', '2024-11-29 03:56:35', '2024-11-29 03:56:35'),
(4, 0, 0, '0000-00-00', 0.00, 0.00, '', '2024-12-03 02:47:30', '2024-12-03 02:47:30'),
(5, 0, 0, '0000-00-00', 2024.00, 0.00, '', '2024-12-03 04:18:03', '2024-12-03 04:18:03'),
(6, 0, 0, '0000-00-00', 2024.00, 10000.00, '', '2024-12-03 05:08:44', '2024-12-03 05:08:44'),
(7, 0, 0, '0000-00-00', 2024.00, 10000.00, '', '2024-12-03 05:11:48', '2024-12-03 05:11:48'),
(8, 0, 0, '0000-00-00', 2024.00, 10000.00, '', '2024-12-03 05:13:03', '2024-12-03 05:13:03'),
(9, 0, 19, '0000-00-00', 2024.00, 40000.00, '', '2024-12-03 05:15:19', '2024-12-03 05:15:19'),
(10, 0, 19, '0000-00-00', 2024.00, 40000.00, '', '2024-12-03 05:15:58', '2024-12-03 05:15:58'),
(11, 0, 19, '0000-00-00', 2024.00, 40000.00, '', '2024-12-03 05:17:57', '2024-12-03 05:17:57'),
(12, 4, 19, '0000-00-00', 2024.00, 40000.00, '', '2024-12-03 05:19:05', '2024-12-03 05:19:05'),
(13, 4, 19, '0000-00-00', 2024.00, 40000.00, '', '2024-12-03 05:19:17', '2024-12-03 05:19:17'),
(14, 3, 21, '0000-00-00', 2024.00, 27500.00, '', '2024-12-03 06:13:04', '2024-12-03 06:13:04'),
(15, 5, 20, '0000-00-00', 2024.00, 2000.00, '', '2024-12-03 06:40:48', '2024-12-03 06:40:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order`
--

CREATE TABLE `trans_order` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `no_transaksi` varchar(50) NOT NULL,
  `tanggal_laundry` datetime NOT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_order`
--

INSERT INTO `trans_order` (`id`, `id_customer`, `no_transaksi`, `tanggal_laundry`, `tanggal_selesai`, `status`, `created_at`, `updated_at`) VALUES
(19, 4, '#LAUND/031224/001', '2024-12-03 00:00:00', '2024-12-07 00:00:00', 1, '2024-12-03 04:46:15', '2024-12-03 05:19:17'),
(20, 5, '#LAUND/031224/0020', '2024-12-03 00:00:00', '2024-12-07 00:00:00', 1, '2024-12-03 06:12:24', '2024-12-03 06:40:48'),
(21, 3, '#LAUND/031224/0021', '2024-12-03 00:00:00', '2024-12-08 00:00:00', 1, '2024-12-03 06:12:49', '2024-12-03 06:13:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order_detail`
--

CREATE TABLE `trans_order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_order_detail`
--

INSERT INTO `trans_order_detail` (`id`, `id_order`, `id_paket`, `qty`, `subtotal`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 4000, '', '2024-11-20 02:43:30', '2024-11-20 02:43:30'),
(2, 1, 0, 0, 0, '', '2024-11-20 02:43:30', '2024-11-20 02:43:30'),
(3, 2, 1, 2, 8000, '', '2024-11-20 02:44:34', '2024-11-20 02:44:34'),
(4, 2, 0, 0, 0, '', '2024-11-20 02:44:34', '2024-11-20 02:44:34'),
(5, 3, 1, 1, 4000, '', '2024-11-20 03:15:43', '2024-11-20 03:15:43'),
(6, 4, 1, 1, 4000, '', '2024-11-20 03:16:00', '2024-11-20 03:16:00'),
(7, 4, 2, 1, 6000, '', '2024-11-20 03:16:00', '2024-11-20 03:16:00'),
(8, 5, 3, 1, 7000, '', '2024-11-29 04:24:55', '2024-11-29 04:24:55'),
(9, 5, 2, 1, 6000, '', '2024-11-29 04:24:55', '2024-11-29 04:24:55'),
(10, 6, 1, 1, 4000, '', '2024-11-29 07:01:14', '2024-11-29 07:01:14'),
(11, 6, 3, 2, 14000, '', '2024-11-29 07:01:14', '2024-11-29 07:01:14'),
(12, 7, 0, 0, 0, '', '2024-12-02 07:42:14', '2024-12-02 07:42:14'),
(13, 8, 0, 0, 0, '', '2024-12-02 07:44:36', '2024-12-02 07:44:36'),
(14, 9, 0, 0, 0, '', '2024-12-02 07:45:47', '2024-12-02 07:45:47'),
(15, 10, 4, 0, 0, '', '2024-12-02 07:46:34', '2024-12-02 07:46:34'),
(16, 11, 1, 3, 0, '', '2024-12-02 07:53:22', '2024-12-02 07:53:22'),
(17, 12, 2, 3, 15000, '', '2024-12-02 07:56:20', '2024-12-02 07:56:20'),
(18, 13, 1, 3, 15000, '', '2024-12-02 08:58:57', '2024-12-02 08:58:57'),
(19, 14, 1, 1, 5000, '', '2024-12-03 00:51:04', '2024-12-03 00:51:04'),
(20, 15, 2, 5, 25000, '', '2024-12-03 02:37:47', '2024-12-03 02:37:47'),
(21, 16, 3, 5, 35000, '', '2024-12-03 03:04:35', '2024-12-03 03:04:35'),
(22, 17, 1, 2, 10000, '', '2024-12-03 04:20:19', '2024-12-03 04:20:19'),
(23, 18, 3, 2, 14000, '', '2024-12-03 04:20:57', '2024-12-03 04:20:57'),
(24, 19, 2, 2, 10000, '', '2024-12-03 04:46:15', '2024-12-03 04:46:15'),
(25, 20, 3, 4, 28000, '', '2024-12-03 06:12:24', '2024-12-03 06:12:24'),
(26, 21, 4, 5, 22500, '', '2024-12-03 06:12:49', '2024-12-03 06:12:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_level`, `nama`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(13, 5, 'Admin', 'admin@gmail.com', 'admin', '123', '2024-11-15 02:02:20', '2025-06-25 06:32:15'),
(14, 6, 'Pengguna Operator', 'operator@gmail.com', 'operator', '123', '2024-12-03 07:30:14', '2025-06-25 06:32:54'),
(15, 7, 'Pengguna Pimpinan', 'pimpinan@gmail.com', 'pimpinan', '123', '2024-12-03 07:42:14', '2025-06-25 06:32:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trans_laundry_pickup`
--
ALTER TABLE `trans_laundry_pickup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ibfk_1` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `trans_laundry_pickup`
--
ALTER TABLE `trans_laundry_pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
