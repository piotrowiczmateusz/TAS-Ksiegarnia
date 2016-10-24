-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Paź 2016, 21:55
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `symfony`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Biografie'),
(2, 'Fantastyka'),
(3, 'Horror'),
(4, 'Klasyka'),
(5, 'Poezja'),
(6, 'Przygodowa'),
(7, 'Historyczna'),
(8, 'Kryminał'),
(9, 'Dramaty'),
(10, 'Astronomiczne'),
(11, 'Biznes'),
(12, 'Finanse'),
(13, 'Encyklopedie'),
(14, 'Słowniki'),
(15, 'Filozofia'),
(16, 'Podróżnicze'),
(17, 'Informatyka'),
(18, 'Matematyka'),
(19, 'Komiksy'),
(20, 'Kulinaria'),
(21, 'Militaria'),
(22, 'Motoryzacja'),
(23, 'Muzyka'),
(24, 'Religia'),
(25, 'Sport'),
(26, 'Turystyka'),
(27, 'Medycyna'),
(28, 'Zrowie');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
