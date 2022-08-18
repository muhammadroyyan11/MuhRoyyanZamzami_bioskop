-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2022 pada 05.00
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jitu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bioskop`
--

CREATE TABLE `bioskop` (
  `id_bioskop` int(11) NOT NULL,
  `kd_bioskop` varchar(255) NOT NULL,
  `nama_bioskop` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `harga` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bioskop`
--

INSERT INTO `bioskop` (`id_bioskop`, `kd_bioskop`, `nama_bioskop`, `kota`, `alamat_lengkap`, `harga`, `foto`) VALUES
(1, 'ASD123', 'Moviemax Dinoyo', 'Malang', 'Jl. MT. Haryono No.193, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', '30000', '-220818-88d2c6897c.jpg'),
(2, 'PRL002', 'Moviemax Sarinah', 'Malang', 'Jl. MT. Haryono No.193, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', '30000', '-220818-88d2c6897c.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `kd_film` varchar(255) NOT NULL,
  `judul_film` varchar(255) NOT NULL,
  `tgl_launc` date NOT NULL,
  `synopsys` text NOT NULL,
  `genre` varchar(100) NOT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id_film`, `kd_film`, `judul_film`, `tgl_launc`, `synopsys`, `genre`, `poster`) VALUES
(3, 'TG003', 'Testing dengan gambar', '2022-08-04', 'asdasdas', 'Action', 'TG003-220817-7f312e33fe.jpg'),
(4, 'TG004', 'Testing dengan gambar', '2022-08-04', 'asdasdas', 'Action', 'TG004-220817-dfef3df742.jpg'),
(5, 'RW005', 'Run Winner', '2022-08-10', 'asdasdasd', 'Biography', 'RW005-220817-00c8397568.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kd_jadwal` varchar(255) NOT NULL,
  `judul_film` int(11) NOT NULL,
  `bioskop` int(11) NOT NULL,
  `tgl_waktu_tayang` datetime NOT NULL,
  `jumlah_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `kd_jadwal`, `judul_film`, `bioskop`, `tgl_waktu_tayang`, `jumlah_kursi`) VALUES
(1, 'ASDAD12313', 3, 1, '2022-08-19 07:08:11', 50),
(2, 'ASD12318082022942RW00500002', 5, 1, '2022-08-18 09:42:00', 30),
(3, 'ASDAD123132TES', 3, 2, '2022-08-19 07:08:11', 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `jadwal` int(11) NOT NULL,
  `kd_pesan` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama_bioskop` varchar(255) NOT NULL,
  `kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `jadwal`, `kd_pesan`, `judul`, `nama_bioskop`, `kursi`) VALUES
(1, 3, 'KWE001', 'Testing dengan gambar', 'Moviemax Sarinah', 13),
(2, 2, 'JAM002', 'Run Winner', 'Moviemax Dinoyo', 18);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bioskop`
--
ALTER TABLE `bioskop`
  ADD PRIMARY KEY (`id_bioskop`);

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `judul_film` (`judul_film`),
  ADD KEY `bioskop` (`bioskop`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `jadwal` (`jadwal`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bioskop`
--
ALTER TABLE `bioskop`
  MODIFY `id_bioskop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`judul_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`bioskop`) REFERENCES `bioskop` (`id_bioskop`);

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`jadwal`) REFERENCES `jadwal` (`id_jadwal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
