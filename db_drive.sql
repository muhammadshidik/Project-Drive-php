-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2025 pada 10.12
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
-- Database: `db_drive`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `level_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', '2025-07-11 01:19:33', '2025-07-11 01:19:42', 0),
(2, 'User', '2025-07-11 01:19:57', '2025-07-11 01:20:06', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `kategori` enum('Makanan','Minuman','','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`, `deskripsi`, `gambar`, `kategori`, `created_at`, `updated_at`) VALUES
(9, 'Kuah Beulangong', 30000, 'Kategori: Kuah / Masakan Tradisional Aceh\r\n\r\nDeskripsi Detail:\r\nKuah Beulangong adalah salah satu masakan khas Aceh yang sering disajikan saat kenduri dan acara adat. Terbuat dari daging sapi atau kambing yang dimasak dalam kuah kental berbumbu rempah Aceh seperti cabai kering, lengkuas, kunyit, dan daun kari.\r\nRasanya pedas, gurih, dan kaya aroma, dengan potongan daging yang empuk dan kuah berwarna merah kecoklatan yang khas.\r\n\r\nPorsi:\r\n1 mangkuk (±3 potong daging dan sayuran)\r\n\r\nBonus:\r\n✔ Irisan pisang muda / nangka (tergantung versi)\r\n✔ Sambal khas Aceh (jika tersedia)\r\n\r\n', '1752197210-beulangong.jpg', 'Makanan', '2025-07-11 01:26:50', '2025-07-11 04:12:34'),
(10, 'Kuah Fajri', 22000, 'Kategori: Kuah / Masakan Aceh\r\n\r\nDeskripsi Detail:\r\nKuah Fajri adalah masakan kuah khas Aceh yang bercita rasa pedas gurih dan beraroma kuat. Terbuat dari campuran rempah pilihan seperti serai, lengkuas, cabai, dan daun kari, dipadukan dengan potongan daging sapi atau ikan, menjadikannya hidangan kuah berwarna merah kecoklatan yang kaya rasa.\r\nSering disantap sebagai pelengkap nasi putih hangat, kuah ini cocok untuk pecinta rasa kuat dan tradisional.\r\n\r\nPorsi:\r\n1 mangkuk (untuk 1 orang)\r\n\r\nBonus:\r\n✔ Sambal ganja (jika tersedia)\r\n✔ Potongan cabai dan jeruk nipis', '1752197324-kuah-fajri.jpg', 'Makanan', '2025-07-11 01:28:44', '2025-07-11 04:09:51'),
(11, 'Ayam Tangkap', 28000, 'Deskripsi Detail:\r\nAyam Tangkap adalah hidangan khas Aceh yang terkenal dengan cita rasa gurih dan aromatik. Terbuat dari potongan ayam yang digoreng kering bersama daun kari, daun pandan, dan cabai hijau, menghasilkan rasa khas dengan tekstur renyah di luar dan lembut di dalam.\r\nWangi daun rempah yang digoreng menjadikan setiap gigitan kaya rasa dan menggugah selera.\r\n\r\nPorsi:\r\n1 porsi (±3–4 potong ayam + daun rempah)\r\n\r\nBonus:\r\n✔ Sambal Aceh / sambal kecap\r\n✔ Daun rempah goreng renyah (pandan, kari, cabai)', '1752197429-ayam-tangkap.webp', 'Makanan', '2025-07-11 01:30:29', '2025-07-11 04:08:43'),
(12, 'Ikan Keumamah', 20000, 'Kategori: Lauk / Masakan Aceh\r\n\r\nDeskripsi Detail:\r\nIkan Keumamah adalah hidangan khas Aceh berbahan dasar ikan tongkol yang telah direbus, dikeringkan, lalu dimasak ulang dengan campuran bumbu rempah khas Aceh seperti cabai, bawang, serai, dan daun jeruk.\r\nTekstur daging ikan yang padat menyerap bumbu dengan sempurna, menghasilkan rasa gurih, pedas, dan wangi rempah yang khas.\r\nCocok sebagai lauk pendamping nasi hangat.\r\n\r\nPorsi:\r\n1 porsi (cukup untuk 1–2 orang)\r\n\r\nBonus:\r\n✔ Sambal ganja / sambal khas Aceh\r\n✔ Daun kari (opsional, jika tersedia)\r\n\r\n', '1752197541-ikan-keumamah.jpg', 'Makanan', '2025-07-11 01:32:21', '2025-07-11 04:11:03'),
(13, 'Nasi Kebuli', 50000, 'Kategori: Nasi / Masakan Timur Tengah\r\n\r\nDeskripsi Detail:\r\nNikmati cita rasa autentik Nasi Kebuli khas Dapur Mama Niar yang dimasak dengan rempah pilihan seperti kapulaga, kayu manis, cengkeh, dan jintan. Disajikan dengan daging kambing empuk yang dimasak bersama nasi, memberikan rasa gurih dan aroma harum yang khas.\r\nTambahan acar segar dan sambal pedas siap menggugah selera. Cocok disantap hangat saat makan siang atau makan malam spesial.\r\n\r\nPorsi:\r\n1 box (cocok untuk 1 orang)\r\n\r\nBonus:\r\n✔ Acar segar\r\n✔ Sambal kebuli khas\r\n✔ Kerupuk (jika tersedia)', '1752206787-kebuli.jpeg', 'Makanan', '2025-07-11 04:06:27', '2025-07-11 04:10:49'),
(14, 'Kari Kambing', 35000, 'Kategori: Kari / Masakan Nusantara\r\n\r\nDeskripsi Detail:\r\nKari Kambing adalah hidangan berkuah santan yang kaya rempah, menggunakan potongan daging kambing pilihan yang dimasak hingga empuk.\r\nPerpaduan bumbu seperti kapulaga, cengkeh, kayu manis, kunyit, dan jintan memberikan aroma harum dan rasa gurih pedas yang khas.\r\nKuahnya kental, berwarna kuning keemasan, cocok disantap dengan nasi putih atau roti cane.\r\n\r\nPorsi:\r\n1 mangkuk (±3 potong kambing dan kuah)\r\n\r\nBonus:\r\n✔ Sambal hijau atau acar bawang\r\n✔ Taburan bawang goreng (jika tersedia)', '1752207381-kari.jpeg', 'Makanan', '2025-07-11 04:16:21', NULL),
(15, 'Dendeng Paru', 25000, 'Kategori: Lauk Kering / Masakan Minang\r\n\r\nDeskripsi Detail:\r\nDendeng Paru adalah hidangan khas Minang yang menggunakan paru sapi yang diiris tipis, direbus, lalu digoreng hingga garing di luar namun tetap empuk di dalam.\r\nParu dimasak dengan baluran sambal merah atau cabai hijau, menghasilkan cita rasa pedas gurih yang menggugah selera.\r\nCocok sebagai lauk pendamping nasi panas, terutama untuk pecinta masakan Padang.\r\n\r\nPorsi:\r\n±3 potong paru + sambal\r\n\r\nBonus:\r\n✔ Sambal lado merah / ijo\r\n✔ Lalapan atau daun singkong (jika tersedia)', '1752207673-Screenshot-2024-03-29-040125-1531516394.webp', 'Makanan', '2025-07-11 04:21:13', NULL),
(16, 'Mie Aceh', 22000, 'Harga: Rp22.000\r\nKategori: Mie / Masakan Khas Aceh\r\n\r\nDeskripsi Detail:\r\nMie Aceh adalah hidangan mie kuning tebal khas Aceh yang dimasak dengan racikan bumbu rempah khas seperti bawang putih, bawang merah, cabai, jintan, dan kari bubuk.\r\nDisajikan dalam tiga pilihan: digoreng kering, tumis (basah), atau kuah, dan dilengkapi dengan irisan daging sapi, ayam, atau seafood seperti udang dan cumi.\r\nRasanya pedas gurih dan sangat beraroma, cocok disantap hangat-hangat.\r\n\r\nPorsi:\r\n1 mangkuk lengkap + pelengkap\r\n\r\nBonus:\r\n✔ Acar timun + emping / kerupuk\r\n✔ Jeruk nipis & bawang goreng', '1752208079-mie.jpg', 'Makanan', '2025-07-11 04:27:59', NULL),
(17, 'Nasi Gurih', 18000, 'Kategori: Nasi / Masakan Tradisional Aceh\r\n\r\nDeskripsi Detail:\r\nNasi Gurih adalah hidangan nasi khas Aceh yang dimasak menggunakan santan, daun pandan, daun salam, dan sedikit garam, sehingga menghasilkan aroma harum dan rasa gurih yang khas.\r\nBiasanya disajikan sebagai menu sarapan atau pelengkap aneka lauk seperti telur balado, sambal, mie, dan serundeng.\r\nTekstur nasi yang pulen dan rasa santan yang ringan membuatnya cocok untuk semua kalangan.\r\n\r\nPorsi:\r\n1 piring nasi (±250 gram)\r\n\r\nBonus:\r\n✔ Taburan bawang goreng\r\n✔ Sambal dan mie Aceh (jika tersedia)\r\n✔ Telur rebus setengah potong (opsional)\r\n\r\n', '1752208285-nasi.jpeg', 'Makanan', '2025-07-11 04:31:25', '2025-07-11 04:31:39'),
(18, 'Nasi Liwet', 22000, 'Kategori: Nasi / Masakan Nusantara\r\n\r\nDeskripsi Detail:\r\nNasi Liwet adalah sajian khas Solo yang dimasak menggunakan santan, daun salam, dan serai sehingga menghasilkan nasi yang pulen, gurih, dan harum.\r\nBiasanya disajikan lengkap dengan suwiran ayam kampung, telur pindang, sambal goreng labu siam, dan areh (saus santan kental) yang kaya rasa.\r\nCocok disantap hangat untuk sarapan atau makan siang.\r\n\r\nPorsi:\r\n1 paket lengkap nasi + lauk\r\n\r\nIsi Paket:\r\n✔ Nasi liwet gurih\r\n✔ Ayam suwir santan\r\n✔ Telur pindang / rebus\r\n✔ Sambal goreng labu / tempe\r\n✔ Areh santan + lalapan\r\n\r\n', '1752208622-liwet.jpg', 'Makanan', '2025-07-11 04:33:09', '2025-07-11 04:37:02'),
(19, 'Nasi Kuning', 22000, 'Kategori: Nasi / Masakan Tradisional\r\n\r\nDeskripsi Detail:\r\nNasi Kuning adalah hidangan khas Indonesia yang dibuat dari beras yang dimasak dengan santan, kunyit, dan daun salam, menghasilkan warna kuning cerah dan aroma harum yang menggugah selera.\r\nCita rasanya gurih dan lembut, sering disajikan untuk acara spesial seperti ulang tahun, syukuran, atau sarapan istimewa.\r\n\r\nPorsi:\r\n1 paket lengkap nasi + lauk\r\n\r\nIsi Paket:\r\n✔ Nasi kuning wangi santan\r\n✔ Telur balado atau telur dadar iris\r\n✔ Ayam suwir / ayam goreng\r\n✔ Sambal goreng kentang atau bihun\r\n✔ Serundeng dan kerupuk', '1752208468-nasi k.jpeg', 'Makanan', '2025-07-11 04:33:48', '2025-07-11 04:34:28'),
(20, 'Pulot', 3000, 'Kategori: Kue Tradisional / Jajanan Pasar\r\n\r\nDeskripsi Detail:\r\nTimphan adalah kue tradisional khas Aceh yang terbuat dari adonan tepung ketan dan pisang, bertekstur lembut dan kenyal.\r\nBagian dalamnya diisi dengan srikaya atau kelapa parut manis, lalu dibungkus dengan daun pisang dan dikukus hingga matang.\r\nRasanya manis, legit, dan sangat khas — menjadi sajian wajib di berbagai acara seperti kenduri, lebaran, atau hantaran.\r\n\r\nIsi & Varian:\r\n✔ Timphan isi srikaya (original)\r\n✔ Timphan isi kelapa unti (manis gurih)\r\n\r\nCatatan:\r\nMinimum pemesanan 5 pcs. Tersedia juga paket hantaran isi 10–20 pcs.', '1752208711-tim.jpg', 'Makanan', '2025-07-11 04:38:31', NULL),
(21, 'Pulot', 4000, 'Kategori: Kue Tradisional / Jajanan Pasar\r\n\r\nDeskripsi Detail:\r\nPulot adalah makanan tradisional Aceh yang terbuat dari ketan putih atau hitam yang dikukus hingga pulen, kemudian disajikan dengan taburan kelapa parut muda dan sedikit garam, serta bisa ditambahkan gula merah cair atau srikaya.\r\nTeksturnya lengket dan lembut, dengan rasa manis-gurih yang khas — cocok dinikmati sebagai camilan pagi atau sore hari.\r\n\r\nVarian Pulot:\r\n✔ Pulot putih kelapa parut\r\n✔ Pulot hitam + srikaya / gula aren\r\n✔ Pulot bungkus daun pisang (untuk kenduri)\r\n\r\nCatatan:\r\nMinimum pemesanan 5 pcs. Tersedia juga dalam kemasan snack box atau nampan hantaran.', '1752208751-pulot.jpg', 'Makanan', '2025-07-11 04:39:11', NULL),
(22, 'Nasi Tumpeng', 250000, 'Kategori: Nasi / Paket Acara & Syukuran\r\n\r\nDeskripsi Detail:\r\nNasi Tumpeng adalah sajian khas Nusantara berbentuk kerucut, biasanya disajikan saat acara syukuran, ulang tahun, peresmian, atau hajatan.\r\nMenggunakan nasi kuning gurih yang disusun kerucut, disajikan bersama berbagai lauk khas yang lengkap, meriah, dan penuh makna simbolik.\r\n\r\nIsi Paket (standar):\r\n✔ Nasi kuning kerucut\r\n✔ Ayam goreng lengkuas / ayam bumbu rujak\r\n✔ Telur balado / telur pindang\r\n✔ Perkedel kentang\r\n✔ Urap sayur / oseng buncis\r\n✔ Sambal goreng kentang ati\r\n✔ Tempe orek\r\n✔ Kerupuk & sambal\r\n✔ Hiasan timun, tomat, selada & cabai\r\n\r\nVarian Ukuran:\r\n\r\nTumpeng Mini (1–2 orang)\r\n\r\nTumpeng Sedang (5–7 orang)\r\n\r\nTumpeng Besar (10–20 orang)\r\n\r\nCustom by request\r\n\r\nCatatan:\r\n📦 Termasuk tampah atau box eksklusif\r\n⏱️ Pesan H-1 untuk jaminan ketersediaan\r\n🚚 Bisa antar ke lokasi acara', '1752208930-tumpeng.jpeg', 'Makanan', '2025-07-11 04:42:10', '2025-07-11 06:40:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `profile_picture` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `upload`
--

INSERT INTO `upload` (`id`, `judul`, `file`, `deskripsi`, `profile_picture`, `created_at`, `update_at`) VALUES
(6, 'anjay', 'user.sql', 'qqqqqqqqq', '', '2025-07-08 07:31:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_picture` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_level`, `username`, `email`, `password`, `profile_picture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24, 1, 'siddiq', 'admin@gmail.com', '123', '', '2025-07-11 01:20:25', '2025-07-11 01:20:25', 0),
(25, 2, 'Agra', 'admin11@gmail.com', '123', '', '2025-07-11 01:20:50', '2025-07-11 01:20:50', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_name` (`level_name`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
