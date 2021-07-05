-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 14.19
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelitajaya`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CekKurangDari10` (IN `input` INT, OUT `hasil` VARCHAR(50))  BEGIN
	#Routine body goes here...
	IF input < 10 THEN
		SET hasil = 'Angka kurang dari 10';
	ELSE 
		SET hasil = 'Angka lebih dari 10';
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CheckNumberOfMonth` (IN `input` INT, OUT `hasil` VARCHAR(50))  BEGIN
	#Routine body goes here...
	CASE input
    WHEN 1 THEN
      SET hasil = 'January';
    WHEN 2 THEN
      SET hasil = 'February';
    WHEN 3 THEN
      SET hasil = 'March';
		WHEN 4 THEN
      SET hasil = 'April';
		WHEN 5 THEN
      SET hasil = 'May';
		WHEN 6 THEN
      SET hasil = 'June';
		WHEN 7 THEN
      SET hasil = 'July';
		WHEN 8 THEN
      SET hasil = 'August';
		WHEN 9 THEN
      SET hasil = 'September';
		WHEN 10 THEN
      SET hasil = 'October';
		WHEN 11 THEN
      SET hasil = 'November';
		WHEN 12 THEN
      SET hasil = 'December';
    ELSE
      SET hasil = 'Invalid input number of month';
  END CASE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetSiswa` ()  BEGIN
	#Routine body goes here...
	SELECT * FROM siswa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetTotalSiswa` ()  BEGIN
	#Routine body goes here...
	DECLARE totalSiswa INT(11) DEFAULT 0;
	
	SELECT COUNT(*) INTO totalSiswa FROM siswa;
	SELECT totalSiswa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LuasPersegi` (OUT `luas` INT)  BEGIN
	#Routine body goes here...
	SELECT 7 * 7  INTO luas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LuasPersegiPanjang` (IN `panjang` INT, IN `lebar` INT, OUT `luas` INT)  BEGIN
	#Routine body goes here...
	SELECT (panjang * lebar) INTO luas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Perkalian` (INOUT `angka` INT)  BEGIN
	#Routine body goes here...
	SELECT (angka * angka) INTO angka;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PerulanganLoop` (IN `batas` INT)  BEGIN
	#Routine body goes here...
	DECLARE i INT;
  DECLARE hasil VARCHAR(20) DEFAULT '';
  SET i = 1;
  ulang: LOOP
    IF i > batas THEN
      LEAVE ulang;
    END IF;
    SET i = i + 1;
    IF (i mod 2 = 0) THEN
      ITERATE ulang;
    ELSE
      SET hasil = CONCAT(hasil, i, ' ');
    END IF;
  END LOOP;
  SELECT hasil;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PerulanganRepeat` (IN `batas` INT)  BEGIN
	#Routine body goes here...
	DECLARE i INT;
  DECLARE hasil VARCHAR(20) DEFAULT '';
  SET i = 1;
  REPEAT
		IF (i mod 2 = 0) THEN
			SET hasil = CONCAT(hasil, i, ' ');
		END IF;
    SET i = i + 1;
    UNTIL i > batas
  END REPEAT;
  SELECT hasil;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PerulanganWhile` (IN `batas` INT)  BEGIN
	#Routine body goes here...
	DECLARE i INT;
  DECLARE hasil VARCHAR(20) DEFAULT '';
  SET i = 1;
  WHILE i <= batas DO
		IF (i mod 2) THEN
			SET hasil = CONCAT(hasil, i, ' ');
		END IF;
    SET i = i + 1;
  END WHILE;
  SELECT hasil;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ProcedureName` ()  BEGIN
	#Routine body goes here...
	SELECT * FROM siswa;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jkel` enum('L','P') NOT NULL,
  `agama` varchar(30) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `tempat_lahir`, `tgl_lahir`, `jkel`, `agama`, `id_mapel`) VALUES
(1, 'Burhan', 'Jember', '1990-10-10', 'L', 'Islam', 1),
(2, 'Maisaroh', 'Sidoarjo', '2008-12-20', 'P', 'Islam', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tingkat`, `jurusan`) VALUES
(1, 10, 'IPA'),
(2, 10, 'IPS'),
(3, 12, 'Bahasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Fisika'),
(2, 'Sejarah'),
(4, 'Matematika'),
(5, 'Bahasa Afrika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jkel` enum('L','P') NOT NULL,
  `agama` varchar(30) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jkel`, `agama`, `id_kelas`) VALUES
(2, 'Mario Satuji', 'Pacitan', '2003-07-31', 'L', 'Islam', 1),
(25, 'Bucin Hermansyah', 'Pekanbaru', '2020-11-14', 'P', 'Gak Tau', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
